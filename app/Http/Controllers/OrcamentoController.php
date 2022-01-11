<?php

namespace App\Http\Controllers;

use App\Models\Orcamento;
use Illuminate\Http\Request;
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

        $orcamento->cliente = $request->cliente;
        $orcamento->vendedor = $request->vendedor;
        $orcamento->descricao = $request->descricao;
        $orcamento->valor = $request->valor;

        $orcamento->save();

        return redirect('/pesquisaGeral');;

    }

    public function delete(Request $request){

        $orcamento = Orcamento::where('id', $request->id)->first();

        $orcamento->delete();

        return redirect('/');;

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

    public function store(Request $request){
        $orcamento = new Orcamento;

        $orcamento->cliente = $request->cliente;
        $orcamento->vendedor = $request->vendedor;
        $orcamento->descricao = $request->descricao;
        $orcamento->valor = $request->valor;

        $orcamento->save();

        return redirect('/orcamento');;
    }




}
