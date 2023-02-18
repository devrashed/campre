<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HomeController; 
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\Frontend\DisplayController;
use Illuminate\Support\Facades\Artisan;

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

/*======== CacheClear ======*/

Route::get('/cacheClear', function() {
    Artisan::call('cache:clear');
    return "Cache Cleared Successfully";
});

 


Auth::routes();

Route::group(['middleware' => ['auth']], function() {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/addcat',[ProductController::class, 'addnewcate'])->name('addcat');

    Route::POST('/catecreate', [ProductController::class, 'Catstore']);

    Route::get('/viewcat', [ProductController::class, 'viewcat'])->name('viewcat');

    Route::get('/delcat/{id}', [ProductController::class, 'delcat']);

    Route::get('/editcat/{id}',[ProductController::class, 'catedit']);

    Route::POST('/udpatcate/{id}',[ProductController::class, 'cateupdate']);

    Route::get('/addproduct',[ProductController::class, 'storeproduct']);  

    Route::get('/proedit/{id}', [ProductController::class, 'proedit']); 

    Route::POST('/procreate', [ProductController::class, 'procreate']);

    Route::POST('/Productupdate/{id}', [ProductController::class, 'Productupdate']);

    Route::get('/viewproduct',[ProductController::class, 'viewproduct']);  

    Route::get('/delpro/{id}', [ProductController::class, 'delpro']);

    Route::get('/storevariant', [ProductController::class, 'storevariant']);

    Route::POST('/createvariant',[ProductController::class, 'createvariant']);

    Route::get('/viewvariant', [ProductController::class, 'viewVariant']);

    Route::get('/delvariant/{id}', [ProductController::class, 'delvariant']);

    Route::get('/editvariant/{id}', [ProductController::class, 'editVariant']); 

    Route::POST('/varintupdate/{id}',[ProductController::class, 'varintupdate']);
});

/*Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/addcat',[HomeController::class, 'addnewcate'])->name('addcat');*/



/* ============================== Frontend =================================*/

Route::get('/', [DisplayController::class, 'homeproduct']); 

Route::get('/single-product/{id}/{slug}', [DisplayController::class, 'singlepro']);

Route::get('/product-category', [DisplayController::class, 'detailsproduct']); 



Route::get('/mycart', function () {
    return view('frontend.mycart');
});