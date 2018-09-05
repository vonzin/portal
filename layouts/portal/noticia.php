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
<?php
/*[id_post] => 10999
[post_data] => 2018-04-06 16:12:07.67782
[post_titulo] => Testando do Zero uma nova notícia completa
[post_conteudo] => Olá, tudo bem?
[post_url] => testando-do-sistema-zero-uma-nova-noticia-completa
[post_status] => t
[post_autor] => Diego Uczak
[post_programado] => 2018-04-06 16:12:00
[imagem_destaque] => 99.jpg
[post_publicado] => t
[modelo] => 

*/
$timeZone = new DateTimeZone('UTC');
$post_programado = DateTime::createFromFormat('Y-m-d H:i:s', $noticia['post_programado'], $timeZone);
if($noticia['imagem_destaque']!=''){
	if($noticia['modelo']=='wordpress'){
		$img_destaque = $noticia['imagem_destaque'];
	}else{
		$img_destaque = IMG_PORTAL.$noticia['imagem_destaque'];
	}
}else{
	$img_destaque = false;
}
?>
        <div class="py-3 bg-light-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb" style="margin-bottom:0px;margin-top:0px">
							<li class="breadcrumb-item">
								<a href="index.php">Início</a>
							</li>
							<li class="breadcrumb-item">
								<a href="<?=base_url('noticias')?>">Not&iacute;cias</a>
							</li>
							<li class="breadcrumb-item active"><?=$noticia['post_titulo']?></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	    <div class="py-5 bg-light-gray">
			<!-- EDITAIS -->
			<div class="container">
				<div class="row">
					<div class="col-md-<?=($img_destaque==false?'12':'6')?> text-center g-mb-50">
						<h2 class="mb-4 text-primary"><?=$noticia['post_titulo']?></h2>
						<p><span class="text-dark"><?=strtoupper($this->ENtoPTBR($post_programado->format('j \D\E F \D\E Y')))?></span><!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div></p>
					</div>
<?php
if($img_destaque!==false){
?>
					<div class="col-md-6">
						<img src="<?=$img_destaque?>" class="attachment-thumb-medium wp-post-image" alt="<?=$noticia['post_titulo']?>" height="200">
					</div>
<?php
}
?>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-12 pt-5">
						<p class="text-justify"><? echo nl2br($noticia['post_conteudo']); ?></p>
					</div>
				</div>
			</div>
			<div class="container py-5">
				<div class="row">
					<div class="col-md-12">
						<p>Veja também</p>
					</div>
<?php
$timeZone = new DateTimeZone('UTC');
if($anterior!==false && is_array($anterior)){
	$post_data = DateTime::createFromFormat('Y-m-d', $anterior['post_data'], $timeZone);
?>
					<div class="col-md-6">
						<a class="btn btn-light btn-block" href="<?=base_url($post_data->format('Y\/m\/d\/').$anterior['post_url'].'\/')?>"><i class="fa fa-arrow-left"></i> <? echo mb_strimwidth($anterior['post_titulo'], 0, 50, '...');?></a>
					</div>
<?php
}
if($proxima!==false && is_array($proxima)){
	$post_data = DateTime::createFromFormat('Y-m-d', $proxima['post_data'], $timeZone);
?>
					<div class="col-md-6">
						<a class="btn btn-light btn-block" href="<?=base_url($post_data->format('Y\/m\/d\/').$proxima['post_url'].'\/')?>"><? echo mb_strimwidth($proxima['post_titulo'], 0, 50, '...'); ?> <i class="fa fa-arrow-right"></i></a>
					</div>
<?php
}
?>
				</div>
			</div>
		</div>
        <?php include('rodape.php');  ?>
		
    </body>

</html>