<?php

class Noticia extends MY_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model("NoticiaModel");
		$this->load->model("CategoriaModel");
	}

	/**
	 * @return void
	 */
	public function index() {
		if (empty($_SESSION['id'])) {
			redirect('Login');
			exit(0);
		}else{
			$retorno = $this->getErro();
			$dadosTabela = $this->NoticiaModel->getNoticias();
			$this->template->set('title', 'Notícia');
			$this->template->load('portalNoticia', 'noticia/listar', array(
				'dadosTabela' => $dadosTabela,
				'retorno' => $retorno
			) );
		}
	}

	/**
	 * @return void
	 */
	public function cadastrarNoticia($idNoticia = null){
		if (empty($_SESSION['id'])) {
			redirect('Login');
			exit(0);

		}else{
			if(!empty($idNoticia)){
				$dadosNoticia = $this->NoticiaModel->getNoticia($idNoticia);
			}
			$retorno = $this->getErro();
			$dadosSelect= $this->CategoriaModel->getCategorias();
			$this->template->set('title', 'Cadastrar Notícia');
			$this->template->load('portalNoticia', 'noticia/cadastrar', array(
				'retorno' => $retorno,
				'dadosSelect' => $dadosSelect,
				"dadosNoticia" => !empty($dadosNoticia) ? $dadosNoticia : null
			) );
		}
	}

	/**
	 * @return void
	 */
	public function cadastrar($idNoticia = null) {
		if (empty($_SESSION['id'])) {

			redirect('Login');
			exit(0);

		}else{
			$dadosNoticia = array();
				$this->form_validation->set_rules("nome","Nome", "required|min_length[2]|max_length[250]");
				$this->form_validation->set_rules("categoria","Categoria", "required");
				$this->form_validation->set_rules("descricao","Descrição", "required|min_length[2]|max_length[250]");

			$dadosNoticia = array(
					'nome' 			=> addslashes( $this->input->post("nome")),
					'idCategoria' 	=> addslashes( $this->input->post("categoria")),
					'descricao'	 	=> addslashes( $this->input->post("descricao")),
				);
			}
			if($this->form_validation->run() == FALSE) {
				$msg = array(
					"class"     => "danger",
					"msg"  => validation_errors()
				);
				$mensagem = array(
					'msg' => $msg,
					'retorno'=> $dadosNoticia
				);

				$this->setErro($mensagem);

			} else {
				if($this->NoticiaModel->salvarNoticia($dadosNoticia, $idNoticia)) {
					$msg = array(
						"class"     => "success",
						"msg"  => "Cadastro feito com sucesso!"
					);
					$mensagem = array(
						'msg' => $msg,
					);

					$this->setErro($mensagem);
				} else {
					$msg = array(
						"class"     => "danger",
						"msg"  => "Erro interno do banco, entrar em contato com o suporte!"
					);
					$mensagem = array(
						'msg' => $msg,
						'retorno'=> $dadosNoticia
					);

					$this->setErro($mensagem);
				}
			}
			redirect('Noticia/cadastrarNoticia');
		}

	/**
	 * @param $idNoticia
	 * @return void
	 * Função para deletar Categoria Cadastrada
	 */
	public function deletarNoticia($idNoticia){
		$deletar = $this->NoticiaModel->deletarNoticia($idNoticia);
		if($deletar == TRUE){
			$msg = array(
				"class"     => "success",
				"msg"  => "<strong> Noticia excluida com sucesso! </strong>"
			);
			$mensagem = array(
				'msg' => $msg,
			);

			$this->setErro($mensagem);
			redirect('noticia');
		}
	}

}
