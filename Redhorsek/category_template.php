<link rel="stylesheet" type="text/css" href="template/default/css/style.css">
<li class="myli">
	<a href="?action=price&category=<?=$category['id']?>" class="mya"><?=$category['name']?></a>
	<?php if($category['childs']): ?>
	<ul class="cat2">
		<?php echo categories_to_string($category['childs']); ?>
	</ul>
	<?php endif; ?>
</li>