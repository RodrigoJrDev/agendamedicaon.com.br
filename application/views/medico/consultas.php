<div class="consultas">
	<h2>Consultas</h2>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Paciente</th>
				<th>Especialidade</th>
				<th>Data da Consulta</th>
				<th>Status</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php $index = 1;
			foreach ($consultas as $consulta) : ?>
				<tr>
					<td><?= $index++; ?></td>
					<td><?= $consulta->nome_paciente; ?></td>
					<td><?= $consulta->especialidade; ?></td>
					<td><?= date('d/m/Y H:i', strtotime($consulta->data_consulta)); ?></td>
					<td><?= $consulta->status_consulta; ?></td>
					<td>
						<?php if ($consulta->id_status == 2) : ?>
							<button class="btn btn-success aceitar-consulta" data-id="<?= $consulta->id; ?>">Aceitar</button>
							<button class="btn btn-danger negar-consulta" data-id="<?= $consulta->id; ?>">Negar</button>
						<?php endif; ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

</div>

<script>
	$(document).ready(function() {
		$('.finalizar-consulta').click(function() {
			var id = $(this).data('id');

			$.ajax({
				url: '<?= base_url('consultas/finalizarConsulta'); ?>',
				method: 'POST',
				data: {
					id: id
				},
				success: function(response) {
					var data = JSON.parse(response);
					if (data.status) {
						swal({
							title: "Consulta finalizada com sucesso!",
							text: data.message,
							icon: "success",
							button: "OK",
						}).then((value) => {
							location.reload();
						});
					} else {
						bootbox.alert({
							title: "Erro ao finalizar consulta!",
							message: data.message,
						});
					}					
				}
			});
		});

		$('.negar-consulta').click(function() {
			var id = $(this).data('id');

			$.ajax({
				url: '<?= base_url('consultas/cancelarConsulta'); ?>',
				method: 'POST',
				data: {
					id: id
				},
				success: function(response) {
					var data = JSON.parse(response);
					if (data.status) {
						swal({
							title: "Consulta cancelada com sucesso!",
							text: data.message,
							icon: "success",
							button: "OK",
						}).then((value) => {
							location.reload();
						});
					} else {
						bootbox.alert({
							title: "Erro ao cancelar consulta!",
							message: data.message,
						});
					}
				}
			});
		});
	});
</script>
