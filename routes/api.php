<?php

use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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

Route::get('/stock/{stock}', function (Stock $stock) {
    return $stock;
});

Route::get('binance', function (Request $request) {
    return Http::get('http://api.binance.com/api/v3/klines', [
        'symbol' => $request->symbol ?? 'BTCUSDT',
        'interval' => $request->interval ?? '1s',
        'limit' => $request->limit ?? 1000,
    ])->json();
});
