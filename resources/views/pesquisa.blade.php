<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Orçamento</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
</head>
<body>

<form action="/">
    <input type="submit" value="Inicio" />
</form>

<h1>Pesquisa de Orçamento</h1>


<form action="/pesquisaGeral" method="GET">
    <p>Ver todos os orçamentos: <button type="submit">Buscar</button></p>

</form>

<form action="/pesquisaPorVendedor" method="GET">
    <p>Ver por nome do vendedor: <input type="text" name="vendedor" placeholder="Nome do Vendedor"> <button type="submit">Buscar</button></p>

</form>

<form action="/pesquisaPorCliente" method="GET">
    <p>Ver por nome do cliente: <input type="text" name="cliente" placeholder="Nome do Cliente"> <button type="submit">Buscar</button></p>

</form>

<form action="/pesquisaPorCliente" method="GET">
    <p>Ver Por datas: <input type="date" class="form-control" name="data_inicio" id="data_inicio" required> <input type="date" class="form-control" name="data_fim" id="data_fim" required> <button type="submit">Buscar</button></p>

</form>



















</body>
</html>
