<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();

        defined("VERSION_EXT") OR define("VERSION_EXT", dataAgoraFormatada("?Y-m"));
        $this->load->model('MY_Model');
    }

    //ERROS
    public function erro401(){
        $btn = $this->buttonNameError();
        $this->load->view(
            "errors/html/error_404", array (
                'heading'      => '401',
                'shortMessage' => 'Não Autorizado',
                'message'      => 'Autorização não encontrada.',
                'btn'          => $btn
            )
        );
        exit(0);
    }

    public function erro404(){
        $btn = $this->buttonNameError();
        $this->load->view(
            "errors/html/error_404", array (
                'heading'      => '404',
                'shortMessage' => 'Página Não Encontrada',
                'message'      => 'A página requisitada não existe.',
                'btn'          => $btn
            )
        );
        exit(0);
    }

    public function erro505(){
        $btn = $this->buttonNameError();
        $this->load->view(
            "errors/html/error_404", array (
                'heading'      => '505',
                'shortMessage' => 'Versão JS Não Encontrada',
                'message'      => 'O JS pode estar desativado em seu navegador.',
                'btn'          => $btn
            )
        );
        exit(0);
    }

    private function buttonNameError(){
        if(!empty($this->data['idUsuario'])) return 'Página inicial';
        return 'Login';
    }
    //ERROS

	//USO DE SESSÃO PARA CONTROLES DE ERROS
	public function setErro($data)
	{
		$this->session->set_userdata('flashData', json_encode($data));
	}

	public function getErro()
	{
		$ret = json_decode($this->session->userdata('flashData'), TRUE);
		$this->session->unset_userdata('flashData');
		return $ret;
	}

	protected function apenasAjax(){
		if(
			!(
				!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
				strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
			)
		) {
			return FALSE;
		}
		return TRUE;
	}
}
