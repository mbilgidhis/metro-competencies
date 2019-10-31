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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'DisplayController@index')->name('index');
// Route::get('/list', 'DisplayController@index')->name('list');
Route::get('/display/{id}', 'DisplayController@show')->where('id', '[0-9]+')->name('display.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {
	Route::group(['prefix' => 'employee'], function(){
		Route::get('/', 'EmployeeController@index')->name('employee.index');
		Route::get('/add', 'EmployeeController@add')->name('employee.add');
		Route::post('/add', 'EmployeeController@save')->name('employee.save');
		Route::get('/edit/{id}', 'EmployeeController@edit')->where('id', '[0-9]+')->name('employee.edit');
		Route::post('/update', 'EmployeeController@update')->name('employee.update');

	});

	Route::group(['prefix' => 'competency'], function(){
		Route::get('/', 'CompetencyController@index')->name('competency.index');
		Route::get('/add', 'CompetencyController@add')->name('competency.add');
		Route::post('/add', 'CompetencyController@save')->name('competency.save');
		Route::get('/edit/{id}', 'CompetencyController@edit')->where('id', '[0-9]+')->name('competency.edit');
		Route::post('/update', 'CompetencyController@update')->name('competency.update');
		Route::delete('/delete', 'CompetencyController@delete')->name('competency.delete');
		Route::group(['prefix' => 'detail'], function() {
		    Route::get('/', 'DetailController@index')->name('detail.index');
		    Route::get('/add', 'DetailController@add')->name('detail.add');
		    Route::post('/add', 'DetailController@save')->name('detail.save');
		    Route::get('/edit/{id}', 'DetailController@edit')->where('id', '[0-9]+')->name('detail.edit');
		    Route::post('/update', 'DetailController@update')->name('detail.update');
		    Route::delete('/delete', 'DetailController@delete')->name('detail.delete');
		});
	});
});
