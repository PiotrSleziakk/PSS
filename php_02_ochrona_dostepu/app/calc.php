<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

//ochrona kontrolera - poniższy skrypt przerwie przetwarzanie w tym punkcie gdy użytkownik jest niezalogowany
include _ROOT_PATH.'/app/security/check.php';

// pobranie parametrów
function getParams(&$amount,&$years,&$interest){
	$amount = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : null;
	$years = isset($_REQUEST['years']) ? $_REQUEST['years'] : null;
	$interest = isset($_REQUEST['interest']) ? $_REQUEST['interest'] : null;
}

// walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
function validate(&$amount,&$years,&$interest,&$messages){

	if ( ! (isset($amount) && isset($years) && isset($interest))) {
		// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
		// teraz zakładamy, ze nie jest to błąd. Po prostu nie wykonamy obliczeń
		return false;
	}

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $amount == "") {
		$messages [] = 'Nie podano kwoty kredytu';
	}
	if ( $years == "") {
		$messages [] = 'Nie podano na ile lat';
	}
	if ( $interest == "") {
		$messages [] = 'Nie podano jakie oprocentowanie';
	}

	//nie ma sensu walidować dalej gdy brak parametrów
	if (count($messages) != 0) return false;
	
	// sprawdzenie, czy $amount, %years i $interest są poprawne
	if (! is_numeric( $amount ) || $amount < 0) {
		$messages [] = 'Kwota nie jest liczbą całkowitą lub jest ujemna';
	}
	
	if (! is_numeric( $years ) || $years < 0) {
		$messages [] = 'Okres nie jest liczbą całkowitą lub jest ujemny';
	}	

	if (! is_numeric( $interest ) || $interest < 0) {
		$messages [] = 'Oprocentowanie nie jest liczbą całkowitą lub jest ujemne';
	}
	if (count($messages) != 0) return false;
	else return true;
}

//  wykonaj zadanie jeśli wszystko w porządku
function process(&$amount,&$years,&$interest,&$messages,&$result){
	global $role;

	if (empty ( $messages )) { // gdy brak błędów
		
		//konwersja parametrów na int
		$amount = intval($amount);
		$years = intval($years);
		$interest = intval($interest);
		
		if ($role == 'admin'){
			$result = ($amount*($interest/100)+$amount)/($years*12);
		}else{
			$messages [] = 'Tylko administrator może używać tego kalkulatora!';
		}
	}
}

//definicja zmiennych kontrolera
$amount = null;
$years = null;
$interest = null;
$result = null;
$messages = array();

//pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
getParams($amount,$years,$interest);
if (validate($amount,$years,$interest,$messages)) { // gdy brak błędów
	process($amount,$years,$interest,$messages,$result);
}

//  Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';