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


Route::resource('rdv', 'RdvController');
Route::get('rdv/{id}', 'RdvController@show');

Route::get('rdv/storeResultat', 'RdvController@storeResultat');
Route::get('/home', 'HomeController@index')->name('home');

//calendar
Route::resource('/calendrier', 'CalendrierController');
Route::post('calendrier_ajax_update', ['uses' => 'CalendrierController@ajaxUpdate', 'as' => 'calendrier.ajax_update']);

//génération
Route::resource('/generation', 'GenerationController');

//Search
Route::get('/search', 'SearchController@index');
Route::post('/search/action', 'SearchController@action')->name('search.action');

Route::resource('type', 'TypeController');

Route::get('/api/patient', function(\Illuminate\Http\Request $r){
	$recherche = $r->validate([
		'q' => 'required'
	]);
	$query = $r->input('q');
    return new \App\Http\Resources\PatientCollection(\App\Patient::search($query)->get());
})->name('recherchePatient');

Route::resource('semaine', 'SemaineController');