<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Sistema extends MY_Controller
{
	/**
	 * author: Rodrigo Junior
	 * email: rodrigojrdev@gmail.com
	 *
	 */

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('date');
		$this->load->model('Medico_model');
		$this->load->model('Paciente_model');
		$this->load->model('Consulta_model');
	}

	public function index()
	{
		if ($this->session->userdata('permissao') == 'medico') {
			$this->data['breadcrumb'] = array(
				array(
					"link" => base_url(),
					"nome" => "Início"
				),
				array(
					"link" => base_url('medico'),
					"nome" => "Área do Médico"
				),
			);

			// Obtenha os dados necessários
			$id_medico = $this->session->userdata('id');
			$this->data['total_pacientes'] = $this->Paciente_model->get_total_pacientes_atendidos($id_medico);
			$this->data['consultas_feitas'] = $this->Consulta_model->get_total_consultas_feitas($id_medico);
			$this->data['consultas_canceladas'] = $this->Consulta_model->get_total_consultas_canceladas($id_medico);
			$this->data['consultas_solicitadas'] = $this->Consulta_model->get_consultas_solicitadas($id_medico);
			$this->data['proxima_consulta'] = $this->Consulta_model->get_proxima_consulta($id_medico);
			$this->data['medico'] = $this->Medico_model->getById($id_medico);
			$this->data['view'] = 'medico/index';
		} elseif ($this->session->userdata('permissao') == 'paciente') {
			$this->data['breadcrumb'] = array(
				array(
					"link" => base_url(),
					"nome" => "Início"
				),
				array(
					"link" => base_url('paciente'),
					"nome" => "Área do Paciente"
				),
			);

			$this->data['paciente'] = $this->Paciente_model->getById($this->session->userdata('id'));
			$this->data['view'] = 'paciente/index';
		} else {
			redirect('Entrar');
		}

		return $this->layout();
	}

	public function getConsultasDatas()
	{
		$data = $this->Consulta_model->get_consultas_por_mes($this->session->userdata('id'));

		$response = [
			'categories' => array_keys($data),
			'data' => array_values($data)
		];

		echo json_encode($response);
	}
}
