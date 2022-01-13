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

Route::get('/orcamento', [OrcamentoController::class, 'salvarOrcamento']);

Route::get('/pesquisa', [OrcamentoController::class, 'pesquisarOrcamento']);

Route::get('/editar', [OrcamentoController::class, 'editarOrcamento']);

Route::get('/remover', [OrcamentoController::class, 'removerOrcamento']);

Route::get('/pesquisaGeral', [OrcamentoController::class, 'pesquisarTudo']);

Route::get('/pesquisaPorCliente', [OrcamentoController::class, 'pesquisarOrcamentoPorNome']);

Route::get('/pesquisaPorVendedor', [OrcamentoController::class, 'pesquisarOrcamentoPorNome']);

Route::get('/pesquisaPorData', [OrcamentoController::class, 'pesquisarOrcamentoPorData']);

Route::post('/orcamento/editado', [OrcamentoController::class, 'update']);

Route::post('/orcamento/criado', [OrcamentoController::class, 'store']);

Route::post('/orcamento/removido', [OrcamentoController::class, 'delete']);



