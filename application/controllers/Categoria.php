<?php

class Categoria extends MY_Controller{

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
			$dadosTabela = $this->CategoriaModel->getCategorias();
			$this->template->set('title', 'Categoria');
			$this->template->load('portalNoticia', 'categoria/listar', array(
				'dadosTabela' => $dadosTabela,
				'retorno' => $retorno
			) );
		}

	}

	/**
	 * @return void
	 * Tela de cadastro de categoria
	 */
	public function cadastrarCategoria(){
		if (empty($_SESSION['id'])) {
			redirect('Login');
			exit(0);
		}else{
			$retorno = $this->getErro();
			$this->template->set('title', 'Cadastrar Categoria');
			$this->template->load('portalNoticia', 'categoria/cadastrar', array(
				'retorno' => $retorno
			) );
		}
	}

	/**
	 * @return void
	 * requisição para adicionar as categorias cadastrada
	 */
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
			redirect('Categoria/cadastrarCategoria');
		}
	}

	/**
	 * @param $idCategoria
	 * @return void
	 * Função para deletar Categoria
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
			redirect('Categoria');
		}
	}

}
