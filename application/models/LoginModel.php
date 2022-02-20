<?php

class LoginModel extends MY_Model {

	/**
	 * @Method retornarIdGrupo
	 * @param array $usuario , $senhaCrip verificar o usuario e senha cadastrado no banco
	 * verifica se o usuario que esta logando existe no banco de dados e se sua senha corresponde ao usuario
	 * @return mixed
	 */
	public function usuarioExists($usuario, $senhaCrip = null) {


		$this->db->select(array(

			'idUsuario', 'login'));

		$this->db->from('usuario');
		$this->db->where('login', $usuario);
		if (!empty($senhaCrip)) {
			$this->db->where('senha', $senhaCrip);
		}
		$query = $this->db->get();
		$ret = $query->row();
		return ($ret);
	}


}
