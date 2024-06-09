<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}


class Pacientes extends MY_Controller
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
		// Verifica permissão de acesso
		if ($this->session->userdata('permissao') != 'medico') {
			$this->session->sess_destroy();
			redirect('Entrar');
		}

		$this->data['breadcrumb'] = array(
			array(
				"link" => base_url(),
				"nome" => "Início"
			),
			array(
				"link" => base_url('Consultas/pacientesAtendidos'),
				"nome" => "Pacientes Atendidos"
			),
		);

		$id_medico = $this->session->userdata('id');

		$this->data['pacientes'] = $this->Consulta_model->getPacientesAtendidos($id_medico);
		$this->data['view'] = 'medico/pacientes-atendidos';
		return $this->layout();
	}
}
