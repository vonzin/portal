<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Destaques extends MY_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('portal/Destaquesbd');
    }

    public function index($id_destaque){
        $destaque = $this->Destaquesbd->item((int)$id_destaque);
        if($destaque!==false){
            if($destaque['tipo']=='noticia'){
                $noticia = $this->Destaquesbd->noticia($destaque['id_referencia']);
                //echo '<pre>';print_r($noticia);exit;
                if($pagina!==false){
                    $timeZone = new DateTimeZone('UTC');
                    $post_data = DateTime::createFromFormat('Y-m-d', $noticia['post_data'], $timeZone);
                    redirect(base_url($post_data->format('Y\/m\/d\/').$noticia['post_url'].'\/'));
                }
            }elseif($destaque['tipo']=='pagina'){
                $pagina = $this->Destaquesbd->pagina($destaque['id_referencia']);
                //echo '<pre>';print_r($pagina);exit;
                if($pagina!==false){
                    redirect(base_url($pagina));
                }
            }
        }
        redirect('404');
        exit;
    }
}
