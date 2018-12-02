<?php

$var = "2018-09-21 13:51:10";

$vars = toDo($var);

echo $vars;

function toDo($var)
{

	$aux = explode(" ", $var);
	$vars = explode("-", $aux[0]);
	$full = "";

	$d = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
	$m = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

	$sem = date("N", strtotime($aux[0]));

	$full = $d[($sem == 7) ? 0 : $sem] . ", " . $vars[2] . " de " . $m[intval($vars[1]) - 1] . " de " . $vars[0];

	return $full;
}


?>