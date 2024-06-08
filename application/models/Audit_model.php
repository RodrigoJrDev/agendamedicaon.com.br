<?php
class Audit_model extends CI_Model
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

	public function add($data)
	{
		$this->db->insert('logs', $data);
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
}
