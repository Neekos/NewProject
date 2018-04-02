<?php
header("content-Type:text/html;charset=UTF-8");
session_start();
require_once "/includes/global.inc.php";
require_once "/config.php";
require_once "/function.php";


//db(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//$categories =
//$razd = 
//$user = 
// Функция автоматического подключения классов
	function __autoload($var){
		include '/classes/'.$var.'.php';
	}

	$action = clear_str($_GET['action']);
	if (!$action) {
		$action = "main";
	}
	if (file_exists(ACTIONS.$action.".php")) {
		include ACTIONS.$action.".php";
	}
	else{
		include ACTIONS."main.php";
	}
	
	require_once TEMPLATE."/index.php";
	//require_once ADMIN."/index.php";
 ?>