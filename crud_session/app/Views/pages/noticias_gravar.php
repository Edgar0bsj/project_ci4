<div class="container">
    <div class="alert-danger p-3 my-3">
        <?= \Config\Services::validation()->listErrors();?>
    </div>
    <form action="/noticias/gravar" method="post">
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" name="titulo" id="titulo">
        </div>

        <div class="form-group">
        <label for="autor">Autor</label>
        <input type="text" class="form-control" name="autor" id="autor">
        </div>

        <div class="form-group">
        <label for="descricao">Descrição</label>
        <textarea name="descricao" class="form-control" id="descricao"></textarea>
        </div>
        <input type="hidden" name="id" value="<?= isset($noticias['id']) ? $noticias['id'] : set_value('id') ?>">
        <input type="submit" name="submit" class="btn btn-primary my-5" value="Salvar">
    </form>
</div>

<script> // inserir os valores venha do controlador ->editar()
  document.getElementById("titulo").value = "<?= isset($noticias['titulo']) ? $noticias['titulo'] : set_value('titulo') ?>";
  document.getElementById("autor").value = "<?= isset($noticias['autor']) ? $noticias['autor'] : set_value('autor') ?>";
  document.getElementById("descricao").value = "<?= isset($noticias['descricao']) ? $noticias['descricao'] : set_value('descricao') ?>";
</script>