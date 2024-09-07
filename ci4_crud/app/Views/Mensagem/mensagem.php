<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensagem</title>
</head>

<body>

    <div class="mt-5 conteiner">
        <div class="alert alert-info">
            <?php echo $mensagem;?>
            <p class="mt-3"><?php echo anchor(base_url(),'Voltar');?></p>
        </div>
    </div>





</body>

</html>