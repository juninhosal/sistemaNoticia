<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoriaModel extends MY_Model {

	public function __construct() {
		parent::__construct();
	}


	/**
	 * @return mixed
	 * Função para pegar todas as categorias cadastradas
	 */
	public function getCategoria(){
		$ret = $this->db->query("
		 SELECT 
		 	 idCategoria
		 	,nomeCategoria
		 FROM
			categoria
		")->result_array();

		return ($ret);
	}

	/**
	 * @param $idCategoria
	 * @return void
	 * Função para deletar a categora selecionada
	 */
	public function deletarCategoria($idCategoria){
		$this->db->trans_begin();
		$this->db->where('idCategoria', $idCategoria);
		$this->db->delete('categoria');
		if($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			$ret = FALSE;
		} else {
			$this->db->trans_commit();
			$ret = TRUE;
		}
		return $ret;
	}

	public function salvarCategoria($categoria) {

		$this->db->trans_begin();
		// faz um foreach para percorrer registro por registro e inserindo no banco
		foreach(!empty($categoria) ? $categoria : array() AS $key => $item) {
			$this->db->insert("categoria", $item);
		}
		if($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			return FALSE;
		} else {
			$this->db->trans_commit();
			return TRUE;
		}

	}

	public function fdsafs($params = array()) {
		$ret = array(
			"draw" => !empty($params['draw']) ? ((int)$params['draw']) : 0,
			"recordsTotal" => 0,
			"recordsFiltered" => 0,
			"data" => array(),
		);
		if(empty($params))
			$params = array();
		if(empty($params['idRegistro']))
			$params['idRegistro'] = null;
		if(empty($params['formatoDate']))
			$params['formatoDate'] = null;
		if(empty($params['formatoDateTime']))
			$params['formatoDateTime'] = null;
		if(empty($params['noLimit']))
			$params['noLimit'] = FALSE;
		else                          $params['noLimit'] = TRUE;
		if(empty($params['returnOnlyOne']))
			$params['returnOnlyOne'] = FALSE;
		else                                $params['returnOnlyOne'] = TRUE;

		$select = " SELECT
                         cat.idCategoria,
                        ,cat.nomeCategoria";
		$from = " FROM
                    categoria AS cat";
		$selectCountInner = " SELECT COUNT(per.idPermissoes) AS contador " . $from;


		$params['searchText'] = "";
		foreach((!empty($params['search']) ? $params['search'] : array()) AS $searchs) {
			foreach($searchs['pesquisa'] AS $search) {
				if(!empty($params['searchText'])) {
					$params['searchText'] .= " OR ( ";
				} else {
					$params['searchText'] .= " ( ";
				}

				if($searchs['coluna'] === "idCategoria") {
					if($search['regex']) {
						$params['searchText'] .= " cat.idCategoria REGEXP '" . $search['valor'] . "' ";
					} else {
						$params['searchText'] .= " UPPER(cat.idCategoria) LIKE UPPER('%" . $search['valor'] . "%') ";
					}
				} elseif($searchs['coluna'] === "nomeCategoria") {
					if($search['regex']) {
						$params['searchText'] .= " cat.nomeCategoria REGEXP '" . $search['valor'] . "' ";
					} else {
						$params['searchText'] .= " UPPER(cat.nomeCategoria) LIKE UPPER('%" . $search['valor'] . "%') ";
					}
				} else {
					$params['searchText'] .= " 1 = 0 ";
				}
				$params['searchText'] .= " ) ";
				unset($search);
			}
			unset($searchs);
		}
		if(!empty($params['searchText']))
			$params['searchText'] = " ( " . $params['searchText'] . " ) " . " AND ";
		$params['searchText'] .= " 1 = 1 ";
		if($params['idRegistro'] !== NULL)
			$params['searchText'] .= " AND cat.idCategoria = '" . $params['idRegistro'] . "' ";
		$selectCountInner .= $params['searchText'];

		$from .= " INNER JOIN ( $selectCountInner ) AS countReg ON 1 = 1 ";
		$select .= " , countReg.contador AS qtdRegistros ";
		$select .= " " . $from;

		$params['orderText'] = "";
		foreach((!empty($params['order']) ? $params['order'] : array()) AS $ordem) {
			if(!empty($params['orderText']))
				$params['orderText'] .= ", ";

			if($ordem['coluna'] === "idCategoria") {
				$params['orderText'] .= " cat.idCategoria " . $ordem['ordem'];
			} elseif($ordem['coluna'] === "nomeCategoria") {
				$params['orderText'] .= " cat.nomeCategoria " . $ordem['ordem'];
			}

			unset($ordem);
		}
		if(!empty($params['orderText']))
			$select .= " ORDER BY " . $params['orderText'];

		if($params['returnOnlyOne']) {
			$select .= " LIMIT 1 ";
		} else {
			if(!$params['noLimit']) {
				if(!empty($params['startLimit']) && !empty($params['linhasPorPagina'])) {
					$select .= " LIMIT " . $params['startLimit'] . ", " . $params['linhasPorPagina'] . " ";
				} elseif(!empty($params['linhasPorPagina'])) {
					$select .= " LIMIT " . $params['linhasPorPagina'] . " ";
				}
			}
		}

		$result = $this->db->query($select);
		if($result->num_rows()) {
			$ret['recordsTotal'] = 0;
			if($params['returnOnlyOne']) {
				$ret['data'] = $this->db->query($select)->result_array();
				$ret['recordsTotal'] = $ret['data']['qtdRegistros'];
			}else{
				$ret['data'] = $result->result_array();
				$ret['recordsTotal'] = $ret['data'][0]['qtdRegistros'];
			}
			foreach ($ret['data'] AS $key => $registro){
				$ret['data'][$key]['acoes'] = '
                    <div style="display: inline-block">
                        <button type="button" class="btn btn-danger btn-sm excluir" data-url="' . site_url('extranet/Permissao/reqExcluir') . '"
                                data-id="' . $registro['idCategoria'] . '" style="margin-left: 50%">
                        <i class="fa fa-times" aria-hidden="true"></i></button>
                    </div>
                    <script>acaoExcluir();</script>';
				$ret['data'][$key]['acoes'] .= '
                    <div style="display: inline-block">
                        <a href="' . site_url("extranet/Permissao/editarPermissao/" . $registro['idCategoria']) . '" type="button" class="btn btn-warning btn-sm editar"                                 style="margin-left: 50%">
                        <i class="fa fa-pencil" aria-hidden="true"></i></a>
                    </div>';
			}
			$ret['recordsFiltered'] = $ret['recordsTotal'];
		}

		return $ret;
	}
}
