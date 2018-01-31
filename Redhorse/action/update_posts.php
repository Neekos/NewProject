<?php 
	$content = render(TEMPLATE."update_posts.tpl",array("title"=>"hello"));
	$post = $_POST;
	if (isset($post['update'])) {
		$err = [];
		if (!$post['id_post']) {
			$err[] = "Введите номер поста";
		}
		if (!$post['title']) {
			$err[] = "Введите заголовок";
		}
		if (!$err) {
			update_posts();
		}
		else{
			echo '<div style="color:red">'.array_shift($err).'</div>';
		}
	}
 ?>