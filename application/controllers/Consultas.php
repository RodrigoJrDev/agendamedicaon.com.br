<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}


class Consultas extends MY_Controller
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

		$this->load->library('EmailSender');
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
				"link" => base_url('Consultas'),
				"nome" => "Consultas"
			),
		);

		$id_medico = $this->session->userdata('id');
		$this->data['consultas'] = $this->Consulta_model->getConsultas($id_medico);

		$this->data['view'] = 'medico/consultas';

		return $this->layout();
	}


	public function aceitarConsulta()
	{
		$id_consulta = $this->input->post('id');
		$this->Consulta_model->updateStatus($id_consulta, 2); // 2 = Aceitada

		// Obter detalhes da consulta
		$consulta = $this->Consulta_model->getConsultaById($id_consulta);

		// Verificar se a consulta foi encontrada
		if (!$consulta) {
			echo json_encode(["status" => "error", "message" => "Consulta não encontrada."]);
			return;
		}

		$medico = $this->Medico_model->getById($consulta->id_medico);

		// Formatar a data da consulta
		$data_consulta_formatada = date('d/m/Y H:i', strtotime($consulta->data_consulta));

		// Conteúdo do e-mail
		$email_body = "
					<h2>Consulta Aceita - Agenda Médica ON</h2>
					<p>Sua consulta para <strong>{$consulta->especialidade}</strong> foi aceita.</p>
					<p><strong>Detalhes da Consulta:</strong></p>
					<ul>
							<li>Data: {$data_consulta_formatada}</li>
							<li>Médico: {$medico->nome_completo}</li>
							<li>Email do Médico: {$medico->email}</li>
							<li>Telefone do Médico: {$medico->celular}</li>
					</ul>
			";

		// Enviar e-mail
		EmailSender::sendEmail(
			$consulta->email_paciente,
			"Consulta Aceita",
			$email_body
		);

		echo json_encode(["status" => "success"]);
	}

	public function negarConsulta()
	{
		$id_consulta = $this->input->post('id');
		$this->Consulta_model->updateStatus($id_consulta, 4); // 4 = Negada

		// Obter detalhes da consulta
		$consulta = $this->Consulta_model->getConsultaById($id_consulta);

		// Verificar se a consulta foi encontrada
		if (!$consulta) {
			echo json_encode(["status" => "error", "message" => "Consulta não encontrada."]);
			return;
		}

		$medico = $this->Medico_model->getById($consulta->id_medico);

		// Formatar a data da consulta
		$data_consulta_formatada = date('d/m/Y H:i', strtotime($consulta->data_consulta));

		// Conteúdo do e-mail
		$email_body = "
					<h2>Consulta Negada - Agenda Médica ON</h2>
					<p>Sua consulta para <strong>{$consulta->especialidade}</strong> foi negada.</p>
					<p><strong>Detalhes da Consulta:</strong></p>
					<ul>
							<li>Data: {$data_consulta_formatada}</li>
							<li>Médico: {$medico->nome_completo}</li>
							<li>Email do Médico: {$medico->email}</li>
							<li>Telefone do Médico: {$medico->celular}</li>
					</ul>
			";

		// Enviar e-mail
		EmailSender::sendEmail(
			$consulta->email_paciente,
			"Consulta Negada",
			$email_body
		);

		echo json_encode(["status" => "success"]);
	}


	public function finalizarConsulta()
	{
		$id_consulta = $this->input->post('id');

		$consulta = $this->Consulta_model->getConsultaById($id_consulta);		

		if (!$consulta) {
			echo json_encode(["status" => "error", "message" => "Consulta não encontrada."]);
			return;
		}

		$this->Consulta_model->updateStatus($id_consulta, 3); 

		echo json_encode(["status" => "success", "message" => "Consulta finalizada com sucesso."]);
	}

	public function cancelarConsulta()
	{
		$id_consulta = $this->input->post('id');

		$consulta = $this->Consulta_model->getConsultaById($id_consulta);		

		if (!$consulta) {
			echo json_encode(["status" => "error", "message" => "Consulta não encontrada."]);
			return;
		}

		$this->Consulta_model->updateStatus($id_consulta, 4); 

		echo json_encode(["status" => "success", "message" => "Consulta cancelada com sucesso."]);
	}

}
