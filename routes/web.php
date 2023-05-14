<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ImageUploadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::controller(SiteController::class)->group(function (){
    Route::get('/', 'home')->name('home');
    Route::get('/criminals', 'viewCriminals');
    Route::get('/criminals/create', 'createCriminal');
    Route::post('/criminals/store', 'storeCriminal');
    Route::get('/terms', 'viewTerms');
});


Route::controller(UserController::class)->middleware('guest')->group(function(){
    Route::get('/login', 'login')->name('login');
    Route::post('/users/authenticate', 'authenticate');
    Route::get('/signup', 'create');
    Route::post('/users/store', 'store');
});

Route::controller(UserController::class)->middleware('auth')->group(function(){
    Route::get('/dashboard', 'viewDashboard');
    Route::post('/logout', 'logout');
});



Route::controller(ArticleController::class)->middleware('auth')->group(function(){
    Route::get('/dashboard/articles', 'adminIndex');
    Route::get('/dashboard/articles/create', 'create');
    Route::post('/dashboard/articles/store', 'store');
    Route::get('/dashboard/articles/{article}/edit', 'edit');
    Route::post('/dashboard/articles/{article}/update', 'update');
    Route::get('/dashboard/articles/{article}/images/upload', 'selectImage');
    Route::post('/dashboard/articles/{article}/images/upload', 'uploadImage');
    Route::get('/dashboard/articles/{article}/images/crop', 'cropImage');
    Route::post('/dashboard/articles/{article}/images/render', 'renderImage');
    Route::post('/dashboard/articles/upload-article-images', 'uploadArticleImages')->name('upload.article.images');
});

Route::controller(ArticleController::class)->group(function(){
    Route::get('/articles', 'index');
    Route::get('/articles/{article}', 'show');
});




Route::resource('posts', PostController::class);
Route::post('/dashboard/articles/{article}/upload-article-images', [ImageUploadController::class, 'storeImage'])->name('image.upload');

