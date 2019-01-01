<?php

use Illuminate\Http\Request;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'PassportController@login');
Route::post('register', 'PassportController@register');
 
Route::middleware('auth:api')->group(function () {
    Route::get('user', 'PassportController@details');

    Route::get('users', function(){
        return User::all();
    });

    //Cliente
    Route::get('clientes','ClienteController@index');
    Route::get('clientes/{id}','ClienteController@show');
    Route::post('clientes','ClienteController@store');

    //Venda
    Route::get('vendas','VendaController@index');
    Route::get('vendas/{id}','VendaController@show');
    Route::post('vendas','VendaController@store');
    
    //Rotas somente para Admin
    Route::group(['middleware' => 'auth.admin'],function () {
        
        //Produtos
        Route::get('produtos','ProdutoController@index');
        Route::get('produtos/{id}','ProdutoController@show');
        Route::post('produtos','ProdutoController@store');
        Route::put('produtos','ProdutoController@update');
        Route::delete('produtos/{id}','ProdutoController@destroy');
        
        //Venda
        Route::put('vendas','VendaController@update');
        Route::delete('vendas/{id}','VendaController@destroy');
        
        //Cliente
        Route::put('clientes/{id}','ClienteController@update');
        Route::delete('clientes/{id}','ClienteController@destroy');
    });

});


