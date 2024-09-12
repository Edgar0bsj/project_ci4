<div class="container">

    <?php if($session->get('logged_in')): //recuperando dados da sessão->logged_in?>
    <a href="<?= route_to('noticias/inserir') ?>" class="btn btn-primary">Adicionar Notícias</a>
    <?php endif?>

    <?php 
    //condição na qual as duas informaçoes tem que ser TRUE
    //1ª se a variavel noticias esta vazia
    //2ª se a variavel noticias é um array
    if (!empty($noticias) && is_array($noticias)):
    ?>
        <?php 
        //percorre o array noticias trazendo item por item
        foreach($noticias as $noticias_item):
        ?>
            <div class="card my-5">
                <div class="card-body">
                    <h3><?= $noticias_item['titulo'] ?></h3>
                    <p><?= $noticias_item['descricao'] ?></p>
                </div>
                <div class="card-footer">
                    <a href="<?= 'noticias/'.$noticias_item['id']?>" class="btn btn-success">Saiba mais</a>
                    <?php if($session->get('logged_in')):?>
                    <a href="<?= 'noticias/editar/'.$noticias_item['id']?>" class="btn btn-warning">Editar</a>
                    <a href="<?= 'noticias/excluir/'.$noticias_item['id']?>" class="btn btn-danger">Excluir</a>
                    <?php endif?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else:?>
        <h3>Sem Notícias</h3>
        <p>Não existe nenhuma notícia cadastrada no Sistema!</p>


    <?php endif;?>
</div>