<?php 
header("content-Type:text/html;charset=UTF-8");
session_name('MyCookies');
session_start();

require_once "/config.php";
require_once "/function.php";


	$action = clear_str($_GET['action']);
	if (!$action) {
		$action = "osnova";
	}
	if (file_exists(ACTIONS.$action.".php")) {
		include ACTIONS.$action.".php";
	}
	else{
		include ACTIONS."osnova.php";
	}
	
	require_once TEMPLATE."index.php";
 ?>