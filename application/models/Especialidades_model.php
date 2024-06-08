<?php
class Especialidades_model extends CI_Model
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

	public function get($table, $fields, $where = '', $limit = '', $one = false, $array = 'array')
	{
		$this->db->select($fields);
		$this->db->from($table);
		$this->db->limit($limit ? $limit : null);
		if ($where) {
			$this->db->where($where);
		}

		$query = $this->db->get();

		$result = !$one ? $query->result_array() : $query->row();
		return $result;
	}

	public function getById($id)
	{
		$this->db->from('especialidades');
		$this->db->select('especialidades.*');
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

	public function searchEspecialidades($term)
	{
		if ($term) {
			$this->db->like('nome', $term);
		}
		$query = $this->db->get('especialidades_disponiveis');
		return $query->result();
	}
}
