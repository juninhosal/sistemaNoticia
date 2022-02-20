<?php

function reduzTexto($text, $num) {
    if (strlen(strip_tags($text)) > $num)
        return '<span title="' . $text . '">' . substr(strip_tags($text), 0, $num) . '...</span>';
    else
        return '<span title="' . $text . '">' . strip_tags($text) . '</span>';
}

function isDate($date) {
    if (empty($date)) {
        return FALSE;
    }
    $d = DateTime::createFromFormat('Y-m-d', $date);
    return $d && $d->format('Y-m-d') === $date;
}

function dateTimeToDate($date, $format = 'Y-m-d') {
    return !empty($date) ? DateTime::createFromFormat('Y-m-d H:i:s', $date)->format($format) : NULL;
}

function dateTimeToSimpleBr($date, $upper = FALSE) {
    function dateSimpleFormat($date) {
        function dateSimple($date) {
            $date = explode(' ', $date);
            $data = explode('-', $date[0]);
            $hora = explode(':', $date[1]);
            return (object)array(
                'dia' => $data[2],
                'mes' => $data[1],
                'ano' => $data[0],
                'hora' => $hora[0],
                'minuto' => $hora[1],
                'segundo' => $hora[2],
            );
        }

        $data = dateSimple($date);
        $agora = dateSimple(agoraTimestamp());

        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');

        if ($data->ano == $agora->ano) {
            if ($data->mes == $agora->mes) {
                if ($data->dia == $agora->dia) {
                    return "hoje às $data->hora" . "h$data->minuto" . "m";
                } elseif ($data->dia == ($agora->dia - 1)) {
                    return "ontem às $data->hora" . "h$data->minuto" . "m";
                }
                return "dia $data->dia deste mês";
            } elseif ($data->mes == ($agora->mes - 1)) {
                return "dia $data->dia do mês passado";
            }
            return "$data->dia de $data->mes às $data->hora" . "h$data->minuto" . "m";
        } elseif ($data->ano == ($agora->ano - 1)) {
            return "$data->mes do ano passado";
        }
        return "$data->dia/$data->mes/$data->ano $data->hora" . "h$data->minuto" . "m";
    }

    if (!empty($date)) {
        $default = DateTime::createFromFormat('Y-m-d H:i:s', format('d/m/Y H:i:s'));
        $date = $upper ? ucfirst(dateSimpleFormat($date, $default)) : dateSimpleFormat($date);
        return "<span title='$default'>$date</span>";
    }
    return NULL;
}

function dateTimeToDateTimeBr($date, $format = 'd/m/Y H:i:s') {
    return !empty($date) ? DateTime::createFromFormat('Y-m-d H:i:s', $date)->format($format) : NULL;
}

function dateTimeToTimeBr($date, $format = 'H:i:s') {
    return !empty($date) ? DateTime::createFromFormat('Y-m-d H:i:s', $date)->format($format) : NULL;
}

function dateToTStamp($date) {
    $timestamp = NULL;
    if (!empty($date)) {
        $formato = (strlen($date) == 10) ? 'd/m/Y' : 'd/m/Y H:i';
        $dateTime = DateTime::createFromFormat($formato, $date, new DateTimeZone('America/Sao_Paulo'));
        $timestamp = $dateTime->getTimestamp();
    }
    return $timestamp;
}

function dateTimeBrToTStamp($date, $format = 'Y-m-d H:i') {
    if (empty($date)) {
        return NULL;
    }
    return $date ? DateTime::createFromFormat('d/m/Y H:i', $date)->format($format) : NULL;
}

function dateTimeBrToDateTime($date, $format = 'Y-m-d H:i:s') {
    if (empty($date)) {
        return NULL;
    }
    return $date ? DateTime::createFromFormat('d/m/Y H:i:s', $date)->format($format) : NULL;
}

function dateBrToDate($date, $format = 'Y-m-d') {
    return !empty($date) ? DateTime::createFromFormat('d/m/Y', $date)->format($format) : NULL;
}

function dateToDateBr($date, $format = 'd/m/Y') {
    return !empty($date) ? DateTime::createFromFormat('Y-m-d', $date)->format($format) : NULL;
}

function dateUltimoDia($date) {
    if (empty($date)) {
        return NULL;
    }
    $date = explode('-', $date);
    $ano = $date[0];
    $mes = $date[1];

    return "$ano-$mes-" . cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
}

