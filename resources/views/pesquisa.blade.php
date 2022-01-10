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




<form action="/pesquisaPorVendedor" method="GET" onsubmit="return validarCampoVendedor();">
    <p>Pesquisar por nome do vendedor: <input type="text" name="vendedor" placeholder="Nome do Vendedor"> <button type="submit">Buscar</button></p>

</form>

<form action="/pesquisaPorCliente" method="GET">
    <p>Pesquisar por nome do cliente: <input type="text" name="cliente" placeholder="Nome do Cliente"> <button type="submit">Buscar</button></p>

</form>



















</body>
</html>