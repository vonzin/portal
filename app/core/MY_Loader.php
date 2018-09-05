<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH . "third_party/MX/Loader.php";

class MY_Loader extends MX_Loader {

    /**
     * Overload no método view, para aceitar layout
     * 
     * @param string $view
     * @param array $vars
     * @param boolean $return
     */
    public function view($view, $vars = array(), $return = FALSE) {

        $conteudo     = parent::view($view, $vars, TRUE);
        $propriedades = get_object_vars($this->controller);

        ob_start();

        echo $this->renderizarLayout($conteudo, $propriedades);

        if ($return === TRUE)
            return ob_get_clean();

        if (ob_get_level() > $this->_ci_ob_level + 1) {
            ob_end_flush();
        }
        else {
            CI::$APP->output->append_output(ob_get_clean());
        }
    }

    /**
     * Gera os links CSS utilizados no layout.
     */
    private function criarLinksCSS() {

        // Pegar lista de CSS passadas pelo Controller
        $css = $this->controller->css;

        // Verificar se possui algum item na lista
        if (count($css) === 0) {
            return;
        }

        // Se caminhos não estão definidos, define pasta raiz do projeto /css
        if (!defined('CSSPATH')) {
            define('CSSPATH', base_url('css') . '/');
        }
        if (!defined('CSSFOLDER')) {
            define('CSSFOLDER', FCPATH . 'css/');
        }

        // Inicia
        $links = [];

        // Para cada css
        foreach ($css as $each_css) {

            // Arquivo CSS direto na pasta, geralmente de algum componente
            $arquivo_css = CSSFOLDER . $each_css . '.css';

            // Se arquivo direto existe então ele carrega
            if (file_exists($arquivo_css)) {
                $links[] = '<link rel="stylesheet" type="text/css" href="' . CSSPATH . $each_css . '.css"/>';
                continue;
            }

            // Link simbólico do CSS de modulo, codificado com MD5 para diferenciar, caso o arquvo seja de módulo
            $arquivo_css_module = CSSFOLDER . md5($this->_module . $each_css) . '.css';

            // Se arquivo do modulo existe, carrega
            if (file_exists($arquivo_css_module)) {
                $links[] = '<link rel="stylesheet" type="text/css" href="' . CSSPATH . md5($this->_module . $each_css) . '.css"/>';
                continue;
            }

            // Se nenhum dos dois existem fazer última busca em pasta 'views/css' tanto do módulo como da views raiz
            $views_path = array_keys($this->controller->load->_ci_view_paths);
            foreach ($views_path as $_view_path) {

                // Pasta do css
                $module_view_css_path = $_view_path . 'css/';

                // Arquivo de css
                $module_view_css_file = $module_view_css_path . $each_css . '.css';

                // Se css não existe
                if (!file_exists($module_view_css_file)) {
                    $link = '<!-- ' . $each_css . '.css não encontrado -->';
                    continue;
                }

                // Criar um link simbólico na pasta /css do projeto
                symlink($module_view_css_file, $arquivo_css_module);

                // Link
                $link = '<link rel="stylesheet" type="text/css" href="' . CSSPATH . md5($this->_module . $each_css) . '.css"/>';
                continue 2;
            }

            $links[] = $link;
        }

        // Tchaubrigado
        return implode(PHP_EOL, $links);
    }

