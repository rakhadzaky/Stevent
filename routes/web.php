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


Route::middleware('isUser')->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/home', 'HomeController@search')->name('home.search');
    Route::get('/searchJS/{value}','HomeController@searchJS')->name('searchJS');
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
        Route::get('/tickets/{id_event}', 'OrganizersController@ticketList')->name('organizers.ticket');
        Route::get('/dashboard/{id_event}','OrganizersController@dashboard')->name('organizers.dashboard');
        Route::get('/settings/{id_event}','OrganizersController@settings')->name('organizers.settings');
        Route::get('/delete/{id_event}','OrganizersController@destroy')->name('organizers.delete');
        Route::prefix('/update')->group(function(){
            Route::post('/title','OrganizersController@UpdateTitle')->name('organizers.update.title');
            Route::post('/location','OrganizersController@UpdateLocation')->name('organizers.update.location');
            Route::post('/price','OrganizersController@UpdatePrice')->name('organizers.update.price');
            Route::post('/desc','OrganizersController@UpdateDesc')->name('organizers.update.desc');
        });
    });
    Route::resource('organizers', 'OrganizersController');
    Route::get('/my-ticket','HomeController@myTicket')->name('myTicket');
});
Route::middleware('isAdmin')->group(function(){
    Route::prefix('/admin')->group(function(){
        Route::get('/home', 'AdminController@index')->name('admin.index');
    });
});
