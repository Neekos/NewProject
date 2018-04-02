<form method="POST" action="index.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>" enctype="multipart/form-data">
	<label>Заголовок</label><br>
	<input value="<?=$article['title']?>" type="text" name="title"><br>
	<label>Содержание</label><br>
	<textarea name="content"><?=$article['content']?></textarea><br><br>
	Фото
	<input type="file" name="img"><br><br>
	<input type="submit" name="" value="Сохранить">
</form>
<?=print_arr($_FILES['img']);?>