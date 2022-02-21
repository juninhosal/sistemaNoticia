<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoriaModel extends MY_Model {

	public function __construct() {
		parent::__construct();
	}


	/**
	 * @return mixed
	 * Função para pegar todas as categorias cadastradas
	 */
	public function getCategorias(){
		$ret = $this->db->query("
		 SELECT 
		 	 idCategoria
		 	,nomeCategoria
		 FROM
			categoria
		")->result_array();

		return ($ret);
	}


	/**
	 * @param $idCategoria
	 * @return mixed
	 * Função para alterar a categoria
	 */
	public function getAlterarCategoria($idCategoria){
		$ret = $this->db->query("
		 SELECT 
		 	 idCategoria
		 	,nomeCategoria
		 FROM
			categoria
		WHERE 
			idCategoria = '$idCategoria'
		")->result_array();

		return ($ret);
	}

	/**
	 * @param $idCategoria
	 * @return void
	 * Função para deletar a categora selecionada
	 */
	public function deletarCategoria($idCategoria){
		$this->db->trans_begin();
		$this->db->where('idCategoria', $idCategoria);
		$this->db->delete('categoria');
		if($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			$ret = FALSE;
		} else {
			$this->db->trans_commit();
			$ret = TRUE;
		}
		return $ret;
	}

	/**
	 * @param $categoria
	 * @return bool
	 */
	public function salvarCategoria($categoria) {

		$this->db->trans_begin();
		// faz um foreach para percorrer registro por registro e inserindo no banco
		foreach(!empty($categoria) ? $categoria : array() AS $key => $item) {
			$this->db->insert("categoria", $item);
		}
		if($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			return FALSE;
		} else {
			$this->db->trans_commit();
			return TRUE;
		}

	}
}
