<?php

namespace App\Http\Controllers;

use App\Models\Orcamento;
use Illuminate\Http\Request;



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

        $id = $request->query('id');
        $orcamentos = Orcamento::where('id', $id)->get();
        return view('editar', ['orcamentos' => $orcamentos]);

    }

    public function pesquisarOrcamento(Request $request){

        $vendedor = $request->query('vendedor');
        $cliente = $request->query('cliente');

        if(isset($vendedor)){

            $orcamentos = Orcamento::where('vendedor', $vendedor)->get();

            return view('resultadopesquisa', ['orcamentos' => $orcamentos])->with('vendedor', $vendedor);
        }

        if(isset($cliente)){

            $orcamentos = Orcamento::where('cliente', $cliente)->get();
            return view('resultadopesquisa', ['orcamentos' => $orcamentos])->with('cliente', $cliente);
        }

        $orcamentos = Orcamento::all();
        return view('resultadopesquisa', ['orcamentos' => $orcamentos]);

    }

    public function store(Request $request){
        $orcamento = new Orcamento;

        $orcamento->cliente = $request->cliente;
        $orcamento->vendedor = $request->vendedor;
        $orcamento->descricao = $request->descricao;
        $orcamento->valor = $request->valor;

        $orcamento->save();

        return redirect('/orcamento');;


    }

    public function update(Request $request){

        $id = $request->id;

        //$orcamento = Orcamento::find($id);
        $orcamento = Orcamento::where('id', $id)->first();

        $orcamento->cliente = $request->cliente;
        $orcamento->vendedor = $request->vendedor;
        $orcamento->descricao = $request->descricao;
        $orcamento->valor = $request->valor;

        $orcamento->save();

        return redirect('/pesquisaGeral');;


    }


}
