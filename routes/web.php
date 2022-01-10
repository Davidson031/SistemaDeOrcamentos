<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CombustivelController;
use App\Http\Controllers\OrcamentoController;
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


Route::get('/', [OrcamentoController::class, 'index']);

Route::get('/orcamento', [OrcamentoController::class, 'menuCadastro']);

Route::get('/pesquisa', [OrcamentoController::class, 'menuPesquisa']);

Route::get('/pesquisaGeral', [OrcamentoController::class, 'pesquisarOrcamento']);

Route::get('/pesquisaPorCliente', [OrcamentoController::class, 'pesquisarOrcamento']);

Route::get('/pesquisaPorVendedor', [OrcamentoController::class, 'pesquisarOrcamento']);

Route::post('/orcamento/editado', [OrcamentoController::class, 'update']);

Route::post('/orcamento/criado', [OrcamentoController::class, 'store']);

Route::get('/editar', [OrcamentoController::class, 'editar']);
