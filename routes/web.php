<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendasController;
use App\Http\Controllers\RelatoriosController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// -----------------------PRODUTO---------------------------------

Route::get('/produto', [ProdutoController::class, 'index'])->name('produto.index');

Route::get('/produto/create', [ProdutoController::class, 'create'])->name('produto.create');
Route::post('/produto/create', [ProdutoController::class, 'store'])->name('produto.store');

Route::get('/produto/{id}', [ProdutoController::class, 'show'])->name('produto.show');

Route::get('/produto/{id}/edit', [ProdutoController::class, 'edit'])->name('produto.edit');
Route::put('/produto/{id}', [ProdutoController::class, 'update'])->name('produto.update');

Route::delete('/produto/{id}', [ProdutoController::class, 'destroy'])->name('produto.destroy');

//-----------------------CATEGORIA--------------------------------------

Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.index');

Route::get('/categoria/create', [CategoriaController::class, 'create'])->name('categoria.create');
Route::post('/categoria/create', [CategoriaController::class, 'store'])->name('categoria.store');

Route::get('/categoria/{id}', [CategoriaController::class, 'show'])->name('categoria.show');

Route::get('/categoria/{id}/edit', [CategoriaController::class, 'edit'])->name('categoria.edit');
Route::put('/categoria/{id}', [CategoriaController::class, 'update'])->name('categoria.update');

Route::delete('/categoria/{id}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');

// -----------------------CLIENTE---------------------------------

Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente.index');

Route::get('/cliente/create', [ClienteController::class, 'create'])->name('cliente.create');
Route::post('/cliente/create', [ClienteController::class, 'store'])->name('cliente.store');

Route::get('/cliente/{id}', [ClienteController::class, 'show'])->name('cliente.show');

Route::get('/cliente/{id}/edit', [ClienteController::class, 'edit'])->name('cliente.edit');
Route::put('/cliente/{id}', [ClienteController::class, 'update'])->name('cliente.update');

Route::delete('/cliente/{id}', [ClienteController::class, 'destroy'])->name('cliente.destroy');

// -----------------------user---------------------------------

Route::get('/user', [UserController::class, 'index'])->name('user.index');

Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/create', [UserController::class, 'store'])->name('user.store');

Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');

Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');

Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

//

Route::get('/relatorios', [RelatoriosController::class, 'index'])->name('relatorios.index');

// VENDAS

Route::get('/vendas', [VendasController::class, 'index'])->name('vendas.index');

//Route::get('/vendas', 'VendasController@index')->name('listar_vendas');
    
Route::get('/vendas/create', [VendasController::class, 'create'])->name('vendas.create');

//Route::get('/vendas/criar', 'VendasController@create')->name('form_criar_vendas');

Route::post('/vendas/create', [VendasController::class, 'store'])->name('vendas.store');

//Route::post('/vendas/criar', 'VendasController@store')->name('criar_venda');
    


// RELATÓRIOS
Route::get('/relatorios', [RelatoriosController::class, 'index'])->name('relatorios.index');

//Route::get('/relatorios', 'RelatoriosController@index')->name('listar_relatorio');

Route::get('/relatoriosPDF', [RelatoriosController::class, function(){
    $pdf = PDF::loadView('relatorios.indexPDF');
    return $pdf->download('relatorio.pdf');
}])->name('relatorios.indexPDF');

//Route::get('/relatoriosPDF', function(){
    //$pdf = PDF::loadView('relatorios.indexPDF');
    //return $pdf->download('relatorio.pdf');});
