<?php

class LoginModel extends MY_Model {

	public function __construct() {
		parent::__construct();
	}

	/**
	 * @Method retornarIdGrupo
	 * @param array $usuario , $senhaCrip verificar o usuario e senha cadastrado no banco
	 * verifica se o usuario que esta logando existe no banco de dados e se sua senha corresponde ao usuario
	 * @return mixed
	 */
	public function usuarioExists($usuario, $senhaCrip = null) {

		$ret = $this->db->query("
		 SELECT 
		 	 idUsuario
		 	,username
		 FROM
			usuario
		 WHERE 
			password = '$senhaCrip'
		")->row_array();

		return ($ret);
	}


}
