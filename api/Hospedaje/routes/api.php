<?php




use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CommentController;
use App\Http\Controllers\api\LocationController;
use App\Http\Controllers\api\LodgingController;
use App\Http\Controllers\api\OfertController;
use App\Http\Controllers\api\RatingController;
use App\Http\Controllers\api\ReservationController;
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

Route::get('/locations', [LocationController::class, 'list']);
Route::get('/locations/{id}', [LocationController::class,'show']);
Route::post('/locations/create', [LocationController::class,'create']);
Route::post('/locations/{id}/update', [LocationController::class, 'updated']);

Route::get('/comments',[CommentController::class,'list']);
Route::get('/comments/{id}',[CommentController::class,'show']);
Route::post('/comments/create',[CommentController::class,'create']);
Route::post('/comments',[CommentController::class,'update']);

Route::get('/lodgings', [LodgingController::class , 'list']);
Route::get('/lodgings/{id}', [LodgingController::class,'show']);
Route::post('/lodgings/create', [LodgingController::class,'create']);
Route::post('/lodgings', [LodgingController::class,'updated']);

Route::get('/oferts', [OfertController::class,'list']);
Route::get('/oferts/{id}',[OfertController::class,'show']);
Route::post('/oferts/create', [OfertController::class,'create']);
Route::post('/oferts', [OfertController::class,'updated']);

Route::get('/ratings', [RatingController::class,'list']);
Route::get('/ratings/{id}', [RatingController::class,'show']);
Route::post('/ratings/create', [RatingController::class,'create']);
Route::post('/ratings', [RatingController::class,'updated']);

Route::get('/reservations',[ReservationController::class,'list']);
Route::get('/reservations/{id}',[ReservationController::class,'show']);
Route::post('/reserva/create',[ReservationController::class,'create']);
Route::post('/reservations',[ReservationController::class,'updated']);

Route::post('/login',[AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/profile', [AuthController::class,'show'])->middleware('auth:api');