    /**
     * Gera os scripts JS utilizados no layout.
     */
    private function criarScriptsJS() {

        // Pegar lista de JS passadas pelo Controller
        $js = $this->controller->js;

        // Verificar se possui algum item na lista
        if (count($js) === 0) {
            return;
        }

        // Se caminhos não estão definidos, define raiz do projeto /js
        if (!defined('JSPATH')) {
            define('JSPATH', base_url('js') . '/');
        }
        if (!defined('JSFOLDER')) {
            define('JSFOLDER', FCPATH . 'js/');
        }

        // Iniciar variavel de scripts
        $scripts = [];

        // Para cada js
        foreach ($js as $each_js) {

            // Arquivo js direto na pasta, geralmente de algum componente
            $arquivo_js = JSFOLDER . $each_js . '.js';

            // Se arquivo direto existe então ele carrega
            if (file_exists($arquivo_js)) {
                $scripts[] = '<script src="' . JSPATH . $each_js . '.js"></script>';
                continue;
            }

            // Link simbólico do js de modulo, codificado com MD5 para diferenciar, caso o arquvo seja de módulo
            $arquivo_js_module = JSFOLDER . md5($this->_module . $each_js) . '.js';

            // Se arquivo do modulo existe, carrega
            if (file_exists($arquivo_js_module)) {
                $scripts[] = '<script src="' . JSPATH . md5($this->_module . $each_js) . '.js"></script>';
                continue;
            }

            // Se nenhum dos dois existem fazer última busca em pasta 'views/js' tanto do módulo como da views raiz
            $views_path = array_keys($this->controller->load->_ci_view_paths);
            foreach ($views_path as $_view_path) {

                // Pasta do js
                $module_view_js_path = $_view_path . 'js/';

                // Arquivo js
                $module_view_js_file = $module_view_js_path . $each_js . '.js';

                // Se este arquivo não existe
                if (!file_exists($module_view_js_file)) {
                    $script = '<!-- ' . $each_js . '.js não encontrado -->';
                    continue;
                }

                // Criar um link simbólica na pasta raiz do projeto /js
                symlink($module_view_js_file, $arquivo_js_module);

                // Define caminho do script a ser carregado
                $script = '<script src="' . JSPATH . md5($this->_module . $each_js) . '.js"></script>';
                continue 2;
            }
            // Concatenar com a string de scripts
            $scripts[] = $script;
        }

        // Tchaubrigado
        return implode(PHP_EOL, $scripts);
    }

    private function criarMetatags() {
        $metaData = $this->config->item('appConfig')['metaData'];
        $return   = "";
        foreach ($metaData as $name => $content) {
            $return .= '<meta name="' . $name . '" content="' . $content . '">' . PHP_EOL;
        }
        return $return;
    }

    private function renderizarLayout($conteudo, $propriedades) {

        // Pegar layout definido no controller
        $layout = @$this->controller->layout;

        // Caso seja apenas retorne o conteudo
        if ($layout === null) {
            return $conteudo;
        }

        // Caso o caminho para os layouts não esteja definido usar <projeto>/layouts
        if (!defined('LAYOUTPATH')) {
            define('LAYOUTPATH', FCPATH . 'layouts/');
        }

        // Arquivo de layout
        $arquivo = LAYOUTPATH . $layout . '.php';

        // Se arquivo não existe, exibir erro
        if (!file_exists($arquivo)) {
            show_error("Você especificou um layout inválido: " . $layout);
        }

        // Carrregar arquivo de layout
        $layout = parent::file($arquivo, true);

        // Montar lista de css
        $css    = $this->criarLinksCSS();
        $layout = str_replace("{css}", $css, $layout);

        // Verificar se existem scripts dentro da view
        $pattern = "/\<script(.*?)?\>(.|\\n)*?\<\/script\>/i";
        preg_match_all($pattern, $conteudo, $scripts);
        $conteudo = preg_replace($pattern, '', $conteudo);
        $scripts = PHP_EOL . implode(PHP_EOL, $scripts[0]);
        
        //Montar lista de js
        $js     = $this->criarScriptsJS();
        $layout = str_replace("{js}", $js . $scripts, $layout);

        $xajax_js = $this->xajax->getJavascript();
        $layout   = str_replace("{xajax_js}", $xajax_js, $layout);

        $meta   = $this->criarMetatags();
        $layout = str_replace("{meta}", $meta, $layout);

        $titulo_pagina = $propriedades['titulo_pagina'];
        $layout        = str_replace("{titulo_pagina}", $titulo_pagina, $layout);

        $titulo_navbar = $propriedades['titulo_navbar'];
        $layout        = str_replace("{titulo_navbar}", $titulo_navbar, $layout);
        
        if (isset($this->ion_auth)) {
            $menu   = $this->criarMenu();
            $layout = str_replace("{menu}", $menu, $layout);
        }

        // Caso quantidade campos extras seja maior que 0
        if (count($propriedades['campos_extras']) > 0) {
            //Para cada propriedade
            foreach ($propriedades['campos_extras'] as $string_replace => $valor) {
                // Substituir no layout
                $layout = str_replace("{{$string_replace}}", $valor, $layout);
            }
        }

        // Colocar conteudo no layout
        $layout = str_replace('{conteudo}', $conteudo, $layout);

        // Retorna
        return $layout;
    }

