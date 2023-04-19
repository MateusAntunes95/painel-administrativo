<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <title> Painel administrativo </title>
</head>

<body>
    <div class="bonot-vai-arrumar">
        <div id="error-tag">
            @if (count($errors) > 0)
            <div class="tem-que-ficar-vermelho-bo">
                Foram encontrados alguns problemas no formulário:<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
    <div class="vai-ser-o-titulo-da-pagina">
        <h1>{{ $title }}</h1>
    </div>
    @yield('content')
</body>

</html>