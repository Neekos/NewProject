<?php
	define("DB_HOST",'localhost');
	define("DB_USER",'root');
	define("DB_PASS",'');
	define("DB_NAME",'my_db');

	define("TEMPLATE",'/template/default/');
	define("ACTIONS",'action/');
	define("ADMIN",'admin/');
	define("FILES",'/files/mini/');
	define("IMG_WIDTH",200);
	define("PERPAGE",4);
	define('URL','http://redhorsek:86/');
	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Нет соединения с базой данных!");
	mysqli_set_charset($db, "utf8") or die("Не установлена кодировка соединения!");
?>