<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::post('/users', [UserController::class, 'store']);

Route::prefix('documentation')->group(function () {
    Route::get('/', function() {
        return redirect('/api/documentation');
    });
    Route::get('/api-docs.json', function() {
        return response()->file(storage_path('api-docs/api-docs.json'));
    });
});

Route::apiResource('users', App\Http\Controllers\UserController::class)
    ->only(['index', 'show', 'store', 'update', 'destroy']);

