<?php

class PortalNoticia extends MY_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model("CategoriaModel");
		$this->load->model("PortalNoticiaModel");
	}

	public function index() {
		$categoria 			= $this->CategoriaModel->getCategorias();
		$ultimasCategorias	= $this->PortalNoticiaModel->getUltimasCategorias();
		$ultimasNoticias 	= $this->PortalNoticiaModel->getUltimasNoticias();

		$this->template->load('default','portalNoticia/noticia',array(
			'categoria' 		=> $categoria,
			'ultimasCategorias' => $ultimasCategorias,
			'ultimasNoticias' 	=> $ultimasNoticias
		));
	}

	public function NoticiaCategoria($idCategoria){
		$categoria 			= $this->CategoriaModel->getCategorias();
		$ultimasCategorias	= $this->PortalNoticiaModel->getUltimasCategorias();
		$ultimasNoticias 	= $this->PortalNoticiaModel->getUltimasNoticias();
		$noticiaCategoria 	= $this->PortalNoticiaModel->getNoticiaPorCategoria($idCategoria);

		$this->template->load('default','portalNoticia/noticiaPorCategoria',array(
			'categoria' 		=> $categoria,
			'ultimasCategorias' => $ultimasCategorias,
			'ultimasNoticias' 	=> $ultimasNoticias,
			'noticiaCategoria' 	=> $noticiaCategoria
		));

	}

	public function FAQ(){
		$categoria 			= $this->CategoriaModel->getCategorias();
		$ultimasCategorias	= $this->PortalNoticiaModel->getUltimasCategorias();
		$ultimasNoticias 	= $this->PortalNoticiaModel->getUltimasNoticias();

		$this->template->load('default','portalNoticia/faq',array(
			'categoria' 		=> $categoria,
			'ultimasCategorias' => $ultimasCategorias,
			'ultimasNoticias' 	=> $ultimasNoticias,
		));

	}



}
