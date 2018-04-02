<?php
	include('/config.php');
	//получаем массив
	$categories = get_cat();
	//Получаем дерево 
	$categories_tree = map_tree($categories);
	//Превращаем дерево в html
	$categories_menu = categories_to_string($categories_tree);

	if( isset($_GET['product']) ){
		$product_id = (int)$_GET['product'];
		// массив данных продукта
		$get_one_product = get_one_product($product_id);
		// получаем ID категории
		$id = $get_one_product['parent_id'];
	}else{
		$id = (int)$_GET['category'];
	}

	// хлебные крошки
	// return true (array not empty) || return false
	$breadcrumbs_array = breadcrumbs($categories, $id);

	if($breadcrumbs_array){
		foreach($breadcrumbs_array as $id => $title){
			$breadcrumbs .= "<a href='?category={$id}'>{$title}</a> / ";
		}
			//Обрезаем последний символ
			$breadcrumbs = rtrim($breadcrumbs, " / ");
			//Регулярные выражения
			$breadcrumbs = preg_replace("#(.+)?<a.+>(.+)</a>$#", "$1$2", $breadcrumbs);
	}else{
		$breadcrumbs = "Каталог";
	}

	// ID дочерних категорий
	$ids = cats_id($categories, $id);
	//
	$ids = !$ids ? $id : rtrim($ids, ",");
	//Получаем статьи
	//$products = get_products($ids);

	/*=========Пагинация==========*/

	// кол-во товаров на страницу
	$perpage = 2;

	// общее кол-во товаров
	$count_goods = count_goods($ids);

	// необходимое кол-во страниц
	$count_pages = ceil($count_goods / $perpage);
	// минимум 1 страница
	if( !$count_pages ) $count_pages = 1;

	// получение текущей страницы
	if( isset($_GET['page']) ){
		$page = (int)$_GET['page'];
		if( $page < 1 ) $page = 1;
	}else{
		$page = 1;
	}

	// если запрошенная страница больше максимума
	if( $page > $count_pages ) $page = $count_pages;

	// начальная позиция для запроса
	$start_pos = ($page - 1) * $perpage;

	$pagination = pagination($page, $count_pages);

	/*=========Пагинация==========*/
	"<ul class='pagination'>";
	$products = get_products($ids, $start_pos, $perpage);
	"</ul>";