<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edição de Orçamento</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">

</head>
<body>

    {{--Link para a pagina inicial da aplicação--}}
    <form action="/">
        <input type="submit" value="Inicio" />
    </form>

    {{--Formulario para a exclusão de um orçamento, já será preenchido com os dados vindos do Controller e não permitirá a edição--}}
    <form action="/orcamento/removido" method="POST" enctype="'multipart/form-data">
        @csrf
        <h1>Remoção de Orçamento</h1><br><br>
        <div class="info">

            <p>ID: <input id="id" type="text" name="id" value="{{$orcamento['id']}}"></p>
            <p>Cliente: <input id ="id_cliente" type="text" name="cliente" placeholder="Nome do Cliente" value="{{$orcamento['cliente']}}"></p>
            <p>Vendedor: <input id="id_vendedor" type="text" name="vendedor" placeholder="Nome do Vendedor" value="{{$orcamento['vendedor']}}"></p>
            <p>Descrição: <input id="id_descricao" type="text" name="descricao" placeholder="Descricao" value="{{$orcamento['descricao']}}"></p>
            <p>Valor: <input id="id_valor" type="number" name="valor" placeholder="0" value="{{$orcamento['valor']}}"></p><br><br>
        </div>

        <button type="submit">Confirmar Remoção</button>
    </form>




</body>
</html>

{{--JS para bloquear os campos--}}
<script>
    document.getElementById('id').readOnly = true;
    document.getElementById('nome_cliente').readOnly= true;
    document.getElementById('nome_vendedor').readOnly = true;
    document.getElementById('nome_descricao').readOnly = true;
    document.getElementById('valor').readOnly = true;
</script>
