<div class="container">
    <div class="alert-danger p-3 my-3">
        <?= \Config\Services::validation()->listErrors();?>
    </div>
    <form action="<?= '/noticias/gravar'?>" method="post">
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" name="titulo" value="">
        </div>

        <div class="form-group">
        <label for="autor">Autor</label>
        <input type="text" class="form-control" name="autor" value="">
        </div>

        <div class="form-group">
        <label for="descricao">Descrição</label>
        <textarea name="descricao" class="form-control"></textarea>
        </div>
        <input type="hidden" name="id" value="">
        <input type="submit" name="submit" class="btn btn-primary my-5" value="Salvar">
    </form>
</div>