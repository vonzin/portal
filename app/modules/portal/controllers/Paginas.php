<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Paginas extends MY_Controller {

    public $css = ['nutead'];
    public $layout = 'portal/pagina';
    public $dados;

    public function __construct() {

        parent::__construct();
    	$this->load->model('portal/Paginasbd');
    }

    public function index($pai = null, $filho = null) {
        $pagina = $this->Paginasbd->pagina($pai, $filho);
        if(!is_array($pagina)){
            //redirect('404');
            show_404();
        }
        global $ID_POST;
        $ID_POST = $pagina['id_pagina'];
        $pagina['post_conteudo'] = $this->shortcodes->do_shortcode($pagina['post_conteudo']);
        $this->dados['pagina'] = $pagina;
        $this->load->view('index', $this->dados);
    }
}
