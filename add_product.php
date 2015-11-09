<?php

	require_once 'partials/head.php';

	$product_id = !empty($_GET['product']) ? intval($_GET['product']) : 0;
	$quantity = !empty($_POST['quantity']) ? intval($_POST['quantity']) : 1;



	if(!isset($_COOKIE['user_cart'])){
		$user_cart = array();
		$user_cart_length = 0;

		setcookie($user_cart, serialize($user_cart), time() + (86400 * 30), '/');
		$_COOKIE['user_cart'] = $user_cart;
	}

	if(!empty($product_id)){
		$user_cart = $_COOKIE['user_cart'];

		if(!empty($user_cart)){
			$user_cart_length = count($user_cart);
		}

		echo debug($user_cart_length);

		setcookie($user_cart[$product_id], , time() + (86400 * 30), '/');
		$_COOKIE['user_cart'] = $user_cart;

	}


echo debug($user_cart);

?>


<?php
    require_once 'partials/footer.php';