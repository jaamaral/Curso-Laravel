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

Route::get('/', 'InicioController@index');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
    Route::get('permissao', 'PermissaoController@index')->name('permissao');
    Route::get('permissao/criar', 'PermissaoController@criar')->name('criar_permissao');
    Route::get('menu', 'MenuController@index')->name('menu');
    Route::get('menu/criar', 'MenuController@criar')->name('criar_menu');
    Route::post('menu', 'MenuController@salvar')->name('salvar_menu');
});
