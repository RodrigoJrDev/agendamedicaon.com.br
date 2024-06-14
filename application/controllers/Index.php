<?php

class Index extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Medico_model');
	}

	public function index()
	{
		$medicos_data = $this->Medico_model->get_all_medicos();
		$medicos = [];

		foreach ($medicos_data as $medico) {
			if (!isset($medicos[$medico->id])) {
				$medicos[$medico->id] = [
					'nome_completo' => $medico->nome_completo,
					'bio' => $medico->bio,
					'imagem_usuario' => $medico->imagem_usuario,
					'especialidades' => []
				];
			}
			$medicos[$medico->id]['especialidades'][] = $medico->especialidade;
		}

		$this->data['medicos'] = $medicos;
		$this->data['view'] = 'site/index';

		return $this->layout();
	}

	public function layout()
	{
		// load views
		$this->load->view('template/site/head', $this->data);
		$this->load->view('template/site/conteudo');
		$this->load->view('template/site/rodape');
	}
}
