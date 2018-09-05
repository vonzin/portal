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

        <div class="py-0 bg-dark">
            <div class="row m-0">
                <div class="col-md-3 opaque-overlay hoverzoom">
                    <img src="http://financialgrade.com/wp-content/uploads/2014/03/Fotolia_26408928_Subscription_Monthly_XXL.jpg">
                    <div class="text-center py-5 retina">
                        <div class="container py-5">
                            <div class="row">
                                <a href="cursos.php" class="text-white">
                                    <div class="col-md-12 text-white">
                                        <h1 class="display-3 mb-4">Cursos</h1>
                                        <p class="lead mb-5">Graduação
                                            <br>Especialização
                                            <br>Extensão</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 opaque-overlay hoverzoom">
                    <img src="http://atlantablackstar.com/wp-content/uploads/2015/07/college-students-studying2_0.jpg">
                    <div class="py-5 text-center retina">
                        <div class="container py-5">
                            <div class="row">
								<a href="extensoes.php" class="text-white">
									<div class="col-md-12 text-white">
										<h1 class="display-3 mb-4">Extensão</h1>
										<p class="lead mb-5">Cursos de Extensão<br>
										com inscrições abertas<br>
										<br>
										<br></p>
									</div>
								</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 opaque-overlay hoverzoom">
                    <img src="https://ak7.picdn.net/shutterstock/videos/2364497/thumb/1.jpg">
                    <div class="py-5 text-center retina">
                        <div class="container py-5">
                            <div class="row">
								<a href="https://ead.uepg.br/apl/moocs/" class="text-white">
									<div class="col-md-12 text-white">
										<h1 class="display-3 mb-4">MOOCS</h1>
										<p class="lead mb-5">Cursos Online<br>
										Gratuitos<br>
										<br>
										<br></p>
									</div>
								</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 opaque-overlay hoverzoom">
                    <img src="https://grewallevymarketing.files.wordpress.com/2017/03/lo-res_268385624-s.jpg">
                    <div class="py-5 text-center retina">
                        <div class="container py-5">
                            <div class="row">
								<a href="https://ead.uepg.br/site/editais/" class="text-white">
									<div class="col-md-12 text-white">
										<h1 class="display-3 mb-4">Editais</h1>
										<p class="lead mb-5">Tutoria Presencial<br>
										Tutoria a Distância<br>
										Processos Seletivos<br>
										<br></p>
									</div>
								</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
//newsletter
?>
        <div class="newsletter">
            <div class="container">
                <div class="row m-0">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5">
                                        <h3 class="py-5">Fique por dentro do NUTEAD</h3>
                                    </div>
                                    <div class="col-md-5">
                                        <form class="my-4"> <label for="exampleInputEmail1">Receba notícias sobre eventos e cursos</label>
                                            <div class="input-group">
                                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Informe o seu endereço de E-mail"> <span class="input-group-btn">
                                                    <a class="btn btn-outline-primary text-white active" href="#!">Cadastrar</a>
                                                </span> </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
//final newsletter

//destaques
$destaques = $this->homeDestaques(3);
//echo '<pre>';print_r($destaques);exit;
/*[id_destaque] => 3
[target] => _blank
[imagem_destaque] => https://nutead17.nutead.org/site2018/uploads/portal/imagem/banner1.jpg*/
if(is_array($destaques) && count($destaques)>0){
?>
        <div class="text-center bg-secondary text-white gradient-overlay py-0">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="carousel slide h-100 w-100" data-ride="carousel" id="carouselArchitecture">
                        <ol class="carousel-indicators">
<?php
    foreach($destaques as $key=>$value){
?>
                            <li data-target="#carouselArchitecture" data-slide-to="<?=$key?>" class="<?=($key==0?'active':'')?>"><i></i></li>
<?php
    }
?>
                        </ol>
                        <div class="carousel-inner" role="listbox">
<?php
    foreach($destaques as $key=>$destaque){
?>
                            <div class="carousel-item <?=($key==0?'active':'')?>">
                                <a href="<?=base_url('destaques/'.$destaque['id_destaque'])?>" target="<?=$destaque['target']?>">
                                    <img class="d-block w-100 img-fluid" src="<?=$destaque['imagem_destaque']?>" data-holder-rendered="true">
                                </a>
                            </div>
<?php
    }
?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
}
// final destaques

