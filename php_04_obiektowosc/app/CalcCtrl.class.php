<?php
// W skrypcie definicji kontrolera nie trzeba dołączać problematycznego skryptu config.php,
// ponieważ będzie on użyty w miejscach, gdzie config.php zostanie już wywołany.

require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path.'/app/CalcForm.class.php';
require_once $conf->root_path.'/app/CalcResult.class.php';

class CalcCtrl {

	private $msgs;   //wiadomości dla widoku
	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku
	private $hide_intro; //zmienna informująca o tym czy schować intro

	/** 
	 * Konstruktor - inicjalizacja właściwości
	 */
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->msgs = new Messages();
		$this->form = new CalcForm();
		$this->result = new CalcResult();
		$this->hide_intro = false;
	}
	
	/** 
	 * Pobranie parametrów
	 */
	public function getParams(){
		$this->form->amount = isset($_REQUEST ['amount']) ? $_REQUEST ['amount'] : null;
		$this->form->years = isset($_REQUEST ['years']) ? $_REQUEST ['years'] : null;
		$this->form->interest = isset($_REQUEST ['interest']) ? $_REQUEST ['interest'] : null;
	}
        
	/**
	 * Walidacja parametrów
	 * @return true jeśli brak błedów, false w przeciwnym wypadku 
	 */
	public function validate() {

		if (! (isset ( $this->form->amount ) && isset ( $this->form->years ) && isset ( $this->form->interest ))) {
			// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
			return false; //zakończ walidację z błędem
		}
		// sprawdzenie, czy potrzebne wartości zostały przekazane
		if ($this->form->amount == "") {
			$this->msgs->addError('Nie podano kwoty kredytu');
		}
		if ($this->form->years == "") {
			$this->msgs->addError('Nie podano na ile lat');
		}
                if ($this->form->interest == "") {
			$this->msgs->addError('Nie podano jakie oprocentowanie');
		}
		// nie ma sensu walidować dalej gdy brak parametrów
		if (! $this->msgs->isError()) {
			
			// sprawdzenie, czy $amount, %years i $interest są poprawne
			if (! is_numeric ( $this->form->amount ) || $this->form->amount < 0) {
				$this->msgs->addError('Kwota nie jest liczbą całkowitą lub jest ujemna');
			}
			if (! is_numeric ( $this->form->years ) || $this->form->years < 0) {
				$this->msgs->addError('Okres nie jest liczbą całkowitą lub jest ujemny');
			}
                        if (! is_numeric ( $this->form->interest ) || $this->form->interest < 0) {
				$this->msgs->addError('Oprocentowanie nie jest liczbą całkowitą lub jest ujemne');
			}
		}
		return ! $this->msgs->isError();
	}
	
	/** 
	 * Pobranie wartości, walidacja, obliczenie i wyświetlenie
	 */
	public function process(){

		$this->getparams();
		
		if ($this->validate()) {
				
			//konwersja parametrów na int
			$this->form->amount = intval($this->form->amount);
			$this->form->years = intval($this->form->years);
                        $this->form->interest = intval($this->form->interest);
			$this->msgs->addInfo('Parametry poprawne.');
				
                        $this->result->result = ($this->form->amount *($this->form->interest/100)+$this->form->amount)/($this->form->years*12);
			//wykonanie operacji
			
			$this->msgs->addInfo('Wykonano obliczenia.');
		}
		
		$this->generateView();
	}
	
	
	/**
	 * Wygenerowanie widoku
	 */
	public function generateView(){
		global $conf;
		
		$smarty = new Smarty();
		$smarty->assign('conf',$conf);
		
		$smarty->assign('page_title','Minima_/Credic');
		$smarty->assign('page_description','Obiektowość. Funkcjonalność aplikacji zamknięta w metodach różnych obiektów. Pełen model MVC.');
		$smarty->assign('page_header','Obiekty w PHP');
		
		$smarty->assign('msgs',$this->msgs);
		$smarty->assign('form',$this->form);
		$smarty->assign('res',$this->result);
		
		$smarty->display($conf->root_path.'/app/calc.tpl');
	}
}
