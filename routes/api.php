<?php

use App\Http\Controllers\V1\ScapeRoomController;
use Illuminate\Http\Request;
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

Route::prefix('v1')->group(function () {

    Route::name('scapeRooms.')->prefix('scapeRooms')->group(function () {
        Route::get('/', [ScapeRoomController::class, 'index']);
        Route::get('/{id}', [ScapeRoomController::class, 'show']);
        Route::get('/{id}/timeSlots', [ScapeRoomController::class, 'timeSlots']);
    });

    
});
