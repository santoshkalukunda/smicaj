<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['role:admin|super-admin|user']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::group(['middleware' => ['role:admin|super-admin']], function () {
   
});

Route::group(['middleware' => ['role:super-admin']], function () {
    Route::get('pages', [PageController::class,'index'])->name('pages.index');
    Route::get('pages/create', [PageController::class,'create'])->name('pages.create');
    Route::get('pages/{page}/edit', [PageController::class,'edit'])->name('pages.edit');
    Route::post('pages/store', [PageController::class,'store'])->name('pages.store');
    Route::put('pages/{page}', [PageController::class,'update'])->name('pages.update');
    Route::delete('pages/{page}', [PageController::class,'destroy'])->name('pages.destroy');
});
Route::get('pages/{page}', [PageController::class,'show'])->name('pages.show');