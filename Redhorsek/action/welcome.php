<?php  
	//проверить вошел ли пользователь
	if(!isset($_SESSION['logged_in'])) {
	header("Location:?action=login");
	}
	//взять объект user из сессии
	$user = unserialize($_SESSION['user']);
	$content = render(TEMPLATE."welcome.tpl",array("title"=>"hello"));
?>