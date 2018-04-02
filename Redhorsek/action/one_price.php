<?php 

	$content = render(TEMPLATE.'one_price.tpl', array('title' => 'hello'));
	global $db;
	$price = get_one_product(3);
 ?>