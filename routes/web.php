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
    /*RUTAS DE MENU*/
    Route::get('menu', 'MenuController@index')->name('menu');
    Route::get('menu/criar', 'MenuController@criar')->name('criar_menu');
    Route::post('menu', 'MenuController@salvar')->name('salvar_menu');
    Route::post('menu/salvar-ordem', 'MenuController@salvarOrdem')->name('salvar_ordem');
    /*RUTAS DE ROLE*/
    Route::get('role', 'RoleController@index')->name('role');
    Route::get('role/criar', 'RoleController@criar')->name('criar_role');
    Route::post('role', 'RoleController@salvar')->name('salvar_role');
    Route::get('role/{id}/editar', 'RoleController@editar')->name('editar_role');
    Route::put('role/{id}', 'RoleController@atualizar')->name('atualizar_role');
    Route::delete('role/{id}', 'RoleController@excluir')->name('excluir_role');
});
