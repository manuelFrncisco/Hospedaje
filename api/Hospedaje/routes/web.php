<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\locationController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LodgingController;
use App\Http\Controllers\OfertController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerfilController;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/page', [PageController::class, 'index'])->name('page');
Route::get('/page/{id}', [PageController::class, 'show'])->name('show');

Route::middleware('checkUserRole')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/admin/comentario', [CommentController::class, 'index'])->name('admin.comments.index');
    Route::get('/admin/usuarios', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/reservaciones', [ReservationController::class, 'index'])->name('admin.reservations.index');
    Route::get('/admin/calificacion', [RatingController::class, 'index'])->name('admin.ratings.index');
    Route::get('/admin/localizacion', [locationController::class, 'index'])->name('admin.locations.index');
    Route::get('/admin/alojamiento', [LodgingController::class, 'index'])->name('admin.lodgings.index');
    Route::get('/admin/ofertas', [OfertController::class, 'index'])->name('admin.offers.index');
    Route::get('/admin/nivel', [LevelController::class, 'index'])->name('admin.levels.index');
    Route::get('/pages/crear', [PageController::class, 'crear'])->name('crear')->middleware('auth');
    Route::get('/pages/editar/{id}', [PageController::class, 'editar'])->name('editar');

});
Route::post('/pages/create', [PageController::class, 'create'])->name('create');
Route::post('/pages/update', [PageController::class, 'update'])->name('update-lodging');
Route::delete('/page/{id}',[PageController::class, 'destroy'])->name('delete');

Route::post('/comment/create', [PageController::class, 'createComment'])->name('comment.store');
Route::delete('/comment/{id}',[PageController::class, 'delete'])->name('comment.delete');

Route::get('/reservation/{id}', [PageController::class, 'reservafrom'])->name('reservafrom');
Route::post('/reservat', [PageController::class, 'reserve'])->name('reserve');
Route::delete('/reservation/{id}',[PerfilController::class, 'dropReservation'])->name('dropReservation');

Route::post('/rating',[PageController::class,'rating'])->name('rating');

Route::get('/user', [PerfilController::class, 'index'])->name('perfil')->middleware('auth');
Route::get('/user/perfil', [PerfilController::class, 'edit'])->name('perfil_update')->middleware('auth');
Route::post('/user/update', [PerfilController::class, 'update'])->middleware('auth');


