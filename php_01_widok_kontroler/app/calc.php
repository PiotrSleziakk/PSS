<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów

$amount = $_REQUEST ['amount'];
$years = $_REQUEST ['years'];
$interest = $_REQUEST ['interest'];

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($amount) && isset($years) && isset($interest))) {
	//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
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
if (empty( $messages )) {
	
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

}

// 3. wykonaj zadanie jeśli wszystko w porządku

if (empty ( $messages )) { // gdy brak błędów
	
	//konwersja parametrów na int
	$amount = intval($amount);
	$years = intval($years);
	$interest = intval($interest);
	
	$result = ($amount*($interest/100)+$amount)/($years*12);
	
}

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';