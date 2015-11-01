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