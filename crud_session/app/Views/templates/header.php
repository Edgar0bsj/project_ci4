<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursp codeigniter 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h1><?= $title ?></h1>
            </div>
            <div class="col-md-3">
                <?php if ($session->get('logged_in')): ?>
                    <p>Bem vindo ao sistema, <?= $session->get('user')?> ! <a href="<?= route_to('logout')?>">Sair</a></p>
                <?php else: ?>
                    <a href="<?= route_to('login')?>" class="btn btn-primary">Entrar no Sistema</a>
                
                <?php endif; ?>
            </div>

        </div>
    </div>