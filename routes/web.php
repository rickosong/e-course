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
Route::get('/login', [AuthController::class, 'viewLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/test', function () {
    return view('kursus-page');
});

Route::get('/course/{course}', [CourseController::class, 'show']);
Route::post('/course/store', [CourseController::class, 'store'])->name('kursus.store');
Route::delete('/course/destroy', [CourseController::class, 'destroy'])->name('kursus.destroy');

// Route::get('/course/{course}/materi', [MateriController::class, 'index']);
Route::get('/materi/{courseId}', [MateriController::class, 'getMateriByCourse']);


Route::get('/dashadmin', [AdminController::class, 'index'])->name('dashadmin')->middleware('auth', 'admin');

Route::get('/home', [UserController::class, 'index'])->name('home')->middleware(['auth']);
