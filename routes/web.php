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


Route::resources([
	'rdv' => 'RdvController',
	'type' => 'TypeController',
	'semaine' => 'SemaineController',
	'generation' => 'GenerationController',
]);

Route::resource('generation', 'GenerationController@index');
Route::get('rdv/storeResultat', 'RdvController@storeResultat');
Route::get('/home', 'HomeController@index')->name('home');

//calendar
Route::get('calendrier/{id?}', 'CalendrierController@index')->where('id', '[0-9]+');
Route::post('calendrier_ajax_update', ['uses' => 'CalendrierController@ajaxUpdate', 'as' => 'calendrier.ajax_update']);


//Search
Route::get('/search', 'SearchController@index');
Route::post('/search/action', 'SearchController@action')->name('search.action');


Route::get('/api/patient', function(\Illuminate\Http\Request $r){
	$recherche = $r->validate([
		'q' => 'required'
	]);
	$query = $r->input('q');
    return new \App\Http\Resources\PatientCollection(\App\Patient::search($query)->get());
})->name('recherchePatient');