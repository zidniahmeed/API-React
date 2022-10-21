<?php

use App\Http\Controllers\NewsController;
use Illuminate\Http\Request;
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

Route::get('/getdata',[NewsController::class, 'getdata']);
Route::post('/addnews',[NewsController::class, 'adddata']);
Route::delete('/deletenews',[NewsController::class, 'deletenews']);
Route::PUT('/updatenews',[NewsController::class, 'updatenews']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
