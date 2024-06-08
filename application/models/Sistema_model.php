<?php
class Sistema_model extends CI_Model
{
    /**
     * author: Rodrigo Junior
     * email: rodrigojrdev@gmail.com
     *
     */

    public function __construct()
    {
        parent::__construct();
    }

    public function get($table, $fields, $where = '', $perpage = 0, $start = 0, $one = false, $array = 'array')
    {
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->limit($perpage, $start);
        if ($where) {
            $this->db->where($where);
        }

        $query = $this->db->get();

        $result = !$one ? $query->result() : $query->row();
        return $result;
    }

    public function getById($id)
    {
        $this->db->from('administracao');
        $this->db->select('administracao.*, permissoes.nome as permissao');
        $this->db->join('permissoes', 'permissoes.idPermissao = administracao.permissoes_id', 'left');
        $this->db->where('id', $id);
        $this->db->limit(1);
        return $this->db->get()->row();
    }


    public function add($table, $data)
    {
        $this->db->insert($table, $data);
        if ($this->db->affected_rows() == '1') {
            return true;
        }

        return false;
    }

    public function edit($table, $data, $fieldID, $ID)
    {
        $this->db->where($fieldID, $ID);
        $this->db->update($table, $data);

        if ($this->db->affected_rows() >= 0) {
            return true;
        }

        return false;
    }

    public function delete($table, $fieldID, $ID)
    {
        $this->db->where($fieldID, $ID);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1') {
            return true;
        }

        return false;
    }

    public function count($table)
    {
        return $this->db->count_all($table);
    }

    public function getAdminSistema($email)
    {
        $this->db->where('email', $email);
        $this->db->where('excluido', 0);
        $this->db->limit(1);
        return $this->db->get('administracao')->row_array();
    }

	public function tentativasLogin($id, $tentativas, $ip) {
		$this->db->set('tentativas_login', $tentativas);
		$this->db->set('ip_tentativa_login', $ip);
		$this->db->where('id', $id);
		$this->db->update('administracao');
	}

    /**
     * Salvar configurações do sistema
     * @param array $data
     * @return boolean
     */
    public function saveConfiguracao($data)
    {
        try {
            foreach ($data as $key => $valor) {
                $this->db->set('valor', $valor);
                $this->db->where('config', $key);
                $this->db->update('configuracoes');
            }
        } catch (Exception $e) {
            return false;
        }
        return true;
    }
}
