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

Route::get('/', 'InicioController@index')->name('inicio');
Route::get('seguranca/login', 'Seguranca\LoginController@index')->name('login');
Route::post('seguranca/login', 'Seguranca\LoginController@login')->name('login_post');
Route::get('seguranca/logout', 'Seguranca\LoginController@logout')->name('logout');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth','superadmin']], function(){
    Route::get('', 'AdminController@index');
    /*ROTAS DE PERMISSÃO*/
    Route::get('permissao', 'PermissaoController@index')->name('permissao');
    Route::get('permissao/criar', 'PermissaoController@criar')->name('criar_permissao');
    Route::post('permissao', 'PermissaoController@salvar')->name('salvar_permissao');
    Route::get('permissao/{id}/editar', 'PermissaoController@editar')->name('editar_permissao');
    Route::put('permissao/{id}', 'PermissaoController@atualizar')->name('atualizar_permissao');
    Route::delete('permissao/{id}', 'PermissaoController@excluir')->name('excluir_permissao');
    /*ROTAS DE MENU*/
    Route::get('menu', 'MenuController@index')->name('menu');
    Route::get('menu/criar', 'MenuController@criar')->name('criar_menu');
    Route::post('menu', 'MenuController@salvar')->name('salvar_menu');
    Route::get('menu/{id}/editar', 'MenuController@editar')->name('editar_menu');
    Route::put('menu/{id}', 'MenuController@atualizar')->name('atualizar_menu');
    Route::get('menu/{id}/excluir', 'MenuController@excluir')->name('excluir_menu');
    Route::post('menu/salvar-ordem', 'MenuController@salvarOrdem')->name('salvar_ordem');
    /*ROTAS DE ROLE*/
    Route::get('role', 'RoleController@index')->name('role');
    Route::get('role/criar', 'RoleController@criar')->name('criar_role');
    Route::post('role', 'RoleController@salvar')->name('salvar_role');
    Route::get('role/{id}/editar', 'RoleController@editar')->name('editar_role');
    Route::put('role/{id}', 'RoleController@atualizar')->name('atualizar_role');
    Route::delete('role/{id}', 'RoleController@excluir')->name('excluir_role');
    /*ROTAS DE MENU ROLE*/
    Route::get('menu-role', 'MenuRoleController@index')->name('menu_role');
    Route::post('menu-role', 'MenuRoleController@salvar')->name('salvar_menu_role');
    /*ROTAS PERMISSAO_ROLE*/
    Route::get('permissao-role', 'PermissaoRoleController@index')->name('permissao_role');
    Route::post('permissao-role', 'PermissaoRoleController@salvar')->name('salvar_permissao_role');
});
Route::get('livro', 'LivroController@index')->name('livro');
Route::get('livro/criar', 'LivroController@criar')->name('criar_livro');
Route::post('livro', 'LivroController@salvar')->name('salvar_livro');
Route::get('livro/{id}/editar', 'LivroController@editar')->name('editar_livro');
Route::put('livro/{id}', 'LivroController@atualizar')->name('atualizar_livro');
Route::delete('livro/{id}', 'LivroController@excluir')->name('excluir_livro');
