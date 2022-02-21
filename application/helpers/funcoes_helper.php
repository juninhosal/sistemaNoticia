<?php


function agoraDateTimeBr() {
    date_default_timezone_set("America/Sao_Paulo");
    return date('d/m/Y H:i:s', time());
}

function dataAgoraFormatada (string $formatoData = "Y-m-d", string $timeZone = "America/Sao_Paulo") : string {
	if (empty($formatoData)) $formatoData = "Y-m-d";
	if (empty($timeZone)) $timeZone = "America/Sao_Paulo";

	date_default_timezone_set($timeZone);
	$dt = null;
	try{
		$dt = new DateTime('NOW');
	} catch (Exception $err) {
		$dt = null;
	}
	return !empty($dt) ? $dt->format($formatoData) : "";
}
