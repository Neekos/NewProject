<?php
	//Получение 1 прайса
	function price_get($link, $id){
		global $db;
		$id  = (int)$id;
		if ($id == 0) {
			return false;
		}

		$sql = "SELECT * FROM price WHERE id = '%d'";

		$query = sprintf($sql,$id);

		$result = mysqli_query($db, $query);

		if (!$result) {
			die(mysqli_error($db));
		}
		$row = mysqli_fetch_array($result, MYSQL_ASSOC);

		return $row;
	}

	//Получение 1 статьи
	function article_get($link, $id){

		$id  = (int)$id;
		if ($id == 0) {
			return false;
		}

		$sql = "SELECT * FROM posts WHERE id_post = '%d'";

		$query = sprintf($sql,$id);

		$result = mysqli_query($link, $query);

		if (!$result) {
			die(mysqli_error($link));
		}
		$row = mysqli_fetch_array($result, MYSQL_ASSOC);

		return $row;
	}
	
	//функция добавления статей № 2
	function article_add($link, $title, $content){
		//подготовка
		$title = trim($title);
		$content = trim($content);
		$date = date('l jS \of F Y h:i:s A');

		//проверка
		if ($title == '') {
			return false;
		}

		//запрос
		$sql = "INSERT INTO posts(title, content, datetime) VALUES ('%s','%s','%s')";

		$query = sprintf($sql, 
			mysqli_real_escape_string($link, $title),
			mysqli_real_escape_string($link, $content),
			mysqli_real_escape_string($link, $date));
		$result = mysqli_query($link, $query);

		if (!$result) {
			die(mysqli_error($link));
		}
		return true;
	}
	//Функция редактирования способ № 2
	function article_edit($link, $title, $content, $id){
		$title = trim($title);
		$content = trim($content);

		$id = (int)$id;

		if ($title == '') {
			return false;
		}

		$sql = "UPDATE posts SET title = '%s', content = '%s' WHERE id_post = '%d'";

		$query = sprintf($sql,
							mysqli_real_escape_string($link,$title),
							mysqli_real_escape_string($link,$content), 
																$id);

		$result = mysqli_query($link, $query);
		if (!$result) {
			die(mysqli_error($link));
		}

		return mysqli_affected_rows($link);

	}

	//Функция удаления статей способ № 2
	function article_delete($link, $id){
		$id = (int)$id;
		if ($id == 0) {
			return false;
		}
		$query = sprintf("DELETE FROM posts WHERE id_post ='%d'", $id);//%d первый параметр
		$result = mysqli_query($link, $query);

		if(!$result){
			die(mysqli_error($link));
		}
		return mysqli_affected_rows($link);
	}

	function intro($text, $len = 300){

		return mb_substr($text, 0 , $len);
	}

	function add_answer(){
			//global $db;

			$tbl_name="fanswer"; // Table name 

			$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if (isset($_POST['Submit'])) {
			$err = array();
			if (trim($_POST['a_name']) == "") {
				$err[] = "Вы не ввели имя";
			}
			if (trim($_POST['a_email']) == "") {
				$err[] = "Вы не ввели email";
			}
			if (trim($_POST['a_answer']) == "") {
				$err[] = "Вы не ввели текст ответа!";
			}
			if (empty($err)) {
				// Get value of id that sent from hidden field 
				$id = $_POST['id'];

				// Find highest answer number. 
				$sql="SELECT MAX(a_id) AS Maxa_id FROM $tbl_name WHERE question_id='$id'";
				$result=mysqli_query($db, $sql);
				$rows=mysqli_fetch_array($result, MYSQLI_NUM);

				// add + 1 to highest answer number and keep it in variable name "$Max_id". if there no answer yet set it = 1 
				if ($rows) {
				$Max_id = $rows['Maxa_id']+1;
				}
				else {
				$Max_id = 1;
				}

				// get values that sent from form 
				$a_name = $_POST['a_name'];
				$a_email = $_POST['a_email'];
				$a_answer = $_POST['a_answer']; 

				$datetime=date("d/m/y H:i:s"); // create date and time

				// Insert answer 
				$sql2="INSERT INTO $tbl_name(question_id, a_id, a_name, a_email, a_answer, a_datetime)VALUES('$id', '$Max_id', '$a_name', '$a_email', '$a_answer', '$datetime')";
				$result2=mysqli_query($db,$sql2);

				if($result2){
					echo "Successful<BR>";
					echo "<a href='?action=view_topic&id=".$id."'>View your answer</a>";

					// If added new answer, add value +1 in reply column 
					$tbl_name2 = "fquestions";
					$sql3 = "UPDATE $tbl_name2 SET reply = '$Max_id' WHERE id = '$id'";
					$result3 = mysqli_query($db,$sql3);
				}else{
					echo "ERROR";
				}

				// Close connection
				mysqli_close($db);
			}else{
				echo '<div>'.array_shift($err).'</div>';
			}
			
		}
	}
	
	function add_form(){
			//global $db;
			
			$tbl_name="fquestions"; // Table name 
			$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if (isset($_POST['Submit'])) {
			$err = array();
			if (trim($_POST['topic']) == "") {
				$err[] = "Вы не ввели Заголовок";
			}
			if (trim($_POST['detail']) == "") {
				$err[] = "Вы не ввели detail";
			}
			if (trim($_POST['name']) == "") {
				$err[] = "Вы не ввели имя";
			}
			if (trim($_POST['email']) == "") {
				$err[] = "Вы не ввели email";
			}
			if (empty($err)) {
			// get data that sent from form 
			$topic = $_POST['topic'];
			$detail = $_POST['detail'];
			$name = $_POST['name'];
			$email = $_POST['email'];

			$datetime = date("d/m/y h:i:s"); //create date time

			$sql = "INSERT INTO $tbl_name(topic, detail, name, email, datetime)VALUES('$topic', '$detail', '$name', '$email', '$datetime')";
			$result = mysqli_query($db, $sql);

				if($result){
					echo "Successful<BR>";
					echo "<a href='?action=forum'>Forum</a>";
				}
				else {
					echo "ERROR";
				}
				mysqli_close($db);
			}else{
				echo '<div>'.array_shift($err).'</div>';
			}
		}
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
	// Функция генерации капчи
	function generate_code() 
	{    
		  $chars = 'abdefhknrstyz23456789'; // Задаем символы, используемые в капче. Разделитель использовать не надо.
		  $length = rand(4, 7); // Задаем длину капчи, в нашем случае - от 4 до 7
		  $numChars = strlen($chars); // Узнаем, сколько у нас задано символов
		  $str = '';
		  for ($i = 0; $i < $length; $i++) {
			$str .= substr($chars, rand(1, $numChars) - 1, 1);
		  } // Генерируем код

		// Перемешиваем, на всякий случай
			$array_mix = preg_split('//', $str, -1, PREG_SPLIT_NO_EMPTY);
			srand ((float)microtime()*1000000);
			shuffle ($array_mix);
		// Возвращаем полученный код
		return implode("", $array_mix);
	}

	// Пишем функцию проверки введенного кода
	function check_code($code, $cookie) 
	{

	// АЛГОРИТМ ПРОВЕРКИ	
		$code = trim($code); // На всякий случай убираем пробелы
		$code = md5($code);
	// НЕ ЗАБУДЬТЕ ЕГО ИЗМЕНИТЬ!

	// Работа с сессией, если нужно - раскомментируйте тут и в captcha.php, удалите строчки, где используются куки
	//session_start();
	//$cap = $_SESSION['captcha'];
	//$cap = md5($cap);
	//session_destroy();

		if ($code == $cap){return TRUE;}else{return FALSE;} // если все хорошо - возвращаем TRUE (если нет - false)
		
	}

	
		// Пишем функцию генерации изображения
		function img_code($code) // $code - код нашей капчи, который мы укажем при вызове функции
		{
			// Отправляем браузеру Header'ы
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");                   
				header("Last-Modified: " . gmdate("D, d M Y H:i:s", 10000) . " GMT");
				header("Cache-Control: no-store, no-cache, must-revalidate");         
				header("Cache-Control: post-check=0, pre-check=0", false);           
				header("Pragma: no-cache");                                           
				header("Content-Type:image/png");
			// Количество линий. Обратите внимание, что они накладываться будут дважды (за текстом и на текст). Поставим рандомное значение, от 3 до 7.
				$linenum = rand(3, 7); 
			// Задаем фоны для капчи. Можете нарисовать свой и загрузить его в папку /img. Рекомендуемый размер - 150х70. Фонов может быть сколько угодно
				$img_arr = array(
								 "1.png"
				);
			// Шрифты для капчи. Задавать можно сколько угодно, они будут выбираться случайно
				$font_arr = array();
					$font_arr[0]["fname"] = "DroidSans.ttf";	// Имя шрифта. Я выбрал Droid Sans, он тонкий, плохо выделяется среди линий.
					$font_arr[0]["size"] = rand(20, 30);				// Размер в pt
			// Генерируем "подстилку" для капчи со случайным фоном
				$n = rand(0,sizeof($font_arr)-1);
				$img_fn = $img_arr[rand(0, sizeof($img_arr)-1)];
				$im = imagecreatefrompng (img_dir . $img_fn); 
			// Рисуем линии на подстилке
				for ($i=0; $i<$linenum; $i++)
				{
					$color = imagecolorallocate($im, rand(0, 150), rand(0, 100), rand(0, 150)); // Случайный цвет c изображения
					imageline($im, rand(0, 20), rand(1, 50), rand(150, 180), rand(1, 50), $color);
				}
				$color = imagecolorallocate($im, rand(0, 200), 0, rand(0, 200)); // Опять случайный цвет. Уже для текста.

			// Накладываем текст капчи				
				$x = rand(0, 35);
				for($i = 0; $i < strlen($code); $i++) {
					$x+=15;
					$letter=substr($code, $i, 1);
					imagettftext ($im, $font_arr[$n]["size"], rand(2, 4), $x, rand(50, 55), $color, img_dir.$font_arr[$n]["fname"], $letter);
				}

			// Опять линии, уже сверху текста
				for ($i=0; $i<$linenum; $i++)
				{
					$color = imagecolorallocate($im, rand(0, 255), rand(0, 200), rand(0, 255));
					imageline($im, rand(0, 20), rand(1, 50), rand(150, 180), rand(1, 50), $color);
				}
			// Возвращаем получившееся изображение
				ImagePNG ($im);
				ImageDestroy ($im);
		}
	
    //Отчистка строки
	function clear_str($str){
		return trim(strip_tags($str));
	}

	//шаблонизатор
	function render($path,$param = array()){
		extract($param);

		ob_start();

		if (!include($path)) {
			exit("нет такого шаблона");
		}
		return ob_get_clean();
	}
	
	/**
	* Распечатка массива
	**/
	function print_arr($array){
		echo "<pre>" . print_r($array, true) . "</pre>";
	}

	/**
	* Получение массива категорий
	**/
	function get_cat(){
		global $db;
		$query = "SELECT * FROM catigories";
		$res = mysqli_query($db,$query);

		$arr_cat = array();
		while($row = mysqli_fetch_assoc($res)){
			$arr_cat[$row['id']] = $row;
		}
		return $arr_cat;
	}

	/**
	* Построение дерева
	**/
	function map_tree($dataset) {
		$tree = array();

		foreach ($dataset as $id=>&$node) {    
			if (!$node['parent_id']){
				$tree[$id] = &$node;
			}else{ 
	            $dataset[$node['parent_id']]['childs'][$id] = &$node;
			}
		}

		return $tree;
	}

	/**
	* Дерево в строку HTML
	**/
	function categories_to_string($data){
		foreach($data as $item){
			$string .= categories_to_template($item);
		}
		return $string;
	}

	/**
	* Шаблон вывода категорий
	**/
	function categories_to_template($category){
		ob_start();
		include '/category_template.php';
		return ob_get_clean();
	}

	/**
	* Хлебные крошки
	**/
	function breadcrumbs($array, $id){
		if(!$id) return false;

		$count = count($array);
		$breadcrumbs_array = array();
		for($i = 0; $i < $count; $i++){
			if($array[$id]){
				$breadcrumbs_array[$array[$id]['id']] = $array[$id]['name'];
				$id = $array[$id]['parent_id'];
			}else break;
		}
		return array_reverse($breadcrumbs_array, true);
	}

	/**
	* Получение ID дочерних категорий
	**/
	function cats_id($array, $id){
		if(!$id) return false;

		foreach($array as $item){
			if($item['parent_id'] == $id){
				$data .= $item['id'] . ",";
				$data .= cats_id($array, $item['id']);
			}
		}
		return $data;
	}

	/**
	* Получение товаров
	**/
	function get_products($ids, $start_pos, $perpage){
		global $db;
		if($ids){
			$query = "SELECT * FROM price WHERE parent_id IN($ids) ORDER BY title LIMIT $start_pos, $perpage";
		}else{
			$query = "SELECT * FROM price ORDER BY title LIMIT $start_pos, $perpage";
		}
		$res = mysqli_query($db,$query);
		$products = array();
		while($row = mysqli_fetch_assoc($res)){
			$products[] = $row;
		}
		return $products;
	}

	/**
	* Получение отдельного товара
	**/
	function get_one_product($product_id){
		global $db;
		$query = "SELECT * FROM price WHERE id = $product_id";
		$res = mysqli_query($db,$query);
		return mysqli_fetch_assoc($res);
	}

	/**
	* Кол-во товаров
	**/
	function count_goods($ids){
		global $db;
		if( !$ids ){
			$query = "SELECT COUNT(*) FROM price";
		}else{
			$query = "SELECT COUNT(*) FROM price WHERE parent_id IN($ids)";
		}
		$res = mysqli_query($db,$query);
		$count_goods = mysqli_fetch_row($res);
		return $count_goods[0];
	}

	/**
	* Постраничная навигация
	**/
	function pagination($page, $count_pages){
		// << < 3 4 5 6 7 > >>
		// $back - ссылка НАЗАД
		// $forward - ссылка ВПЕРЕД
		// $startpage - ссылка В НАЧАЛО
		// $endpage - ссылка В КОНЕЦ
		// $page2left - вторая страница слева
		// $page1left - первая страница слева
		// $page2right - вторая страница справа
		// $page1right - первая страница справа

		$uri = "?";
		// если есть параметры в запросе
		if( $_SERVER['QUERY_STRING'] ){
			foreach ($_GET as $key => $value) {
				if( $key != 'page' ) $uri .= "{$key}=$value&amp;";
			}
		}

		if( $page > 1 ){
			$back = "<a class='nav-link' href='{$uri}page=" .($page-1). "'>&lt;</a>";
		}
		if( $page < $count_pages ){
			$forward = "<a class='nav-link' href='{$uri}page=" .($page+1). "'>&gt;</a>";
		}
		if( $page > 3 ){
			$startpage = "<a class='nav-link' href='{$uri}page=1'>&laquo;</a>";
		}
		if( $page < ($count_pages - 2) ){
			$endpage = "<a class='nav-link' href='{$uri}page={$count_pages}'>&raquo;</a>";
		}
		if( $page - 2 > 0 ){
			$page2left = "<a class='nav-link' href='{$uri}page=" .($page-2). "'>" .($page-2). "</a>";
		}
		if( $page - 1 > 0 ){
			$page1left = "<a class='nav-link' href='{$uri}page=" .($page-1). "'>" .($page-1). "</a>";
		}
		if( $page + 1 <= $count_pages ){
			$page1right = "<a class='nav-link' href='{$uri}page=" .($page+1). "'>" .($page+1). "</a>";
		}
		if( $page + 2 <= $count_pages ){
			$page2right = "<a class='nav-link' href='{$uri}page=" .($page+2). "'>" .($page+2). "</a>";
		}

		return $startpage.$back.$page2left.$page1left.'<a class="nav-active">'.$page.'</a>'.$page1right.$page2right.$forward.$endpage;
	}