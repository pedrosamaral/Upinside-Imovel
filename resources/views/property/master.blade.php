<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laradev: CRUD Imobi</title>
    <link rel="stylesheet" href="<?= asset('css/app.css'); ?>">
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">Laradev</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="<?= url('imoveis/') ?>" class="nav-link">Listar todos os Imóveis</a></li>
                <li class="nav-item"><a href="<?= url('imoveis/novo') ?>" class="nav-link">Cadastrar novo imóvel</a>
                </li>
            </ul>
        </div>
    </nav>

    @yield('content')

    <script src="<?= asset('js/app.js'); ?>"></script>

</body>

</html>