<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;

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
    Route::get('/login', 'login');
    Route::post('/users/authenticate', 'authenticate');
    Route::get('/signup', 'create');
    Route::post('/users/store', 'store');
});

Route::controller(UserController::class)->middleware('auth')->group(function(){

});
