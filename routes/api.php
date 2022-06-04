<?php

use App\Models\AppUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AppUserController;
use App\Http\Controllers\CircleController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\NotificationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Public routes
// Route::resource('app-users', AppUserController::class);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    // user
    Route::get('/app-users', [AppUserController::class, 'index']);
    Route::get('/app-users/{id}', [AppUserController::class, 'show']);
    Route::get('/app-users/search/{name}', [AppUserController::class, 'search']);
    Route::post('/app-users', [AuthController::class, 'store'] );
    Route::put('/app-users/{id}', [AppUserController::class, 'update'] );
    Route::delete('/app-users/{id}', [AuthController::class, 'destroy'] );
    Route::post('/logout', [AuthController::class, 'logout']);

    // Circle
    Route::get('/circle', [CircleController::class, 'index']);
    Route::post('/circle/request', [CircleController::class, 'request']);
    Route::post('/circle/confirm', [CircleController::class, 'confirm']);
    Route::post('/circle/notify', [CircleController::class, 'notify']);

    // Notification
    Route::get('/notifications', [NotificationController::class, 'index']);
    Route::post('/notifications', [NotificationController::class, 'create']);

    // Location
    Route::get('/locations', [LocationController::class, 'index']);
    Route::post('/locations', [LocationController::class, 'create']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
