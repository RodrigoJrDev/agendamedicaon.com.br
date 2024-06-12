<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Paciente_model');
		$this->load->model('Especialidades_model');
		$this->load->model('EspecialidadesDisponiveis_model');
		$this->load->model('Medico_model');
		$this->load->model('Horarios_model');
		$this->load->model('Consulta_model');

		$this->load->helper('url');
	}

	public function login()
	{
		// Lendo o JSON da requisição
		$input = json_decode(trim(file_get_contents("php://input")), true);

		// Obtendo e sanitizando entradas
		$email = filter_var($input['email'], FILTER_SANITIZE_EMAIL);
		$senha = $input['senha'];

		// Verificando se as entradas não estão vazias
		if (empty($email) || empty($senha)) {
			echo json_encode(array("status" => "error", "message" => "Email ou senha não podem estar vazios"));
			return;
		}

		// Validando o email
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo json_encode(array("status" => "error", "message" => "Email inválido"));
			return;
		}

		// Buscando paciente pelo email
		$paciente = $this->Paciente_model->get_by_email($email);

		// Verificando se o paciente existe e se a senha está correta
		if ($paciente && password_verify($senha, $paciente->senha)) {
			echo json_encode(array(
				"status" => "success",
				"data" => array(
					"id" => $paciente->id,
					"nome" => $paciente->nome_completo,
					"email" => $paciente->email,
					"genero" => $paciente->genero,
					"data_nascimento" => $paciente->data_nascimento,
					"imagem_usuario" => $paciente->imagem_usuario
				)
			));
		} else {
			echo json_encode(array("status" => "error", "message" => "Email ou senha inválidos"));
		}
	}


	public function register()
	{
		// Define as regras de validação
		$this->form_validation->set_rules('nome_completo', 'Nome Completo', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[pacientes.email]');
		$this->form_validation->set_rules('cpf', 'CPF', 'trim|required|is_unique[pacientes.cpf]');
		$this->form_validation->set_rules('celular', 'Celular', 'trim|required');
		$this->form_validation->set_rules('genero', 'Gênero', 'trim|required');
		$this->form_validation->set_rules('data_nascimento', 'Data de Nascimento', 'trim|required');
		$this->form_validation->set_rules('cep', 'CEP', 'trim|required');
		$this->form_validation->set_rules('rua', 'Rua', 'trim|required');
		$this->form_validation->set_rules('numero', 'Número', 'trim|required');
		$this->form_validation->set_rules('bairro', 'Bairro', 'trim|required');
		$this->form_validation->set_rules('cidade', 'Cidade', 'trim|required');
		$this->form_validation->set_rules('complemento', 'Complemento', 'trim');

		if ($this->form_validation->run() == FALSE) {
			// Envia resposta de erro se a validação falhar
			$response = array('status' => 'error', 'message' => validation_errors());
			echo json_encode($response);
			return;
		}

		// Verifica se o e-mail já existe
		if ($this->Paciente_model->get_by_email($this->input->post('email')) !== null) {
			$response = array('status' => 'error', 'message' => 'O e-mail já está cadastrado');
			echo json_encode($response);
			return;
		}

		// Verifica se o CPF já existe
		if ($this->Paciente_model->get_by_cpf($this->input->post('cpf')) !== null) {
			$response = array('status' => 'error', 'message' => 'O CPF já está cadastrado');
			echo json_encode($response);
			return;
		}

		// Obtém os dados do POST
		$data = array(
			'nome_completo' => $this->input->post('nome_completo'),
			'email' => $this->input->post('email'),
			'cpf' => $this->input->post('cpf'),
			'celular' => $this->input->post('celular'),
			'genero' => $this->input->post('genero'),
			'data_nascimento' => $this->input->post('data_nascimento'),
			'cep' => $this->input->post('cep'),
			'rua' => $this->input->post('rua'),
			'numero' => $this->input->post('numero'),
			'bairro' => $this->input->post('bairro'),
			'cidade' => $this->input->post('cidade'),
			'complemento' => $this->input->post('complemento'),
			'data_criacao' => date('Y-m-d H:i:s')
		);

		// Insere os dados no banco de dados
		$insert_id = $this->Paciente_model->insert($data);

		if ($insert_id) {
			// Envia resposta de sucesso se a inserção for bem-sucedida
			$response = array('status' => 'success', 'message' => 'Cadastro realizado com sucesso');
		} else {
			// Envia resposta de erro se a inserção falhar
			$response = array('status' => 'error', 'message' => 'Erro ao realizar o cadastro');
		}

		echo json_encode($response);
	}

	public function getEspecialidadesDisponiveis()
	{
		// Obtém todas as especialidades com o nome
		$especialidades = $this->Especialidades_model->getEspecialidadesComNome();

		$especialidadesDisponiveis = array();

		// Verifica horários disponíveis para cada especialidade
		foreach ($especialidades as $especialidade) {
			$horarios = $this->Horarios_model->get_disponiveis_por_especialidade($especialidade->id);
			if (!empty($horarios)) {
				$especialidadesDisponiveis[] = $especialidade;
			}
		}

		echo json_encode($especialidadesDisponiveis);
	}


	public function medicos()
	{
		$especialidadeId = $this->input->get('especialidadeId');
		$medicos = $this->Medico_model->get_by_especialidade($especialidadeId);
		echo json_encode($medicos);
	}

	public function horarios()
	{
		$medicoId = $this->input->get('medicoId');
		$horarios = $this->Horarios_model->get_disponiveis($medicoId);
		echo json_encode($horarios);
	}

	public function solicitar_agendamento()
	{
		// Lendo os dados da requisição JSON
		$input = json_decode(trim(file_get_contents("php://input")), true);

		// Obtendo e sanitizando as entradas
		$medicoId = $input['medicoId'];
		$horarioId = $input['horarioId'];
		$pacienteId = $input['pacienteId']; // Receber o ID do paciente diretamente na requisição

		// Verificando se as entradas não estão vazias
		if (empty($medicoId) || empty($horarioId) || empty($pacienteId)) {
			echo json_encode(array("status" => "error", "message" => "Dados incompletos para agendamento."));
			return;
		}

		// Buscando especialidade e data da consulta
		$especialidadeId = $this->Horarios_model->get_especialidade($horarioId);
		$dataConsulta = $this->Horarios_model->get_data_consulta($horarioId);

		// Dados para inserção
		$data = array(
			'id_medico' => $medicoId,
			'id_paciente' => $pacienteId,
			'id_status' => 1, // Status 1 = Solicitada
			'id_especialidade' => $especialidadeId,
			'data_consulta' => $dataConsulta,
			'observacoes' => 'Solicitada via aplicativo'
		);

		// Inserir a consulta e atualizar disponibilidade do horário
		$this->db->trans_start();
		$this->Consulta_model->insert($data);
		$this->Horarios_model->update_disponibilidade($horarioId, 0);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			echo json_encode(array('status' => 'error', 'message' => 'Erro ao solicitar agendamento.'));
		} else {
			echo json_encode(array('status' => 'success', 'message' => 'Solicitação realizada com sucesso.'));
		}
	}


	public function getConsultasAgendadas()
	{
		$id_paciente = $this->input->get('id_paciente');

		$this->db->select('consultas.id, consultas.data_consulta as data, consultas.hora_consulta as hora, medicos.nome_completo as medico, especialidades_disponiveis.nome as especialidade');
		$this->db->from('consultas');
		$this->db->join('medicos', 'medicos.id = consultas.id_medico');
		$this->db->join('especialidades_disponiveis', 'especialidades_disponiveis.id = consultas.id_especialidade');
		$this->db->where('consultas.id_paciente', $id_paciente);
		$query = $this->db->get();

		$result = $query->result();
		echo json_encode($result);
	}
}