function datePrimeiroDia($date) {
    if (empty($date)) {
        return NULL;
    }
    $date = explode('-', $date);
    $ano = $date[0];
    $mes = $date[1];

    return "$ano-$mes-01";
}

function retornaDatas($inicio, $fim, $incrementar = '+1 day', $formato = 'Y-m-d') {
    $dates = array();
    $current = strtotime($inicio);
    $fim = strtotime($fim);

    while ($current <= $fim) {

        $dates[] = date($formato, $current);
        $current = strtotime($incrementar, $current);
    }

    return $dates;
}

function anoMesToMesAno($anoMes) {
    if (empty($anoMes)) {
        return NULL;
    }
    $anoMes = explode('-', $anoMes);
    return $anoMes[1] . '/' . $anoMes[0];
}

function dateToAnoMes($date, $format = 'Y-m') {
    return !empty($date) ? DateTime::createFromFormat('Y-m-d', $date)->format($format) : NULL;
}

function dateToMesAno($date, $format = 'm/Y') {
    return !empty($date) ? DateTime::createFromFormat('Y-m-d', $date)->format($format) : NULL;
}

function dateToDDMM($date, $format = 'd/m/Y') {
    if (!empty($date)) {
        $ddmm = DateTime::createFromFormat('Y-m-d', $date)->format('d/m');
        $titulo = DateTime::createFromFormat('Y-m-d', $date)->format($format);
        return '<span title="' . $titulo . '">' . $ddmm . '</span>';
    }
    return NULL;
}

function somenteNumeros($numero) {
    return preg_replace("/[^0-9]/", "", $numero);
}

function decimal($decimal, $divisor = null) {
	if(empty($divisor)) $divisor = ",";
    if (empty($decimal)) {
        return NULL;
    }

    $decimal = explode($divisor, $decimal);
    if(count($decimal) > 1) return somenteNumeros($decimal[0]) . '.' . somenteNumeros($decimal[1]);
    return somenteNumeros($decimal[0]);
}

function inteiro($numero, $divisor = null) {
	if(empty($divisor)) $divisor = ",";
    if (empty($numero)) {
        return 0;
    }
    return number_format($numero, 0, $divisor, '.');
}

function convert_memory_usage($size) { //$size = memory_get_usage()
    $unit=array('b','kb','mb','gb','tb','pb');
    return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
}

function monetario($decimal, $casasPreco = null, $divisor = null, $cifrao = null) {
	if(empty($divisor)) $divisor = ",";
	if(empty($cifrao)) $cifrao = "R$ ";
    if (empty($decimal)) {
        return $cifrao . ' ' . number_format(0, $casasPreco, $divisor, '.');
    }
	if(empty($casasPreco)) return $cifrao . ' ' . number_format($decimal, 0, $divisor, '.');
	return $cifrao . ' ' . number_format($decimal, $casasPreco, $divisor, '.');
}

function porcentagem($decimal, $divisor = null) {
	if(empty($divisor)) $divisor = ",";
    if (empty($decimal)) {
        return number_format(0, 3, $divisor, '') . ' %';
    }
    return number_format($decimal, 3, $divisor, '') . ' %';
}

function peso($decimal, $divisor = null) {
	if(empty($divisor)) $divisor = ",";
    if (empty($decimal)) {
        return number_format(0, 3, $divisor, '.');
    }
    return number_format($decimal, 3, $divisor, '.');
}

function percentToDecimal($decimal, $divisor = null) {
	if(empty($divisor)) $divisor = ",";
    if (empty($decimal)) {
        return NULL;
    }
    return str_replace(' %', '', str_replace('.', $divisor, $decimal));
}

function decimalToPercent($decimal, $divisor = null) {
	if(empty($divisor)) $divisor = ",";
    if (empty($decimal)) {
        return '0.000 %';
    }
    return number_format((float)$decimal, 3, $divisor, '') . ' %';
}

