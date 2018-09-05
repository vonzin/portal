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
/*[id_pagina] => 25
[post_data] => 2011-03-16 22:04:58
[post_titulo] => Nutead
[post_conteudo] => O Núcleo de Tecnologia e Educação Aberta
[post_url] => nutead
[post_status] => t
[post_programado] => 2011-03-16 22:04:58
[imagem_destaque] =>
[post_publicado] => t
[modelo] => wordpress
[post_parent] => 278
[post_pai] => 1
*/
$timeZone = new DateTimeZone('UTC');
$post_programado = DateTime::createFromFormat('Y-m-d H:i:s', $pagina['post_programado'], $timeZone);
if($pagina['imagem_destaque']!=''){
	if($pagina['modelo']=='wordpress'){
		$img_destaque = $pagina['imagem_destaque'];
	}else{
		$img_destaque = IMG_PORTAL.$pagina['imagem_destaque'];
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
<?php
if($pagina['post_pai']==true){
?>
							<li class="breadcrumb-item"><?=$pagina['post_titulo_pai']?></li>
							<li class="breadcrumb-item active"><?=$pagina['post_titulo']?></li>
<?php
}else{
?>
							<li class="breadcrumb-item active"><?=$pagina['post_titulo']?></li>
<?php
}
?>
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
						<h2 class="mb-4 text-primary"><?=$pagina['post_titulo']?></h2>
						<p><!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div></p>
					</div>
<?php
if($img_destaque!==false){
?>
					<div class="col-md-6">
						<img src="<?=$img_destaque?>" class="attachment-thumb-medium wp-post-image" alt="<?=$pagina['post_titulo']?>" height="200">
					</div>
<?php
}
?>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-12 pt-5">
						<p class="text-justify"><? echo nl2br($pagina['post_conteudo']); ?></p>
					</div>
				</div>
			</div>
		</div>
        <?php include('rodape.php');  ?>

	</body>
</html>