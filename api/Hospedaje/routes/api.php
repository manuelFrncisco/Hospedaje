<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\locationController;
use App\Http\Controllers\Api\commentController;
use App\Http\Controllers\Api\lodgingController;
use App\Http\Controllers\Api\ofertController;
use App\Http\Controllers\Api\ratingController;
use App\Http\Controllers\Api\reservationController;
use App\Http\Controllers\Api\PackageController;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/locations', [locationController::class, 'list']);
Route::get('/locations/{id}', [locationController::class,'show']);
Route::post('/locations/create', [locationController::class,'create']);
Route::post('/locations/{id}/update', [locationController::class, 'updated']);

Route::get('/comments',[commentController::class,'list']);
Route::get('/comments/{id}',[commentController::class,'show']);
Route::post('/comments/create',[commentController::class,'create']);
Route::post('/comments',[commentController::class,'update']);

Route::get('/lodgings', [lodgingController::class , 'list']);
Route::get('/lodgings/{id}', [lodgingController::class,'show']);
Route::post('/lodgings/create', [lodgingController::class,'create']);
Route::post('/lodgings', [lodgingController::class,'updated']);

Route::get('/oferts', [ofertController::class,'list']);
Route::get('/oferts/{id}',[ofertController::class,'show']);
Route::post('/oferts/create', [ofertController::class,'create']);
Route::post('/oferts', [ofertController::class,'updated']);

Route::get('/ratings', [ratingController::class,'list']);
Route::get('/ratings/{id}', [ratingController::class,'show']);
Route::post('/ratings/create', [ratingController::class,'create']);
Route::post('/ratings', [ratingController::class,'updated']);

Route::get('/reservations',[reservationController::class,'list']);
Route::get('/reservations/{id}',[reservationController::class,'show']);
Route::post('/reserva/create',[reservationController::class,'create']);
Route::post('/reservations',[reservationController::class,'updated']);

Route::post('/login',[AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/profile', [AuthController::class,'show'])->middleware('auth:api');

