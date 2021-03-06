<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return 'login';
})->name('login');

Route::any('products/search', 'ProductController@search')->name('products.search');
Route::resource('products', 'ProductController'); //->middleware('auth');
/*
Route::delete('products/{id}', 'ProductController@destroy')->name('products.destroy');
Route::put('products/{id}', 'ProductController@update')->name('products.update');
Route::get('products/{id}/edit', 'ProductController@edit')->name('products.edit');
Route::get('products/create', 'ProductController@create')->name('products.create');
Route::get('products', 'ProductController@index')->name('products.index');
Route::get('products/{id}', 'ProductController@show')->name('products.show');
Route::post('products', 'ProductController@store')->name('products.store');
/*

/*
Route::middleware([])->group( function () {
    Route::prefix('/admin')->group( function() {
        Route::name('admin.')->group( function () {
        Route::get('/dashboard', 'TesteController@teste')->name('dashboard');

        Route::get('/financeiro', 'TesteController@teste')->name('financeiro');

        Route::get('/produtos', 'TesteController@teste')->name('produtos');

        Route::get('/', 'TesteController@teste')->name('home');
        });
    });
});*/

# ou

Route::group([
    'middleware' => ['auth'],
    'prefix' => 'admin',
    'name' => 'admin',
], function () {
        Route::get('/dashboard', 'TesteController@teste')->name('dashboard');

        Route::get('/financeiro', 'TesteController@teste')->name('financeiro');

        Route::get('/produtos', 'TesteController@teste')->name('produtos');

        Route::get('/', 'TesteController@teste')->name('home');
});


Route::redirect('redirect1', 'redirect2');
#Route::get('redirect1', function () {
#    return redirect('/redirect2');
#});
Route::get('redirect2', function () {
    return 'redirect2';
});
Route::get('/produtos/{idProduto?}', function ($idProduto = '') {
    return "Produto(s) {$idProduto}";
});
Route::get('/categorias/{flag}/produtos', function ($flag) {
    return "Produto da categoria: $flag";
});
Route::get('/categoria/{cat}', function ($cat) {
    return "Produto da categoria: $cat";
});
Route::match(['get','post'],'/match', function () {
    return 'Match';
});
Route::any('/any', function () {
    return 'Any';
});
Route::post('/register', function () {
    return ;
});

Route::get('/contato', function () {
    return view('contato');
});
Route::get('/', function () {
    return 'Olá';
});
