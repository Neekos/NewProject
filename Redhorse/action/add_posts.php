<?php 
	$content = render(TEMPLATE."add_posts.tpl",array("title"=>"hello"));
		$post = $_POST;
		if (isset($post['add'])) {
			$err = [];
			if (!$post['title']) {
				$err[] = "Введите заголовок !";
			}
			if (!$post['content']) {
				$err[] = "Введите текст !";
			}
			if (!$err) {
				add_Posts();
			}else{
				echo '<div style="color:red">'.array_shift($err).'</div>';
			}
			
		}
 ?>