<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';
//załaduj Smarty
require_once _ROOT_PATH.'/lib/smarty/Smarty.class.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

//ochrona kontrolera - poniższy skrypt przerwie przetwarzanie w tym punkcie gdy użytkownik jest niezalogowany
//include _ROOT_PATH.'/app/security/check.php';

// pobranie parametrów
function getParams(&$form){
	$form['amount'] = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : null;
	$form['years'] = isset($_REQUEST['years']) ? $_REQUEST['years'] : null;
	$form['interest'] = isset($_REQUEST['interest']) ? $_REQUEST['interest'] : null;
}

// walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
function validate(&$form,&$infos,&$msgs,&$hide_intro){

	if ( ! (isset($form['amount']) && isset($form['years']) && isset($form['interest']))) {
		// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
		// teraz zakładamy, ze nie jest to błąd. Po prostu nie wykonamy obliczeń
		return false;
	}
        //parametry przekazane zatem
	//nie pokazuj wstępu strony gdy tryb obliczeń (aby nie trzeba było przesuwać)
	// - ta zmienna zostanie użyta w widoku aby nie wyświetlać całego bloku itro z tłem 
	$hide_intro = true;
        
        $infos [] = 'Przekazano parametry.';
        
	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $form['amount'] == "") {
		$msgs [] = 'Nie podano kwoty kredytu';
	}
	if ( $form['years'] == "") {
		$msgs [] = 'Nie podano na ile lat';
	}
	if ( $form['interest'] == "") {
		$msgs [] = 'Nie podano jakie oprocentowanie';
	}

	//nie ma sensu walidować dalej gdy brak parametrów
	if (count($msgs)>0) return false;
	
	// sprawdzenie, czy $amount, %years i $interest są poprawne
	if (! is_numeric( $form['amount'] ) || $form['amount'] < 0) {
		$msgs [] = 'Kwota nie jest liczbą całkowitą lub jest ujemna';
	}
	
	if (! is_numeric( $form['years'] ) || $form['years'] < 0) {
		$msgs [] = 'Okres nie jest liczbą całkowitą lub jest ujemny';
	}	

	if (! is_numeric( $form['interest'] ) || $form['interest'] < 0) {
		$msgs [] = 'Oprocentowanie nie jest liczbą całkowitą lub jest ujemne';
	}
	if (count($msgs)>0) return false;
	else return true;
}

//  wykonaj zadanie jeśli wszystko w porządku
function process(&$form,&$infos,&$msgs,&$result){
    
        $infos [] = 'Parametry poprawne. Wykonuję obliczenia.';
	global $role;

	if (empty ( $msgs )) { // gdy brak błędów
		
		//konwersja parametrów na int
		$form['amount'] = intval($form['amount']);
		$form['years'] = intval($form['years']);
		$form['interest'] = intval($form['interest']);
                
                $result = ($form['amount']*($form['interest']/100)+$form['amount'])/($form['years']*12);
		/*
		if ($role == 'admin'){
			$result = ($form['amount']*($form['interest']/100)+$form['amount'])/($form['years']*12);
		}else{
			$msgs [] = 'Tylko administrator może używać tego kalkulatora!';
		}*/
	}
}

//definicja zmiennych kontrolera
$form = null;
$infos = array();
$messages = array();
$result = null;
$hide_intro = false;

//pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
getParams($form);
if ( validate($form,$infos,$messages,$hide_intro) ){
	process($form,$infos,$messages,$result);
}

// 4. Przygotowanie danych dla szablonu

$smarty = new Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Przykład 04');
$smarty->assign('page_description','Profesjonalne szablonowanie oparte na bibliotece Smarty');
$smarty->assign('page_header','Szablony Smarty');

$smarty->assign('hide_intro',$hide_intro);

//pozostałe zmienne niekoniecznie muszą istnieć, dlatego sprawdzamy aby nie otrzymać ostrzeżenia
$smarty->assign('form',$form);
$smarty->assign('result',$result);
$smarty->assign('messages',$messages);
$smarty->assign('infos',$infos);

// 5. Wywołanie szablonu
$smarty->display(_ROOT_PATH.'/app/calc.tpl');