<?php

class Login extends MY_Controller{


	public function index() {
		$this->load->view('login/login');
	}

	/**
	 * @Method logar
	 * Criptografa a senha em whirlpool e compara ela com a senha e o usuario no banco
	 * caso seja verdadeiro faz o login caso for falso mostra uma mensagem de erro
	 * caso não tenha nenhuma informação mostar uma mensagem de alerta
	 */

	public function logar() {
		if (!empty($_SESSION['id'])) {

			redirect('Login');
			exit(0);

		}
		$_SESSION['login']['msg'] = null;
		$_SESSION['login']['tipo'] = null;
		@session_start();
		$usuario = addslashes($this->input->post("username"));
		$senha = addslashes($this->input->post("password"));
		$senhaCrip = hash('whirlpool', $senha);

		if (!empty($usuario) && !empty($senha)) {

			$usuario = $this->BancoModel->UsuarioExists($usuario, $senhaCrip);

			if (!empty($usuario)) {
				$_SESSION['id'] = $usuario->idUsuario;
				$_SESSION['user'] = $usuario->login;
				redirect('Login');
				exit(0);
			} else {
				$_SESSION['login'] = array(
					'tipo' => "danger",
					'msg' => "Usuário ou Senha, inválido! Por Favor, verifique suas informações e tente novamente.",
				);
			}
		} else {
			$_SESSION['login'] = array(
				'tipo' => "warning",
				'msg' => "Usuário ou Senha não especificado.",
			);
		}


		redirect('Login');
		exit(0);

	}

}
