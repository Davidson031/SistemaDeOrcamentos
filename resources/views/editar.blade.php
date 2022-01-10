<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edição de Orçamento</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">

</head>
<body>

    <form action="/">
        <input type="submit" value="Inicio" />
    </form>


    <form action="/orcamento/editado" method="POST" enctype="'multipart/form-data">
        @csrf
        <h1>Edição de Orçamento</h1><br><br>
        <div class="info">

            @foreach($orcamentos as $orcamento)
            <p>ID: <input id="id" type="text" name="id" value="{{$orcamento['id']}}"></p>
            <p>Cliente: <input id ="id_cliente" type="text" name="cliente" placeholder="Nome do Cliente" value="{{$orcamento['cliente']}}"></p>
            <p>Vendedor: <input id="id_vendedor" type="text" name="vendedor" placeholder="Nome do Vendedor" value="{{$orcamento['vendedor']}}"></p>
            <p>Descrição: <input id="id_descricao" type="text" name="descricao" placeholder="Descricao" value="{{$orcamento['descricao']}}"></p>
            <p>Valor: <input id="id_valor" type="number" name="valor" placeholder="0" value="{{$orcamento['valor']}}"></p><br><br>
            @endforeach
        </div>

        <button type="submit">Editar</button>
    </form>




</body>
</html>

