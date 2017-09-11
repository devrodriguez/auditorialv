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
	Route::name('entps_path')->get('/enterprise', 'EnterpriseController@index');
	Route::name('create_entp_path')->get('/enterprise/create', 'EnterpriseController@create');
	Route::name('store_entp_path')->post('/enterprise', 'EnterpriseController@store');
	Route::name('find_entp_path')->get('/enterprise/find', 'EnterpriseController@find');
	Route::name('entp_path')->get('/enterprise/{enterprise}', 'EnterpriseController@show');
	Route::name('edit_entp_path')->get('/enterprise/{enterprise}/edit', 'EnterpriseController@edit');
	Route::name('update_entp_path')->put('/enterprise/{enterprise}', 'EnterpriseController@update');
	Route::name('delete_entp_path')->delete('/enterprise/{enterprise}', 'EnterpriseController@delete');

	//Auditoria
	Route::name('audit_path')->get('/audit/{enterprise}', 'AuditController@index');

	//Item auditoria
	Route::name('item_path')->get('/item', 'ItemAuditController@index');
	Route::name('store_item_path')->post('/item/create', 'ItemAuditController@store');
	Route::name('delete_item_path')->delete('/item/{itemAudit}', 'ItemAuditController@delete');
	Route::name('edit_item_path')->get('/item/{item}/edit', 'ItemAuditController@edit');

	//Auditor
	Route::name('auditor_path')->get('auditor', 'AuditorController@index');
	Route::name('store_auditor_path')->post('auditor/store', 'AuditorController@store');
	Route::name('delete_auditor_path')->delete('auditor/{auditor}/delete', 'AuditorController@destroy');
});

// Rutas que no necesitan login para ser accedidas
Route::get('/', 'HomeController@index');
Route::get('/vuetest', 'HomeController@vuetest');
