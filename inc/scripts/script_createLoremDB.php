<?php

require_once '../db.php';

$text= nl2br('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum laoreet nisl sit amet ullamcorper. Donec ultricies feugiat odio et consectetur. Duis et facilisis mi. Aenean tempus massa tellus, ut posuere magna luctus at. Fusce egestas massa purus, eu tempor est vulputate eleifend. Phasellus sollicitudin, turpis id venenatis rhoncus, erat lectus eleifend risus, at interdum sem dolor vitae tellus. Duis dui risus, auctor eget metus ullamcorper, tincidunt ornare nisi. Quisque luctus faucibus eleifend.

Phasellus at justo iaculis arcu hendrerit euismod sit amet a nibh. Aliquam eleifend dolor vel molestie pulvinar. Donec vestibulum metus id neque pellentesque, ac pulvinar est luctus. Aliquam faucibus sem et risus eleifend, at venenatis massa fringilla. Sed sit amet posuere urna, non molestie enim. Donec fringilla arcu et urna pellentesque, et viverra arcu aliquet. Nunc dapibus hendrerit ante vitae bibendum. Duis commodo felis nec diam venenatis luctus. Fusce tempus dolor eu orci vulputate, eu blandit mi rutrum.

Quisque non est et mauris ornare viverra. Nunc a orci eget sem tincidunt pulvinar. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In et hendrerit ipsum, a semper magna. Suspendisse convallis leo at fermentum imperdiet. Maecenas pretium sollicitudin ligula eu tempus. Vestibulum accumsan, massa et laoreet bibendum, justo arcu mattis libero, eget ullamcorper nisl arcu sit amet tortor. Morbi a justo sollicitudin, ornare erat ac, sagittis tortor. Nunc orci sapien, facilisis ut tincidunt a, mattis eget neque.

Mauris aliquet lorem arcu, vel semper ex posuere quis. Cras ac nulla mattis, elementum velit eu, tristique tellus. In rhoncus elit at erat efficitur vestibulum. Quisque euismod fermentum accumsan. Pellentesque id ullamcorper quam. Vestibulum vehicula sit amet lectus gravida porta. Pellentesque feugiat dignissim ultricies.

Etiam vitae justo ante. Curabitur gravida in justo dictum commodo. In hac habitasse platea dictumst. Nulla eget dui vehicula, venenatis magna a, tincidunt turpis. Donec a aliquam mi, eget interdum diam. Nullam turpis elit, mattis id porttitor nec, aliquet vitae mi. Mauris vel sem quis libero tempor posuere. Nunc non aliquet nisl, at accumsan diam. Phasellus vitae viverra quam. Nam iaculis, arcu eu aliquam dictum, mi leo pharetra nunc, eu luctus sapien tellus sed erat. Nullam tempus sapien vel ipsum accumsan, in porttitor elit varius. Vestibulum vel tortor sed justo vehicula pretium. Praesent magna purus, euismod et vestibulum vitae, condimentum a mauris. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean ultrices nibh in nunc rhoncus, ac aliquet ante mollis.

Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed maximus eros eget sem mollis bibendum. Donec convallis viverra metus a mattis. Vivamus consectetur ultrices justo nec sollicitudin. Vivamus nibh est, faucibus id nulla vel, sodales interdum sem. Pellentesque congue et magna quis vehicula. Cras sagittis lacinia sapien.

Aliquam quis dui nec augue pharetra sodales. Quisque vehicula ut nibh sed imperdiet. Fusce ut leo nunc. Vivamus id tortor at lorem ullamcorper malesuada. Suspendisse tempor nisi orci, vitae rhoncus neque egestas vitae. Vestibulum nisi magna, placerat a orci et, elementum condimentum nisl. Integer semper purus orci, non volutpat turpis gravida eu. Sed nec sagittis purus, at mattis metus. Donec suscipit tellus enim, a sollicitudin sem vulputate quis. Donec vitae euismod nisl. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse vehicula mauris nunc, et fermentum elit malesuada vel. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer est risus, scelerisque ut ipsum sed, vulputate pellentesque libero. Fusce et diam ut urna tincidunt porttitor eu in ex. Suspendisse potenti.

Cras molestie non metus in posuere. Etiam sollicitudin augue sit amet luctus tincidunt. In dapibus nulla sit amet elit molestie, id viverra nunc blandit. In tortor nibh, scelerisque sit amet imperdiet non, feugiat sit amet eros. Fusce porttitor vitae dui in placerat. Aenean non malesuada ligula. Morbi sit amet tortor vel tortor tincidunt posuere. Praesent elit sem, ultricies vitae auctor venenatis, volutpat mattis ex. Maecenas iaculis mi et sem finibus tristique. Morbi ut luctus enim. Integer posuere sem turpis. Quisque maximus diam aliquam dui imperdiet, nec cursus quam pellentesque. Duis ipsum nibh, tristique nec nulla eget, auctor interdum lectus. Phasellus quis fringilla mauris. Integer ex nisi, rhoncus ac ullamcorper a, maximus in justo. Ut in nunc dictum, lacinia risus ut, mattis sem.

Vestibulum tempor euismod lacus. Ut bibendum, diam in laoreet eleifend, nisi leo fermentum lacus, ut vulputate nulla mauris nec mi. Ut rutrum libero sit amet mi imperdiet luctus. Fusce rhoncus enim lobortis metus pulvinar luctus. Pellentesque pharetra auctor lacus, nec venenatis odio tempus euismod. Donec ut mi orci. Donec semper consectetur turpis, et consectetur ex viverra id.

Nam aliquet eros eu erat tincidunt imperdiet. Nunc id mi a libero consequat blandit lobortis nec erat. Duis eget elit vulputate, viverra nulla ac, aliquam neque. Praesent neque nulla, pretium vitae dolor consectetur, porttitor consequat risus. Duis dictum ac urna ut mattis. Suspendisse id quam ut tellus viverra facilisis sit amet et odio. In tempor, lorem quis lobortis hendrerit, dui nisi hendrerit metus, vitae tristique enim mauris eu nisi.');
$text = strtolower(str_replace(';', '.', $text));

$list_texts = explode('<br />'.PHP_EOL.'<br />'.PHP_EOL, $text);

$posts = array();

$prices = array(
	40.90,
	25.50,
	105.79,
	35.50
	);

$current_time = strtotime('now');

$change_time = array(
	'-1 day',
	'-3 days',
	'-1 week',
	'-2 weeks',
	'-1 month'
	);

foreach($list_texts as $key => $post){

	$posts[$key]['name'] = substr($post, 0, strpos($post, '.'));
	$posts[$key]['description'] = substr($post, strlen($posts[$key]['name'])+3);
	$posts[$key]['picture'] = 'product'.($key+1).'.jpg';
	$posts[$key]['category'] = rand(1,5);
	$posts[$key]['price'] = $prices[rand(0,3)];
	$posts[$key]['date'] = date('Y-m-d H:i:s', $current_time);
	$current_time = strtotime($change_time[rand(0,4)], $current_time);


	$query = $db->prepare('INSERT INTO products SET name = :name, description = :description, date = :date, picture = :picture, category = :category, price = :price');
	$query->bindValue('name', $posts[$key]['name']);
	$query->bindValue('picture', $posts[$key]['picture']);
	$query->bindValue('description', $posts[$key]['description']);
	$query->bindValue('category', $posts[$key]['category'], PDO::PARAM_INT);
	$query->bindValue('price', strval($posts[$key]['price']));
	$query->bindValue('date', $posts[$key]['date']);
	$query->execute();
}

echo '<pre>';
echo print_r($posts);
echo '</pre>';

$last_id = $db->lastInsertId();
echo "Dernier id inséré:".$last_id;