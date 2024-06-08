<?php


if (!function_exists('formatar_data_horario')) {
	function formatar_data_horario($data)
	{
		$dataObj = DateTime::createFromFormat('Y-m-d H:i:s', $data);

		if ($dataObj) {
			return $dataObj->format('d/m/Y H:i:s');
		} else {
			return false;
		}
	}
}
