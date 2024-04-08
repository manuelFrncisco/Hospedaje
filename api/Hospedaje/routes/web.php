<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CountryController;
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
    Route::get('/admin/comentario/{id}',[CommentController::class,'commentShow'])->name('commentShow');
    Route::get('/admin/comentario/crear', [CommentController::class, 'comentarioCrear'])->name('comentarioCrear');
    Route::post('comentario/crear', [CommentController::class, 'CommentCreate'])->name('CommentCreate');
    Route::get('/admin/comentario/editar/{id}', [CommentController::class, 'comentarioEditar'])->name('comentarioEditar');
    Route::post('/comentario/editar/{id}', [CommentController::class,'CommentEdit'])->name('CommentEdit');
    Route::delete('/comentario/eliminar/{id}', [CommentController::class, 'CommentDelete'])->name('CommentDelete');
    
    Route::get('/admin/usuarios', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/ususarios/{id}',[UserController::class,'userShow'])->name('userShow');
    Route::get('/admin/usuarios/crear',[UserController::class, 'usuarioCrear'])->name('usuarioCrear');
    Route::get('/admin/usuarios/editar/{id}',[UserController::class, 'usuarioEditar'])->name('usuarioEditar');
    Route::post('/usuario/editar/{id}',[UserController::class, 'UserEdit'])->name('UserEdit');
    Route::post('/usuario/crear', [UserController::class, 'UserCreate'])->name('UserCreate');
    Route::delete('/usuario/eliminar/{id}', [UserController::class, 'UserDelete'])->name('UserDelete');
    
    Route::get('/admin/reservaciones', [ReservationController::class, 'index'])->name('admin.reservations.index');
    Route::get('/admin/reservaciones/crear', [ReservationController::class, 'reservacionCrear'])->name('admin.reservations.create');
    Route::get('/admin/reservaciones/{id}', [ReservationController::class, 'ReservationShow'])->name('ReservationShow');
    Route::post('reservaciones/crear', [ReservationController::class, 'ReservationCreate'])->name('ReservationCreate');
    Route::get('/admin/reservaciones/editar/{id}',[ReservationController::class, 'ReservationEdit'])->name('ReservationEdit');
    Route::put('reservaciones/editar/{id}',[ReservationController::class, 'reservarEditar'])->name('reservarEditar');
    Route::delete('reservacion/eliminado/{id}', [ReservationController::class, 'ReservationDelete'])->name('ReservationDelete');
    
    Route::get('/admin/calificacion', [RatingController::class, 'index'])->name('admin.ratings.index');
    Route::get('/admin/califiaciones/{id}',[RatingController::class,'ratingShow'])->name('ratingShow');
    Route::get('/admin/calificacion/crear',[RatingController::class,'calificacionCrear'])->name('calificacionCrear');
    Route::get('/admin/calificaciones/editar/{id}', [RatingController::class, 'calificacionEditar'])->name('calificacionEditar');
    Route::post('/calificacion/crear',[RatingController::class, 'RatingCreate'])->name('RatingCreate');
    Route::put('/calificacion/editar/{id}',[RatingController::class, 'RatingEdit'])->name('RatingEdit');
    Route::delete('/calificacion/eliminar/{id}',[RatingController::class,'RatingDelete'])->name('RatingDelete');
    
    Route::get('/admin/localizacion', [locationController::class, 'index'])->name('admin.locations.index');
    Route::get('/admin/localizacion/{id}', [locationController::class,'locationShow'])->name('locationShow');
    Route::get('/admin/localizacion/crear',[locationController::class, 'localizacionCrear'])->name('localizacionCrear');
    Route::get('/admin/localizacion/editar/{id}', [locationController::class, 'localizacionEditar'])->name('localizacionEditar');
    Route::put('/localizacion/editar/{id}',[locationController::class, 'LocationEdit'])->name('LocationEdit');
    Route::post('/localizacion/crear',[locationController::class, 'LocationCreate'])->name('LocationCreate');
    Route::delete('/localizacion/eliminar/{id}',[locationController::class, 'LocationDelete'])->name('LocationDelete');
    
    Route::get('/admin/alojamiento', [LodgingController::class, 'index'])->name('admin.lodgings.index');
    Route::get('/admin/alojamiento/{id}', [LodgingController::class,'lodgingShow'])->name('lodgingShow');
    Route::get('/admin/alojamiento/crear',[LodgingController::class,'alojamientoCrear'])->name('alojamientoCrear');
    Route::get('/admin/alojamiento/editar/{id}',[LodgingController::class, 'alojamientoEditar'])->name('alojamientoEditar');
    Route::post('/alojamiento/crear',[LodgingController::class,'LodgingCreate'])->name('LodgingCreate');
    Route::post('/alojamiento/editar/{id}',[LodgingController::class, 'LodgingEdit'])->name('LodgingEdit');
    Route::delete('/alojamiento/eliminar/{id}',[LodgingController::class,'LodgingDelete'])->name('LodgingDelete');
    
    Route::get('/admin/ofertas', [OfertController::class, 'index'])->name('admin.offers.index');
    
    Route::get('/admin/nivel', [LevelController::class, 'index'])->name('admin.levels.index');
    Route::get('/admin/nivel/crear', [LevelController::class, 'levelCrear'])->name('levelCrear');
    Route::get('/admin/nivel/editar/{id}', [LevelController::class, 'levelEditar'])->name('levelEditar');
    Route::post('nivel/create', [LevelController::class, 'LevelCreate'])->name('LevelCreate');
    Route::post('nivel/editar/{id}',[LevelController::class,'LevelEdit'])->name('LevelEdit');
    Route::delete('nivel/eliminar/{id}',[LevelController::class, 'LevelDelete'])->name('LevelDelete');
    
    Route::get('/admin/paises',[CountryController::class, 'index'])->name('admin.countries.index');
    Route::get('/admin/paises/{id}',[CountryController::class, 'paisShow'])->name('paisShow');
    Route::get('/admin/paises/crear',[CountryController::class, 'paisCrear'])->name('paisCrear');
    Route::get('/admin/paises/editar/{id}',[CountryController::class, 'paisEditar'])->name('paisEditar');
    Route::post('/paises/crear',[CountryController::class, 'CountryCreate'])->name('CountryCreate');
    Route::post('/paises/editar/{id}',[CountryController::class, 'CountryEdit'])->name('CountryEdit');
    Route::delete('/paises/eliminar/{id}',[CountryController::class,'CountryDelete'])->name('CountryDelete');

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


