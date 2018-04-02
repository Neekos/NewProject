<? session_start();?>
<?php

	include '/../config.php';
	include '/../function.php';

	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if (isset($_GET['action'])) {
		$action = $_GET['action'];
	}else{
		$action = "";
	}

	if ($action == "add") {
		if (!empty($_POST)) {
			article_add($link, $_POST['title'],$_POST['content']);
			header("location: index.php");
		}
		include('/../template/admin/add_article.tpl');

	}else if ($action == "edit") {
		if (!isset($_GET['id'])) {
			header("location: index.php");
			}

			$id  = (int)$_GET['id'];

			if (!empty($_POST) && $id > 0) {
				article_edit($link,  $_POST['title'], $_POST['content'],$id);
				header("location:index.php");
			}
			
		$article = article_get($link, $id);
		include('/../template/admin/add_article.tpl');

	}else if($action == 'delete'){
		$id = $_GET['id'];
		$article = article_delete($link, $id);
		header('location: index.php');
	}else{
		$articles = posts_getall();
		include('/../template/admin/article.tpl');
	}
			

 ?>
