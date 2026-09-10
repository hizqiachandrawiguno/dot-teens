<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\EventController;

// ==========================================
// RUTE HALAMAN DEPAN (PUBLIC)
// ==========================================

Route::get('/', function () { 
    $events = \App\Models\Event::where('event_date', '>=', now()->toDateString())->orderBy('event_date', 'asc')->take(3)->get();
    $cellSchedules = \App\Models\CellSchedule::where('meeting_date', '>=', now()->toDateString())->orderBy('meeting_date', 'asc')->get();
    $galleries = \App\Models\Gallery::orderBy('created_at', 'desc')->take(6)->get(); 
    
    // Cek status saklar dari file
    $path = storage_path('app/form_status.txt');
    $isJoinFormActive = file_exists($path) ? file_get_contents($path) : '1';
                
    return view('welcome', compact('events', 'cellSchedules', 'galleries', 'isJoinFormActive')); 
});

Route::get('/about', [PublicController::class, 'about']);
Route::post('/join-us', [PublicController::class, 'storeMember'])->name('join.submit');

Route::get('/gallery', function () { 
    $galleries = \App\Models\Gallery::orderBy('created_at', 'desc')->get();
    return view('gallery', compact('galleries')); 
});

Route::get('/cells', function () { 
    $cellSchedules = \App\Models\CellSchedule::where('meeting_date', '>=', now()->toDateString())
                    ->orderBy('meeting_date', 'asc')
                    ->get();
    return view('cells', compact('cellSchedules')); 
});

Route::post('/prayer/submit', [AdminController::class, 'storePrayerPublic'])->name('prayer.submit');


// ==========================================
// RUTE AUTHENTICATION (LOGIN & REGISTER)
// ==========================================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route Pemulihan Password Admin
Route::get('/reset-admin-password', function () {
    $user = \App\Models\User::firstOrNew(['email' => 'admin@dotsawangan.com']);
    $user->name = 'Super Admin DOT';
    $user->role = 'super_admin';
    $user->status = 'approved';
    $user->password = \Illuminate\Support\Facades\Hash::make('admin123');
    $user->save();
    
    return "<div style='font-family:sans-serif; text-align:center; padding:50px; background:#0F172A; color:#F3F4F6; min-height:100vh; display:flex; flex-direction:column; justify-content:center; align-items:center;'>
        <div style='background:rgba(255,255,255,0.05); padding:40px; border-radius:24px; border:1px solid rgba(255,255,255,0.1); max-width:450px;'>
            <div style='font-size:48px; margin-bottom:15px;'>✅</div>
            <h2 style='color:#10B981; margin-bottom:20px;'>Password Berhasil Direset!</h2>
            <div style='background:rgba(0,0,0,0.3); padding:15px; border-radius:12px; text-align:left; margin-bottom:25px;'>
                <p style='margin:5px 0; color:#94A3B8;'>Email: <strong style='color:#fff;'>admin@dotsawangan.com</strong></p>
                <p style='margin:5px 0; color:#94A3B8;'>Password Baru: <strong style='color:#60A5FA; font-size:18px;'>admin123</strong></p>
                <p style='margin:5px 0; color:#94A3B8;'>Role: <span style='color:#10B981; font-weight:bold;'>Super Admin (Approved)</span></p>
            </div>
            <a href='/login' style='display:inline-block; padding:12px 30px; background:linear-gradient(90deg, #60A5FA, #8B5CF6); color:#fff; text-decoration:none; border-radius:50px; font-weight:bold;'>Masuk ke Halaman Login</a>
        </div>
    </div>";
});


// ==========================================
// INSTALASI DATABASE (CCTV & UNDANGAN CELL)
// ==========================================
Route::get('/install-cctv', function () {
    if (!Schema::hasTable('activity_logs')) {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('role');
            $table->string('action');
            $table->text('description');
            $table->timestamps();
        });
        return "<h1 style='color:green;'>CCTV Berhasil Terpasang! ✅</h1>";
    }
    return "CCTV Sudah Ada.";
});

Route::get('/install-undangan', function () {
    if (!Schema::hasColumn('members', 'is_invited')) {
        Schema::table('members', function (Blueprint $table) {
            $table->boolean('is_invited')->default(false)->after('is_joined');
        });
        return "<h1 style='color:green;'>Fitur Status Undangan Berhasil Dipasang! ✅</h1>";
    }
    return "Fitur sudah terpasang bang, aman!";
});


// ==========================================
// RUTE ADMIN DASHBOARD (DILINDUNGI MIDDLEWARE)
// ==========================================
Route::middleware('auth')->group(function () {
    
    // Halaman Utama Dashboard Admin
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Fitur Super Admin (Persetujuan Akun)
    Route::post('/admin/user/approve/{id}', [AdminController::class, 'approveUser']);
    Route::post('/admin/user/reject/{id}', [AdminController::class, 'rejectUser']);
    Route::post('/admin/user/delete/{id}', [App\Http\Controllers\AdminController::class, 'destroyUser']);

    // Fitur Divisi Cell
    Route::get('/admin/member/invite/{id}', [AdminController::class, 'sendInvitationWA']); // <-- BARU: Fitur Kirim WA
    Route::post('/admin/update-status/{id}', [AdminController::class, 'updateStatus']);
    Route::post('/admin/cell-schedule/add', [AdminController::class, 'storeCellSchedule']);
    Route::get('/admin/cell-schedule/edit/{id}', [AdminController::class, 'editCellSchedule']);
    Route::post('/admin/cell-schedule/update/{id}', [AdminController::class, 'updateCellSchedule']);
    Route::post('/admin/cell-schedule/delete/{id}', [AdminController::class, 'deleteCellSchedule']);

    // Fitur Divisi Acara
    Route::post('/admin/event/add', [AdminController::class, 'storeEvent']);
    Route::get('/admin/event/edit/{id}', [AdminController::class, 'editEvent']);
    Route::post('/admin/event/update/{id}', [AdminController::class, 'updateEvent']);
    Route::post('/admin/event/delete/{id}', [AdminController::class, 'deleteEvent']);

    // Fitur Divisi Sosmed
    Route::post('/admin/gallery/add', [AdminController::class, 'storeGallery']);
    Route::post('/admin/gallery/delete/{id}', [AdminController::class, 'deleteGallery']);

    // Fitur Divisi Pastoral
    Route::get('/admin/pastoral', [AdminController::class, 'pastoralDashboard']);
    Route::post('/admin/pastoral/import', [AdminController::class, 'importCsv']);
    Route::post('/admin/pastoral/attendance', [AdminController::class, 'saveAttendance']);
    Route::get('/admin/pastoral/recap', [AdminController::class, 'attendanceRecap']);
    Route::post('/admin/pastoral/recap/reset', [AdminController::class, 'resetAttendance']);
    Route::post('/admin/toggle-form', [AdminController::class, 'toggleJoinForm']);
    Route::get('/admin/pastoral/member/delete/{id}', [AdminController::class, 'deleteMember']);

    // Fitur Divisi Prayer
    Route::get('/admin/prayer', [AdminController::class, 'prayerDashboard']);
    Route::get('/admin/prayer/status/{id}/{status}', [AdminController::class, 'updatePrayerStatus']);
    Route::get('/admin/prayer/download', [AdminController::class, 'downloadPrayer']);
    Route::post('/admin/prayer/reset', [AdminController::class, 'resetPrayer']);

    //Fitur Admin Event
    Route::resource('admin/events', EventController::class);
});