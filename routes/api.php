<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

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

Route::group([
    'middleware' => 'api',
], function ($router) {

    //Posts
    Route::get('/posts/', [PostsController::class, 'index']);
    Route::get('/posts/{id}/', [PostsController::class, 'watch']);
    Route::post('/posts/', [PostsController::class, 'register']);
    Route::put('/posts/{id}/', [PostsController::class, 'update']);
    Route::delete('/posts/{id}/', [PostsController::class, 'delete']);    

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
