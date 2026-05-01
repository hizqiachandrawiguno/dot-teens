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
    $galleries = \App\Models\Gallery::orderBy('created_at', 'desc')->take(3)->get(); 
    
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