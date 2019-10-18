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

Route::get('users', 'users@getInfos');
Route::post('users', 'users@postInfos');
Auth::routes();

Route::get('patient', 'PatientController@getForm');
Route::post('patient', ['uses' => 'PatientController@postForm', 'as' => 'patientEnregistre']);

/*
Route::get('ajoutRdv', 'RdvController@getForm');
Route::post('ajoutRdv', ['uses' => 'RdvController@postForm', 'as' => 'rdvEnregistre']);
*/
Route::resource('rdv', 'RdvController');
Route::get('/home', 'HomeController@index')->name('home');

//calendar
Route::resource('/calendrier', 'CalendrierController');
Route::post('calendrier_ajax_update', ['uses' => 'CalendrierController@ajaxUpdate', 'as' => 'calendrier.ajax_update']);

Route::get('/test', function(){
	$user = \App\User::first();
	return $user->rdvs->first();
}
);