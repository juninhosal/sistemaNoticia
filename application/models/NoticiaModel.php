<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NoticiaModel extends MY_Model {

	public function __construct() {
		parent::__construct();
	}

	/**
	 * @param $dadosNoticia
	 * @return bool
	 */
	public function salvarNoticia($dadosNoticia, $idNoticia) {
		$this->db->trans_begin();
		if(!empty($idNoticia)){
			$this->db->set("nome", $dadosNoticia['nome']);
			$this->db->set("descricao", $dadosNoticia['descricao']);
			$this->db->set("idCategoria", $dadosNoticia['idCategoria']);
			$this->db->where("idNoticia", $idNoticia);
			$this->db->update("noticia");
		}else {
			$this->db->insert("noticia", $dadosNoticia);
		}
		if($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			return FALSE;
		} else {
			$this->db->trans_commit();
			return TRUE;
		}

	}

	/**
	 * @return mixed
	 * Função para pegar todas as categorias cadastradas
	 */
	public function getNoticias(){
		$ret = $this->db->query("
		 SELECT 
		 	 idNoticia
		 	,idCategoria
		 	,nome
		 	,descricao
		 FROM
			noticia
		")->result_array();

		return ($ret);
	}

	/**
	 * @return mixed
	 * Função para pegar todas as categorias cadastradas
	 */
	public function getNoticia($idNoticia){
		$ret = $this->db->query("
		 SELECT 
		 	 idNoticia
		 	,idCategoria
		 	,nome
		 	,descricao
		 FROM
			noticia
		WHERE 
		 idNoticia = '$idNoticia'
		")->result_array();
		return ($ret);
	}

	/**
	 * @param $idNoticia
	 * @return bool
	 */
	public function deletarNoticia($idNoticia){
		$this->db->trans_begin();
		$this->db->where('idNoticia', $idNoticia);
		$this->db->delete('noticia');
		if($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			$ret = FALSE;
		} else {
			$this->db->trans_commit();
			$ret = TRUE;
		}
		return $ret;
	}

}
