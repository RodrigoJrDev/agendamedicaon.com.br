<div class="controler-accont">
	<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

					<div class="card mb-3">

						<div class="card-body">

							<div class="pt-4 pb-2">
								<h5 class="card-title text-center pb-0 fs-4">Login na sua conta</h5>
								<p class="text-center small">Digite seu e-mail e senha para entrar</p>
							</div>

							<form class="row g-3 needs-validation" id="loginForm" novalidate="">

								<div class="col-12">
									<label for="yourEmail" class="form-label">E-mail</label>
									<div class="input-group has-validation">
										<span class="input-group-text" id="inputGroupPrepend">@</span>
										<input type="email" name="email" class="form-control" id="yourEmail" required="">
										<div class="invalid-feedback">Por favor, digite seu e-mail.</div>
									</div>
								</div>

								<div class="col-12">
									<label for="yourPassword" class="form-label">Senha</label>
									<input type="password" name="password" class="form-control" id="yourPassword" required="">
									<div class="invalid-feedback">Por favor, digite sua senha!</div>
								</div>

								<div class="col-12">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
										<label class="form-check-label" for="rememberMe">Lembrar de mim</label>
									</div>
								</div>
								<div class="col-12">
									<button class="btn btn-primary w-100" type="submit">Entrar</button>
								</div>
								<div class="col-12">
									<p class="small mb-0">Não tem conta? <a href="<?= BASE_URL(); ?>Entrar/CadastroMedico">Crie uma conta</a></p>
								</div>
							</form>

						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
</div>

<script>
	$("#loginForm").submit(function(e) {
		e.preventDefault();

		$.ajax({
			url: "<?= base_url(); ?>Entrar/LoginSistema",
			type: "POST",
			dataType: "json",
			data: $(this).serialize(),
			success: function(data) {
				if (data.status) {
					swal({
						title: "Login bem-sucedido!",
						text: data.message,
						icon: "success",
						button: "OK",
					}).then((value) => {
						window.location.href = "<?= base_url(); ?>Sistema";
					});
				} else {
					swal({
						title: "Erro ao entrar!",
						text: data.message,
						icon: "error",
						button: "OK",
					});
				}
			},
			error: function() {
				swal({
					title: "Erro no sistema!",
					text: "Tente novamente, se o erro persistir entre em contato com o suporte.",
					icon: "error",
					button: "OK",
				});
			}
		});
	});
</script>
