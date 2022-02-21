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

	public function NoticiaCategoria($idCategoria = null){
		$busca = addslashes( $this->input->post("search"));
		$categoria 			= $this->CategoriaModel->getCategorias();
		$ultimasCategorias	= $this->PortalNoticiaModel->getUltimasCategorias();
		$ultimasNoticias 	= $this->PortalNoticiaModel->getUltimasNoticias();
		if(!empty($busca)){
			$noticiaCategoria 	= $this->PortalNoticiaModel->getNoticiaPorNome($busca);
		}else{
			$noticiaCategoria 	= $this->PortalNoticiaModel->getNoticiaPorCategoria($idCategoria);
		}

		if(empty($noticiaCategoria)){
			$noticiaCategoria[0] = array(
				'nome' => "Noticia não encontrada",
				'descricao' => "Noticia não encontrada com a palavra pesquisada, por favor, tentar novamente!"

			);
		}

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
