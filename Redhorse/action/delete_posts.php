<?php 
	$content = render(TEMPLATE."delete_posts.tpl",array("title"=>"hello"));
	$post = $_POST;
	if (isset($post['delete'])) {
		$err = [];
		if (!$post['id_post']) {
			$err[] = "Введите заголовок";
		}
		if (!$err) {
			delete_posts();
		}
		else{
			echo '<div style="color:red">'.array_shift($err).'</div>';
		}
	}
 ?>