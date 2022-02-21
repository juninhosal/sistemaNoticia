<?php

class Noticia extends MY_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model("CategoriaModel");
	}

	public function index() {
		if (empty($_SESSION['id'])) {
			redirect('Login');
			exit(0);

		}else{
			$retorno = $this->getErro();
			$dadosTabela = $this->CategoriaModel->getCategoria();
			$this->template->set('title', 'Notícia');
			$this->template->load('portalNoticia', 'noticia/listar', array(
				'dadosTabela' => $dadosTabela,
				'retorno' => $retorno
			) );
		}

	}

	/**
	 * @return void
	 * Função para listar todas as categorias cadastradas
	 */
	public function listar(){
		$this->apenasAjax();
		$params = $this->formatPOSTDataTable();

		$ret = $this->CategoriaModel->lista($params);

		echo json_encode($ret, true);

		exit();
	}

	public function cadastrarCategoria(){
		if (empty($_SESSION['id'])) {
			redirect('Login');
			exit(0);

		}else{
			$retorno = $this->getErro();
			$this->template->set('title', 'Cadastrar Notícia');
			$this->template->load('portalNoticia', 'noticia/cadastrar', array(
				'retorno' => $retorno
			) );
		}
	}

	public function cadastrar() {
		if (empty($_SESSION['id'])) {

			redirect('Login');
			exit(0);

		}else{
			$dadosCategoria = array();
			$i = 0;

			foreach($this->input->post("categoria") AS $keycat => $categoria) {
				$i++;
				if($i === 1) {
					continue;
				}
				$this->form_validation->set_rules("categoria[$keycat]","Categoria", "required|min_length[2]|max_length[250]");

				$dadosCategoria[($i - 1)] = array(
					'nomeCategoria' =>addslashes( $this->input->post("categoria")[$keycat]),
					'idUsuario'     => $_SESSION['id'],
				);
			}
			if($this->form_validation->run() == FALSE) {
				$msg = array(
					"class"     => "danger",
					"msg"  => validation_errors()
				);
				$mensagem = array(
					'msg' => $msg,
					'retorno'=> $dadosCategoria
				);

				$this->setErro($mensagem);

			} else {
				if($this->CategoriaModel->salvarCategoria($dadosCategoria)) {
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
						'retorno'=> $dadosCategoria
					);

					$this->setErro($mensagem);
				}
			}
			redirect('noticia/cadastrarCategoria');
		}
	}

	/**
	 * @param $idCategoria
	 * @return void
	 * Função para deletar Categoria Cadastrada
	 */
	public function deletarCategoria($idCategoria){
		$deletar = $this->CategoriaModel->deletarCategoria($idCategoria);
		if($deletar == TRUE){
			$msg = array(
				"class"     => "success",
				"msg"  => "<strong> Categoria excluida com sucesso! </strong>"
			);
			$mensagem = array(
				'msg' => $msg,
			);

			$this->setErro($mensagem);
			redirect('noticia');
		}
	}

}
