<?php

class MY_Controller extends CI_Controller
{
   
    public function __construct()
    {
        parent::__construct();

        if ((!session_id()) || (!$this->session->userdata('logado'))) {
            redirect('Login');
        }
        // $this->load_configuration();
    }

    public function layout()
    {
        // load views
        $this->load->view('template/admin/topo', $this->data);
        $this->load->view('template/admin/menu');
        $this->load->view('template/admin/conteudo');
        $this->load->view('template/admin/rodape');
    }
}
