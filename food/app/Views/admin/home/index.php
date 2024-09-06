<?php //Esse código diz pro vscode para reconhecer o $this

/**
 * @var CodeIgniter\View\View $this
*/
?>
<?= $this->extend('admin/layout/principal') ?>


<?= $this->section('titulo') ?><?php echo $titulo; ?><?= $this->endSection() ?>
<!----------------------------------->

<?= $this->section('style') ?>

<?= $this->endSection() ?>

<!----------------------------------->

<?= $this->section('conteudo') ?>

<?php echo $titulo; ?>

<?= $this->endSection() ?>

<!----------------------------------->

<?= $this->section('scripts') ?>


<?= $this->endSection() ?>