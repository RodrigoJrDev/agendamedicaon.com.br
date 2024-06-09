<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="light">

<head>
	<meta name="robots" content="noindex">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Agenda Médica ON</title>
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
</head>

<body>

	<main>

		<nav class="navbar-top fixed-top navbar navbar-expand">
			<div class="container-fluid">
				<div class="logo">
					<a href="<?= base_url(); ?>" title="Voltar para página inicial">
						<img src="<?= base_url(); ?>assets/img/logo.png" alt="Logo da empresa - Agenda Médica ON">
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
						<img class="rounded-circle icon-user" src="<?= base_url(); ?>assets/img/upload/icons-users/<?= $this->session->userdata["imagem_usuario"]; ?>" alt="Foto do <?= $this->session->userdata["nome"]; ?>">
					</div>
				</div>
			</div>
		</nav>
