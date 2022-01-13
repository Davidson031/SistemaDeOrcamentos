<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Orçamento</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
</head>
<body>

    {{--Link para a pagina inicial da aplicação--}}
    <form action="/">
        <input type="submit" value="Inicio" />
    </form>

    {{--Checa se veio algum erro de FormRequest na view e, se tiver vindo, percorre a lista e as joga em uma caixa de diálogo do jQuery--}}
    @if ($errors->any())
    <div id="caixadeerro" title="Erro">
            @foreach ($errors->all() as $error)
            {{ $error }}<br>
            @endforeach

    </div>
    @endif

    {{--Checa se veio algum alerta por flash message na view e, se tiver vindo, a exibe.--}}
    @foreach (['fail', 'success'] as $msg)
        @if(Session::has('alert-'.$msg))
            <div class="success">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{Session::get('alert-' . $msg)}}
            </div>
        @endif
    @endforeach


    {{--Formulário de cadastro de orçamentos--}}
    <form action="/orcamento/criado" method="POST" enctype="'multipart/form-data">
    @csrf
        <h1>Cadastro de Orçamento</h1><br>

        <div class="info">
            <p>Cliente: <input type="text" name="cliente" placeholder="Nome do Cliente" value="{{old('cliente')}}"></p>
            <p>Vendedor: <input type="text" name="vendedor" placeholder="Nome do Vendedor" value="{{old('vendedor')}}"></p>
            <p>Descrição: <input type="text" name="descricao" placeholder="Descricao " value="{{old('descricao')}}"></p>
            <p>Valor: <input type="number" name="valor" placeholder="0" value="{{old('valor')}}"></p><br>
        </div>

        <button type="submit">Cadastrar Orçamento</button>
    </form>

    {{--JS de ativação da caixa de dialogo jQuery--}}
<script>
    $( function() {
        $("#caixadeerro").dialog();
    } );
</script>



</body>
</html>
