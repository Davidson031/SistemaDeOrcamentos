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

    public function menuCadastro(){
        return view('orcamento');
    }

    public function menuPesquisa(){

        return view('pesquisa');

    }

    public function editar(Request $request){

        $orcamentos = Orcamento::where('id', $request->query('id'))->get();
        return view('editar', ['orcamentos' => $orcamentos]);

    }


    public function remover(Request $request){

        $orcamentos = Orcamento::where('id', $request->query('id'))->get();
        return view('remover', ['orcamentos' => $orcamentos]);

    }

    public function update(Request $request){

        $orcamento = Orcamento::where('id', $request->id)->first();

        $id = $request->id;
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

    public function pesquisarOrcamentoPorData(SearchDateOrcamento $request){

        $startDate = Carbon::createFromFormat('Y-m-d', $request->query('data_inicio'));
        $endDate = Carbon::createFromFormat('Y-m-d', $request->query('data_fim'));

        $orcamentos = Orcamento::query()
            ->whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->orderBy('created_at', 'DESC')
            ->get();


        return view('resultadopesquisa', ['orcamentos' => $orcamentos]);


    }
    public function pesquisarOrcamento(Request $request){

        $vendedor = $request->query('vendedor');
        $cliente = $request->query('cliente');

        if(isset($vendedor)){

            $orcamentos = Orcamento::where('vendedor', $vendedor)->orderBy('created_at', 'DESC')->get();
            return view('resultadopesquisa', ['orcamentos' => $orcamentos])->with('vendedor', $vendedor);
        }

        if(isset($cliente)){

            $orcamentos = Orcamento::where('cliente', $cliente)->orderBy('created_at', 'DESC')->get();
            return view('resultadopesquisa', ['orcamentos' => $orcamentos])->with('cliente', $cliente);
        }


        $orcamentos = Orcamento::orderBy('created_at', 'DESC')->get();
        return view('resultadopesquisa', ['orcamentos' => $orcamentos]);

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




}
