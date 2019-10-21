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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@search')->name('home.search');
Route::get('/event/{id_event}', 'HomeController@event')->name('event');
Route::get('/getTicket/{id_event}', 'HomeController@getTicket')->name('getTicket');
Route::prefix('/organizers')->group(function(){
    Route::get('/','OrganizersController@index')->name('organizers.index');
    Route::prefix('/create')->group(function(){
        Route::get('/one', 'OrganizersController@createStepOne')->name('organizers.create.one');
        Route::post('/storeOne', 'OrganizersController@storeOne')->name('organizers.store.one');
        Route::get('/two/{id_event}', 'OrganizersController@createStepTwo')->name('organizers.create.two');
        Route::post('/storeTwo', 'OrganizersController@storeTwo')->name('organizers.store.two');
        Route::get('/three/{id_event}', 'OrganizersController@createStepThree')->name('organizers.create.three');
        Route::post('/storeThree', 'OrganizersController@storeThree')->name('organizers.store.three');
    });
    Route::get('/dashboard','OrganizersController@dashboard')->name('organizers.dashboard');
});
Route::resource('organizers', 'OrganizersController');
Route::get('/my-ticket','HomeController@myTicket')->name('myTicket');
