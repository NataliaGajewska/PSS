<?php

require_once dirname(__FILE__).'/../config.php';

include _ROOT_PATH.'/app/security/check.php';

function getParams(&$cr_amt,&$years,&$rate){
	$cr_amt = isset($_REQUEST['cr_amt']) ? $_REQUEST['cr_amt'] : null;
	$years = isset($_REQUEST['years']) ? $_REQUEST['years'] : null;
	$rate = isset($_REQUEST['rate']) ? $_REQUEST['rate'] : null;	
}



function validate(&$cr_amt,&$years,&$rate,&$messages){

// sprawdzenie, czy parametry zostały przekazane
    if ( ! (isset($cr_amt) && isset($years) && isset($rate))) {
        return false;
    }

    // sprawdzenie, czy potrzebne wartości zostały przekazane
    if ( $cr_amt == "") {
            $messages [] = 'Nie podano kwoty';
    }
    if ( $years == "") {
            $messages [] = 'Nie podano liczby lat';
    }

    if ( $rate == "") {
            $messages [] = 'Nie podano oprocentowania';	
    }

    if (empty( $messages )) {

            if (! is_numeric( $cr_amt ) || floatval($cr_amt) <= 0) {
                    $messages [] = 'Kwota nie jest liczbą większą od zera';
            }

            if (! is_numeric( $years ) || floatval($years) <= 0) {
                    $messages [] = 'Liczba lat nie jest liczbą większą od zera';
            }	

            if (! is_numeric( $rate ) || floatval($rate) <= 0) {
                    $messages [] = 'Oprocentowanie nie jest liczbą większą od zera';
            }
            
            if (count($messages) != 0) {
                return false;
            } else {
                return true;
            }
    }
}

// 3. wykonaj zadanie jeśli wszystko w porządku

function process(&$cr_amt,&$years,&$rate,&$result){
	global $role;
	
	$rate = floatval($rate);
	$year = floatval($years);
	$cr_amt = floatval($cr_amt);
	
	$result = ($cr_amt + ($cr_amt * $rate)/100)/(12*$years);
}


//definicja zmiennych kontrolera
$rate = null;
$year = null;
$cr_amt = null;
$result = null;
$messages = array();

//pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
getParams($cr_amt,$years,$rate);
if ( validate($cr_amt,$years,$rate,$messages) ) { // gdy brak błędów
	process($cr_amt,$years,$rate,$result);
}

include 'calc_view.php';