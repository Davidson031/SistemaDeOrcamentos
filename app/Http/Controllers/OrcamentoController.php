<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchDateOrcamento;
use App\Models\Orcamento;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrcamento;
use Carbon\Carbon;


class OrcamentoController extends Controller
{
    //View da pagina inicial do projeto
    public function index(){
        return view('inicio');

    }

    //View da pagina de pesquisa de Orçamentos
    public function pesquisarOrcamento(){
        return view('pesquisa');
    }

    //View da pagina de cadastro de Orçamentos
    public function salvarOrcamento(){
        return view('orcamento');
    }

    /*Recebe um ID por Request da view de pesquisa,
    faz a busca no banco pelo Orçamento em específico e o repassa para a view de Edição*/
    public function editarOrcamento(Request $request){

        $orcamento = Orcamento::where('id', $request->id)->first();
        return view('editar', ['orcamento' => $orcamento]);

    }

    /*Recebe um ID por Request da view de pesquisa,
    faz a busca no banco pelo Orçamento em específico e o repassa para a view de Remoção*/
    public function removerOrcamento(Request $request){

        $orcamento = Orcamento::where('id', $request->id)->first();
        return view('remover', ['orcamento' => $orcamento]);

    }

    /*Recebe um ID por Request da view de pesquisa,
    faz a busca no banco pelo Orçamento em específico,
    atualiza seus dados com os novos passados pela Request e o repassa para a view de Atualização*/
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

    /*Recebe por Request os dados do Orçamento a ser excluído, o puxa no banco e o deleta usando o Model.
     Passa uma flash message para a view de Pesquisa confirmando a remoção do orçamento ao usuário.
    */
    public function delete(Request $request){

        $orcamento = Orcamento::where('id', $request->id)->first();

        $orcamento->delete();

        $request->session()->flash('alert-success', 'Orçamento removido!');
        return redirect('/pesquisaGeral');;

    }


    /*Recebe por Request os dados do orçamento a ser cadastrado, deixa o FormRequest fazer a validação e, se passar,
     Cria uma nova instância do model e a usa para fazer o registro no BD.
     Retorna uma flash message à tela de cadastro com a confirmação ao usuário.
    */
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


    /*Recebe por request as duas datas, faz a validação por FormRequest e, se passar, as passa para
     um formato entendível pela API Carbon e utilizando-as para a busca no BD.
     Retorna a view para exibição da tabela com os resultados */
    public function pesquisarOrcamentoPorData(SearchDateOrcamento $request){

        $startDate = Carbon::createFromFormat('Y-m-d', $request->query('data_inicio'));
        $endDate = Carbon::createFromFormat('Y-m-d', $request->query('data_fim'));

        $orcamentos = Orcamento::query()
            ->whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->get();


        return view('resultadopesquisa', ['orcamentos' => $orcamentos]);
    }

    /*--Método para fazer a busca no BD de orçamentos de um determinado Cliente ou Vendedor.--
        Recebe por request o nome, faz a checagem para confirmar se será um filtro por vendedor
        ou cliente e faz a busca no BD de acordo com o resultado.
        Retorna a view com a listagem de registros.
    */
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

    /*Faz a busca total com todos os registros no BD e retorna uma view com a exibição dos mesmos.*/
    public function pesquisarTudo(Request $request){
        $orcamentos = Orcamento::all();
        return view('resultadopesquisa', ['orcamentos' => $orcamentos]);
    }



}
