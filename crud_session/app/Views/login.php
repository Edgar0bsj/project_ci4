<div class="container">
    <form action="<?= route_to('logar')?>" method="post">
        <div class="form-group">
            <label for="user">User</label>
            <input type="text" class="form-control" name="user">
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" name="senha">
        </div>
        <input type="submit" name="submit" class="btn btn-primary my-5" value="Entrar">
    </form>
</div>