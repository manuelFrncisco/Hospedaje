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
Route::post('/comment/create',[CommentController::class,'create'])->middleware('auth:api');
Route::post('/comments/{id}',[CommentController::class,'update']);

Route::get('/lodgings/{id}/comments', [CommentController::class, 'indexByLodging'])->middleware('auth:api');

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
Route::get('/rating/lodging/{id}', [RatingController::class, 'ratingAverage']);

Route::post('/rating/create', [RatingController::class, 'store']);

Route::get('/reservations',[ReservationController::class,'list']);
Route::post('/reserva/create',[ReservationController::class,'create'])->middleware('auth:api');
Route::get('/reservations/{id}',[ReservationController::class,'show']);
Route::post('/reservations/{id}',[ReservationController::class,'updated']);

Route::get('/reservations/{id}/lodgings', [ReservationController::class, 'showLodgingByReservationId'])->middleware('auth:api');

Route::post('/login',[AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/profile', [AuthController::class,'profile'])->middleware('auth:api');
Route::post('/profile/update',[AuthController::class,'update'])->middleware('auth:api');