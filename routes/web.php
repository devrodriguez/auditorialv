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

// Rutas para autenticacion
Auth::routes();

// Definicion de grupo de rutas. Se agrupan para aplicar middleware de autenticacion
// Puedo aplicar un middleware por ruta (Route::get('/ruta', 'Controller')->middleware('nombreMiddleware'))
Route::group(['middleware' => 'auth'], function(){
	Route::get('/home', 'HomeController@index');

	// Empresa
	Route::name('index_enterprise')->get('/enterprise', 'EnterpriseController@index');
	Route::name('create_enterprise')->get('/enterprise/create', 'EnterpriseController@create');
	Route::name('store_enterprise')->post('/enterprise', 'EnterpriseController@store');
	Route::name('find_enterprise')->get('/enterprise/find', 'EnterpriseController@find');
	Route::name('show_enterprise')->get('/enterprise/{enterprise}', 'EnterpriseController@show');
	Route::name('edit_enterprise')->get('/enterprise/{enterprise}/edit', 'EnterpriseController@edit');
	Route::name('update_enterprise')->put('/enterprise/{enterprise}', 'EnterpriseController@update');
	Route::name('delete_enterprise')->delete('/enterprise/{enterprise}/delete', 'EnterpriseController@delete');

	//Auditoria
	Route::name('index_audit')->get('/audit/{enterprise}', 'AuditController@index');
	Route::name('audit_checklist')->post('/audit/{enterprise}', 'AuditController@valid');

	// Criteria
	/*Route::name('index_criteria')->get('/show', 'CriteriaController@index');
	Route::name('create_criteria')->post('/criteria/create', 'CriteriaController@create');
	Route::name('store_criteria')->post('/criteria/store', 'CriteriaController@store');
	Route::name('delete_criteria')->delete('/criteria/{criteria}/delete', 'CriteriaController@destroy');
	Route::name('edit_criteria')->get('/criteria/{item}/edit', 'CriteriaController@edit');*/

	Route::resource('criteria', 'CriteriaController');

	//Auditor
	Route::name('auditor_path')->get('auditor', 'AuditorController@index');
	Route::name('store_auditor_path')->post('auditor/store', 'AuditorController@store');
	Route::name('delete_auditor')->delete('auditor/{auditor}/delete', 'AuditorController@destroy');
});

// Rutas que no necesitan login para ser accedidas
Route::get('/', 'HomeController@index');
Route::get('/vuetest', 'HomeController@vuetest');