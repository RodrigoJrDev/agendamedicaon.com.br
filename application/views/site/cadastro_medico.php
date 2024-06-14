<div class="create-your-profile">
	<div class="container  min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
		<form id="doctorForm" enctype="multipart/form-data">
			<div class="row">
				<h4 class="mb-3">Dados do Médico</h4>
				<div class="col-lg-8">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-floating mb-3">
								<input type="text" class="form-control" id="nome" name="nome_completo" required placeholder="Nome completo">
								<label for="nome">Nome completo</label>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-floating mb-3">
								<input type="text" class="form-control" id="cpf" name="cpf" required placeholder="CPF">
								<label for="cpf">CPF</label>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-floating mb-3">
								<input type="email" class="form-control" id="email" name="email" required placeholder="E-mail">
								<label for="email">E-mail</label>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-floating mb-3 eye-pass">
								<input type="password" class="form-control" id="senha" name="senha" required placeholder="Senha">
								<label for="senha">Senha</label>
								<span class="view-pass"><i class="fa-solid fa-eye"></i></span>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-floating mb-3">
								<input type="text" class="form-control" id="celular" name="celular" required placeholder="Celular">
								<label for="celular">Celular</label>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-floating mb-3">
								<input type="text" class="form-control" id="crm" name="crm" required placeholder="CRM">
								<label for="crm">CRM</label>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-floating mb-3">
								<input type="text" class="form-control" id="genero" name="genero" required placeholder="Gênero">
								<label for="genero">Gênero</label>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-floating mb-3">
								<input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required placeholder="Data de Nascimento">
								<label for="data_nascimento">Data de Nascimento</label>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-floating mb-3">
								<textarea class="form-control" id="bio" name="bio" placeholder="Biografia"></textarea>
								<label for="bio">Biografia</label>
							</div>
						</div>
					</div>
					<!-- Endereço -->
					<h4>Endereço</h4>
					<div class="row">
						<div class="col-lg-4">
							<div class="form-floating mb-3">
								<input type="text" class="form-control" id="cep" name="cep" required placeholder="CEP">
								<label for="cep">CEP</label>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-floating mb-3">
								<input type="text" class="form-control" id="rua" name="rua" required placeholder="Rua">
								<label for="rua">Rua</label>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-floating mb-3">
								<input type="text" class="form-control" id="numero" name="numero" required placeholder="Número">
								<label for="numero">Número</label>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-floating mb-3">
								<input type="text" class="form-control" id="bairro" name="bairro" required placeholder="Bairro">
								<label for="bairro">Bairro</label>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-floating mb-3">
								<input type="text" class="form-control" id="cidade" name="cidade" required placeholder="Cidade">
								<label for="cidade">Cidade</label>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-floating mb-3">
								<input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento">
								<label for="complemento">Complemento</label>
							</div>
						</div>
					</div>
					<!-- Disponibilidades e Especialidades -->
					<h4>Disponibilidades e Especialidades</h4>
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group position-relative">
								<label for="horarios">Horários Disponíveis</label>
								<div id="horarios-container">
									<div class="row mb-2 horario-row">
										<div class="col-md-4">
											<div class="form-floating">
												<input type="date" class="form-control" name="data_disponivel[]" required>
												<label for="data_disponivel">Data Disponível</label>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-floating">
												<input type="time" class="form-control" name="hora_inicio[]" required>
												<label for="hora_inicio">Hora Início</label>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-floating">
												<input type="time" class="form-control" name="hora_fim[]" required>
												<label for="hora_fim">Hora Fim</label>
											</div>
										</div>
									</div>
								</div>
								<button type="button" class="btn btn-primary mt-2" id="add-horario">Adicionar Horário</button>
							</div>
						</div>
						<div class="col-lg-12 mt-4">
							<div class="form-group">
								<label for="especialidades">Especialidades</label>
								<select class="form-control" id="especialidades" name="especialidades[]" multiple="multiple" style="width: 100%;">
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="mb-3">
						<button type="submit" class="btn btn-primary submit-preload">Cadastrar</button>
						<a class="btn btn-danger ml-2" href="<?= BASE_URL(); ?>Entrar" title="Voltar">Voltar</a>
					</div>
					<div class="card mb-3">
						<div class="card-body">
							<h4 class="card-title mb-4">Foto</h4>
							<div class="dropzone dropzone-multiple p-0 mb-5 dz-clickable" id="my-awesome-dropzone">
								<div class="dz-preview d-flex flex-wrap"></div>
								<div class="dz-message text-body-tertiary text-opacity-85">
									Arraste a foto aqui <span class="text-body-secondary px-1">OU</span>
									<button class="btn btn-link p-0" type="button">Procure no seu dispostivo</button><br>
									<img class="mt-3 me-2" src="<?= BASE_URL(); ?>assets/img/dropzone.png" width="40" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<script>
	Dropzone.autoDiscover = false;
	var uploadedFile = null;

	var myDropzone = new Dropzone("#my-awesome-dropzone", {
		url: "#",
		autoProcessQueue: false,
		paramName: "file",
		maxFilesize: 6,
		maxFiles: 1,
		acceptedFiles: "image/*",
		addRemoveLinks: true,
		dictDefaultMessage: "Arraste suas fotos aqui ou clique para navegar em seu dispositivo",
		dictRemoveFile: "Remover arquivo",
		dictFileTooBig: "Arquivo muito grande ({{filesize}}MiB). Tamanho máximo permitido: {{maxFilesize}}MiB.",
		dictMaxFilesExceeded: "Você não pode enviar mais arquivos.",
		init: function() {
			this.on("addedfile", function(file) {
				uploadedFile = file;
			});
			this.on("removedfile", function(file) {
				uploadedFile = null;
			});
		}
	});

	$("#doctorForm").submit(function(e) {
		e.preventDefault();
		var formData = new FormData(this);
		if (uploadedFile) {
			formData.append("file", uploadedFile, uploadedFile.name);
		}

		$.ajax({
			url: "<?= base_url(); ?>Entrar/cadastrarMedicoXHR",
			type: "POST",
			dataType: "json",
			data: formData,
			processData: false,
			contentType: false,
			beforeSend: function() {
				$(".submit-preload").prop("disabled", true);
				$(".submit-preload").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enviando...');
			},
			success: function(data) {
				$(".submit-preload").prop("disabled", false);
				$(".submit-preload").html("Cadastrar");

				if (data.status) {
					swal({
						title: "Médico cadastrado com sucesso!",
						text: data.message,
						icon: "success",
						button: "OK",
					}).then((value) => {
						location.reload();
					});
				} else {
					bootbox.alert({
						title: "Erro ao cadastrar médico!",
						message: data.message,
					});
				}
			},
			error: function() {
				swal({
					title: "Erro no sistema!",
					text: "Tente novamente, se o erro persistir entre em contato com o suporte.",
					icon: "error",
					button: "OK",
				}).then((value) => {
					location.reload();
				});
			}
		});
	});

	$("#cep").blur(function() {
		var cep = $(this).val().replace(/\D/g, '');
		if (cep != "") {
			var validacep = /^[0-9]{8}$/;
			if (validacep.test(cep)) {
				$("#rua").val("...");
				$("#bairro").val("...");
				$("#cidade").val("...");
				$("#complemento").val("...");
				$.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {
					if (!("erro" in dados)) {
						$("#rua").val(dados.logradouro);
						$("#bairro").val(dados.bairro);
						$("#cidade").val(dados.localidade);
						$("#complemento").val(dados.complemento);
					} else {
						bootbox.alert({
							title: "CEP não encontrado!",
							message: "Verifique o CEP digitado e tente novamente.",
						});
					}
				});
			} else {
				bootbox.alert({
					title: "CEP inválido!",
					message: "O CEP digitado não é válido.",
				});
			}
		}
	});

	$(".view-pass").click(function() {
		var input = $(this).parent().find("input");
		if (input.attr("type") == "password") {
			input.attr("type", "text");
			$(this).find("i").removeClass("fa-eye").addClass("fa-eye-slash");
		} else {
			input.attr("type", "password");
			$(this).find("i").removeClass("fa-eye-slash").addClass("fa-eye");
		}
	});

	$(document).ready(function() {
		$('#especialidades').select2({
			placeholder: 'Selecione ou adicione especialidades',
			tags: true,
			ajax: {
				url: '<?= base_url(); ?>Especialidades/getEspecialidades',
				dataType: 'json',
				delay: 250,
				data: function(params) {
					return {
						q: params.term // search term
					};
				},
				processResults: function(data) {
					return {
						results: data
					};
				},
				cache: true
			}
		});
	});

	$(document).ready(function() {
		$('#add-horario').click(function() {
			var horarioRow = `
            <div class="row mb-2 horario-row">
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="date" class="form-control" name="data_disponivel[]" required>
                        <label for="data_disponivel">Data Disponível</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="time" class="form-control" name="hora_inicio[]" required>
                        <label for="hora_inicio">Hora Início</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="time" class="form-control" name="hora_fim[]" required>
                        <label for="hora_fim">Hora Fim</label>
                    </div>
                </div>
            </div>
        `;
			$('#horarios-container').append(horarioRow);
		});
	});
</script>
