<?php
	$error = "";
	$username = "";
	$password = "";
	//Условие на вход 
	if (isset($_POST['submit-login'])) {
		//Если $_post[] нажат записываем посты в переменные
		$username = $_POST['username'];
		$password = $_POST['password'];
		//Создаю новый объект UserTools и вызваю метод логин
		$userTools = new userTools;
		if ($userTools->login($username, $password)) {
			$_SESSION['logged_user'] = $username;
			header("Location:?action=welcome");
		}else{
			$error = "Incorrect username  or password. Please try again";
		}
	}
	require_once 'includes/global.inc.php';
	$content = render(TEMPLATE."login.tpl",array("title"=>"hello"));
?>