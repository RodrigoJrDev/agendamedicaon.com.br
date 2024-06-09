<div class="row">
	<div class="col-lg-4 col-md-6">
		<div class="card text-white bg-primary mb-3">
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-center">
					<h5 class="card-title">Total de Pacientes Atendidos</h5>
					<i class="fa-solid fa-user-check fa-2x"></i>
				</div>
				<p class="card-text display-4" id="total-pacientes">0</p>
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
				<p class="card-text display-4" id="consultas-feitas">0</p>
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
				<p class="card-text display-4" id="consultas-canceladas">0</p>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card mb-3">
			<div class="card-body">
				<h5 class="card-title">Próxima Consulta</h5>
				<div id="proxima-consulta">
					<p class="card-text">Nome do Paciente: <span id="nome-paciente">Fulano de Tal</span></p>
					<p class="card-text">Data e Hora: <span id="data-hora-consulta">01/01/2024 10:00</span></p>
					<p class="card-text">Especialidade: <span id="especialidade-consulta">Cardiologia</span></p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div id="chart"></div>
	</div>
</div>
</main>
<script>
	document.addEventListener("DOMContentLoaded", function() {
		// Dados estáticos para demonstração
		document.getElementById('total-pacientes').innerText = 120;
		document.getElementById('consultas-feitas').innerText = 300;
		document.getElementById('consultas-canceladas').innerText = 20;

		// Configuração do gráfico ApexCharts
		var options = {
			series: [{
				name: 'Consultas',
				data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
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
				align: 'left'
			},
			grid: {
				row: {
					colors: ['#f3f3f3', 'transparent'],
					opacity: 0.5
				},
			},
			xaxis: {
				categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
			}
		};

		var chart = new ApexCharts(document.querySelector("#chart"), options);
		chart.render();
	});
</script>
