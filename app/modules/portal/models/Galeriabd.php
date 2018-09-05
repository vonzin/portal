<?php
class Galeriabd extends CI_Model {

	public function listagem($id_post = null){
		$this->db->select('titulo, caminho');
		$this->db->where('post_parent',$id_post);
		$galeria = $this->db->get($this->config->item('banco_base').'.galeria')->result_array();
		return $galeria;
	}
}