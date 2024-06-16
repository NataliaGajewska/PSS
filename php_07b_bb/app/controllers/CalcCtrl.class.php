<?php
namespace app\controllers;
use app\forms\CalcForm;
use app\transfer\CalcResult;
class CalcCtrl {

	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku

	/** 
	 * Konstruktor - inicjalizacja właściwości
	 */
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}
	
	/** 
	 * Pobranie parametrów
	 */
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
	

	public function action_calcCompute(){

		$this->getParams();
		
		if ($this->validate()) {
				
			$this->form->cr_amt = floatval($this->form->cr_amt);
			$this->form->year = floatval($this->form->year);
                        $this->form->rate = floatval($this->form->rate);
			getMessages()->addInfo('Parametry poprawne.');
				
			//wykonanie operacji
			$this->result->result = ($this->form->cr_amt + ($this->form->cr_amt * $this->form->rate)/100)/(12*$this->form->year);
			
			getMessages()->addInfo('Wykonano obliczenia.');
		}
		
		$this->generateView();
	}
	
	public function action_calcShow(){
		getMessages()->addInfo('Witaj w kalkulatorze');
		$this->generateView();
	}
	
	/**
	 * Wygenerowanie widoku
	 */
	public function generateView(){

		getSmarty()->assign('user',unserialize($_SESSION['user']));
				
		getSmarty()->assign('page_title','kalkulator kredytowy');

		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('res',$this->result);
		
		getSmarty()->display('CalcView.tpl');
	}
}