//function validaCpf($cpf) {
//    if (empty($cpf)) {
//        return FALSE;
//    }
//
//    $cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
//    // Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
//    if (strlen($cpf) != 11
//        || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222'
//        || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555'
//        || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888'
//        || $cpf == '99999999999'
//    ) {
//        return FALSE;
//    } else { // Calcula os números para verificar se o CPF é verdadeiro
//        for ($t = 9; $t < 11; $t++) {
//            for ($d = 0, $c = 0; $c < $t; $c++) {
//                $d += $cpf{$c} * (($t + 1) - $c);
//            }
//            $d = ((10 * $d) % 11) % 10;
//            if ($cpf{$c} != $d) {
//                return FALSE;
//            }
//        }
//        return TRUE;
//    }
//}

function numberToCpf($number) {
    if (empty($number)) {
        return NULL;
    }
    if (strlen($number) > 9) {
        return substr($number, 0, 3) . '.' . substr($number, 3, 3) . '.' . substr($number, 6, 3) . '-' . substr($number, 9, 2);
    }
    return substr($number, 0, 3) . '.' . substr($number, 3, 3) . '.' . substr($number, 6, 3);
}

function numberToCnpj($number) {
    if (empty($number)) {
        return NULL;
    }
    return substr($number, 0, 2) . '.' . substr($number, 2, 3) . '.' . substr($number, 5, 3) . '/' . substr($number, 8, 4) . '-' . substr($number, 12, 2);
}

function numberToCnpjCpf($number) {
    if (strlen($number) < 14) return numberToCpf($number);
    else                     return numberToCnpj($number);
}

function stringToCnpj($string) {
    if (empty($string)) {
        return NULL;
    }
    return str_replace('-', '', str_replace('/', '', str_replace('.', '', $string)));
}

function agoraTimestamp() {
    date_default_timezone_set("America/Sao_Paulo");
    return date('Y-m-d H:i:s', time());
}

function agoraDate() {
    date_default_timezone_set("America/Sao_Paulo");
    return date('Y-m-d', time());
}

function agoraDateBr() {
    date_default_timezone_set("America/Sao_Paulo");
    return date('d/m/Y', time());
}

function agoraHour() {
    date_default_timezone_set("America/Sao_Paulo");
    return date('H:i:s', time());
}

function agoraDateTimeBr() {
    date_default_timezone_set("America/Sao_Paulo");
    return date('d/m/Y H:i:s', time());
}

function agoraDateTime() {
    date_default_timezone_set("America/Sao_Paulo");
    return date('Y-m-d H:i:s', time());
}

function agoraFullDate() {
    $t = microtime(TRUE);
    $micro = sprintf("%06d", ($t - floor($t)) * 1000000);
    $d = new DateTime(date('Y-m-d H:i:s.' . $micro, $t));
    return $d->format("Y-m-d H:i:s.u");
}

function decodeArray($array) {
    if (is_array($array)) {
        array_walk_recursive($array, function (&$item, $key) {
            if (!mb_detect_encoding($item, 'UTF-8', TRUE)) {
                $item = utf8_encode($item);
            }
        });
    }
    return $array;
}

function encodeArray($array) {
    if (is_array($array)) {
        array_walk_recursive($array, function (&$item, $key) {
            if (mb_detect_encoding($item) == 'UTF-8') {
                $item = utf8_decode($item);
            }
        });
    }
    return $array;
}

function mask($val, $mask) {
    $maskared = '';
    $k = 0;
    for ($i = 0; $i <= strlen($mask) - 1; $i++) {
        if ($mask[$i] == '#') {
            if (isset($val[$k]))
                $maskared .= $val[$k++];
        } else {
            if (isset($mask[$i]))
                $maskared .= $mask[$i];
        }
    }
    return $maskared;
}

function valueEncode($value) {
    if (
        !mb_check_encoding($value, 'UTF-8')
        || !($value === mb_convert_encoding(mb_convert_encoding($value, 'UTF-32', 'UTF-8'), 'UTF-8', 'UTF-32'))
    ) {
        return $value = mb_convert_encoding($value, 'UTF-8', 'pass');
    }
    return $value;
}

function diaDaSemana($date, $partial = false) {
    $ano = substr($date, 0, 4);
    $mes = substr($date, 5, -3);
    $dia = substr($date, 8, 9);

    $diasemana = date("w", mktime(0, 0, 0, $mes, $dia, $ano));

    switch ($diasemana) {
        case "0":
            $diasemana = "Domingo";
            break;
        case "1":
            $diasemana = "Segunda-Feira";
            break;
        case "2":
            $diasemana = "Terça-Feira";
            break;
        case "3":
            $diasemana = "Quarta-Feira";
            break;
        case "4":
            $diasemana = "Quinta-Feira";
            break;
        case "5":
            $diasemana = "Sexta-Feira";
            break;
        case "6":
            $diasemana = "Sábado";
            break;
    }

    return $partial ? explode('-', $diasemana)[0] : $diasemana;
}

