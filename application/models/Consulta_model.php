<?php
class Consulta_model extends CI_Model
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
		$this->db->from('medicos');
		$this->db->select('medicos.*');
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


	public function get_total_consultas_feitas($id_medico)
	{
		$this->db->where('id_medico', $id_medico);
		$this->db->where('status', 'feita');
		$this->db->from('consultas');
		return $this->db->count_all_results();
	}

	public function get_total_consultas_canceladas($id_medico)
	{
		$this->db->where('id_medico', $id_medico);
		$this->db->where('status', 'cancelada');
		$this->db->from('consultas');
		return $this->db->count_all_results();
	}

	public function get_proxima_consulta($id_medico)
	{
		$this->db->where('id_medico', $id_medico);
		$this->db->where('data_consulta >=', date('Y-m-d H:i:s'));
		$this->db->order_by('data_consulta', 'ASC');
		$query = $this->db->get('consultas', 1);
		return $query->row();
	}
}
