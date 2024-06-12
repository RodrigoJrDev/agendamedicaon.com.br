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

	public function get_all()
	{
		$this->db->from('especialidades_disponiveis');
		$this->db->select('especialidades_disponiveis.*');
		return $this->db->get()->result();
	}

	public function getEspecialidadesComNome()
	{
		$this->db->select('especialidades.id, especialidades_disponiveis.nome, especialidades.id_medico');
		$this->db->from('especialidades');
		$this->db->join('especialidades_disponiveis', 'especialidades_disponiveis.id = especialidades.nome');
		$this->db->group_by('especialidades_disponiveis.nome, especialidades.id');

		$especialidades = $this->db->get()->result();

		$especialidadesDisponiveis = array();

		foreach ($especialidades as $especialidade) {
			$this->db->select('horarios_disponiveis.*');
			$this->db->from('horarios_disponiveis');
			$this->db->where('horarios_disponiveis.id_medico', $especialidade->id_medico);
			$this->db->where('horarios_disponiveis.disponivel', 1);
			$this->db->where('horarios_disponiveis.data_disponivel >=', date('Y-m-d'));
			$query = $this->db->get();

			if ($query->num_rows() > 0) {
				$especialidadesDisponiveis[] = $especialidade;
			}
		}

		return $especialidadesDisponiveis;
	}
}
