<div class="container">
	<div class="row">
		<div class="col-lg-4">
		<p style="visibility: hidden;">Текстс</p>
		<hr>
			<?php include('/sidebar.php');?>
		</div>
		<div class="col-lg-8">
		<?=$breadcrumbs; ?>
		<hr>
		<div class="col-md-12 price">
				<?php if($products): ?>
					<?php foreach($products as $product): ?>
						<a href="?action=one_price&id=<?=$product['id']?>"><?=$product['title']?></a>
						<h3 style="text-align: center;"><?=$product['title']?></h3>
						<br>
						<p><?=$product['discription']?></p>
						<table border="1" width="100%">
							<tr>
								<td>Время катания </td><td>Стоимость в рублях</td>
							</tr>
							<tr>
								<td><?=$product['time']?> </td><td><?=$product['price']?></td>	
							</tr>
						</table>
					<?php endforeach; ?>

				<?php if( $count_pages > 1 ): ?>
					<div class="pagination"><?=$pagination?></div>
				<?php endif; ?>
				<button type="button" class="btn btn-success">Купить</button>			
			<?php else: ?>
				<p>Здесь товаров нет!</p>
			<?php endif; ?>
		</div>
					
		</div>
	</div>
</div>