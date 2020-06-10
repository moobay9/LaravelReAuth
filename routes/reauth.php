<?php

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

Route::group(['prefix' => 're-auth', 'middleware' => 'web'], function(){
    Route::get('/', '\Funaffect\LaravelReAuth\Http\Controllers\ReAuthController@index')->name('reauth.index');
    
    Route::get('/fallback', function(){
        // return redirect(config('reauth.fallback'));
        redirect('/');
    })->name('reauth.fallback');
});


