<?php //Esse código diz pro vscode para reconhecer o $this

/**
 * @var CodeIgniter\View\View $this
 */
?>
<?= $this->extend('admin/layout/principal') ?>


<?= $this->section('titulo') ?><?php echo $titulo; ?><?= $this->endSection() ?>
<!----------------------------------->

<?= $this->section('style') ?>
<link rel="stylesheet" href="<?php echo site_url('Admin/vendors/auto_complete/jquery-ui.css') ?>">


<?= $this->endSection() ?>

<!----------------------------------->

<?= $this->section('conteudo') ?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <?php echo $titulo ?>
            </h4>

            <div class="ui-widget">
                <input id="query" name="query" placeholder="Pesquise um usuario" class="form-control bg-light mb-5">
            </div>



            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>CPF</th>
                            <th>Ativo</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td>
                                <a href="<?php echo site_url("admin/usuarios/show/$usuario->id");?><?php echo $usuario->nome;?>">
                                <?php echo $usuario->nome; ?>
                                </a>
                            </td>
                            <td>
                                <?php echo $usuario->email; ?>
                            </td>
                            <td>
                                <?php echo $usuario->cpf; ?>
                            </td>
                            <td>
                                <?php echo $usuario->ativo ?
                                    '<td><label class="badge badge-success">Sim</label></td>' :
                                    '<td><label class="badge badge-danger">Não</label></td>'; ?>
                            </td>


                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<!----------------------------------->

<?= $this->section('scripts') ?>

<!-----------Jquery auto_complete------------------------->
<script src="<?php echo site_url('Admin/vendors/auto_complete/jquery-ui.js') ?>"></script>
<script>

    $(function (){

        $("#query").autocomplete({
            source: function (request, response) {

                $.ajax({
                    url: "<?php echo site_url('admin/usuarios/procurar'); ?>",
                    dataType: "json",
                    data: {
                        term: request.term
                    },
                    success: function (data) {
                        if (data.length < 1) {
                            var data = [
                                {
                                    label: 'Usuario não encontrado',
                                    value: -1
                                }
                            ];
                        }
                        response(data); //aqui temos valor no data
                    },
            }); // fim do ajax
            },
            minLength: 1,
            select: function (event, ui) {
                if (ui.item.value == -1) {
                    $(this).val("");
                    return false;

                } else {
                    window.location.href = "<?php echo site_url('admin/usuarios/show/'); ?>" + ui.item.id;

                }
            }
        });


    })



</script>

<?= $this->endSection() ?>