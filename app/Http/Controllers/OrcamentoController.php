<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchDateOrcamento;
use App\Models\Orcamento;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrcamento;
use Carbon\Carbon;


class OrcamentoController extends Controller
{
    public function index(){

        return view('inicio');

    }

    public function pesquisarOrcamento(){
        return view('pesquisa');
    }

    public function salvarOrcamento(){
        return view('orcamento');
    }

    public function editarOrcamento(Request $request){

        $orcamento = Orcamento::where('id', $request->id)->first();
        return view('editar', ['orcamento' => $orcamento]);

    }

    public function removerOrcamento(Request $request){

        $orcamento = Orcamento::where('id', $request->id)->first();
        return view('remover', ['orcamento' => $orcamento]);

    }

    public function update(Request $request){

        $orcamento = Orcamento::where('id', $request->id)->first();

        $orcamento->cliente = $request->cliente;
        $orcamento->vendedor = $request->vendedor;
        $orcamento->descricao = $request->descricao;
        $orcamento->valor = $request->valor;

        $orcamento->save();
        $request->session()->flash('alert-success', 'Orçamento atualizado!');

        return redirect('/pesquisaGeral');
    }

    public function delete(Request $request){

        $orcamento = Orcamento::where('id', $request->id)->first();

        $orcamento->delete();

        $request->session()->flash('alert-success', 'Orçamento removido!');
        return redirect('/pesquisaGeral');;

    }

    public function store(StoreOrcamento $request){

        $orcamento = new Orcamento;
        $orcamento->cliente = $request->cliente;
        $orcamento->vendedor = $request->vendedor;
        $orcamento->descricao = $request->descricao;
        $orcamento->valor = $request->valor;

        $orcamento->save();

        $request->session()->flash('alert-success', 'Orçamento adicionado!');
        return redirect('/orcamento');;;
    }

    public function pesquisarOrcamentoPorData(SearchDateOrcamento $request){

        $startDate = Carbon::createFromFormat('Y-m-d', $request->query('data_inicio'));
        $endDate = Carbon::createFromFormat('Y-m-d', $request->query('data_fim'));

        $orcamentos = Orcamento::query()
            ->whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->get();


        return view('resultadopesquisa', ['orcamentos' => $orcamentos]);
    }

    public function pesquisarOrcamentoPorNome(Request $request){

        $vendedor = $request->query('vendedor');
        $cliente = $request->query('cliente');

        if(isset($vendedor)){

            $orcamentos = Orcamento::where('vendedor', $vendedor)->get();
            return view('resultadopesquisa', ['orcamentos' => $orcamentos]);
        }

        if(isset($cliente)){

            $orcamentos = Orcamento::where('cliente', $cliente)->get();
            return view('resultadopesquisa', ['orcamentos' => $orcamentos]);
        }

    }

    public function pesquisarTudo(Request $request){
        $orcamentos = Orcamento::all();
        return view('resultadopesquisa', ['orcamentos' => $orcamentos]);
    }



}
