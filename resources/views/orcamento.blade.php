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



    <form action="/orcamento/criado" method="POST" enctype="'multipart/form-data">
        @csrf
        <h1>Cadastro de Orçamento</h1><br><br>
        <div class="info">
            <p>Cliente: <input type="text" name="cliente" placeholder="Nome do Cliente"></p>
            <p>Vendedor: <input type="text" name="vendedor" placeholder="Nome do Vendedor"></p>
            <p>Descrição: <input type="text" name="descricao" placeholder="Descricao"></p>
            <p>Valor: <input type="number" name="valor" placeholder="0"></p><br><br>
        </div>

        <button type="submit">Cadastrar Orçamento</button>
    </form>



</body>
</html>