//notícias home
$noticias = $this->homeNoticias(4);
//echo '<pre>';print_r($noticias);exit;
/*[id_post] => 11000
[post_data] => 2018-07-18 03:01:07
[post_titulo] => teste noticia programada
[post_conteudo] => 

teste de notícia programada para 2 dias depois

[post_url] => teste-noticia-programada
[post_status] => t
[post_autor] => Diego Uczak
[post_programado] => 2018-07-20 15:00:00
[imagem_destaque] => IMG-20160816-WA0041.jpg
[post_publicado] => t
[modelo] => */
if(is_array($noticias) && count($noticias)>0){
    $timeZone = new DateTimeZone('UTC');
    $i = 1;
?>
        <div class="py-5">
            <div class="container">
<?php
    foreach($noticias as $noticia){
        $post_data = DateTime::createFromFormat('Y-m-d H:i:s', $noticia['post_data'], $timeZone);
        $post_programado = DateTime::createFromFormat('Y-m-d H:i:s', $noticia['post_programado'], $timeZone);
        $img = ($noticia['modelo']=='wordpress'?$noticia['imagem_destaque']:IMG_PORTAL.$noticia['imagem_destaque']);
        $url = base_url($post_data->format('Y\/m\/d\/').$noticia['post_url'].'\/');
        $texto = nl2br($noticia['post_conteudo']);
        $texto = str_replace('<br>',' ',$texto);
        $texto = strip_tags($texto);
        //$texto = strip_tags($texto,'<br>');
        $texto = substr($texto,0,500);

        if($i%2==1){ //imagem destaque a direita
?>
                <div class="row mb-5 dirHomeNoticias">
                    <div class="col-md-7 align-self-top noticiaHome">
                        <h2 class="pull-right"><a class="text-primary" href="<?=$url?>"><?=$noticia['post_titulo']?></a></h2>
                        <p class="pull-right"><?=$texto?>... [<a href="<?=$url?>">continuar lendo</a>]</p>
                    </div>
                    <div class="col-md-5 align-self-top imgNoticiaDir">
                        <img class="img-fluid d-block img-thumbnail imgHomeNoticias" src="<?=$img?>">
                    </div>
                </div>
<?php
        }else{ //imagem destaque a esquerda
?>
                <div class="row mb-5 esqHomeNoticias">
                    <div class="col-md-5 align-self-top imgNoticiaEsq">
                        <img class="img-fluid d-block img-thumbnail imgHomeNoticias pull-right" src="<?=$img?>"> </div>
                    <div class="col-md-7 align-self-top noticiaHome">
                        <h2><a class="text-primary" href="<?=$url?>"><?=$noticia['post_titulo']?></a></h2>
                        <p class=""><?=$texto?>... [<a href="<?=$url?>">continuar lendo</a>]</p>
                    </div>
                </div>
<?php
        }
        $i++;
    }
?>
				<div class="row">
					<div class="col-12 text-right">
						<h5><a class="text-primary" href="<?=base_url('noticias')?>">confira mais not&iacute;cias...</a></h5>
					</div>
				</div>
            </div>
        </div>
<?php
}
//final notícias home

//polos home
?>
        <div class="text-white bg-secondary py-5">
            <div class="container">
                <div class="row">
                    <div class="align-self-center col-md-6 col-sm-12 p-5">
                        <h1 class="mb-4 text-center">Perto de você</h1>
                        <p class="mb-5">A NUTEAD tem convênio com mais de 50 polos, espalhados pelos estados do Paraná, Santa Cataria e São Paulo. Encontre o polo mais perto de você:</p>
                        <div class="input-group">
                            <input type="text" class="form-control" id="exampleInputPolo1" placeholder="Procure por CEP, Cidade, Polo..."> <span class="input-group-btn">
                                <button type="button" class="btn btn-outline-primary text-white active"><i class="fa fa-search"></i></button>
                            </span> </div>
                    </div>
                    <div class="col-md-6 col-sm-12 p-0">
                        <img src="http://nutead17.nutead.org/nutead2018/mapa.jpg" atl="polos" class="d-block img-fluid w-100"> </div>
                </div>
            </div>
        </div>
<?php
//final polos home

//menu inferior home
?>
        <div class="text-secondary">
            <div class="container">
                <div class="row">
                    <div class="p-4 col-md-5 col-sm-12">
                        <h2 class="mb-4 text-left">Projetos e Programas</h2>
                        <ul class="list-unstyled">
<?php // programas e projetos
foreach($menuPP as $item){
    if($item['caminho']=='/'){
        $caminho = '#';
    }elseif(substr_count($item['caminho'],'http')>0){
        $caminho = $item['caminho'];
    }else{
        $caminho = base_url($item['caminho']);
    }
    if($item['target']!=''){
        $target = ' target="'.$item['target'].'" ';
    }else{
        $target = '';
    }
?>
                            <a href="<?=$caminho?>" <?=$target?>><?=($item['parent']!=0?'- ':'').$item['nome']?></a>
                            <br>
<?php
}
?>
                        </ul>
                    </div>
                    <div class="p-4 col-md-4 col-sm-12">
                        <h2 class="mb-4 text-left">Serviços</h2>
                        <ul class="list-unstyled">
<?php // serviços
foreach($menuSV as $item){
    if($item['caminho']=='/'){
        $caminho = '#';
    }elseif(substr_count($item['caminho'],'http')>0){
        $caminho = $item['caminho'];
    }else{
        $caminho = base_url($item['caminho']);
    }
    if($item['target']!=''){
        $target = ' target="'.$item['target'].'" ';
    }else{
        $target = '';
    }
?>
                            <a href="<?=$caminho?>" <?=$target?>><?=($item['parent']!=0?'- ':'').$item['nome']?></a>
                            <br>
<?php
}
?>
                        </ul>
                    </div>
                    <div class="p-4 col-md-3 col-sm-12">
                        <h2 class="mb-4 text-left">Sobre</h2>
                        <ul class="list-unstyled text-left">
<?php // sobre
foreach($menuSB as $item){
    if($item['caminho']=='/'){
        $caminho = '#';
    }elseif(substr_count($item['caminho'],'http')>0){
        $caminho = $item['caminho'];
    }else{
        $caminho = base_url($item['caminho']);
    }
    if($item['target']!=''){
        $target = ' target="'.$item['target'].'" ';
    }else{
        $target = '';
    }
?>
                            <a href="<?=$caminho?>" <?=$target?>><?=($item['parent']!=0?'- ':'').$item['nome']?></a>
                            <br>
<?php
}
?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php include('rodape.php');  ?>
    </body>
</html>