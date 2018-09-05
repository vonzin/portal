<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */

require APPPATH . "third_party/MX/Controller.php";

class MY_Controller extends MX_Controller {

    // Layout do tema (NULL para nenhum)
    public $layout = 'default';
    
    // Lista de CSS para carregar com o load da view
    public $css = [];
    
    // Lista de JS para carregar com o load da view
    public $js = [];
    
    // Título da Página
    public $titulo_pagina = 'Título da Página';
    
    // Título do Nav
    public $titulo_navbar = 'Título da barra de navegação';
    
    // Substituição de campos adicionais no layout
    public $campos_extras = [];

    public function __construct() {
        parent::__construct();
        $this->xajax->configure('javascript URI', base_url() . 'xajax/');
        $this->output->enable_profiler(ENVIRONMENT === 'development');
    }



    public function paginacao($url,$total){
        $this->load->library('pagination');
        $configPag = array();
        $configPag["base_url"] = base_url($url);
        $configPag["total_rows"] = $total;
        $configPag["per_page"] = $this->config->item('paginacao_limite_por_pagina');
        $configPag['use_page_numbers'] = TRUE;
        $configPag['num_links'] = 3;
        $configPag['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $configPag['cur_tag_close'] = '</a></li>';
        $configPag['num_tag_open'] = '';
        $configPag['num_tag_close'] = '';
        $configPag['first_link'] = 'Primeira';
        $configPag['first_tag_open'] = '<li class="page-item">';
        $configPag['first_tag_close'] = '</li>';
        $configPag['prev_link'] = ' <span aria-hidden="true">«</span><span class="sr-only">Anterior</span> ';
        $configPag['prev_tag_open'] = '<li class="page-item">';
        $configPag['prev_tag_close'] = '</li>';
        $configPag['next_link'] = ' <span aria-hidden="true">»</span><span class="sr-only">Próximo</span> ';
        $configPag['next_tag_open'] = '<li class="page-item">';
        $configPag['next_tag_close'] = '</li>';
        $configPag['last_link'] = 'Última';
        $configPag['last_tag_open'] = '<li class="page-item">';
        $configPag['last_tag_close'] = '</li>';
        $configPag['attributes'] = array('class' => 'page-link');
        $configPag['display_pages'] = TRUE;
        $this->pagination->initialize($configPag);
        return $this->pagination->create_links();
    }
}
