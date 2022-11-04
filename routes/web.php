<?php

use App\Http\Controllers\admin\ArticleController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\HomeController;
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

Route::group(["prefix" => "admin"],function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //CATERORIES ARTICLE
    Route::get('/categorie',[CategoryController::class,'index']);
    Route::get('/categorie/create',[CategoryController::class,'create']);
    Route::post('/categorie/store',[CategoryController::class,'store']);
    Route::get('/categorie/edit/{id}',[CategoryController::class,'edit']);
    Route::post('/categorie/update/{id}',[CategoryController::class,'update']);
    Route::get('/categorie/{id}',[CategoryController::class,'destroy']);

    //CATERORIES ARTICLE
    Route::get('/article',[ArticleController::class,'index']);
    Route::get('/article/create',[ArticleController::class,'create']);
    Route::post('/article/store',[ArticleController::class,'store']);
    Route::get('/article/edit/{id}',[ArticleController::class,'edit']);
    Route::post('/article/update/{id}',[ArticleController::class,'update']);
    Route::get('/article/{id}',[ArticleController::class,'destroy']);
});
