<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$CI = get_instance();
$CI->load->library("shortcodes");
$CI->shortcodes->add_shortcode('hello','hello_func');
$CI->shortcodes->add_shortcode('video','get_video');
$CI->shortcodes->add_shortcode('caption','get_caption');
$CI->shortcodes->add_shortcode('b','b_func');
$CI->shortcodes->add_shortcode('i','i_func');
$CI->shortcodes->add_shortcode('u','u_func');
$CI->shortcodes->add_shortcode('s','s_func');
$CI->shortcodes->add_shortcode('gallery','gallery_func');
function hello_func($atts, $content=''){
	return "Ini hasil dari shortcode".$content;
}
// ambil video dari youtube
function get_video($atts)
{
	global $CI;
	extract($CI->shortcodes->shortcode_atts(array(
      		'id' => ''
     	), $atts));
	$video = '<iframe width="500" height="500" src="//www.youtube.com/embed/'.$id.'" frameborder="0" allowfullscreen></iframe>';
	return $video;
}
//[caption]
function get_caption($atts, $content=''){
	global $CI;
    extract($CI->shortcodes->shortcode_atts(array(
      		'id' => '',
      		'align' => '',
      		'width' => '',
      		'caption' => ''
     	), $atts));
    $caption = '<div align="'.$align.'" id="'.$id.'" width="'.$width.'" title="'.$caption.'">'.$content.'</div>';
    return $caption;
}
//[b] bold/strong
function b_func($atts, $content=''){
	return '<strong>'.$content.'</strong>';
}
//[i] italic
function i_func($atts, $content=''){
	return '<i>'.$content.'</i>';
}
//[u] underline
function u_func($atts, $content=''){
	return '<u>'.$content.'</u>';
}
//[s] sctratch
function s_func($atts, $content=''){
	return '<s>'.$content.'</s>';
}
//[gallery] galeria de imagens
function gallery_func($atts){
	global $CI;
	global $ID_POST;
	$CI =& get_instance();
	$CI->load->model('Galeriabd');
	$extensao = array('.jpg','.png','.gif','.jpeg','www');
	$thumbimg = array('-150x150.jpg','-150x150.png','-150x150.gif','-150x150.jpeg','nutead17');
	$columns = 0;
    extract($CI->shortcodes->shortcode_atts(array(
      		'link' => '',
      		'columns' => '',
      		'ids' => '',
     	), $atts));
	$imagens = $CI->Galeriabd->listagem($ID_POST);
	//echo '<pre>';print_r($imagens);exit;
	$html = '<div class="col-md-6 col-12 text-center">';
	if(is_array($imagens) && count($imagens)>0){
		$total = count($imagens);
		if($columns==0){
			if($total>4){
				$columns = 4;
			}else{
				$columns = $total;
			}
		}
		$i = 1;
		//echo '<br>colunas: '.$columns;
		//echo '<br>total: '.$total;
		//exit;
		//echo '<br>inicio foreach';
		foreach($imagens as $imagem){
			$img = '<img class="d-block img-fluid" src="'.str_replace($extensao,$thumbimg,$imagem['caminho']).'" title="'.$imagem['titulo'].'" alt="'.$imagem['titulo'].'">';
			$arquivo = '<a href="'.$imagem['caminho'].'" target="_blank">';
			if($i%$columns==1){ //abre row
				$html .= '<div class="row">';
				//echo '<br>abre div row';
			}
			switch($columns){
				case 1:
					$html .= '<div class="col-md-12 col-12 p-1">';
					if($link=='file'){
						$html .= $arquivo;
					}
					$html .= $img;
					//echo '<br>img case 1 - i:'.$i.' - columns:'.$columns;
					if($link=='file'){
						$html .= '</a>';
					}
					$html .= '</div>';
				break;
				case 2:
					$html .= '<div class="col-md-6 col-6 p-1">';
					if($link=='file'){
						$html .= $arquivo;
					}
					$html .= $img;
					//echo '<br>img case 2 - i:'.$i.' - columns:'.$columns;
					if($link=='file'){
						$html .= '</a>';
					}
					$html .= '</div>';
				break;
				case 3:
					$html .= '<div class="col-md-4 col-6 p-1">';
					if($link=='file'){
						$html .= $arquivo;
					}
					$html .= $img;
					//echo '<br>img case 3 - i:'.$i.' - columns:'.$columns;
					if($link=='file'){
						$html .= '</a>';
					}
					$html .= '</div>';
				break;
				case 4:
					$html .= '<div class="col-md-3 col-6 p-1">';
					if($link=='file'){
						$html .= $arquivo;
					}
					$html .= $img;
					//echo '<br>img case 4 - i:'.$i.' - columns:'.$columns;
					if($link=='file'){
						$html .= '</a>';
					}
					$html .= '</div>';
				break;
				default:
					$html .= '<div class="col-md-12 col-12 p-1">';
					if($link=='file'){
						$html .= $arquivo;
					}
					$html .= $img;
					//echo '<br>img case default - i:'.$i.' - columns:'.$columns;
					if($link=='file'){
						$html .= '</a>';
					}
					$html .= '</div>';
				break;
			}
			if($i%$columns==0){ //fecha row
				$html .= '</div>';
				//echo '<br>fecha div row';
			}
			$i++;
		}
		if(($i-1)%$columns!=0){ //fecha row
			$html .= '</div>';
			//echo '<br>fecha forçado div row depois do foreach';
		}
		//echo '<br>fim do foreach';
		//exit;
	}
	$html .= '</div>';
    $gallery = ' ***** GALERIA DE IMAGENS ID:'.$ID_POST.' link:'.$link.' columns:'.$columns.'. ***** ';
    $gallery = $html;
    return $gallery;
}