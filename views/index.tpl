<div class="title-1">Евгения Родина - Фильмотека php</div>
<?php
 
foreach ($films as $key => $value) {
?>

	<div class="card mb-20">
		<div class="row">
			<div class="col-2">
				<img src="<?=HOST?>data/films/wparis.jpg" alt="<?=@$film['title'] ?>">
			</div>
			<div class="col">
				<div class="card__header">
					<h4 class="title-4 mt-0"><?=@$films[$key]['title'] ?></h4>
					<div class="buttons">
						<a href="edit.php?id=<?=@$films[$key]['id'] ?>" class="button button--editsmall">Редактировать</a>
						<a href="index.php?action=delete&id=<?=@$films[$key]['id']?>&title=<?=@$films[$key]['title']?>" class="button button--removesmall">Удалить</a>
					</div>
					
				</div>
				
		<!--Символ @ гасит нитифиуации об ошибках, если будет передана несуществующая переменная-->
				<div class="badge"><?=@$films[$key]['type'] ?></div>
				<div class="badge"><?=@$films[$key]['year'] ?></div>
				<div class="pt-20">
					<a href="singl.php?id=<?=@$films[$key]['id']?>&title=<?=@$films[$key]['title']?>" class="button">Подробнее</a>
				</div>
			</div>
		</div>		
	</div>
<?php 
	}
?>