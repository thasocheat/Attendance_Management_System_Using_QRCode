<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Class\ClassController;
use App\Http\Controllers\Subject\SubjectController;
use App\Http\Controllers\Attendance\AttendanceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Role-based routes
    Route::middleware('role:super_admin,admin,teacher')->group(function () {
        // Subject management routes
        Route::resource('subjects', SubjectController::class);

        // Class management routes
        Route::resource('classes', ClassController::class);
    });

    Route::middleware('role:teacher,student')->group(function () {
        // Attendance management routes
        Route::get('attendance', [AttendanceController::class, 'index'])->name('attendance.index');
        Route::post('attendance/record', [AttendanceController::class, 'record'])->name('attendance.record');
    });


});




require __DIR__.'/auth.php';
