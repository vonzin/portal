<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias extends MY_Controller {

    public $css = ['nutead'];
    public $layout = 'portal/noticias';
    public $dados;

    public function __construct() {

        parent::__construct();
        $this->load->model('portal/Noticiasbd');
    }

    public function index($pagina = null) {
        $resultado = $this->Noticiasbd->listagem((int)$pagina);
        $this->dados['noticias'] = $resultado['noticias'];
        //echo'<pre>';print_r($resultado['paginacao']);exit;

        $this->dados['paginacao'] = $this->paginacao('noticias',$resultado['paginacao']['total']);

        $this->load->view('index', $this->dados);
    }

    public function noticia($ano = null, $mes = null, $dia = null, $url = null){
        $this->layout = 'portal/noticia';
        $busca = array('data'=>$ano.'-'.$mes.'-'.$dia, 'post_url'=>$url);
        $noticia = $this->Noticiasbd->noticia($busca);
        if($noticia===false){
            //redirect('404');
            show_404();
        }
        global $ID_POST;
        $ID_POST = $noticia['id_post'];
        $noticia['post_conteudo'] = $this->shortcodes->do_shortcode($noticia['post_conteudo']);
        $this->dados['noticia'] = $noticia;

        $this->dados['anterior'] = $this->Noticiasbd->anterior($noticia['post_programado']);
    	$this->dados['proxima'] = $this->Noticiasbd->proxima($noticia['post_programado']);
    	//echo'<pre>';print_r($this->dados['proxima']);exit;
    	$this->load->view('index',$this->dados);
    }
}
