<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\UserController;

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
    return redirect('/login');
});

// auth
Route::get('/login', [AuthController::class, 'viewLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// course
Route::get('/course/{course}', [CourseController::class, 'show']);
Route::post('/course/store', [CourseController::class, 'store'])->name('kursus.store');
Route::get('/course/{course}', [CourseController::class, 'edit'])->name('kursus.edit');
Route::put('/course/{course}', [CourseController::class, 'update'])->name('kursus.update');
Route::delete('/course/{course}/destroy', [CourseController::class, 'destroy'])->name('kursus.destroy');

// materi
Route::get('/course/{course}/materi', [MateriController::class, 'index'])->name('materi')->middleware(['auth', 'admin']);
Route::post('/materi/store', [MateriController::class, 'store'])->name('materi.store')->middleware(['auth', 'admin']);
Route::get('/materi/{materi}', [MateriController::class, 'edit'])->name('materi.edit')->middleware(['auth', 'admin']);
Route::put('/materi/{materi}', [MateriController::class, 'update'])->name('materi.update')->middleware(['auth', 'admin']);
Route::delete('/materi/{materi}/destroy', [MateriController::class, 'destroy'])->name('materi.destroy');



// admin
Route::get('/dashadmin', [AdminController::class, 'index'])->name('dashadmin')->middleware('auth', 'admin');

// member
Route::get('/home', [UserController::class, 'index'])->name('home')->middleware(['auth']);
Route::get('/course/{course}/materi/all', [UserController::class, 'courseMateri'])->name('course.materi')->middleware(['auth']);
Route::get('/materi/{materi}/show', [UserController::class, 'show'])->name('materi.show')->middleware(['auth']);
