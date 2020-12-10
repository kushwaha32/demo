<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavchildController;
use App\Http\Controllers\ContentController;
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


Route::get('/', [App\Http\Controllers\FrontWebController::class, 'index'])->name('userhome');
Auth::routes();
Route::match(['get', 'post'], 'register', function(){
return redirect('/');
});
// admin routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth', 'prefix' => 'home'], function(){
    Route::resource('navchild', NavchildController::class);
    Route::resource('content', ContentController::class);
    Route::PUT('/content/status/{content}', [App\Http\Controllers\ContentController::class, 'statusupdate'])->name('content.statusupdate');
    Route::PUT('/content/trending/{content}', [App\Http\Controllers\ContentController::class, 'trendingupdate'])->name('content.trendingupdate');
    Route::PUT('/content/img_gallery/{content}', [App\Http\Controllers\ContentController::class, 'imggalleryupdate'])->name('content.imggalleryupdate');
    Route::PUT('/content/img_gallery_main_id/{content}', [App\Http\Controllers\ContentController::class, 'imggallerymainupdate'])->name('content.imggallerymainupdate');
    Route::post('/content/search', [App\Http\Controllers\ContentController::class, 'searchContent'])->name('content.search');
    Route::get('/trendingcontent', [App\Http\Controllers\ContentController::class, 'trendingcontent'])->name('trendingcontent');
    Route::get('/home/content/edit/navchild/{id}', [App\Http\Controllers\ContentController::class, 'ajaxnavchild'])->name('ajaxnavchild');
    Route::post('/home/content/contentdiscription', [App\Http\Controllers\ContentController::class, 'storeContentDiscription'])->name('storeContentDiscription');
});
// user routes
Route::get('/news', [App\Http\Controllers\NewsController::class, 'index'])->name('news');
Route::get('/healthandwelness', [App\Http\Controllers\HealthandwelnessController::class, 'index'])->name('health');
Route::get('/fashion', [App\Http\Controllers\FashionController::class, 'index'])->name('fashion');
Route::get('/tech', [App\Http\Controllers\TechController::class, 'index'])->name('tech');
Route::get('/business', [App\Http\Controllers\BusinessController::class, 'index'])->name('business');
Route::get('/blogShow/{content}', [App\Http\Controllers\FrontWebController::class, 'showBlog'])->name('showBlog');



