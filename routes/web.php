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

Route::get('/', 'Frontend\TicketController@index');
Route::post('/searchbus', 'Frontend\TicketController@searchbus');
Route::get('/viewseat/{bus_id}', 'Frontend\TicketController@viewseat');




Route::group(['prefix'=>'admin'],function(){
	Auth::routes();
	Route::get('/', 'HomeController@index')->name('home');
	Route::resource('location', 'Admin\LocationController');
	Route::resource('bus', 'Admin\BusController');
	Route::resource('schedule', 'Admin\ScheduleController');
	Route::resource('seat', 'Admin\SeatController');
});
