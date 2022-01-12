<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Orçamento</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
<div id="dialog" title="Erro">

        @foreach ($errors->all() as $error)
        {{ $error }}<br>
        @endforeach

</div>
@endif



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


<script>
    $( function() {
        $( "#dialog" ).dialog();
    } );
</script>
</body>
</html>
