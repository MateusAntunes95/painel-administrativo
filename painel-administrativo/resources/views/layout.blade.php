<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <script src="/js/layouts/utils.js"></script>
    <title> Painel administrativo </title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('user.index') }}">Cadastro de úsuario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cliente.index') }}">Cadastro de cliente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('album.index') }}">Cadastro de album</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('albuns_versos_clientes') }}">Relatorio</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if (count($errors) > 0)
    <div class="alert alert-danger">
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
    <div class="display-4 fw-bold text-center text-primary">
        <h1>{{ $title }}</h1>
    </div>
    @yield('content')

</body>

</html>