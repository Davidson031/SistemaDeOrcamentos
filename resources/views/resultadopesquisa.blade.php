<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Orçamento</title>
    <script src="js/jquery-3.6.0.js"></script>
</head>
<body>

<form action="/">
    <input type="submit" value="Inicio" />
</form>

<h1>Orçamentos</h1><br>

<table border="2">
    <tr>
        <td>ID</td>
        <td>Data</td>
        <td>Cliente</td>
        <td>Vendedor</td>
        <td>Descrição</td>
        <td>Valor</td>
        <td>Editar</td>
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
        </form>
    </tr>
    @endforeach
</table>


</body>
</html>
