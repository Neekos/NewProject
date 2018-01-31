<?php 
    # Отчистка строки
	function clear_str($str){
		return trim(strip_tags($str));
	}
    # Шаблонизатор
	function render($path,$param = array()){
		extract($param);

		ob_start();

		if (!include($path)) {
			exit("Нет такого шаблона");
		}
		return ob_get_clean();
	}
    # Регистрация
	function registration($post){
		$login = clear_str($post['reg_login']);
		$password = trim($post['reg_password']);
		$conf_pass = trim($post['reg_password_confirm']);
		$email =clear_str($post['reg_email']);
		$name = clear_str($post['reg_name']);

		$msg = '';

		if(empty($login)){
			$msg = "Введите логин <br/>";			
		}
		if(empty($password)){
			$msg = "Введите password <br/>";
		}
		if(empty($email)){
			$msg = "Введите email <br/>";
		}
		if(empty($name)){
			$msg = "Введите name <br/>";
		}
		if($msg){
			$_SESSION['reg']['login'] = $login;
			$_SESSION['reg']['email'] = $email;
			$_SESSION['reg']['name'] = $name;
			return $msg;
		}

		if($conf_pass == $password){
			$sql = "SELECT user_id FROM ".PREF."users WHERE login='%s'";

			$sql = sprintf($sql, mysqli_real_escape_string($db, $login));

			$result = mysqli_query($db,$sql);

			if(mysqli_num_rows($db,$result) > 0){
				$_SESSION['reg']['email'] = $email;
				$_SESSION['reg']['name'] = $name;
				return "Пользователь с таким логином уже существует";
			}
			$password = md5($password);

			$hash = md5(microtime());

			$query = "INSERT INTO".PREF."users(
												name,
												email,
												password,
												login,
												hash
												)
										VALUES(
												'%s',
												'%s',
												'%s',
												'%s',
												'$hash'
												)";
			$query = sprintf($query,
									mysqli_real_escape_string($db,$name),
									mysqli_real_escape_string($db,$email),
									$password,
									mysqli_real_escape_string($db,$login)
							);
			$result2 = mysqli_query($db,$query);

			if(!$result2){
				$_SESSION['reg']['login'] = $login;
				$_SESSION['reg']['email'] = $email;
				$_SESSION['reg']['name'] = $name;
				return "Ошибка при добавлении пользователя в базу данных".mysql_error();
			}
			else {
				$headers = '';
				$headers .= "From: Admin <admin@mail.ru> \r\n";
				$headers .= "Content-Type: text/plain; charset=utf8";
				
				$tema = "registration";
				
				$mail_body = "Спасибо за регистрацию на сайте. Ваша ссылка для подтверждения  учетной записи: ".SITE_NAME."?action=registration&hash=".$hash;
				
				mail($email,$tema,$mail_body,$headers);
				
				return TRUE;
			}								
			
			}
			else {
				$_SESSION['reg']['login'] = $login;
				$_SESSION['reg']['email'] = $email;
				$_SESSION['reg']['name'] = $name;
				return "Вы не правильно подтвердили пароль";


		}
	}
	# Функция для генерации случайной строки
	function generateCode($length=6) {

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";

    $code = "";

    $clen = strlen($chars) - 1;  
    while (strlen($code) < $length) {

            $code .= $chars[mt_rand(0,$clen)];  
    }

    return $code;

}	
    # Получить все фото
    function image_getall(){
        global $db;
        $sqli = 'SELECT * FROM image';
        $result = mysqli_query($db, $sqli);
        $image = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $image;
    }
    # Получить все посты
    function posts_getall(){
        global $db;
        $sqli = 'SELECT * FROM posts';
        $result = mysqli_query($db, $sqli);
        $post = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $post;
    }
    # Добавить фото
    function add_photo(){
    	global $db;
        $sqli = 'INSERT INTO image (title, img) VALUES (?, ?)';
        // подготовка запроса
        $gona = mysqli_prepare($db, $sqli);
        // Здаем значение параметров строками ss
        mysqli_stmt_bind_para($gona, 'ss', $title, $img);

        $title = $_POST['title'];
        $img = $_POST['img'];

        mysqli_stmt_execute($gona);
        
        mysqli_stmt_close($gona);
        mysqli_close($db);
    }
    # Добавить Посты
    function add_Posts(){
    	global $db;
        $sqli = 'INSERT INTO posts (title, content) VALUES (?, ?)';
        // подготовка запроса
        $gona = mysqli_prepare($db, $sqli);
        // Здаем значение параметров строками ss
        mysqli_stmt_bind_param($gona, 'ss', $title, $content);

        $title = $_POST['title'];
        $content = $_POST['content'];

        mysqli_stmt_execute($gona);
        
        mysqli_stmt_close($gona);
        mysqli_close($db);
    }
    # Обновить пост
    function update_posts(){
    	global $db;

    	$sqli = 'UPDATE posts SET title = ? WHERE id_post = ?';
    	$gona = mysqli_prepare($db, $sqli);
    	mysqli_stmt_bind_param($gona, 'si', $title,  $id_post);
    	$title = $_POST['title'];
        $id_post = $_POST['id_post'];

        mysqli_stmt_execute($gona);
        mysqli_stmt_close($gona);
        mysqli_close($db);
    }
    # Удаление постов
    function delete_posts(){
    	global $db;

    	$sqli = 'DELETE FROM posts WHERE id_post = ?';
    	$gona = mysqli_prepare($db, $sqli);
    	mysqli_stmt_bind_param($gona, 'i', $id_post);

    	$id_post = $_POST['id_post'];

    	mysqli_stmt_execute($gona);
    	mysqli_stmt_close($gona);
    	mysqli_close($db);
    }