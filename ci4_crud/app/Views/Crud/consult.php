<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Exemplo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .page {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
        }

    </style>
</head>

<body>
    <div class="container mt-5">
        <h1>Item List</h1>
        <a href="/crud/create" class="btn btn-success mb-3">Novo item</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($var_users as $usuario): ?>
                    <tr>
                        <td><?= $usuario['id'] ?></td>
                        <td><?= $usuario['nome'] ?></td>
                        <td><?= $usuario['descricao'] ?></td>
                        <td>
                            <a href="#" class="btn btn-warning btn-sm">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="page container my-4 d-flex justify-content-center">
            <?php echo $pagina->links(); ?>
        </div>
    </div>
</body>

</html>