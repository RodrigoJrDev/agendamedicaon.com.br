<div class="row">
	<div class="col-lg-4 col-md-6">
		<div class="card text-white bg-primary mb-3">
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-center">
					<h5 class="card-title">Total de Pacientes Atendidos</h5>
					<i class="fa-solid fa-user-check fa-2x"></i>
				</div>
				<p class="card-text display-4" id="total-pacientes"><?= $total_pacientes; ?></p>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-md-6">
		<div class="card text-white bg-success mb-3">
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-center">
					<h5 class="card-title">Consultas Feitas</h5>
					<i class="fa-solid fa-calendar-check fa-2x"></i>
				</div>
				<p class="card-text display-4" id="consultas-feitas"><?= $consultas_feitas; ?></p>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-md-6">
		<div class="card text-white bg-danger mb-3">
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-center">
					<h5 class="card-title">Consultas Canceladas</h5>
					<i class="fa-solid fa-calendar-times fa-2x"></i>
				</div>
				<p class="card-text display-4" id="consultas-canceladas"><?= $consultas_canceladas; ?></p>
			</div>
		</div>
	</div>
</div>

<div class="card mb-3">
	<div class="card-body">
		<h5 class="card-title">Consultas Solicitadas</h5>
		<?php foreach ($consultas_solicitadas as $consulta) : ?>
			<div class="consulta-item mb-3">
				<p class="card-text">Nome do Paciente: <?= $consulta->nome_paciente ?></p>
				<p class="card-text">Data e Hora: <?= date('d/m/Y H:i', strtotime($consulta->data_consulta)) ?></p>
				<p class="card-text">Especialidade: <?= $consulta->especialidade ?></p>
				<p class="card-text">Observações: <?= $consulta->observacoes ?></p>
				<button class="btn btn-success aceitar-consulta" data-id="<?= $consulta->id ?>">Aceitar</button>
				<button class="btn btn-danger negar-consulta" data-id="<?= $consulta->id ?>">Negar</button>
			</div>
			<hr>
		<?php endforeach; ?>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<?php if (!empty($proxima_consulta)) { ?>
			<div class="card mb-3">
				<div class="card-body">
					<h5 class="card-title">Próxima Consulta</h5>
					<div id="proxima-consulta">
						<p class="card-text">Nome do Paciente: <?= $proxima_consulta["nome_paciente"]; ?></p>
						<p class="card-text">Data e Hora: <?= date('d/m/Y H:i', strtotime($proxima_consulta["data_consulta"])); ?></p>
						<p class="card-text">Especialidade: <?= $proxima_consulta["especialidade"]; ?></p>
						<p class="card-text">Observações: <?= $proxima_consulta["observacoes"]; ?></p>
					</div>
				</div>
			</div>
		<?php } else { ?>
			<div class="alert alert-info mb-3 " role="alert">
				<h3>Não há consultas agendadas.</h3>
			</div>
		<?php } ?>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div id="chart" class="box-chart"></div>
	</div>
</div>


<script>
	$(document).ready(function() {
		var options = {
			series: [{
				name: 'Consultas',
				data: []
			}],
			chart: {
				height: 350,
				type: 'line',
				zoom: {
					enabled: false
				}
			},
			dataLabels: {
				enabled: false
			},
			stroke: {
				curve: 'straight'
			},
			title: {
				text: 'Consultas ao longo do tempo',
				align: 'left',
				style: {
					fontSize: '20px',
					fontWeight: 'bold',
					color: '#263238'
				}
			},
			grid: {
				row: {
					colors: ['#f3f3f3', 'transparent'], // alterna entre cinza e transparente
					opacity: 0.5
				},
			},
			xaxis: {
				categories: [], // Categorias serão carregadas via AJAX
			}
		};

		var chart = new ApexCharts(document.querySelector("#chart"), options);
		chart.render();

		// Carregar dados via AJAX
		$.ajax({
			url: '<?= base_url(); ?>Sistema/getConsultasDatas',
			method: 'GET',
			dataType: 'json',
			success: function(response) {
				chart.updateSeries([{
					name: 'Consultas',
					data: response.data
				}]);
				chart.updateOptions({
					xaxis: {
						categories: response.categories
					}
				});
			},
			error: function() {
				console.error("Erro ao carregar os dados do gráfico.");
			}
		});
	});
</script>


<script>
	$(document).ready(function() {
		$('.aceitar-consulta').click(function() {
			var consultaId = $(this).data('id');
			var button = $(this);
			button.prop('disabled', true).text('Enviando e-mail para o paciente...');

			$.post("<?= base_url('consultas/aceitarConsulta') ?>", {
				id: consultaId
			}, function(response) {
				button.prop('disabled', false).text('Aceitar');
				if (response.status === "success") {
					swal({
						icon: 'success',
						title: 'Consulta aceita com sucesso!',
						showConfirmButton: false,
						timer: 2000
					}).then(() => {
						location.reload();
					});
				} else {
					swal({
						icon: 'error',
						title: 'Erro ao aceitar a consulta!',
						text: response.message,
					});
				}
			}, 'json').fail(function() {
				button.prop('disabled', false).text('Aceitar');
				swal({
					icon: 'error',
					title: 'Erro ao aceitar a consulta!',
					text: 'Ocorreu um erro ao processar a solicitação.',
				});
			});
		});

		$('.negar-consulta').click(function() {
			var consultaId = $(this).data('id');
			var button = $(this);
			button.prop('disabled', true).text('Enviando e-mail para o paciente...');

			$.post("<?= base_url('consultas/negarConsulta') ?>", {
				id: consultaId
			}, function(response) {
				button.prop('disabled', false).text('Negar');
				if (response.status === "success") {
					swal({
						icon: 'success',
						title: 'Consulta negada com sucesso!',
						showConfirmButton: false,
						timer: 2000
					}).then(() => {
						location.reload();
					});
				} else {
					swal({
						icon: 'error',
						title: 'Erro ao negar a consulta!',
						text: response.message,
					});
				}
			}, 'json').fail(function() {
				button.prop('disabled', false).text('Negar');
				swal({
					icon: 'error',
					title: 'Erro ao negar a consulta!',
					text: 'Ocorreu um erro ao processar a solicitação.',
				});
			});
		});
	});
</script>
