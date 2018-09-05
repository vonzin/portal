<?php
class Paginasbd extends CI_Model {

	public function pagina($pai, $filho = null){
		$paiR = array('id_pagina'=>0);
		if(!is_null($filho)){
			//verifica se o slug pai bate com o parent do filho
			$this->db->select('id_pagina, post_titulo');
			$this->db->where('post_url',$pai);
			$this->db->where('1=1 /* Paginasbd->pagina verifica pai */', NULL, false);
			$paiR = $this->db->get($this->config->item('banco_base').'.paginas')->row_array();
			if($paiR['id_pagina']==0){
				return false;
			}
			$this->db->where('post_url',$filho);
			if($paiR['id_pagina']>0){
				$this->db->where('post_parent',$paiR['id_pagina']);
			}
			$this->db->where('1=1 /* Paginasbd->pagina traz dados filho */', NULL, false);
			$resultado = $this->db->get($this->config->item('banco_base').'.paginas');
			if($resultado->num_rows()>0){
				$pagina = $resultado->row_array();
				$pagina['post_titulo_pai'] = ($paiR['post_titulo']!=''?$paiR['post_titulo']:'');
				$pagina['post_pai'] = true;
				return $pagina;
			}
		}
		$this->db->where('post_url',$pai);
		$this->db->where('1=1 /* Paginasbd->pagina traz dados pai */', NULL, false);
		$resultado = $this->db->get($this->config->item('banco_base').'.paginas');
		if($resultado->num_rows()>0){
			$pagina = $resultado->row_array();
			$pagina['post_pai'] = false;
			return $pagina;
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