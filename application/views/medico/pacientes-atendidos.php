<div class="consultas">
	<h2>Pacientes Atendidos</h2>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Nome do Paciente</th>
				<th>Email</th>
				<th>Celular</th>
				<th>Data da Consulta</th>
				<th>Especialidade</th>
			</tr>
		</thead>
		<tbody>
			<?php $index = 1; foreach ($pacientes as $paciente): ?>
				<tr>
					<td><?= $index++; ?></td>
					<td><?= $paciente->nome_completo; ?></td>
					<td><?= $paciente->email; ?></td>
					<td><?= $paciente->celular; ?></td>
					<td><?= date('d/m/Y H:i', strtotime($paciente->data_consulta)); ?></td>
					<td><?= $paciente->especialidade; ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
