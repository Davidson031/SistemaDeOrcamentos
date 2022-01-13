<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Orçamento</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/alertas.css')}}" type="text/css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
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

<form action="/orcamento/criado" method="POST" enctype="'multipart/form-data">
    @csrf
    <h1>Cadastro de Orçamento</h1><br><br>

    @foreach (['fail', 'success'] as $msg)

    @if(Session::has('alert-'.$msg))
    <div class="success">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        {{Session::get('alert-' . $msg)}}
    </div>
    @endif
    @endforeach

    <div class="info">
        <p>Cliente: <input type="text" name="cliente" placeholder="Nome do Cliente" value="{{old('cliente')}}"></p>
        <p>Vendedor: <input type="text" name="vendedor" placeholder="Nome do Vendedor" value="{{old('vendedor')}}"></p>
        <p>Descrição: <input type="text" name="descricao" placeholder="Descricao " value="{{old('descricao')}}"></p>
        <p>Valor: <input type="number" name="valor" placeholder="0" value="{{old('valor')}}"></p><br><br>
    </div>

    <button type="submit">Cadastrar Orçamento</button>
</form>


<script>
    $( function() {
        $( "#caixadeerro" ).dialog();
    } );
</script>

<script>
    function displayGrowl(message) {
        $('.growl-notice').fadeIn().html(message);
        setTimeout(function(){
            $('.growl-notice').fadeOut();
        }, 2000);
    }
</script>

</body>
</html>
