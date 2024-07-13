<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MasterPerusahaanController;
use App\Http\Controllers\DataUploadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('master_perusahaan', MasterPerusahaanController::class);
    Route::resource('data_upload', DataUploadController::class);
    
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);

    Route::get('data_upload/download/{id}', [DataUploadController::class, 'download'])->name('data_upload.download');
});
Route::get('/api/perusahaan', [MasterPerusahaanController::class, 'search'])->name('api.perusahaan.search');
