<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Tampilkan Halaman Login
    public function showLogin() { 
        return view('auth.login'); 
    }

    // Tampilkan Halaman Register
    public function showRegister() { 
        return view('auth.register'); 
    }

    // Proses Pendaftaran Admin/Ketua Divisi
    public function register(Request $request) {
        $request->validate(['name' => 'required', 'email' => 'required|email|unique:users', 'password' => 'required|min:6', 'role' => 'required']);

        // Akun pertama yang daftar otomatis jadi Approved (untuk kamu sbg Super Admin)
        $isFirstUser = User::count() == 0;
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => $isFirstUser ? 'approved' : 'pending' // Selain akun pertama, harus nunggu di-approve
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil! Jika Anda bukan akun pertama, silakan tunggu persetujuan Super Admin.');
    }

    public function login(Request $request) {
        $credentials = $request->validate(['email' => 'required|email', 'password' => 'required']);
        $remember = $request->boolean('remember', true);

        // Auto-provision default akun volunteer agar langsung aktif tanpa perlu approval manual
        if ($request->email === 'volunteer@dotteens.com' && $request->password === 'volunteer123') {
            try {
                $volunteer = User::where('email', 'volunteer@dotteens.com')->first();
                if (!$volunteer) {
                    User::create([
                        'name' => 'Volunteer / Usher DOT',
                        'email' => 'volunteer@dotteens.com',
                        'password' => Hash::make('volunteer123'),
                        'role' => 'volunteer',
                        'status' => 'approved'
                    ]);
                } elseif ($volunteer->status !== 'approved' || $volunteer->role !== 'volunteer') {
                    $volunteer->update(['status' => 'approved', 'role' => 'volunteer']);
                }
            } catch (\Throwable $e) {
                // Ignore DB error if connection is temporarily unavailable
            }
        }

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();
            // Cek apakah akun sudah di-approve
            if ($user->status !== 'approved') {
                Auth::logout();
                return back()->withErrors(['email' => 'Akun Anda sedang menunggu persetujuan Super Admin.'])->onlyInput('email');
            }
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }
        return back()->withErrors(['email' => 'Email atau Password salah.'])->onlyInput('email');
    }

    // Proses Logout
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Anda telah berhasil keluar dari panel admin.');
    }
}