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
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

</div>
