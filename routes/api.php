<?php

use App\Http\Controllers\SidebarAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ListApi;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\RoomController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1'], function(){
    Route::get('/sidebarlist', [SidebarAPI::class, 'sidebar']);
    });

// Expense List endpoints 
Route::prefix('v1')->group(function () {
    Route::resource("list", "ListApi");
});


// Auth Endpoints

// Expense List Routes
Route::group(['middleware' => 'api', 'prefix' => 'v1'], function(){
	Route::get("/expenses", [ExpenseController::class, 'index']);
	Route::get("/expenses/{id}", [ExpenseController::class, 'show']);
	Route::post("/expenses", [ExpenseController::class, 'store']);
});



// Room  Endpoints
Route::group(['prefix' => 'v1'], function(){
	Route::get('/rooms/search', [RoomController::class, 'search'] );
    Route::resource("rooms", "RoomController");
});


// Organization Endpoints






