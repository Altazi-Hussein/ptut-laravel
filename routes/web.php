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

Route::get('/', 'Controller@index');
Route::get('/welcome', 'Controller@index');

Route::get('users', 'users@getInfos');
Route::post('users', 'users@postInfos');
Auth::routes();

Route::get('patient', 'PatientController@getForm');
Route::post('patient', ['uses' => 'PatientController@postForm', 'as' => 'patientEnregistre']);

/*
Route::get('ajoutRdv', 'RdvController@getForm');
Route::post('ajoutRdv', ['uses' => 'RdvController@postForm', 'as' => 'rdvEnregistre']);
*/


Route::get('rdv/createSelection', 'RdvController@createSelection');
Route::get('rdv/createCreation', 'RdvController@createCreation');
Route::resource('rdv', 'RdvController');
Route::post('rdv/storeSelection', 'RdvController@storeSelection');
Route::post('rdv/storeCreation', 'RdvController@storeCreation');

Route::get('rdv/storeResultat', 'RdvController@storeResultat');
Route::get('/home', 'HomeController@index')->name('home');

//calendar
Route::resource('/calendrier', 'CalendrierController');
Route::post('calendrier_ajax_update', ['uses' => 'CalendrierController@ajaxUpdate', 'as' => 'calendrier.ajax_update']);

Route::get('/test', function(){
	$patient = \App\Rdv::search('Cummings')->get();
	return $patient;
}
);