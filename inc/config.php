<?php

session_start();

$site_name = 'Nibbler\'s Shop';

$current_page = basename($_SERVER['REQUEST_URI']);

$pages = array(
	'about' => 'page.php',
	'services' => 'page.php',
	'contact' => 'contact.php?'
);

//Get products categories
$query = $db->query('SELECT id, name FROM products_category');
$categories = $query->fetchAll();