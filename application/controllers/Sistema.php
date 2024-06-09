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

			$this->data['medico'] = $this->Medico_model->getById($this->session->userdata('id'));
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
}
