<?php

class Especialidades extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('EspecialidadesDisponiveis_model');
	}

	public function getEspecialidades()
	{
		$term = $this->input->get('q');
		$especialidades = $this->EspecialidadesDisponiveis_model->searchEspecialidades($term);
		$results = array();
		foreach ($especialidades as $especialidade) {
			$results[] = array('id' => $especialidade->id, 'text' => $especialidade->nome);
		}
		echo json_encode($results);
	}
}
