<?php

class MY_Controller extends CI_Controller
{
	protected $data = [];

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('id')) {
			redirect('Entrar');
		}

		// dados comuns
		$this->data['nome'] = $this->session->userdata('nome');
		$this->data['email'] = $this->session->userdata('email');
		$this->data['permissao'] = $this->session->userdata('permissao');
	}

	public function layout()
	{
		if ($this->data['permissao'] == 'medico') {
			$this->load->view('template/medico/topo', $this->data);
			$this->load->view('template/medico/menu');
			$this->load->view('template/medico/conteudo');
			$this->load->view('template/medico/rodape');
		} elseif ($this->data['permissao'] == 'paciente') {
			$this->load->view('template/paciente/topo', $this->data);
			$this->load->view('template/paciente/menu');
			$this->load->view('template/paciente/conteudo');
			$this->load->view('template/paciente/rodape');
		} else {
			redirect('Entrar');
		}
	}
}
