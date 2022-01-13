<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesquisa de Orçamento</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>


</head>
<body>

<form action="/">
    <input type="submit" value="Inicio" />
</form>


@if ($errors->any())
<div id="caixadeerro" title="Erro">

    @foreach ($errors->all() as $error)
    {{ $error }}<br>
    @endforeach

</div>
@endif


<h1>Pesquisa de Orçamento</h1>


<form action="/pesquisaGeral" method="GET">
    <p>Ver todos os orçamentos: <button type="submit">Buscar</button></p>

</form>

<form action="/pesquisaPorVendedor" method="GET">
    <p>Ver por nome do vendedor: <input type="text" id="campovendedor" name="vendedor" placeholder="Nome do Vendedor" required> <button type="submit" id="btnvendedor">Buscar</button></p>

</form>

<form action="/pesquisaPorCliente" method="GET">
    <p>Ver por nome do cliente: <input type="text" id="campocliente" name="cliente" placeholder="Nome do Cliente" required> <button type="submit">Buscar</button></p>

</form>

<form action="/pesquisaPorData" method="GET">
    <p>Ver Por datas: <input type="date" class="form-control" name="data_inicio" id="data_inicio" required> <input type="date" class="form-control" name="data_fim" id="data_fim" required> <button type="submit">Buscar</button></p>

</form>




<script>
    $( function() {
        $( "#caixadeerro" ).dialog();
    } );
</script>

</body>
</html>
