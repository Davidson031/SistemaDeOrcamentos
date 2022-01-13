<!DOCTYPE html>
<html>
<head>
    <script src="/js/jquery-3.6.0.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="{{asset('css/alertas.css')}}" type="text/css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Orçamento</title>

</head>
<body>

{{--Link para a pagina inicial da aplicação--}}
<form action="/">
    <input type="submit" value="Inicio" />
</form>

<h1>Orçamentos</h1><br>

        {{--Checa se veio algum alerta por flash message na view e, se tiver vindo, a exibe.--}}
        @foreach (['fail', 'success'] as $msg)
            @if(Session::has('alert-'.$msg))
                <div class="success">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    {{Session::get('alert-' . $msg)}}
                </div>
            @endif
        @endforeach


{{--Criando a tabela com a exibição dos registros.--}}
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
    {{--Populando a tabela percorrendo o array de registros vindo do controle.--}}
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


    {{--JS para aplicar o jQuery na tabela HTML, aplicando ordem pelo campo de datas e deixando na ordem decrescente.--}}
<script>
    $(document).ready( function () {
        $('#tabela').DataTable({"order": [[1, "desc"]]});
    } );
</script>

</body>
</html>
