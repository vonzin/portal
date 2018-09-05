<?php
class Destaquesbd extends CI_Model {

	public function item($id_destaque=null){
		$this->db->select('tipo, id_referencia, cliques');
		$this->db->where('id_destaque',$id_destaque);
		$destaque = $this->db->get($this->config->item('banco_base').'.destaques');
		if($destaque->num_rows()>0){
			$destaque = $destaque->row_array();
			$this->db->where('id_destaque',$id_destaque);
			$this->db->set('cliques',($destaque['cliques']+1));
			$this->db->update($this->config->item('banco_base').'.destaques');
			return $destaque;
		}
		return false;
	}

	public function noticia($id_referencia){
		$this->db->select('post_url, TO_CHAR(post_data,\'YYYY-MM-DD\') AS post_data');
		$this->db->where('id_post',$id_referencia);
		$this->db->where('post_status','true');
		$this->db->where('post_publicado','true');
		$resultado = $this->db->get($this->config->item('banco_base').'.noticias');
		if($resultado->num_rows()>0){
			return $resultado->row_array();
		}
		return false;
	}

	public function pagina($id_referencia){
		//verifica se tem parent
		$this->db->select('post_url, post_parent');
		$this->db->where('id_pagina',$id_referencia);
		$this->db->where('post_status','true');
		$this->db->where('post_publicado','true');
		$resultado = $this->db->get($this->config->item('banco_base').'.paginas');
		if($resultado->num_rows()>0){
			$pagina = $resultado->row_array();
			if($pagina['post_parent']==0){ //não tem pai, é pai
				return $resultado['post_url'];
			} //tem pai
			$filho = $pagina['post_url'];
			$this->db->select('post_url');
			$this->db->where('id_pagina',$pagina['post_parent']);
			$this->db->where('post_status','true');
			$this->db->where('post_publicado','true');
			$resultado = $this->db->get($this->config->item('banco_base').'.paginas');
			if($resultado->num_rows()>0){
				return $resultado->row('post_url').'/'.$filho;
			}
		}
		return false;
	}
}