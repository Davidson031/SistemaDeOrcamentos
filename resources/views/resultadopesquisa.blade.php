<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Orçamento</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
    <script src="js/jquery-3.6.0.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
</head>
<body>

<form action="/">
    <input type="submit" value="Inicio" />
</form>

<h1>Orçamentos</h1><br>

<table border="1">
    <tr>
        <td>Data</td>
        <td>Cliente</td>
        <td>Vendedor</td>
        <td>Descrição</td>
        <td>Valor</td>
    </tr>
    @foreach($orcamentos as $orcamento)
    <tr>
        <td>{{$orcamento['created_at']}}</td>
        <td>{{$orcamento['cliente']}}</td>
        <td>{{$orcamento['vendedor']}}</td>
        <td>{{$orcamento['descricao']}}</td>
        <td>{{$orcamento['valor']}}</td>
    </tr>
    @endforeach
</table>


</body>
</html>
