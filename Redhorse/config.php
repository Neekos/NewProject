<?php 
	define("DB_HOST",'Redhorse');
	define("DB_USER",'root');
	define("DB_PASS",'');
	define("DB_NAME",'test');
	define("PREF",'red_');

	define("SITE_NAME",'http://Redhorse');
	define("TEMPLATE",'/template/default/');
	define("ACTIONS",'action/');
	define("FILES",'/files/mini/');
	define("IMG_WIDTH",200);
	define("PERPAGE",2);
	define("SITE_NAME_HEADER",'Redhorse');
	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
 ?>