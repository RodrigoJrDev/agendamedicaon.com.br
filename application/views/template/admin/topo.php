<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="light">

<head>
	<meta name="robots" content="noindex">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $configuration["app_name"]; ?></title>
	<base href="<?= base_url(); ?>">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" rel="stylesheet">
	<link rel="shortcut icon" type="image/png" href="<?= base_url(); ?>assets/img/favicon.ico">
	<link rel="stylesheet" href="<?= base_url() ?>assets/libs/bootstrap/css/bootstrap.min.css">
	<link href="<?= base_url(); ?>assets/libs/font-awesome/all.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/main.css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

	<script type="text/javascript" src="<?= base_url(); ?>assets/libs/jquery/js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/libs/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/libs/datatables/js/datatables.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/libs/list/js/list.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/libs/sweetalert/js/sweetalert.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/libs/bootbox/js/bootbox.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/libs/maskmoney/js/maskmoney.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/libs/validate/js/validate.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/libs/jquerymask/js/jquery.mask.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/main.js"></script>

	<script>
		$(document).ready(function() {
			// Add CSRF token input to each form and ajax requests
			var csrfTokenName = "<?= config_item("csrf_token_name") ?>";

			var forms = document.querySelectorAll("form");
			forms.forEach(function(form) {
				var csrfInput = document.createElement('input');
				csrfInput.type = 'hidden';
				csrfInput.name = csrfTokenName;
				csrfInput.value = getCookie("<?= config_item("csrf_cookie_name") ?>");
				form.appendChild(csrfInput);
			});

			$.ajaxSetup({
				credentials: "include",
				beforeSend: function(jqXHR, settings) {
					if (typeof settings.data === 'object') {
						settings.data[csrfTokenName] = getCookie("<?= config_item("csrf_cookie_name") ?>");
					} else {
						settings.data += '&' + $.param({
							[csrfTokenName]: getCookie("<?= config_item("csrf_cookie_name") ?>")
						});
					}

					return true;
				}
			});
		});
	</script>

</head>

<body>

	<main>

		<nav class="navbar-top fixed-top navbar navbar-expand">
			<div class="container-fluid">
				<div class="logo">
					<a href="<?= base_url(); ?>" title="Voltar para página inicial">
						<img src="<?= base_url(); ?>assets/img/logo.png" alt="Logo da empresa - <?= $configuration["app_name"]; ?>">
					</a>
				</div>
				<div class="input-pesquisa">
					<form>
						<input class="form-control search-input fuzzy-search rounded-pill form-control-sm" type="search" placeholder="Pesquisar...">
					</form>
				</div>
				<div class="assets-topo">
					<div class="switch-theme">
						<i class="fa-solid fa-sun"></i>
					</div>
					<div class="menu-notificao">
						<i class="fa-solid fa-bell"></i>
					</div>
					<div class="menu-pessoal">
						<img class="rounded-circle icon-user" src="<?= base_url(); ?>assets/img/upload/icons-users/<?= $this->session->userdata["url_image_user_admin"]; ?>" alt="Foto do <?= $this->session->userdata["nome"]; ?>">
					</div>
				</div>
			</div>
		</nav>
