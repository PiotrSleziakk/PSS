<?php
// W skrypcie definicji kontrolera nie trzeba dołączać już niczego.
// Kontroler wskazuje tylko za pomocą 'use' te klasy z których jawnie korzysta
// (gdy korzysta niejawnie to nie musi - np używa obiektu zwracanego przez funkcję)

// Zarejestrowany autoloader klas załaduje odpowiedni plik automatycznie w momencie, gdy skrypt będzie go chciał użyć.
// Jeśli nie wskaże się klasy za pomocą 'use', to PHP będzie zakładać, iż klasa znajduje się w bieżącej
// przestrzeni nazw - tutaj jest to przestrzeń 'app\controllers'.

// Przypominam, że tu również są dostępne globalne funkcje pomocnicze - o to nam właściwie chodziło

namespace app\controllers;

//zamieniamy zatem 'require' na 'use' wskazując jedynie przestrzeń nazw, w której znajduje się klasa
use app\forms\CalcForm;
use app\transfers\CalcResult;


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
		$this->form->amount = getFromRequest('amount');
                $this->form->years = getFromRequest('years');
                $this->form->interest = getFromRequest('interest');
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
			getMessages()->addError('Nie podano kwoty kredytu');
		}
		if ($this->form->years == "") {
			getMessages()->addError('Nie podano na ile lat');
		}
                if ($this->form->interest == "") {
			getMessages()->addError('Nie podano jakie oprocentowanie');
		}
		// nie ma sensu walidować dalej gdy brak parametrów
		if (! getMessages()->isError()) {
			
			// sprawdzenie, czy $amount, %years i $interest są poprawne
			if (! is_numeric ( $this->form->amount ) || $this->form->amount < 0) {
                            getMessages()->addError('Kwota nie jest liczbą całkowitą lub jest ujemna');
			}
			if (! is_numeric ( $this->form->years ) || $this->form->years < 0) {
                            getMessages()->addError('Okres nie jest liczbą całkowitą lub jest ujemny');
			}
                        if (! is_numeric ( $this->form->interest ) || $this->form->interest < 0) {
                            getMessages()->addError('Oprocentowanie nie jest liczbą całkowitą lub jest ujemne');
			}
		}
		return ! getMessages()->isError();
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
			getMessages()->addInfo('Parametry poprawne.');
				
                        $this->result->result = ($this->form->amount *($this->form->interest/100)+$this->form->amount)/($this->form->years*12);
			//wykonanie operacji
			
			getMessages()->addInfo('Wykonano obliczenia.');
		}
		
		$this->generateView();
	}
	
	
	/**
	 * Wygenerowanie widoku
	 */
	public function generateView(){

		getSmarty()->assign('page_title','Minima_/Credic');

		getSmarty()->assign('page_header','Kontroler głowny');
		
		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('res',$this->result);
		
		getSmarty()->display('calc.tpl'); // już nie podajemy pełnej ścieżki - foldery widoków są zdefiniowane przy ładowaniu Smarty
	}
}
