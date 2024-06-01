<?php

require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path.'/app/CalcForm.class.php';
require_once $conf->root_path.'/app/CalcResult.class.php';

class CalcCtrl {

	private $msgs;   
	private $form;   
	private $result; 

	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->msgs = new Messages();
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}
	

	public function getParams(){
		$this->form->cr_amt = isset($_REQUEST ['cr_amt']) ? $_REQUEST ['cr_amt'] : null;
		$this->form->year = isset($_REQUEST ['year']) ? $_REQUEST ['year'] : null;
		$this->form->rate = isset($_REQUEST ['rate']) ? $_REQUEST ['rate'] : null;
	}
	

	public function validate() {
		// sprawdzenie, czy parametry zostały przekazane
		if (! (isset ( $this->form->cr_amt ) && isset ( $this->form->year ) && isset ( $this->form->rate ))) {
			return false; 
		}
		
		if ($this->form->cr_amt == "") {
			$this->msgs->addError('Nie podano kwoty');
		}
		if ($this->form->year == "") {
			$this->msgs->addError('Nie podano liczby lat');
		}
                if ($this->form->rate == "") {
			$this->msgs->addError('Nie podano oprocentowania');
		}
		
		if (! $this->msgs->isError()) {
			
			if (! is_numeric ( $this->form->cr_amt )) {
				$this->msgs->addError('Kwota nie jest liczbą');
			}
			
			if (! is_numeric ( $this->form->year )) {
				$this->msgs->addError('Lata nie są liczbą');
			}
                        if (! is_numeric ( $this->form->rate )) {
				$this->msgs->addError('Oprocentowanie nie jest liczbą');
			}
		}
		
		return ! $this->msgs->isError();
	}
	

	public function process(){

		$this->getparams();
		
		if ($this->validate()) {
				
			$this->form->cr_amt = floatval($this->form->cr_amt);
			$this->form->year = floatval($this->form->year);
                        $this->form->rate = floatval($this->form->rate);
			$this->msgs->addInfo('Parametry poprawne.');
				
			$this->result->result = ($this->form->cr_amt + ($this->form->cr_amt * $this->form->rate)/100)/(12*$this->form->year);
			
			$this->msgs->addInfo('Wykonano obliczenia.');
		}
		
		$this->generateView();
	}
	
	
	public function generateView(){
		global $conf;
		
		$smarty = new Smarty();
		$smarty->assign('conf',$conf);
		
		$smarty->assign('page_title','kalkulator kredytowy');
		$smarty->assign('page_description','To jest super szary kalkulator kredytowy z wykożystaniem szablonów smarty');
		$smarty->assign('page_header','Szary kalkulator kredytowy');
				
		$smarty->assign('msgs',$this->msgs);
		$smarty->assign('form',$this->form);
		$smarty->assign('res',$this->result);
		
		$smarty->display($conf->root_path.'/app/CalcView.html');
	}
}
