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
    return redirect(Route('cadastro.pessoa.all'));
});

Route::group(["pref" => "cadastro", "as" => "cadastro."], function(){
    Route::get('/pessoa/list', 'PessoaController@index')->name('pessoa.all');
    Route::get('/pessoa/create', 'PessoaController@create')->name('pessoa.create');
    Route::post('/pessoa/store', 'PessoaController@store')->name('pessoa.store');
    Route::get('/pessoa/{id}/edit', 'PessoaController@edit')->name('pessoa.edit');
    Route::post('pessoa/{id}/update', 'PessoaController@update')->name('pessoa.update');
    Route::get('/pessoa/{id}/delete', 'PessoaController@delete')->name('pessoa.delete');
});


