<?php

use Illuminate\Support\Facades\Route;

#### Set Pagination For All Site ####
define('PAGINATION_COUNT',10);

Route::group(['namespace'=>'Admin','middleware'=>'auth:admin'],function () {
    Route::get('/', 'DashboardController@index');
});

############ Start After Login Routes ############
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'auth:admin'],function () {

    Route::get('/', 'DashboardController@index')->name('admin.dashboard');

    ############ Start Admins Routes ############
    Route::group(['middleware'=>'checkPermission'],function (){
        Route::get('/allAdmins', 'AdminsController@index')->name('admin.showAdmins');
        Route::get('/createNewAdmin', 'AdminsController@create')->name('admin.createNewAdmin');
        Route::post('/createNewAdmin', 'AdminsController@store')->name('admin.storeNewAdmin');
        Route::get('/editAdmin/{id}', 'AdminsController@edit')->name('admin.editAdmin');
        Route::post('/updateAdmin/{id}', 'AdminsController@update')->name('admin.updateAdmin');
        Route::get('/deleteAdmin/{id}', 'AdminsController@destroy')->name('admin.deleteAdmin');
    });
    ############ End Admins Routes ##############

    ############ Start Address Routes ############
    Route::group(['prefix'=>'address'],function (){

        Route::get('/{id?}', 'AddressController@index')->name('address.All');
        Route::get('/districts/{id?}', 'AddressController@indexDistrict')->name('address.AllDistrict');

        Route::get('/create/state', 'StateController@create')->name('address.newState');
        Route::post('/create/state', 'StateController@store')->name('address.storeNewState');
        Route::get('/edit/state/{id}', 'StateController@edit')->name('address.editState');
        Route::post('/edit/state/{id}', 'StateController@update')->name('address.updateState');
        Route::get('/delete/state/{id}', 'StateController@destroy')->name('address.deleteState');

        Route::get('/create/city', 'CityController@create')->name('address.newCity');
        Route::post('/create/city', 'CityController@store')->name('address.storeNewCity');
        Route::get('/edit/city/{id}', 'CityController@edit')->name('address.editCity');
        Route::post('/edit/city/{id}', 'CityController@update')->name('address.updateCity');
        Route::get('/delete/city/{id}', 'CityController@destroy')->name('address.deleteCity');

        Route::get('/create/district', 'DistrictController@create')->name('address.newDistrict');
        Route::post('/create/district', 'DistrictController@store')->name('address.storeNewDistrict');
        Route::get('/edit/district/{id}', 'DistrictController@edit')->name('address.editDistrict');
        Route::post('/edit/district/{id}', 'DistrictController@update')->name('address.updateDistrict');
        Route::get('/delete/district/{id}', 'DistrictController@destroy')->name('address.deleteDistrict');
    });
    ############ End Address Routes ##############

    ############ Start Agent Routes ##############
    Route::group(['prefix'=>'agent'],function (){
        Route::get('/', 'AgentsController@index')->name('agent.All');
        Route::get('/create', 'AgentsController@create')->name('agent.new');
        Route::post('/create', 'AgentsController@store')->name('agent.store');
        Route::get('/edit/{id}', 'AgentsController@edit')->name('agent.edit');
        Route::post('/edit/{id}', 'AgentsController@update')->name('agent.update');
        Route::get('/delete/{id}', 'AgentsController@destroy')->name('agent.delete');
    });
    ############ End Agent Routes ################

    ############ Start Client Routes ##############
    Route::group(['prefix'=>'client'],function (){
        Route::get('/', 'ClientsController@index')->name('client.All');
        Route::get('/create', 'ClientsController@create')->name('client.new');
        Route::post('/create', 'ClientsController@store')->name('client.store');
        Route::get('/edit/{id}', 'ClientsController@edit')->name('client.edit');
        Route::post('/edit/{id}', 'ClientsController@update')->name('client.update');
        Route::get('/delete/{id}', 'ClientsController@destroy')->name('client.delete');
    });
    ############ End Client Routes ################

    ############ Start Orders Routes ############
    Route::group(['prefix'=>'order'],function (){
        Route::get('/', 'OrdersController@index')->name('order.All');
        Route::get('/create', 'OrdersController@create')->name('order.new');
        Route::post('/create', 'OrdersController@store')->name('order.store');
        Route::get('/edit/{id}', 'OrdersController@edit')->name('order.edit');
        Route::post('/edit/{id}', 'OrdersController@update')->name('order.update');
        Route::get('/delete/{id}', 'OrdersController@destroy')->name('order.delete');
    });
    ############ End Orders Routes #############

    ############ Start Deliver Orders Routes ############
    Route::group(['prefix'=>'deliver'],function (){
        Route::get('/all/{type?}', 'DeliverController@all')->name('deliver.All');
        Route::get('/create/{id}', 'DeliverController@create')->name('deliver.new');
        Route::post('/create', 'DeliverController@store')->name('deliver.store');
        Route::get('/show', 'DeliverController@show')->name('deliver.show');
        Route::get('/done/{id}', 'DeliverController@done')->name('deliver.done');
    });
    ############ End Deliver Orders Routes #############

    ############ Start Payments Routes ############
    Route::group(['prefix'=>'payment'],function (){
        Route::get('/', 'PaymentController@index')->name('payment.index');
        Route::get('/all', 'PaymentController@all')->name('payment.all');
        Route::get('/create/{id}', 'PaymentController@create')->name('payment.new');
        Route::post('/create', 'PaymentController@store')->name('payment.store');
    });
    ############ End Payments Routes #############

});
############ End After Login Routes ############


############ Start Before Login Routes ############
    Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'guest:admin'],function (){
        Route::get('login','LoginController@getlogin')->name('admin.getlogin');
        Route::post('login','LoginController@login')->name('admin.login');
    });
############ End Before Login Routes ############

Route::post('logout', 'Auth\LoginController@logout')->name('logout');
