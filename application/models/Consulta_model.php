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

	public function insert($data)
	{
			return $this->db->insert('consultas', $data); 
	}

	public function count($table)
	{
		return $this->db->count_all($table);
	}


	public function get_total_consultas_feitas($id_medico)
	{
		$this->db->where('id_medico', $id_medico);
		$this->db->where('id_status', 3);
		$this->db->from('consultas');
		return $this->db->count_all_results();
	}

	public function get_total_consultas_canceladas($id_medico)
	{
		$this->db->where('id_medico', $id_medico);
		$this->db->where('id_status', 4);
		$this->db->from('consultas');
		return $this->db->count_all_results();
	}

	public function get_proxima_consulta($id_medico)
	{
		$this->db->select('
        consultas.data_consulta,
        consultas.observacoes,
        pacientes.nome_completo AS nome_paciente,
        especialidades_disponiveis.nome AS especialidade
    ');
		$this->db->from('consultas');
		$this->db->join('pacientes', 'pacientes.id = consultas.id_paciente');
		$this->db->join('especialidades_disponiveis', 'especialidades_disponiveis.id = consultas.id_especialidade');
		$this->db->where('consultas.id_medico', $id_medico);
		$this->db->where('consultas.id_status', 2); // Status de aceitada pelo médico
		$this->db->where('consultas.data_consulta >=', date('Y-m-d H:i:s'));
		$this->db->order_by('consultas.data_consulta', 'ASC');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_consultas_por_mes()
	{
		$query = $this->db->query("
		SELECT DATE_FORMAT(data_consulta, '%b') as mes, COUNT(*) as total
		FROM consultas
		WHERE YEAR(data_consulta) = YEAR(CURDATE())
		GROUP BY MONTH(data_consulta)
		ORDER BY MONTH(data_consulta)
	");

		$result = $query->result();
		$data = [];
		foreach ($result as $row) {
			$data[$row->mes] = $row->total;
		}
		return $data;
	}

	public function get_consultas_solicitadas($id_medico)
	{
		$this->db->select('
				consultas.id,
				consultas.data_consulta,
				consultas.observacoes,
				pacientes.nome_completo AS nome_paciente,
				especialidades_disponiveis.nome AS especialidade
		');
		$this->db->from('consultas');
		$this->db->join('pacientes', 'pacientes.id = consultas.id_paciente');
		$this->db->join('especialidades_disponiveis', 'especialidades_disponiveis.id = consultas.id_especialidade');
		$this->db->where('consultas.id_medico', $id_medico);
		$this->db->where('consultas.id_status', 1);
		$query = $this->db->get();
		return $query->result();
	}

	public function updateStatus($id_consulta, $status)
	{
		$this->db->where('id', $id_consulta);
		$this->db->update('consultas', ['id_status' => $status]);
	}

	public function getConsultaById($id)
	{
		$this->db->select('consultas.*, pacientes.email AS email_paciente, especialidades_disponiveis.nome AS especialidade');
		$this->db->from('consultas');
		$this->db->join('pacientes', 'pacientes.id = consultas.id_paciente');
		$this->db->join('especialidades_disponiveis', 'especialidades_disponiveis.id = consultas.id_especialidade');
		$this->db->where('consultas.id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function getConsultas($id_medico)
	{
		$this->db->select('
					consultas.id,
					consultas.data_consulta,
					consultas.id_status,
					consultas.observacoes,
					pacientes.nome_completo AS nome_paciente,
					especialidades_disponiveis.nome AS especialidade,
					consultas_status.status AS status_consulta
			');
		$this->db->from('consultas');
		$this->db->join('pacientes', 'pacientes.id = consultas.id_paciente');
		$this->db->join('especialidades_disponiveis', 'especialidades_disponiveis.id = consultas.id_especialidade');
		$this->db->join('consultas_status', 'consultas_status.id = consultas.id_status');
		$this->db->where('consultas.id_medico', $id_medico);
		$this->db->order_by('consultas.data_consulta', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function getPacientesAtendidos($id_medico)
	{
		$this->db->select('
			pacientes.id,
			pacientes.nome_completo,
			pacientes.email,
			pacientes.celular,
			consultas.data_consulta,
			especialidades_disponiveis.nome AS especialidade
		');
		$this->db->from('consultas');
		$this->db->join('pacientes', 'pacientes.id = consultas.id_paciente');
		$this->db->join('especialidades_disponiveis', 'especialidades_disponiveis.id = consultas.id_especialidade');
		$this->db->where('consultas.id_medico', $id_medico);
		$this->db->where('consultas.id_status', 2); // Status de consultas aceitas e concluídas
		$this->db->order_by('consultas.data_consulta', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}
}
