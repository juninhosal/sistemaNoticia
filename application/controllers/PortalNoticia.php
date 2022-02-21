<?php

class PortalNoticia extends MY_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model("CategoriaModel");
	}

	public function index() {
		$categoria = $this->CategoriaModel->getCategorias();
		$ultimasCategorias = $this->CategoriaModel->getUltimasCategorias();
		$this->load->view('portalNoticia/noticia',array(
			'categoria' => $categoria,
			'ultimasCategorias' => $ultimasCategorias
		));
	}


}
