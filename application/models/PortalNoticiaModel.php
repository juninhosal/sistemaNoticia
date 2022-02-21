<?php

class PortalNoticiaModel extends MY_Model {

	public function __construct() {
		parent::__construct();
	}

	/**
	 * @return mixed
	 */
	public function getUltimasCategorias(){
		$ret = $this->db->query("
		 SELECT 
		 	 idCategoria
		 	,nomeCategoria
		 FROM
			categoria
		 ORDER BY
		 	idCategoria
		 DESC
		 LIMIT 5
		")->result_array();

		return ($ret);
	}

	/**
	 * @return mixed
	 */
	public function getUltimasNoticias(){
		$ret = $this->db->query("
		 SELECT 
		 	 idNoticia
		 	,nome
		 	,descricao
		 FROM
			noticia
		 ORDER BY
		 	idCategoria
		 DESC
		 LIMIT 5
		")->result_array();

		return ($ret);
	}

	public function getNoticiaPorCategoria($idCategoria){
		$ret = $this->db->query("
		 SELECT 
		 	 idNoticia
		 	,nome
		 	,descricao
		 FROM
			noticia
		 WHERE 
		 idNoticia = '$idCategoria'
		")->result_array();

		return ($ret);
	}

	public function getNoticiaPorNome($busca){
		$ret = $this->db->query("
		 SELECT 
		 	 idNoticia
		 	,nome
		 	,descricao
		 FROM
			noticia
		 WHERE 
		 nome like '%$busca%'
		")->result_array();

		return ($ret);
	}

}
