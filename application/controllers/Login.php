<?php

class Login extends MY_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model("LoginModel");
	}

	public function index() {
		$retorno = $this->getErro();
		$this->load->view('login/login',array('retorno' => $retorno));
	}

	/**
	 * @Method logar
	 * Criptografa a senha em whirlpool e compara ela com a senha e o usuario no banco
	 * caso seja verdadeiro faz o login caso for falso mostra uma mensagem de erro
	 * caso não tenha nenhuma informação mostar uma mensagem de alerta
	 */

	public function logar() {
		@session_start();
		$usuario = addslashes($this->input->post("username"));
		$senha = addslashes($this->input->post("password"));
		$senhaCrip = hash('whirlpool', $senha);

		if (!empty($usuario) && !empty($senha)) {

			$usuario = $this->LoginModel->UsuarioExists($usuario, $senhaCrip);

			if (!empty($usuario)) {
				$_SESSION['id'] = $usuario["idUsuario"];
				$_SESSION['user'] = $usuario["username"];

				redirect('Categoria');
			} else {
				$msg = array(
					"class"     => "danger",
					"msg"  => "<strong> Usuário ou Senha, inválido! Por Favor, verifique suas informações e tente novamente. </strong>"
				);
				$mensagem = array(
					'msg' => $msg,
				);

				$this->setErro($mensagem);
			}
		} else {
			$msg = array(
				"class"     => "warning",
				"msg"  => "<strong> Usuário ou Senha não especificado! </strong>"
			);
			$mensagem = array(
				'msg' => $msg,
			);

			$this->setErro($mensagem);
		}
		redirect('Login');
		exit(0);

	}

}
