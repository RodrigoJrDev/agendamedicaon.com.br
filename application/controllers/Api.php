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
		// Obtém os dados do POST e converte em array
		$data = json_decode(file_get_contents('php://input'), true);

		// Define as regras de validação
		$this->form_validation->set_data($data);
		$this->form_validation->set_rules('nomeCompleto', 'Nome Completo', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[pacientes.email]');
		$this->form_validation->set_rules('cpf', 'CPF', 'trim|required|is_unique[pacientes.cpf]');
		$this->form_validation->set_rules('celular', 'Celular', 'trim|required');
		$this->form_validation->set_rules('genero', 'Gênero', 'trim|required');
		$this->form_validation->set_rules('dataNascimento', 'Data de Nascimento', 'trim|required');
		$this->form_validation->set_rules('cep', 'CEP', 'trim|required');
		$this->form_validation->set_rules('rua', 'Rua', 'trim|required');
		$this->form_validation->set_rules('numero', 'Número', 'trim|required');
		$this->form_validation->set_rules('bairro', 'Bairro', 'trim|required');
		$this->form_validation->set_rules('cidade', 'Cidade', 'trim|required');
		$this->form_validation->set_rules('complemento', 'Complemento', 'trim');

		if ($this->form_validation->run() == FALSE) {
			$response = array('status' => 'error', 'message' => validation_errors());
			echo json_encode($response);
			return;
		}

		// Verifica se o e-mail já existe
		if ($this->Paciente_model->get_by_email($data['email']) !== null) {
			$response = array('status' => 'error', 'message' => 'O e-mail já está cadastrado');
			echo json_encode($response);
			return;
		}

		// Verifica se o CPF já existe
		if ($this->Paciente_model->get_by_cpf($data['cpf']) !== null) {
			$response = array('status' => 'error', 'message' => 'O CPF já está cadastrado');
			echo json_encode($response);
			return;
		}


		$data_bd = array(
			'nome_completo' => $data['nomeCompleto'],
			'email' => $data['email'],
			'cpf' => $data['cpf'],
			'celular' => $data['celular'],
			'genero' => $data['genero'],
			'data_nascimento' => $data['dataNascimento'],
			'cep' => $data['cep'],
			'rua' => $data['rua'],
			'numero' => $data['numero'],
			'bairro' => $data['bairro'],
			'cidade' => $data['cidade'],
			'complemento' => $data['complemento'],
			'senha' => password_hash($data['senha'], PASSWORD_DEFAULT),
			'data_criacao' => date('Y-m-d H:i:s')
		);


		// Insere os dados no banco de dados
		$insert_id = $this->Paciente_model->insert($data_bd);

		if ($insert_id) {
			$response = array('status' => 'success', 'message' => 'Cadastro realizado com sucesso');
		} else {
			$response = array('status' => 'error', 'message' => 'Erro ao cadastrar paciente');
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