function ano($date, $format = 'y') {
    return $date ? DateTime::createFromFormat('Y-m-d', $date)->format($format) : NULL;
}

function mes($date, $format = 'm') {
    return $date ? DateTime::createFromFormat('Y-m-d', $date)->format($format) : NULL;
}

function doisDigitos($num) {
    return str_pad($num, 2, "0", STR_PAD_LEFT);
}

function removeEspeciais($valor) {
    $valor = preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($valor)));
    return $valor;
}

function deletaPastas($dir){
    foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir,FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST) as $file){
        $file->isFile() ? unlink($file->getPathname()) : rmdir($file->getPathname());
    }
    return rmdir($dir);
}

function validaCnpj($cnpj) {
    // Deixa o CNPJ com apenas números
    $cnpj = preg_replace( '/[^0-9]/', '', $cnpj );

    // Garante que o CNPJ é uma string
    $cnpj = (string)$cnpj;

    // O valor original
    $cnpj_original = $cnpj;

    // Captura os primeiros 12 números do CNPJ
    $primeiros_numeros_cnpj = substr( $cnpj, 0, 12 );

    /**
     * Multiplicação do CNPJ
     *
     * @param string $cnpj Os digitos do CNPJ
     * @param int $posicoes A posição que vai iniciar a regressão
     * @return int O
     *
     */
    if ( ! function_exists('multiplica_cnpj') ) {
        function multiplica_cnpj( $cnpj, $posicao = 5 ) {
            // Variável para o cálculo
            $calculo = 0;

            // Laço para percorrer os item do cnpj
            for ( $i = 0; $i < strlen( $cnpj ); $i++ ) {
                // Cálculo mais posição do CNPJ * a posição
                $calculo = $calculo + ( $cnpj[$i] * $posicao );

                // Decrementa a posição a cada volta do laço
                $posicao--;

                // Se a posição for menor que 2, ela se torna 9
                if ( $posicao < 2 ) {
                    $posicao = 9;
                }
            }
            // Retorna o cálculo
            return $calculo;
        }
    }

    // Faz o primeiro cálculo
    $primeiro_calculo = multiplica_cnpj( $primeiros_numeros_cnpj );

    // Se o resto da divisão entre o primeiro cálculo e 11 for menor que 2, o primeiro
    // Dígito é zero (0), caso contrário é 11 - o resto da divisão entre o cálculo e 11
    $primeiro_digito = ( $primeiro_calculo % 11 ) < 2 ? 0 :  11 - ( $primeiro_calculo % 11 );

    // Concatena o primeiro dígito nos 12 primeiros números do CNPJ
    // Agora temos 13 números aqui
    $primeiros_numeros_cnpj .= $primeiro_digito;

    // O segundo cálculo é a mesma coisa do primeiro, porém, começa na posição 6
    $segundo_calculo = multiplica_cnpj( $primeiros_numeros_cnpj, 6 );
    $segundo_digito = ( $segundo_calculo % 11 ) < 2 ? 0 :  11 - ( $segundo_calculo % 11 );

    // Concatena o segundo dígito ao CNPJ
    $cnpj = $primeiros_numeros_cnpj . $segundo_digito;

    // Verifica se o CNPJ gerado é idêntico ao enviado
    if ( $cnpj === $cnpj_original ) {
        return true;
    }
    return false;
}
function validaDate($data) {
    $data = explode("-","$data"); // fatia a string $dat em pedados, usando / como referência
    $y = $data[0];
    $y = filter_var($data[0], FILTER_SANITIZE_NUMBER_INT);
    $m = $data[1];
    $m = filter_var($data[1],FILTER_SANITIZE_NUMBER_INT);
    $d = $data[2];
    $d = filter_var($data[2], FILTER_SANITIZE_NUMBER_INT);

    $res = checkdate($m,$d,$y);
    if ($res == 1){
        return TRUE;
    } else {
        return FALSE;
    }
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