    private function criarMenu() {
        $menu      = $this->config->item('appConfig')['menu'];
        $restricao = $this->config->item('appConfig')['restricao'];

        $classes = [
            'ul_pai'   => '',
            'li_pai'   => '',
            'ul_filho' => '',
            'li_filho' => '',
            'ul_neto'  => '',
            'li_neto'  => '',
        ];

        $html = '<ul class="' . $classes['ul_pai'] . '">'; // root

        foreach ($menu as $modulo => $pai) {

            if (!empty($restricao[$modulo]) && !$this->ion_auth->in_group($restricao[$modulo])) {
                continue;
            }

            // Item pai
            $html .= '<li class="' . $classes['li_pai'] . '">';
            $html .= '<a href="#">';
            $html .= '<i class="' . $pai['icone'] . '"></i> ' . $pai['nome'] . ' <i class="fa fa-chevron-down"></i>';
            $html .= '</a>';

            // Lista Filhos
            $filhos = array_filter($pai, 'is_array');
            if (count($filhos) === 0) {
                $html .= '</li>';
                continue;
            }
            $html .= '<ul class="' . $classes['ul_filho'] . '">';
            foreach ($filhos as $controller => $filho) {
                if (!empty($restricao[$modulo][$controller]) && !$this->ion_auth->in_group($restricao[$modulo][$controller])) {
                    continue;
                }

                $html .= '<li class="' . $classes['li_filho'] . '">';

                $netos = array_filter($filho, 'is_array');
                if (count($netos) === 0) {
                    $html .= '<a href="' . site_url($filho['caminho']) . '">';
                    $html .= $filho['nome'];
                    $html .= '</a>';
                    $html .= '</li>';
                    continue;
                }
                else {
                    $html .= '<a href="#">';
                    $html .= $filho['nome'];
                    $html .= '</a>';
                }

                // Lista Netos

                $html .= '<ul class="' . $classes['ul_neto'] . '">';
                foreach ($netos as $metodo => $neto) {
                    if (!empty($restricao[$modulo][$controller][$metodo]) && !$this->ion_auth->in_group($restricao[$modulo][$controller][$metodo])) {
                        continue;
                    }
                    $html .= '<li class="' . $classes['li_neto'] . '">';
                    $html .= '<a href="' . site_url($neto['caminho']) . '">';
                    $html .= $neto['nome'];
                    $html .= '</a>';
                    $html .= '</li>';
                }
                $html .= '</ul>';

                $html .= '</li>';
            }
            $html .= '</ul>';

            $html .= '</li>';
        }

        $html .= '</ul>';

        return $html;
    }

