<?php
require_once dirname(__FILE__).'/../config.php';

$cr_amt = $_REQUEST ['cr_amt'];
$years = $_REQUEST ['years'];
$int_rate = $_REQUEST ['int_rate'];

if ( ! (isset($cr_amt) && isset($years) && isset($int_rate))) {
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

if ( $cr_amt == "") {
	$messages [] = 'Nie podano kwoty kredytu';
}
if ( $years == "") {
	$messages [] = 'Nie podano lat';
}
if ( $int_rate == "") {
	$messages [] = 'Nie podano oprocentowania';
}

if (empty( $messages )) {
	
	if (! is_numeric($cr_amt) || $cr_amt <= 0) {
		$messages [] = 'Kwota kredytu nie jest prawidłowa';
	}
	
	if (! is_numeric($years) || $years <= 0) {
		$messages [] = 'Liczba lat nie jest prawidłowa';
	}

	if (! is_numeric($int_rate) || $int_rate <= 0) {
		$messages [] = 'Oprocentowanie nie jest prawidłowe';
	}

}


if (empty ( $messages )) { // gdy brak błędów
	
	$cr_amt = floatval($cr_amt);
	$years = floatval($years);
	$int_rate = floatval($int_rate);
	
	$result = ($cr_amt + ($cr_amt * $int_rate)/100)/(12*$years);
	
}

include 'calc_view.php';