<?php
require_once dirname(__FILE__).'/../config.php';

function getParams(&$form){
	$form['cr_amt'] = isset($_REQUEST['cr_amt']) ? $_REQUEST['cr_amt'] : null;
	$form['year'] = isset($_REQUEST['year']) ? $_REQUEST['year'] : null;
	$form['rate'] = isset($_REQUEST['rate']) ? $_REQUEST['rate'] : null;	
}

function validate(&$form,&$infos,&$msgs,&$hide_intro){

	if ( ! (isset($form['rate']) && isset($form['year']) && isset($form['cr_amt']) ))	return false;	
	
	$hide_intro = true;

	$infos [] = 'Przekazano super ważne parametry.';

	if ( $form['cr_amt'] == "") $msgs [] = 'Nie podano kwoty';
	if ( $form['year'] == "") $msgs [] = 'Nie podano liczby lat';
        if ( $form['rate'] == "") $msgs [] = 'Nie podano oprocentowania';
	
	if ( count($msgs)==0 ) {
		if (! is_numeric( $form['cr_amt'] )) $msgs [] = 'Kwota nie jest liczbą';
		if (! is_numeric( $form['year'] )) $msgs [] = 'Lata nie są liczbą';
                if (! is_numeric( $form['rate'] )) $msgs [] = 'Oprocentowanie nie jest liczbą';
	}
	
	if (count($msgs)>0) return false;
	else return true;
}
	
function process(&$form,&$infos,&$msgs,&$result){
	$infos [] = 'Parametry poprawne. Wykonuję obliczenia.';
	
        
        $form['rate'] = floatval($form['rate']);
        $form['year'] = floatval($form['year']);
        $form['cr_amt'] = floatval($form['cr_amt']);
	
	$result = ($form['cr_amt'] + ($form['cr_amt'] * $form['rate'])/100)/(12*$form['year']);
}

//inicjacja zmiennych
$form = null;
$infos = array();
$messages = array();
$result = null;
$hide_intro = false;
	
getParams($form);
if ( validate($form,$infos,$messages,$hide_intro) ){
	process($form,$infos,$messages,$result);
}

$page_title = 'Kalkulator kredytowy';
$page_description = 'Bardzo bym chciala isc spac';
$page_header = 'To jest serio super kalkulator kredytowy';
$page_footer = 'To jest stopka super kalkulatora kredytowego';

include 'calc_view.php';