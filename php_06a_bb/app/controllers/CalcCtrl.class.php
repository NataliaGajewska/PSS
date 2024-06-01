<?php

require_once 'CalcForm.class.php';
require_once 'CalcResult.class.php';

class CalcCtrl {

	private $form;   
	private $result; 


	public function __construct(){
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}
	

	public function getParams(){
		$this->form->cr_amt = getFromRequest('cr_amt');
		$this->form->year = getFromRequest('year');
		$this->form->rate = getFromRequest('rate');
	}
	

	public function validate() {
		// sprawdzenie, czy parametry zostały przekazane
		if (! (isset ( $this->form->cr_amt ) && isset ( $this->form->year ) && isset ( $this->form->rate ))) {
			return false; 
		}
		
		if ($this->form->cr_amt == "") {
			getMessages()->addError('Nie podano kwoty');
		}
		if ($this->form->year == "") {
			getMessages()->addError('Nie podano liczby lat');
		}
                if ($this->form->rate == "") {
			getMessages()->addError('Nie podano oprocentowania');
		}
		
		if (! getMessages()->isError()) {
			
			if (! is_numeric ( $this->form->cr_amt )) {
				getMessages()->addError('Kwota nie jest liczbą');
			}
			
			if (! is_numeric ( $this->form->year )) {
				getMessages()->addError('Lata nie są liczbą');
			}
                        if (! is_numeric ( $this->form->rate )) {
				getMessages()->addError('Oprocentowanie nie jest liczbą');
			}
		}
		
		return ! getMessages()->isError();
	}
        
	public function process(){

		$this->getParams();
		
		if ($this->validate()) {
				
			$this->form->cr_amt = floatval($this->form->cr_amt);
			$this->form->year = floatval($this->form->year);
                        $this->form->rate = floatval($this->form->rate);
			$this->msgs->addInfo('Parametry poprawne.');
				
			$this->result->result = ($this->form->cr_amt + ($this->form->cr_amt * $this->form->rate)/100)/(12*$this->form->year);
			
			}
			
		$this->generateView();
	}
	
	

	public function generateView(){
		getSmarty()->assign('page_title','kalkulator kredytowy');
		getSmarty()->assign('page_description','To jest super szary kalkulator kredytowy z wykożystaniem szablonów smarty');
		getSmarty()->assign('page_header','Szary kalkulator kredytowy');
					
		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('res',$this->result);
		
		getSmarty()->display('CalcView.html'); 
	}
}
