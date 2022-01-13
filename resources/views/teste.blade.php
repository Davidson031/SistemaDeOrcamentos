<table border="2">
    <tr>
        <td>ID</td>
        <td>Data</td>
        <td>Cliente</td>
        <td>Vendedor</td>
        <td>Descrição</td>
        <td>Valor</td>
        <td>Editar</td>
        <td>Remover</td>
    </tr>
    @foreach($orcamentos as $orcamento)
    <tr>
        <form action="/editar" method="GET">
            <td>{{$orcamento['id']}}</td>
            <td>{{$orcamento['created_at']}}</td>
            <td>{{$orcamento['cliente']}}</td>
            <td>{{$orcamento['vendedor']}}</td>
            <td>{{$orcamento['descricao']}}</td>
            <td>{{$orcamento['valor']}}</td>
            <td><a href="/editar?id={{$orcamento->id}}">Editar</a></td>
            <td><a href="/remover?id={{$orcamento->id}}">Remover</a></td>
        </form>
    </tr>
    @endforeach
</table>




///////////////////////


<table id="tabela">

    <thead>
    <tr>
        <td>ID</td>
        <td>Data</td>
        <td>Cliente</td>
        <td>Vendedor</td>
        <td>Descrição</td>
        <td>Valor</td>
        <td>Editar</td>
        <td>Remover</td>

    </tr>
    </thead>
    <tbody>
    @foreach($orcamentos as $orcamento)
    <tr>
        <form action="/editar" method="GET">
            <td>{{$orcamento->id}}</td>
            <td>{{$orcamento->created_at}}</td>
            <td>{{$orcamento->cliente}}</td>
            <td>{{$orcamento->vendedor}}</td>
            <td>{{$orcamento->descricao}}</td>
            <td>{{$orcamento->valor}}</td>
            <td><a href="/editar?id={{$orcamento->id}}">Editar</a></td>
            <td><a href="/remover?id={{$orcamento->id}}">Remover</a></td>
        </form>


    </tr>
    @endforeach
    </tbody>
</table>



<script>
    $(document).ready( function () {
        $('#tabela').DataTable();
    } );
</script>


<br><br><br><br><br><br>
<form action="/orcamento" method="GET">
    <button type="submit" >Cadastrar Orçamento</button>
</form>

<br>

<form action="/pesquisa" method="GET">
    <button type="submit">Exibir Orçamentos</button>
</form>


****************



@extends('layouts.main')
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @section('content')
    @endsection
    <title>Cadastro de Orçamento</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
</head>
<body>





<form action="/orcamento/criado" method="POST" enctype="'multipart/form-data">
    @csrf
    <h1>Cadastro de Orçamento</h1><br><br>
    <div class="info">
        <p>Cliente: <input type="text" name="cliente" placeholder="Nome do Cliente" required></p>
        <p>Vendedor: <input type="text" name="vendedor" placeholder="Nome do Vendedor" required></p>
        <p>Descrição: <input type="text" name="descricao" placeholder="Descricao" required></p>
        <p>Valor: <input type="number" name="valor" placeholder="0" required></p><br><br>
    </div>

    <button type="submit">Cadastrar Orçamento</button>
</form>



</body>
</html>


**************

TESTEORÇAMENTO DATA CONTROLLER


if(isset($datainicio)&&isset($datafim)){

$startDate = Carbon::createFromFormat('Y-m-d', $request->query('data_inicio'));
$endDate = Carbon::createFromFormat('Y-m-d', $request->query('data_fim'));

$orcamentos = Orcamento::query()
->whereDate('created_at', '>=', $startDate)
->whereDate('created_at', '<=', $endDate)
->orderBy('created_at', 'DESC')
->get();



return view('resultadopesquisa', ['orcamentos' => $orcamentos])->with('cliente', $cliente);
}
******************


@foreach($orcamentos as $orcamento)

<p>ID: <input id="id" type="text" name="id" value="{{$orcamento['id']}}"></p>
<p>Cliente: <input id ="id_cliente" type="text" name="cliente" placeholder="Nome do Cliente" value="{{$orcamento['cliente']}}"></p>
<p>Vendedor: <input id="id_vendedor" type="text" name="vendedor" placeholder="Nome do Vendedor" value="{{$orcamento['vendedor']}}"></p>
<p>Descrição: <input id="id_descricao" type="text" name="descricao" placeholder="Descricao" value="{{$orcamento['descricao']}}"></p>
<p>Valor: <input id="id_valor" type="number" name="valor" placeholder="0" value="{{$orcamento['valor']}}"></p><br><br>
@endforeach
