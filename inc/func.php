<?php

require_once 'func_nibb.php';

/* UTILS */

function debug($array) {
	return '<pre>'.print_r($array, true).'</pre>';
}

function cutString($text, $max_length, $end = '[..]'){
	$sep = '[@]';

	if(strlen($text) > $max_length){
		$text = wordwrap($text, $max_length, $sep, true);
		$text = explode($sep, $text);
		return ucfirst($text[0].$end);
	}
	return ucfirst($text);
}

/* SESSION */

function logUser($user_info, $action){
	$_SESSION['user_id'] = $user_info['id'];
	$_SESSION['name'] = $user_info['name'];

	$action = $action == 'register' ? 'Nous vous remercions de votre inscription' : 'Connexion réussie';

	$result = $action.'. Vous allez être rediriger vers la page d\'accueil du site';
    $result .= '<script>setTimeout(function() { location.href = "index.php"; }, 3000);</script>';

	return $result;
}

function userIsLogged(){
	if(!empty($_SESSION['user_id'])){
		return true;
	}
	return false;
}
