<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
        {css}
    <body>

        <?php include('barra_acessibilidade.php');  ?>

        <?php include('logo_redes_sociais.php');  ?>

        <?php include('menu_superior.php');  ?>

        <div class="py-3 bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb" style="margin-bottom:0px;margin-top:0px">
                        <li class="breadcrumb-item">
                            <a href="index.php">Início</a>
                        </li>
                        <li class="breadcrumb-item active">Not&iacute;cias</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5 bg-light-gray">
        <!-- EDITAIS -->
        <div class="container">
            <div class="text-center g-mb-50">
                <h2 class="mb-4 text-primary">Not&iacute;cias</h2>
            </div>
        </div>
        <div class="container">
            <div class="row">
<?php
/*[id_post] => 11000
[post_data] => 2018-07-18 15:01:07.125845
[post_titulo] => teste noticia programada
[post_conteudo] => teste de notícia programada para 2 dias depois
[post_url] => teste-noticia-programada
[post_status] => t
[post_autor] => Diego Uczak
[post_programado] => 2018-07-20 15:00:00
[imagem_destaque] => IMG-20160816-WA0041.jpg
[post_publicado] => t
[modelo] =>
[categoria] => NUTEAD*/
$timeZone = new DateTimeZone('UTC');
foreach($noticias as $noticia){
    $post_data = DateTime::createFromFormat('Y-m-d H:i:s', $noticia['post_data'], $timeZone);
    //echo '<pre>';print_r($post_data->format('d'));exit;
    $post_programado = DateTime::createFromFormat('Y-m-d H:i:s', $noticia['post_programado'], $timeZone);
?>
                <div class="col-md-1">
                    <p class="text-center"><span class="text-dark"><?=strtoupper($this->ENtoPTBR($post_programado->format('d M Y')))?></span></p>
                </div>
                <div class="col-md-11">
                    <h5 class="text-primary pt-1"><?=strtoupper($noticia['categoria'])?> <i class="fa fa-1x fa-arrow-right"></i> <a href="<?=base_url($post_data->format('Y\/m\/d\/').$noticia['post_url'].'\/')?>"><?=$noticia['post_titulo']?></a></h5>
                </div>
<?php
}
?>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 justify-content-center d-flex">
                    <ul class="pagination pt-3">
                        <?=$paginacao?>
                    </ul>
                </div>
            </div>
        </div>

        <?php include('rodape.php');  ?>

    </body>
</html>