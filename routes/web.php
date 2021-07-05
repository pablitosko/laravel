<?php

use Illuminate\Support\Facades\Route;

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

/*
  Route::get('/', function () {
  return "Home";
  });
 * 
 * Route::get('/sobre-nos', function () {
  return "Sobre-Nós";
  });

  Route::get('/contato', function () {
  return "Contato";
  });

 */
/*
  Route::get('/contato/{nome}/{categoria}/{assunto}/{menssagem?}', function (string $nome, string $categoria, string $assunto, string $menssagem = 'Menssage não informada') {
  echo "estamos aqui $nome - $categoria - $assunto - $menssagem";
  });
 */
/*
  Route::get('/contato/{nome}/{categoria_id}', function (string $nome, int $categoria_id = 1) {
  echo "estamos aqui $nome - $categoria_id";
  })->where('categoria_id','[0-9]+')->where('nome','[A-Za-z]+');
 
 * 
Route::get('/rota1', function () {
    echo 'teste rota1';
})->name('site.rota1');

Route::get('/rota2', function () {
    return redirect()->route('site.rota1');
})->name('site.rota2');

Route::redirect('/rota2', '/rota1');

 */

Route::get('/', 'PrincipalController@principal')->name('site.index');

Route::get('/sobre-nos', 'SobreNosController@sobrenos')->name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')->name('site.contato');

Route::get('/login', function () {
    return 'login';
})->name('site.login');

//app
Route::prefix('/app')->group(function () {
    Route::get('/clientes', function () {
        return 'Clientes';
    })->name('app.clientes');

    Route::get('/fornecedores', 'FornecedorController@index')->name('app.fornecedores');

    Route::get('/produtos', function () {
        return 'Produtos';
    })->name('app.produtos');
});

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');

Route::fallback(function () {
    echo 'A rota acessada não existe! <a href="' . route('site.index') . '">Clique aqui</a>';
});
