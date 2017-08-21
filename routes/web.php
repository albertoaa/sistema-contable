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

Route::post('login', [
  'uses' => 'WelcomeController@login',
  'as' => 'login'
]);

Route::get('listado_comprobantes/{user_ruc}:',  [
  'uses' => 'ComprobantesController@listado_comprobantes',
  'as' => 'listado_comprobantes'
]);

Route::get('obtener_xml/{id_comprobante}', [
   'uses' => 'ComprobantesController@obtener_xml',
   'as' => 'obtener_xml'
]);

Route::get('obtener_pdf/{id_comprobante}', [
    'uses' => 'ComprobantesController@obtener_pdf',
    'as' => 'obtener_pdf'
]);