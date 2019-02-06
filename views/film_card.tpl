<div class="title-1">Информация о фильме</div>
	<div class="card mb-20">
		<div class="row">
			<div class="col-4">
				<img src="<?=HOST?>data/films/wparis.jpg" alt="<?=@$film['title'] ?>">
			</div>
			<div class="col">
				<div class="card__header">
					<h4 class="title-4 mt-0"><?=@$film['title'] ?></h4>
					<div class="buttons">
						<a href="edit.php?id=<?=@$film['id'] ?>" class="button button--editsmall">Редактировать</a>
						<a href="index.php?action=delete&id=<?=@$film['id']?>&title=<?=@$film['title']?>" class="button button--removesmall">Удалить</a>
					</div>
			
				</div>
				
		<!--Символ @ гасит нотификации об ошибках, если будет передана несуществующая переменная-->
				<div class="badge"><?=@$film['type'] ?></div>
				<div class="badge"><?=@$film['year'] ?></div>
				<div class="user-content mt-20"><?=@$film['description'] ?></div>
			</div>
		</div>



		
	</div>
