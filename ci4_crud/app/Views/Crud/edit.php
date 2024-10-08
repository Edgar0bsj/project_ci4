<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Item</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Item</h1>
        <form action="<?= site_url()."/editar/$id/true" ?>" method="post">
            <div class="form-group">
                <label for="name">ID</label>
                <input type="text" class="form-control" name="id" value="<?= $id ?>" required disabled>
            </div>
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" name="name" value="<?= $nome ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea class="form-control" name="description" required><?= $descricao ?></textarea>
            </div>
            <button type="submit" class="btn btn-success">Atualizar</button>
        </form>
    </div>
</body>
</html>
