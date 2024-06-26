<?php

class Entrar extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Medico_model');
		$this->load->model('Especialidades_model');
		$this->load->model('Horarios_model');
		$this->load->model('Paciente_model');
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

	public function CadastroPaciente()
	{
		$this->data['view'] = 'site/cadastro_paciente';
		return $this->layout();
	}

	public function cadastrarPacienteXHR()
	{
		$this->load->library('form_validation');

		// Definir regras de validação
		$this->form_validation->set_rules([
			['field' => 'nome_completo', 'label' => 'Nome completo', 'rules' => 'trim|required'],
			['field' => 'celular', 'label' => 'Celular', 'rules' => 'trim|required'],
			['field' => 'cpf', 'label' => 'CPF', 'rules' => 'trim|required'],
			['field' => 'email', 'label' => 'Email', 'rules' => 'trim|required|valid_email'],
			['field' => 'senha', 'label' => 'Senha', 'rules' => 'trim|required'],
			['field' => 'cep', 'label' => 'CEP', 'rules' => 'trim|required'],
			['field' => 'rua', 'label' => 'Rua', 'rules' => 'trim|required'],
			['field' => 'numero', 'label' => 'Número', 'rules' => 'trim|required'],
			['field' => 'bairro', 'label' => 'Bairro', 'rules' => 'trim|required'],
			['field' => 'cidade', 'label' => 'Cidade', 'rules' => 'trim|required'],
			['field' => 'complemento', 'label' => 'Complemento', 'rules' => 'trim'],
			['field' => 'genero', 'label' => 'Gênero', 'rules' => 'trim|required'],
			['field' => 'data_nascimento', 'label' => 'Data de nascimento', 'rules' => 'trim|required'],
		]);

		try {
			if ($this->form_validation->run() === FALSE) {
				throw new Exception("Erro de validação: " . validation_errors());
			}

			if ($this->checkDuplicated('email', $this->input->post('email'))) {
				throw new Exception("E-mail já cadastrado.");
			}

			if ($this->checkDuplicated('cpf', $this->input->post('cpf'), 'pacientes')) {
				throw new Exception("CPF já cadastrado.");
			}

			$data = $this->input->post([
				'nome_completo', 'cpf', 'email', 'cep', 'rua', 'numero', 'bairro', 'cidade', 'complemento', 'genero', 'celular'
			]);

			$data['senha'] = password_hash($this->input->post('senha'), PASSWORD_DEFAULT);
			$data['data_nascimento'] = $this->input->post('data_nascimento');
			$data['data_criacao'] = date('Y-m-d H:i:s');

			// Salvar imagem
			if (!empty($_FILES['file']['name'])) {
				$config['upload_path'] = './assets/upload/imgs-pacientes/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|svg';
				$config['max_size'] = 2048;
				$config['file_name'] = md5(uniqid(rand(), true)); // Gerar hash para o nome do arquivo
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('file')) {
					throw new Exception($this->upload->display_errors());
				} else {
					$upload_data = $this->upload->data();
					$data['imagem_usuario'] = $upload_data['file_name'];
				}
			} else {
				$data['imagem_usuario'] = 'sem_imagem.jpg';
			}

			// Inserir paciente e obter o ID
			$id_paciente = $this->Paciente_model->add('pacientes', $data);
			if (!$id_paciente) {
				throw new Exception("Erro ao cadastrar paciente.");
			}

			echo json_encode(array(
				"status" => true,
				"message" => "Paciente cadastrado com sucesso!",
			));
		} catch (Exception $e) {
			echo json_encode(array(
				"status" => false,
				"message" => $e->getMessage(),
			));
		}
	}

	public function cadastrarMedicoXHR()
	{
		$this->load->library('form_validation');

		// Definir regras de validação
		$this->form_validation->set_rules([
			['field' => 'nome_completo',  'label' => 'Nome completo', 'rules' => 'trim|required'],
			['field' => 'celular',        'label' => 'Celular', 'rules' => 'trim|required'],
			['field' => 'cpf',            'label' => 'CPF', 'rules' => 'trim|required'],
			['field' => 'email',          'label' => 'Email', 'rules' => 'trim|required|valid_email'],
			['field' => 'senha',          'label' => 'Senha', 'rules' => 'trim|required'],
			['field' => 'cep',            'label' => 'CEP', 'rules' => 'trim|required'],
			['field' => 'rua',            'label' => 'Rua', 'rules' => 'trim|required'],
			['field' => 'numero',         'label' => 'Número', 'rules' => 'trim|required'],
			['field' => 'bairro',         'label' => 'Bairro', 'rules' => 'trim|required'],
			['field' => 'cidade',         'label' => 'Cidade', 'rules' => 'trim|required'],
			['field' => 'complemento',    'label' => 'Complemento', 'rules' => 'trim'],
			['field' => 'genero',         'label' => 'Gênero', 'rules' => 'trim|required'],
			['field' => 'crm',            'label' => 'CRM', 'rules' => 'trim|required'],
			['field' => 'data_nascimento', 'label' => 'Data de nascimento', 'rules' => 'trim|required'],
			['field' => 'bio',            'label' => 'Bio', 'rules' => 'trim|required'],
			['field' => 'especialidades[]', 'label' => 'Especialidades', 'rules' => 'trim|required'],
			['field' => 'data_disponivel[]', 'label' => 'Data disponível', 'rules' => 'trim|required'],
			['field' => 'hora_inicio[]',  'label' => 'Hora de início', 'rules' => 'trim|required'],
			['field' => 'hora_fim[]',     'label' => 'Hora de fim', 'rules' => 'trim|required'],
		]);

		try {
			if ($this->form_validation->run() === FALSE) {
				throw new Exception("Erro de validação: " . validation_errors());
			}

			if ($this->checkDuplicated('email', $this->input->post('email'))) {
				throw new Exception("E-mail já cadastrado.");
			}

			if ($this->checkDuplicated('cpf', $this->input->post('cpf'), 'medicos')) {
				throw new Exception("CPF já cadastrado.");
			}

			$data = $this->input->post([
				'nome_completo', 'cpf', 'email', 'cep', 'rua', 'numero', 'bairro', 'cidade', 'complemento', 'genero', 'crm', 'celular', 'bio'
			]);

			$data['senha'] = password_hash($this->input->post('senha'), PASSWORD_DEFAULT);
			$data['data_nascimento'] = $this->input->post('data_nascimento');
			$data['data_criacao'] = date('Y-m-d H:i:s');

			// Salvar imagem
			if (!empty($_FILES['file']['name'])) {
				$config['upload_path'] = './assets/upload/imgs-medicos/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|svg';
				$config['max_size'] = 2048;
				$config['file_name'] = md5(uniqid(rand(), true)); // Gerar hash para o nome do arquivo
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('file')) {
					throw new Exception($this->upload->display_errors());
				} else {
					$upload_data = $this->upload->data();
					$data['imagem_usuario'] = $upload_data['file_name'];
				}
			} else {
				$data['imagem_usuario'] = 'sem_imagem.jpg';
			}

			// Inserir médico e obter o ID
			$id_medico = $this->Medico_model->add('medicos', $data);
			if (!$id_medico) {
				throw new Exception("Erro ao cadastrar médico.");
			}

			// Inserir especialidades
			$especialidades = $this->input->post('especialidades');
			if ($especialidades && is_array($especialidades)) {
				foreach ($especialidades as $especialidade) {
					$this->Especialidades_model->add('especialidades', [
						'nome' => $especialidade,
						'id_medico' => $id_medico
					]);
				}
			}

			// Inserir horários disponíveis
			$datas = $this->input->post('data_disponivel');
			$horas_inicio = $this->input->post('hora_inicio');
			$horas_fim = $this->input->post('hora_fim');

			if ($datas && is_array($datas)) {
				foreach ($datas as $index => $data_disponivel) {
					$this->Horarios_model->add('horarios_disponiveis', [
						'id_medico' => $id_medico,
						'data_disponivel' => $data_disponivel,
						'hora_inicio' => $horas_inicio[$index],
						'hora_fim' => $horas_fim[$index]
					]);
				}
			}

			echo json_encode(array(
				"status" => true,
				"message" => "Médico cadastrado com sucesso!",
			));
		} catch (Exception $e) {
			echo json_encode(array(
				"status" => false,
				"message" => $e->getMessage(),
			));
		}
	}

	private function checkDuplicated($field, $value, $table = 'medicos')
	{
		$this->db->where($field, $value);
		$query = $this->db->get($table);
		return $query->num_rows() > 0;
	}

	// Layout da View
	public function layout()
	{
		// load views
		$this->load->view('template/site/head-no-nav', $this->data);
		$this->load->view('template/site/conteudo');
	}


	public function LoginSistema()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		// Verifica nos médicos
		$medico = $this->Medico_model->get_by_email($email);
		if ($medico && password_verify($password, $medico->senha)) {
			$this->session->set_userdata([
				'id' => $medico->id,
				'nome' => $medico->nome_completo,
				'email' => $medico->email,
				'imagem_usuario' => $medico->imagem_usuario,
				'permissao' => 'medico',
			]);
			echo json_encode(array("status" => true, "message" => "Login bem-sucedido!"));
			return;
		}

		// Verifica nos pacientes
		$paciente = $this->Paciente_model->get_by_email($email);
		if ($paciente && password_verify($password, $paciente->senha)) {
			$this->session->set_userdata([
				'id' => $paciente->id,
				'nome' => $paciente->nome_completo,
				'email' => $paciente->email,
				'imagem_usuario' => $paciente->imagem_usuario,
				'permissao' => 'paciente',
			]);
			echo json_encode(array("status" => true, "message" => "Login bem-sucedido!"));
			return;
		}

		// Se não encontrar nos dois
		echo json_encode(array("status" => false, "message" => "E-mail ou senha incorretos!"));
	}

	public function Logout()
	{
		$this->session->sess_destroy();
		redirect('Entrar');
	}

}
