<?php

class Entrar extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		$this->data['view'] = 'site/entrar';

		return $this->layout();
	}

	public function EscolhaSeuPerfil()
	{

		$this->data['view'] = 'site/escolha_seu_perfil';

		return $this->layout();
	}

	public function CadastroMedico()
	{

		$this->data['view'] = 'site/cadastro_medico';

		return $this->layout();
	}

	
	// Layout da View
	public function layout()
	{
		// load views
		$this->load->view('template/site/head', $this->data);
		$this->load->view('template/site/conteudo');
	}
}
