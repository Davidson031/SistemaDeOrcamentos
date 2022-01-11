<table border="2">
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
            <td><a href="/remover?id={{$orcamento->id}}">Remover</a></td>
        </form>
    </tr>
    @endforeach
</table>




///////////////////////


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



<script>
    $(document).ready( function () {
        $('#tabela').DataTable();
    } );
</script>
