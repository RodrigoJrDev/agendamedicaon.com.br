<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}


class Administracao extends MY_Controller
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
		$this->load->model('administracao_model');
	}

	public function index()
	{
		$this->data['breadcrumb'] = array(
			array(
				"link" => base_url(),
				"nome" => "Início"
			),
			array(
				"link" => base_url('administracao'),
				"nome" => "Administração"
			),
		);

		$this->data['administracao'] = $this->administracao_model->get('administracao', 'id, nome, email, url_imagem_usuario, excluido, ultimo_login', '');
		$this->data['total_administracao'] = count($this->data['administracao']);
		$this->data['view'] = 'administracao/index';
		return $this->layout();
	}

	public function cadastrar()
	{
		$this->data['breadcrumb'] = array(
			array(
				"link" => base_url(),
				"nome" => "Início"
			),
			array(
				"link" => base_url('administracao'),
				"nome" => "Administração"
			),
			array(
				"link" => base_url('administracao/cadastrar'),
				"nome" => "Cadastrar"
			),
		);

		$this->data['view'] = 'administracao/cadastrar';
		return $this->layout();
	}

	public function cadastrarXHR()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules([
			['field' => 'nome',      'label' => 'Nome',  	 'rules' => 'trim|required'],
			['field' => 'celular',   'label' => 'Celular', 'rules' => 'trim|required'],
			['field' => 'cpf',    	 'label' => 'CPF',   	 'rules' => 'trim|required'],
			['field' => 'email',     'label' => 'Email', 	 'rules' => 'trim|required'],
			['field' => 'senha',     'label' => 'Senha', 	 'rules' => 'trim|required'],
			['field' => 'cep',       'label' => 'CEP',     'rules' => 'trim|required'],
			['field' => 'rua',       'label' => 'Rua',     'rules' => 'trim|required'],
			['field' => 'numero',    'label' => 'Número',  'rules' => 'trim|required'],
			['field' => 'bairro',    'label' => 'Bairro',  'rules' => 'trim|required'],
			['field' => 'cidade',    'label' => 'Cidade',  'rules' => 'trim|required'],
		]);


		try {

			if ($this->form_validation->run() === FALSE) {
				throw new Exception("Erro de validação: " . validation_errors());
				return;
			}

			if ($this->checkDuplicated('email', $this->input->post('email'))) {
				throw new Exception("E-mail já cadastrado.");
			}
			if ($this->checkDuplicated('cpf', $this->input->post('cpf'))) {
				throw new Exception("CPF já cadastrado.");
			}

			password_hash($this->input->post('senha'), PASSWORD_DEFAULT);
			$data = $this->input->post(['nome', 'cpf', 'email', 'cep', 'rua', 'numero', 'bairro', 'cidade', 'complemento']);
			$data['senha'] = password_hash($this->input->post('senha'), PASSWORD_DEFAULT);
			$data['url_imagem_usuario'] = $this->input->post('file') ?? null;
			$data['data_criacao'] = date('Y-m-d H:i:s');

			// Salvar imagem
			if (!empty($_FILES)) {
				$img = $this->uploadImgUsersXHR($_FILES);

				$data['url_imagem_usuario'] = $img;
			} else {
				$data['url_imagem_usuario'] = 'sem_foto.jpg';
			}

			$this->administracao_model->add('administracao', $data);

			// Log
			log_info('Cadastrou um novo administrador');

			echo json_encode(array(
				"status" => true,
				"message" => "Administrador cadastrado com sucesso!",
			));
		} catch (Exception $e) {

			echo json_encode(array(
				"status" => false,
				"message" => $e->getMessage(),
				'MAPOS_TOKEN' => $this->security->get_csrf_hash()
			));
		}
	}

	public function editar(int $id)
	{

		try {

			if (empty($id)) {
				throw new Exception("ID não informado.");
			}

			$admin = $this->administracao_model->get('administracao', 'id', 'id = ' . $id);
			if (empty($admin)) {
				throw new Exception("Administrador não encontrado.");
			}

			$this->data['breadcrumb'] = array(
				array(
					"link" => base_url(),
					"nome" => "Início"
				),
				array(
					"link" => base_url('administracao'),
					"nome" => "Administração"
				),
				array(
					"link" => base_url('administracao/editar/' . $id),
					"nome" => "Editar"
				),
			);

			$dados_admin = $this->administracao_model->get('administracao', 'id, nome, cpf, rua, cep, numero, bairro, cidade, estado, complemento, email, senha, celular, url_imagem_usuario ', 'id = ' . $id);
			

			$this->data['administracao'] = $dados_admin[0];

			$this->data['view'] = 'administracao/editar';

			return $this->layout();
		} catch (Exception $e) {
			redirect('administracao');
		}
	}

	public function editarXHR() {
		$this->load->library('form_validation');

		$this->form_validation->set_rules([
			['field' => 'id',        'label' => 'ID',      'rules' => 'trim|required'],
			['field' => 'nome',      'label' => 'Nome',    'rules' => 'trim|required'],
			['field' => 'celular',   'label' => 'Celular', 'rules' => 'trim|required'],
			['field' => 'cpf',       'label' => 'CPF',     'rules' => 'trim|required'],
			['field' => 'email',     'label' => 'Email',   'rules' => 'trim|required'],
			['field' => 'cep',       'label' => 'CEP',     'rules' => 'trim|required'],
			['field' => 'rua',       'label' => 'Rua',     'rules' => 'trim|required'],
			['field' => 'numero',    'label' => 'Número',  'rules' => 'trim|required'],
			['field' => 'bairro',    'label' => 'Bairro',  'rules' => 'trim|required'],
			['field' => 'cidade',    'label' => 'Cidade',  'rules' => 'trim|required'],
		]);

		try {

			if ($this->form_validation->run() === FALSE) {
				throw new Exception("Erro de validação: " . validation_errors());
				return;
			}

			$id = $this->input->post('id');
			$admin = $this->administracao_model->get('administracao', 'id, nome, email, cpf', 'id = ' . $id);
			$admin = $admin[0];
			if (empty($admin)) {
				throw new Exception("Administrador não encontrado.");
			}

			
			if ($admin["email"] != $this->input->post('email') && $this->checkDuplicated('email', $this->input->post('email'))) {
				throw new Exception("E-mail já cadastrado.");
			}

			if ($admin["cpf"] != $this->input->post('cpf') && $this->checkDuplicated('cpf', $this->input->post('cpf'))) {
				throw new Exception("CPF já cadastrado.");
			}


			$data = $this->input->post(['nome', 'cpf', 'email', 'cep', 'rua', 'numero', 'bairro', 'cidade', 'complemento', 'celular']);

			// Salvar imagem

			if (!empty($_FILES)) {
				$img = $this->uploadImgUsersXHR($_FILES);

				$data['url_imagem_usuario'] = $img;
			} 

			$this->administracao_model->edit('administracao', $data, 'id', $id);

			// Log
			log_info('Editou o administrador ' . $admin['nome']);

			echo json_encode(array(
				"status" => true,
				"message" => "Administrador editado com sucesso!",
			));

		} catch (Exception $e) {
			echo json_encode(array(
				"status" => false,
				"message" => $e->getMessage(),
				'MAPOS_TOKEN' => $this->security->get_csrf_hash()
			));
		}
	}

	private function checkDuplicated($field, $value)
	{
		$admin = $this->administracao_model->get('administracao', 'id', $field . ' = "' . $value . '"');
		return !empty($admin);
	}

	public function desativarXHR()
	{
		try {
			$email = $this->input->post('email');

			if (empty($email)) {
				throw new Exception("ID não informado.");
			}

			$admin = $this->administracao_model->get('administracao', 'id, nome, email, excluido', 'email = "' . $email . '"');
			if (empty($admin)) {
				throw new Exception("Administrador não encontrado.");
			}

			$data = array(
				'excluido' => 1,
			);

			$this->administracao_model->edit('administracao', $data, 'email', $email);

			// Log
			log_info('Desativou o administrador ' . $admin[0]['nome']);

			echo json_encode(array(
				"status" => true,
				"message" => "Administrador desativado com sucesso!",
			));
		} catch (Exception $e) {
			echo json_encode(array(
				"status" => false,
				"message" => $e->getMessage(),
			));
		}
	}

	public function reativarXHR()
	{
		try {
			$email = $this->input->post('email');

			if (empty($email)) {
				throw new Exception("ID não informado.");
			}

			$admin = $this->administracao_model->get('administracao', 'id, nome, email, excluido', 'email = "' . $email . '"');
			if (empty($admin)) {
				throw new Exception("Administrador não encontrado.");
			}

			$data = array(
				'excluido' => 0,
			);

			$this->administracao_model->edit('administracao', $data, 'email', $email);

			// Log
			log_info('Reativou o administrador ' . $admin[0]['nome']);

			echo json_encode(array(
				"status" => true,
				"message" => "Administrador reativado com sucesso!",
			));
		} catch (Exception $e) {
			echo json_encode(array(
				"status" => false,
				"message" => $e->getMessage(),
			));
		}
	}

	public function desativarMultiXHR()
	{
		try {
			$emails = $this->input->post('emails');

			if (empty($emails)) {
				throw new Exception("IDs não informados.");
			}

			foreach ($emails as $email) {
				$admin = $this->administracao_model->get('administracao', 'id, nome, email, excluido', 'email = "' . $email . '"');
				if (empty($admin)) {
					throw new Exception("Administrador não encontrado.");
				}

				$data = array(
					'excluido' => 1,
				);

				$this->administracao_model->edit('administracao', $data, 'email', $email);
			}

			// Log
			log_info('Desativou vários administradores');

			echo json_encode(array(
				"status" => true,
				"message" => "Usuários desativados com sucesso!",
			));
		} catch (Exception $e) {
			echo json_encode(array(
				"status" => false,
				"message" => $e->getMessage(),
			));
		}
	}

	public function reativarMultiXHR()
	{
		try {
			$emails = $this->input->post('emails');

			if (empty($emails)) {
				throw new Exception("Ids não informados.");
			}

			foreach ($emails as $email) {
				$admin = $this->administracao_model->get('administracao', 'id, nome, email, excluido', 'email = "' . $email . '"');
				if (empty($admin)) {
					throw new Exception("Administrador não encontrado.");
				}

				$data = array(
					'excluido' => 0,
				);

				$this->administracao_model->edit('administracao', $data, 'email', $email);
			}

			// Log
			log_info('Reativou vários administradores');

			echo json_encode(array(
				"status" => true,
				"message" => "Usuários reativados com sucesso!",
			));
		} catch (Exception $e) {
			echo json_encode(array(
				"status" => false,
				"message" => $e->getMessage(),
			));
		}
	}

	public function uploadImgUsersXHR(array $file)
	{

		$uploadPath	 							= 'assets/img/upload/icons-users/';
		$fileName    							= $file['file']['name'];
		$ext 				 							= pathinfo($fileName, PATHINFO_EXTENSION);
		$fileName 	 							= md5($fileName . date('Y-m-d H:i:s')) . '.' . $ext;
		$config['upload_path']    = $uploadPath;
		$config['allowed_types']  = 'webp|jpg|png|jpeg|gif|svg';
		$config['max_size'] 			= 6000;
		$config['file_name']      = $fileName;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file')) {
			throw new Exception($this->upload->display_errors());
		} else {
			$this->resizeImage($uploadPath . $fileName);

			return $fileName;
		}
	}

	private function resizeImage($path)
	{
		$config['image_library']  = 'gd2';
		$config['source_image']   = $path;
		$config['create_thumb']   = FALSE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] 					= 128;
		$config['height'] 				= 128;

		$this->load->library('image_lib', $config);

		if (!$this->image_lib->resize()) {
			echo $this->image_lib->display_errors();
		}
	}
}
