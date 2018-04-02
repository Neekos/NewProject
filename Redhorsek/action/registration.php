<?php 
	
	$username = "";
	$password = "";
	$password_confirm = "";
	$email = "";
	$error = "";
	// по нажатию кнопки регистрируем пользователя
	if (isset($_POST['submit-form'])) {
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password_confirm = $_POST['password-confirm'];
		$email = $_POST['email'];

		$success = true;
		$userTools = new UserTools();
		//Проверка совпадения пользователей
		if ($userTools->checkUsernameExists($username)) {
			$error .= "That username is already taken . <br/> \n\r";
			$success = false;
		}
		//Проверка совпадения повторяемого пароля 
		if ($password != $password_confirm) {
			$error .= "password do not match. <br/> \n\r";
			$success = false;
		}
		//если успех сохраняем в $data[]
		if ($success) {
			$data['username'] = $username;
			$data['password'] = md5($password);
			$data['email'] = $email;

			$newUser = new User($data);

			$newUser->save(true);

			$userTools->login($username, $password);
			//ридеректим на index.php
			header("Location:?action=welcome");
		}
	}
	require_once "/includes/global.inc.php";
	$content = render(TEMPLATE."registration.tpl",array("title"=>"hello"));
?>