    /*
     * Converte mês em inglês para Português
     * Ex. Entrada: 'April'
     * Ex. Saída: 'Abril'
     */
    public function ENtoPTBR($texto){
        $ptMeses_longo = array('Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
        $enMeses_longo = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $ptMeses_curto = array('Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez');
        $enMeses_curto = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
        $texto = str_replace($enMeses_longo,$ptMeses_longo,$texto);
        $texto = str_replace($enMeses_curto,$ptMeses_curto,$texto);
        $texto = str_replace('ç','Ç',$texto);
        return $texto;
    }

    public function ItensMenu($tipo){
        /*$this->db->where('ativo',true);
        $this->db->where('tipo',$tipo);
        $this->db->where('parent',0);
        $this->db->order_by('ordem','ASC');
        $itens = $this->db->get($this->config->item('banco_base').'.menus')->result_array();*/

        $this->db->where('parent',0);
        $this->db->where('tipo',$tipo);
        $this->db->where('1=1 /* MY_Loader->ItensMenu = menus pai */', NULL, false);
        $this->db->order_by('tipo','ASC');
        $this->db->order_by('ativo','DESC');
        $this->db->order_by('ordem','ASC');
        $this->db->order_by('nome','ASC');
        $resultado = $this->db->get($this->config->item('banco_base').'.menus')->result_array();
        foreach($resultado as $pai){
            $menus[$pai['id_menu']]['id_menu'] = $pai['id_menu'];
            $menus[$pai['id_menu']]['nome'] = $pai['nome'];
            $menus[$pai['id_menu']]['caminho'] = $pai['caminho'];
            $menus[$pai['id_menu']]['target'] = $pai['target'];
            $menus[$pai['id_menu']]['parent'] = $pai['parent'];
        }
        #$this->db->select('id_menu, nome, parent');
        $this->db->where('parent !=',0);
        $this->db->where('tipo',$tipo);
        $this->db->where('1=1 /* MY_Loader->ItensMenu = menus filho */', NULL, false);
        $this->db->order_by('ordem','ASC');
        $this->db->order_by('nome','ASC');
        $resultado = $this->db->get($this->config->item('banco_base').'.menus')->result_array();
        foreach($resultado as $filho){
            $menus[$filho['parent']]['filhos'][$filho['id_menu']]['id_menu'] = $filho['id_menu'];
            $menus[$filho['parent']]['filhos'][$filho['id_menu']]['nome'] = $filho['nome'];
            $menus[$filho['parent']]['filhos'][$filho['id_menu']]['caminho'] = $filho['caminho'];
            $menus[$filho['parent']]['filhos'][$filho['id_menu']]['target'] = $filho['target'];
            $menus[$filho['parent']]['filhos'][$filho['id_menu']]['parent'] = $filho['parent'];
        }
        $i = 0;
//echo '<pre>';print_r($menus);exit;
        foreach($menus as $cat){
            $res[$i]['id_menu'] = $cat['id_menu'];
            $res[$i]['nome'] = $cat['nome'];
            $res[$i]['caminho'] = $cat['caminho'];
            $res[$i]['target'] = $cat['target'];
            $res[$i]['parent'] = $cat['parent'];
            $i++;
            if(isset($cat['filhos'])){
                foreach($cat['filhos'] as $filho){
                    $res[$i]['id_menu'] = $filho['id_menu'];
                    $res[$i]['nome'] = $filho['nome'];
                    $res[$i]['caminho'] = $filho['caminho'];
                    $res[$i]['target'] = $filho['target'];
                    $res[$i]['parent'] = $filho['parent'];
                    $i++;
                }
            }
        }
        return $res;

        return $itens;
    }

    public function homeDestaques($quantidade){
        $this->db->select('id_destaque, target, imagem_destaque');
        $this->db->group_start();
        $this->db->where('CURRENT_TIMESTAMP BETWEEN data_inicio AND data_final', '',false);
        $this->db->group_end();
        $this->db->where('1=1 /* MY_Loader->homeDestaques destaques da home*/', NULL, false);
        //$this->db->limit($quantidade);
        return $this->db->get($this->config->item('banco_base').'.destaques')->result_array();
    }

    public function homeNoticias($quantidade){
        $this->db->select("noticias.*, TO_CHAR(post_data, 'YYYY-MM-DD HH:MI:SS') AS post_data");
        $this->db->where('post_status','true');
        $this->db->where('post_publicado','true');
        $this->db->where('1=1 /* MY_Loader->homeNoticias noticias da home*/', NULL, false);
        $this->db->order_by('noticias.post_programado','DESC');
        $this->db->limit($quantidade);
        return $this->db->get($this->config->item('banco_base').'.noticias')->result_array();
    }

}
