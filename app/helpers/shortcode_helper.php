<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$CI = get_instance();
$CI->load->library("shortcodes");
$CI->shortcodes->add_shortcode('hello','hello_func');
$CI->shortcodes->add_shortcode('video','get_video');
$CI->shortcodes->add_shortcode('caption','hello_func');
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