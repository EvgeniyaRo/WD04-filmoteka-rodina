
<?php
if ( !empty($errors) ) {
	foreach ($errors as $key => $value) {
		echo "<div class='notify notify--error mb-20'>$value</div>";
	}
}
?>		


<div class="panel-holder mt-80 mb-40">
	<div class="title-3 mt-0">Добавить фильм</div>
	<form enctype="multipart/form-data" action="new.php" method="POST">
		<div class="form-group"><label class="label">Название фильма<input class="input" name="title" type="text" placeholder="Такси 2" /></label></div>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label class="label">Жанр<input class="input" name="genre" type="text" placeholder="комедия" /></label>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label class="label">Год<input class="input" name="year" type="text" placeholder="2000" /></label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<textarea class="textarea" name="description" placeholder="Введите описание фильма"></textarea>
				</div>
			</div>
		</div>
		<div class="mb-20">
			<!--<input class="inputfile" type="file" name="photo" value="Выбрать файл">-->
			<p class="">Изображение jpg или png, рекомендуемый размер 100x100 пикселей, и весом до 2Мб.</p>
			<input class="inputfile" type="file" name="photo" id="photo" />
			<label class="" for="photo">Выбрать файл</label>
			<span>Файл не выбран</span>
		</div>
		<input class="button" type="submit" name="newFilm" value="Добавить" />
	</form>
</div>
<div class="mb-100 pl-20">
	<a href="index.php" class="button">Вернуться на главную</a>
</div>
