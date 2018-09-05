<?php
class Noticiasbd extends CI_Model {

	public function listagem($pagina=null){
		$limite = $this->config->item('paginacao_limite_por_pagina');
		if(is_integer($pagina) && $pagina>0){
			$pagina = $pagina - 1;
		}else{
			$pagina = 0;
		}
		$this->db->join($this->config->item('banco_base').'.noticia_categoria nc','nc.id_noticia=noticias.id_post','LEFT');
		$this->db->join($this->config->item('banco_base').'.categorias c','c.id_categoria=nc.id_categoria','LEFT');
		$this->db->where('noticias.post_status','true');
		$this->db->where('noticias.post_publicado','true');
		$this->db->where('1=1 /* Noticiasbd->listagem = conta total */', NULL, false);
		$this->db->from($this->config->item('banco_base').'.noticias');
		$resultado['paginacao']['total'] = $this->db->count_all_results();
		//
		$this->db->select("noticias.*, TO_CHAR(post_data, 'YYYY-MM-DD HH:MI:SS') AS post_data, c.nome AS categoria");
		$this->db->join($this->config->item('banco_base').'.noticia_categoria nc','nc.id_noticia=noticias.id_post','LEFT');
		$this->db->join($this->config->item('banco_base').'.categorias c','c.id_categoria=nc.id_categoria','LEFT');
		$this->db->where('noticias.post_status','true');
		$this->db->where('noticias.post_publicado','true');
		$this->db->where('1=1 /* Noticiasbd->listagem noticias da pagina*/', NULL, false);
		$this->db->order_by('noticias.post_programado','DESC');
		$this->db->limit($limite);
		$this->db->offset($pagina*$limite);
		$noticias = $this->db->get($this->config->item('banco_base').'.noticias')->result_array();
		$resultado['noticias'] = $noticias;
		//echo $this->db->last_query();exit;
		return $resultado;
	}

	public function noticia($busca){
		$this->db->where('noticias.post_url',$busca['post_url']);
		$this->db->where('TO_CHAR(post_data,\'YYYY-MM-DD\')::text LIKE \''.$busca['data'].'\'');
		$this->db->where('1=1 /* Noticiasbd->noticia */', NULL, false);
		$resultado = $this->db->get($this->config->item('banco_base').'.noticias');
		if($resultado->num_rows()>0){
			return $resultado->row_array();
		}
		return false;
	}

	public function anterior($data_atual){
		//SELECT * FROM noticias WHERE post_programado<'2018-04-06 16:12:00' AND post_publicado=true AND post_status=true ORDER BY post_programado DESC LIMIT 1
		$this->db->select('id_post, post_titulo, post_url, TO_CHAR(post_data, \'yyyy-mm-dd\') AS post_data');
		$this->db->where('post_status',true);
		$this->db->where('post_publicado',true);
		$this->db->where('post_programado <',$data_atual);
		$this->db->where('1=1 /* Noticiasbd->anterior */', NULL, false);
		$this->db->order_by('post_programado','DESC');
		$this->db->limit('1');
		$resultado = $this->db->get($this->config->item('banco_base').'.noticias')->row_array();
		if(is_array($resultado) && $resultado['id_post']>0){
			return $resultado;
		}
		return false;
	}

	public function proxima($data_atual){
		//SELECT * FROM noticias WHERE post_programado>'2018-04-06 16:12:00' AND post_publicado=true AND post_status=true LIMIT 1
		$this->db->select('id_post, post_titulo, post_url, TO_CHAR(post_data, \'yyyy-mm-dd\') AS post_data');
		$this->db->where('post_status',true);
		$this->db->where('post_publicado',true);
		$this->db->where('post_programado >',$data_atual);
		$this->db->order_by('post_programado','ASC');
		$this->db->where('1=1 /* Noticiasbd->proxima */', NULL, false);
		$this->db->limit('1');
		$resultado = $this->db->get($this->config->item('banco_base').'.noticias')->row_array();
		if(is_array($resultado) && $resultado['id_post']>0){
			return $resultado;
		}
		return false;
	}
}