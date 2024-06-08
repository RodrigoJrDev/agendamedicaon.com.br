<?php

class Index extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

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
