<?php
require_once dirname(__FILE__).'/../config.php';
require_once _ROOT_PATH.'/lib/smarty/Smarty.class.php';

function getParams(&$form){
	$form['cr_amt'] = isset($_REQUEST['cr_amt']) ? $_REQUEST['cr_amt'] : null;
	$form['year'] = isset($_REQUEST['year']) ? $_REQUEST['year'] : null;
	$form['rate'] = isset($_REQUEST['rate']) ? $_REQUEST['rate'] : null;	
}

//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$form,&$infos,&$msgs){

	if ( ! (isset($form['rate']) && isset($form['year']) && isset($form['cr_amt']) ))	return false;	
	
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
	
getParams($form);
if ( validate($form,$infos,$messages) ){
	process($form,$infos,$messages,$result);
}

// 4. Przygotowanie danych dla szablonu

$smarty = new Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','kalkulator kredytowy');
$smarty->assign('page_description','To jest super szary kalkulator kredytowy z wykożystaniem szablonów smarty');
$smarty->assign('page_header','Szary kalkulator kredytowy');

//pozostałe zmienne niekoniecznie muszą istnieć, dlatego sprawdzamy aby nie otrzymać ostrzeżenia
$smarty->assign('form',$form);
$smarty->assign('result',$result);
$smarty->assign('messages',$messages);
$smarty->assign('infos',$infos);

// 5. Wywołanie szablonu
$smarty->display(_ROOT_PATH.'/app/calc.html');