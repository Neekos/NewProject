<?php 
	$content = render(TEMPLATE.'posts.tpl', array('title' => 'hello'));
	posts_getall();
	