<?php
class Horarios_model extends CI_Model
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
		$this->db->from('horarios_disponiveis');
		$this->db->select('horarios_disponiveis.*');
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

	public function get_disponiveis_por_especialidade($especialidadeId)
	{
		$this->db->select('horarios_disponiveis.*');
		$this->db->from('horarios_disponiveis');
		$this->db->join('medicos', 'medicos.id = horarios_disponiveis.id_medico');
		$this->db->join('especialidades', 'especialidades.id_medico = medicos.id');
		$this->db->where('especialidades.id', $especialidadeId);
		$this->db->where('horarios_disponiveis.disponivel', 1);
		$this->db->where('horarios_disponiveis.data_disponivel >=', date('Y-m-d'));
		$query = $this->db->get();
		return $query->result();
	}

	public function get_disponiveis($medicoId)
	{
		$this->db->select('horarios_disponiveis.*');
		$this->db->from('horarios_disponiveis');
		$this->db->where('id_medico', $medicoId);
		$this->db->where('disponivel', 1);
		$this->db->where('data_disponivel >=', date('Y-m-d'));
		$query = $this->db->get();
		return $query->result();
	}

	public function update_disponibilidade($horarioId, $disponivel)
	{
		$this->db->where('id', $horarioId);
		$this->db->update('horarios_disponiveis', array('disponivel' => $disponivel));
	}

	public function get_especialidade($horarioId)
	{
		$this->db->select('especialidades.id');
		$this->db->from('horarios_disponiveis');
		$this->db->join('medicos', 'medicos.id = horarios_disponiveis.id_medico');
		$this->db->join('especialidades', 'especialidades.id_medico = medicos.id');
		$this->db->where('horarios_disponiveis.id', $horarioId);
		$query = $this->db->get();
		$result = $query->row();

		return $result ? $result->id : null;
	}

	public function get_data_consulta($horarioId)
	{
		$this->db->select('data_disponivel');
		$this->db->from('horarios_disponiveis');
		$this->db->where('id', $horarioId);
		$query = $this->db->get();
		$result = $query->row();

		return $result ? $result->data_disponivel : null;
	}
}
