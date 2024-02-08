<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\locationController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LodgingController;
use App\Http\Controllers\OfertController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/old', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/admin', [AdminController::class,'index'])->name('admin.home');
Route::get('/admin/comentario', [CommentController::class,'index'])->name('admin.comments.index');
Route::get('/admin/usuarios', [UserController::class,'index'])->name('admin.users.index');
Route::get('/admin/reservaciones', [ReservationController::class,'index'])->name('admin.reservations.index');
Route::get('/admin/calificacion', [RatingController::class,'index'])->name('admin.ratings.index');
Route::get('/admin/localizacion', [locationController::class,'index'])->name('admin.locations.index');
Route::get('/admin/alojamiento', [LodgingController::class,'index'])->name('admin.lodgings.index');
Route::get('/admin/ofertas', [OfertController::class,'index'])->name('admin.users.index');
