<?php

use App\Http\Controllers\FetchCurrenciesController;
use App\Http\Controllers\ToJsonController;
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

Route::get('fetch', FetchCurrenciesController::class);
Route::get('json', ToJsonController::class);
