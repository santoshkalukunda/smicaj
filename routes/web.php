<?php

use App\Http\Controllers\LayoutSettingController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TradingSettingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
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



Route::group(['middleware' => ['role:admin|super-admin']], function () {
    Route::get('pages', [PageController::class, 'index'])->name('pages.index');
    Route::get('pages/create', [PageController::class, 'create'])->name('pages.create');
    Route::get('pages/{page}/edit', [PageController::class, 'edit'])->name('pages.edit');
    Route::post('pages/store', [PageController::class, 'store'])->name('pages.store');
    Route::put('pages/{page}', [PageController::class, 'update'])->name('pages.update');
    Route::delete('pages/{page}', [PageController::class, 'destroy'])->name('pages.destroy');


    Route::get('trading-settings', [TradingSettingController::class, 'index'])->name("trading-settings.index");
    Route::post('trading-settings', [TradingSettingController::class, 'store'])->name("trading-settings.store");
    Route::get('trading-settings/create', [TradingSettingController::class, 'create'])->name("trading-settings.create");
    Route::get('trading-settings/edit/{tradingSetting}', [TradingSettingController::class, 'edit'])->name("trading-settings.edit");
    Route::put('trading-settings/{tradingSetting}', [TradingSettingController::class, 'update'])->name("trading-settings.update");
    Route::delete('trading-settings/{tradingSetting}', [TradingSettingController::class, 'destroy'])->name("trading-settings.destroy");

    //stock
    Route::get('stocks', [StockController::class, 'index'])->name("stocks.index");
    Route::get('stocks/create', [StockController::class, 'create'])->name("stocks.create");
    Route::post('stocks', [StockController::class, 'store'])->name("stocks.store");
    Route::get('stocks/search', [StockController::class, 'search'])->name("stocks.search");
    Route::get('charts', [StockController::class, 'chart'])->name("stocks.chart");
    Route::get('stocks/{stock}/edit', [StockController::class, 'edit'])->name("stocks.edit");
    Route::put('stocks/{stock}', [StockController::class, 'update'])->name("stocks.update");
    Route::delete('stocks/{stock}', [StockController::class, 'destroy'])->name("stocks.destroy");

});


Route::group(['middleware' => ['role:admin|super-admin|user']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('trading-settings/{tradingSetting}/show', [TradingSettingController::class, 'show'])->name("trading-settings.show");
});

Route::get('layout-settings',[LayoutSettingController::class, 'index'])->name("layout-settings.index");
Route::get('layout-settings/{tradingLayout}/create',[LayoutSettingController::class, 'create'])->name("layout-settings.create");
Route::get('layout-settings/{tradingLayout}/edit/{layoutSetting}',[LayoutSettingController::class, 'edit'])->name("layout-settings.edit");
Route::get('layout-settings/{tradingLayout}/show/{layoutSetting}',[LayoutSettingController::class, 'show'])->name("layout-settings.show");
Route::put('layout-settings/{layoutSetting}',[LayoutSettingController::class, 'update'])->name("layout-settings.update");
Route::post('layout-settings/{tradingLayout}/store',[LayoutSettingController::class, 'store'])->name("layout-settings.store");

Route::get('pages/{page}', [PageController::class, 'show'])->name('pages.show');

Route::get('stock', function () {
    return view('stock.index');
});


// Route::get('test', function () {

//     // $html = '<a href="https://ghodaghodimun.gov.np/sites/ghodaghodimun.gov.np/files/field/image/Nishulka%20Taalim.jpg\"><img typeof=\"foaf:Image\" src=\"https://ghodaghodimun.gov.np/sites/ghodaghodimun.gov.np/files/field/image/Nishulka%20Taalim.jpg\" width=\"600\" height=\"776\" alt=\"\" /></a>, <a href=\"https://ghodaghodimun.gov.np/sites/ghodaghodimun.gov.np/files/field/image/form%20electrician_0.jpg\"><img typeof=\"foaf:Image\" src=\"https://ghodaghodimun.gov.np/sites/ghodaghodimun.gov.np/files/field/image/form%20electrician_0.jpg\" width=\"549\" height=\"776\" alt=\"\" /></a>"';
    
//        $response = Http::get('https://ghodaghodimun.gov.np/notices-api');
//        $data = $response->json();

//         $data = collect($data)->take(5);
//         $data->transform(function($record) {
//             $images = [];
//             $dom = new DOMDocument();
//             $dom->loadHTML(isset($record['Image']) && $record['Image'] ? $record['Image'] : '<html></html>');
        
//             $elements = $dom->getElementsByTagName('img');
//             foreach($elements as $el)
//             {
//                $images[] = [
//                 'url' => $el->getAttribute('src'),
//                 'height' => $el->getAttribute('height'),
//                 'width' => $el->getAttribute('width'),
//                ];
//             }
        

//             return [
//                 'title' => $record['Title'],
//                 'images' => $images
//             ];
//         });

//     return response()->json($data, 200);

// });

// Route::fallback(function (){
//     // https://nepsealpha.com
//     $requestedUrl = request()->fullUrl();
    
//     // $url = \Illuminate\Support\Str::replace('http://localhost:8000/data', 'https://nepsealpha.com/trading/1', $requestedUrl);
//     $url = \Illuminate\Support\Str::replace('http://localhost:8000/data', '', $requestedUrl);
//     // $url = 'https://chukul.com/api/data/resistance/weekly/?symbol=NEPSE';
//     // $parameters = http_build_query(request()->query());
//     // $response =  Http::get('https://chukul.com/api/data/resistance/weekly?' . $parameters)->throw();
//     // return $url;
//     $headers = [
//         'X-RapidAPI-Key' => '79ed8c18c6msh2579512b15be1c2p19c4d7jsnb3325ddf0951',
//         'X-RapidAPI-Host' => 'trading-view.p.rapidapi.com'
//     ];

//     $response =  Http::withHeaders($headers)->get($url)->throw();
//     return $response->json();
// });