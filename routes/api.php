<?php

use App\Http\Controllers\api\AssetController;
use App\Http\Controllers\API\ImageController;
use Illuminate\Http\Request;
use App\Http\Controllers\API\InventoryController;
use App\Http\Controllers\AutenticarController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('registro', [AutenticarController::class, 'registro']);
Route::post('login', [AutenticarController::class, 'acceso']);

Route::group(['middleware' => ['auth:sanctum']], function(){    
    // ASSETS CONTROLLER
    // Route::apiResource('asset', AssetController::class);
    Route::get('fetchAssets', [AssetController::class, 'index']);
    Route::post('createAsset', [AssetController::class, 'store']);
    Route::post('updateAsset', [AssetController::class, 'update']);
    Route::get('getAsset/{id}', [AssetController::class, 'show']); 
    Route::delete('deleteAsset/{id}', [AssetController::class, 'destroy']); 
    
    //IMAGE CONTROLLER
    Route::post('createImage', [ImageController::class, 'uploadImage']);
    Route::delete('deleteImage/{id}', [ImageController::class, 'deleteImage']);

    // LOGIN CONTROLLER
    Route::post('logout', [AutenticarController::class, 'cerrarSesion']);
});