<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $_ENV["APP_NAME"]; ?></title>
	<base href="<?= base_url(); ?>">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/libs/select2/css/select2.css" rel="stylesheet">
	<link rel="shortcut icon" type="image/png" href="<?= base_url(); ?>assets/img/favicon.ico">
	<link rel="stylesheet" href="<?= base_url() ?>assets/libs/bootstrap/css/bootstrap.min.css">
	<link href="<?= base_url(); ?>assets/libs/font-awesome/all.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/main.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" />

	<script type="text/javascript" src="<?= base_url(); ?>assets/libs/jquery/js/jquery-3.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/pt-br.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/libs/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/libs/datatables/js/datatables.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/libs/list/js/list.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/libs/sweetalert/js/sweetalert.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/libs/bootbox/js/bootbox.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/libs/maskmoney/js/maskmoney.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/libs/validate/js/validate.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/libs/jquerymask/js/jquery.mask.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/libs/select2/js/select2.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/main.js"></script>
</head>

<body>

	<header id="header" class="fixed-top">
		<div class="container d-flex align-items-center">

			<h1 class="logo me-auto"><a href="index.html"><?= $_ENV["APP_NAME"]; ?></a></h1>


			<nav id="navbar" class="navbar order-last order-lg-0">
				<ul>
					<li><a class="nav-link scrollto active" href="#hero">Home</a></li>
					<li><a class="nav-link scrollto" href="#about">About</a></li>
					<li><a class="nav-link scrollto" href="#services">Services</a></li>
					<li><a class="nav-link scrollto" href="#departments">Departments</a></li>
					<li><a class="nav-link scrollto" href="#doctors">Doctors</a></li>
					<li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
						<ul>
							<li><a href="#">Drop Down 1</a></li>
							<li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
								<ul>
									<li><a href="#">Deep Drop Down 1</a></li>
									<li><a href="#">Deep Drop Down 2</a></li>
									<li><a href="#">Deep Drop Down 3</a></li>
									<li><a href="#">Deep Drop Down 4</a></li>
									<li><a href="#">Deep Drop Down 5</a></li>
								</ul>
							</li>
							<li><a href="#">Drop Down 2</a></li>
							<li><a href="#">Drop Down 3</a></li>
							<li><a href="#">Drop Down 4</a></li>
						</ul>
					</li>
					<li><a class="nav-link scrollto" href="#contact">Contact</a></li>
				</ul>
				<i class="bi bi-list mobile-nav-toggle"></i>
			</nav>

			<a href="<?= BASE_URL(); ?>Entrar" class="appointment-btn">Cadastre-se</a>

		</div>
	</header>

	<main>
