<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VideoRegisterController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/video-register', [VideoRegisterController::class, 'videoRegisterPage'])->name('videoRegisterPage');

Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard')->middleware('admin');
Route::get('/admin', [AdminController::class, 'login'])->name('admin.Login');
Route::post('admin/login', [AdminController::class, 'authenticate'])->name('admin.Authenticate');
Route::get('/videos', [AdminController::class, 'getVideo'])->name('admin.videos');
Route::get('/video/deny/{id}', [AdminController::class, 'deny'])->name('video.deny');
Route::get('/video/confirm/{id}', [AdminController::class, 'confirm'])->name('video.confirm');

