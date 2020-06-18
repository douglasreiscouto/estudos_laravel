<?php

use App\Http\Controllers\ProductController;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;
/*
//deleta um produto em especifico
Route::delete('/products/{id}', 'ProductController@detroy')->name('prodts.destroy');
//altera um produto em especifico
Route::put('products/{id}', 'ProductController@update')->name('products.update');
//registra um novo produto
Route::post('/products/registre', 'ProductController@registre')->name('products.registre');
//edita um produto em especifico
Route::get('/products/{id}/edit', 'ProductController@edit')->name('products.edit');
//exibe o forms para cadastro de um novo produto
Route::get('/products/create', 'ProductController@create')->name('products.create');
//exibe um produto em especifico
Route::get('/products/{id}', 'ProductController@show')->name('products.show');
//lista todos os produtos
Route::get('/products', 'ProductController@index')->name('products.index');*/

//group para o middleware auth
/*Route::middleware([])->group(function () {
    //group para prefixo o prefixo admin
    Route::prefix('admin')->group(function () {
        //group para o namespace admin
        Route::namespace('admin')->group(function () {
            //group para definir o prefixo admin.
            Route::name('admin.')->group(function () {
                Route::get('/dashboard', 'TesteController@teste')->name('dashboard');

                Route::get('/financeiro', 'TesteController@teste')->name('fincanceiro');

                Route::get('/produtos', 'TesteController@teste')->name('produtos');

                Route::get('/', function () {
                    return redirect()->route('admin.dashboard');
                })->name('home');
            });
        });
    });
});*/

<<<<<<< HEAD
Route::Resource('products', 'ProductController'); //->middleware('auth');
=======
Route::resource('products', 'ProductController');
>>>>>>> 8f82874da41063fd8e17c66ea3005fa548d7680c

Route::get('/login', function () {
    return "Login";
})->name('login');

Route::group([
    'middleware' => ['auth'],
    'prefix' => 'admin',
    'namespace' => 'admin'
], function () {
    Route::get('/dashboard', 'TesteController@teste')->name('dashboard');

    Route::get('/financeiro', 'TesteController@teste')->name('financeiro');

    Route::get('/produtos', 'TesteController@teste')->name('produtos');

    Route::get('/', function () {
        return redirect()->route('Admin.dashboard');
    })->name('home');
});

Route::get('redirect4', function () {
    return redirect()->route('url.name');
});
//rotas nomeadas
Route::get('/name-url', function () {
    return "Hey";
})->name('url.name');
//redirecionamento sem funcao
Route::redirect('redirect1', 'redirect2');
//redirecionamento com funcao de callback
Route::get('redirect3', function () {
    return redirect('/redirect2');
});

Route::get('redirect2', function () {
    return 'Recebe os redirecionamentos';
});
//rota com parametro dinamico
Route::get('/produtos/{idProduct?}', function ($idProduct = '') {
    return "Produtos(s) {$idProduct}";
});
//rota com parametro e prefixo
Route::get('/categoria/{flag}/posts', function ($flag) {
    return "Posts da categoria: {$flag}";
});
//rota com parametro
Route::get('/categorias/{flag}', function ($flag) {
    return "Produtos da categoria: {$flag}";
});
//match define qual metodo que pode acessa essa rota
Route::match(['get', 'post'], '/match', function () {
    return 'Match';
});
//any aceita todos os tipos de routas ou requisições http
Route::any('/any', function () {
    return 'Any';
});
//post usado para cadastro de registro
Route::post('/registro', function () {
    return '';
});
//get usado para buscar informações
Route::get('/empresa', function () {
    return view('site.company');
});

Route::get('/contato', function () {
    return view('site.contact');
});

Route::get('/', function () {
    return view('welcome');
});
