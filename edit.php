
<?php
	 //соединение с БД
	$link = mysqli_connect('localhost', 'root', '', 'wd04-filmoteka-rodina');

	if (mysqli_connect_error() ) {
		die("Ошибка подключения к базе данных");
	}

	$errors = array(); //создаем сразу массив для записи ошибок

//Редактирование фильма в БД из формы

	if ( array_key_exists('updateFilm', $_POST) ) {
		 if ( $_POST['title'] == "" ) {
		 	$errors[] = "Введите название";
		 }
		 if ( $_POST['genre'] == "" ) {
		 	$errors[] = "Введите жанр";
		 }
		 if ( $_POST['year'] == "" ) {
		 	$errors[] = "Введите год";
		 } 

		 if ($errors == []){
		 	$query = "UPDATE films
		 			SET title = '".mysqli_real_escape_string($link, $_POST['title'])."',
		 				type = '".mysqli_real_escape_string($link, $_POST['genre'])."',
		 				year = '".mysqli_real_escape_string($link, $_POST['year'])."'
		 			WHERE id = '".mysqli_real_escape_string($link, $_GET['id'])."'";


		 	if ( mysqli_query($link, $query) ) {
		 	 	$result_info = "Фильм был успешно обновлен";
		 	 } else {
		 	 	$result_error = "Фильм НЕ был обновлен, произошла ошибка.";
		 	 }
		 }

	}
//Запрос одного фильма для редактирования
	$query = "SELECT * FROM films WHERE id = '". mysqli_real_escape_string($link, $_GET['id']) ."' LIMIT 1";
	
	if ( $result = mysqli_query($link, $query) ) {
		$film = mysqli_fetch_array($result);
		
		//print_r($film);
	}
	echo "<pre>";
	print_r($film);
	print_r($film[0]);
	echo "</pre>";

//Удаление фильма

	if ($_GET) {
		if (@$_GET['action'] == 'delete') {
			$query = "DELETE FROM `films` WHERE
			id='". mysqli_real_escape_string($link, $_GET['id']) ."' LIMIT 1";
			mysqli_query($link, $query);

			if ( mysqli_affected_rows($link) > 0) {
				$result_info = "Фильм был удален";
			} else {
				$result_error = "Что-то пошло не так";
			}
		}
	}

?>


<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8" />
	<title>Евгения Родина - Фильмотека</title>
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"/><![endif]-->
	<meta name="keywords" content="" />
	<meta name="description" content="" /><!-- build:cssVendor css/vendor.css -->
	<link rel="stylesheet" href="libs/normalize-css/normalize.css" />
	<link rel="stylesheet" href="libs/bootstrap-4-grid/grid.min.css" />
	<link rel="stylesheet" href="libs/jquery-custom-scrollbar/jquery.custom-scrollbar.css" /><!-- endbuild -->
	<!-- build:cssCustom css/main.css -->
	<link rel="stylesheet" href="./css/main.css" /><!-- endbuild -->
	<link rel="stylesheet" href="./css/castom.css" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&amp;subset=cyrillic-ext" rel="stylesheet">
	<!--[if lt IE 9]><script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script><![endif]-->
</head>

<body class="index-page">
	<div class="container user-content section-page">
				
		<div class="title-1">Редактировать фильм <?=$film['title'] ?></div>
				
		<div class="panel-holder mt-80 mb-20">
			<div class="title-3 mt-0">Редактировать фильм</div>
			<form action="edit.php?id=<?=$film['id'] ?>" method="POST">

<!--Вывод нотификаций-->
		<?php 
			if ( !empty($errors) ) {
				foreach ($errors as $key => $value) {
					echo "<div class='notify notify--error mb-20'>$value</div>";
				}
			}
		?>		
		
		<?php if ( @$result_sucsess != '' ) {
		?>
				<div class="notify notify--success mb-20"><?=$result_sucsess?></div>
		<?php
			} elseif ( @$result_error != '' ) {
		?>
				<div class="notify notify--error mb-20"><?=$result_error?></div>
		<?php
			} elseif ( @$result_info != '' ) {
		?>
				<div class="notify notify--update mb-20"><?=$result_info?></div>
		<?php
			}
		?>

				<div class="form-group">
					<label class="label">Название фильма
					<input class="input" name="title"
						type="text" placeholder="Такси 2"
						value="<?=$film['title'] ?>" />
					</label>
				</div>
				<div class="row">
					<div class="col">
						<div class="form-group">
							<label class="label">Жанр
								<input class="input" name="genre"
								type="text" placeholder="комедия"
								value="<?=$film['type'] ?>" />
							</label>
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label class="label">Год
								<input class="input" name="year"
								type="text" placeholder="2000"
								value="<?=$film['year'] ?>" />
							</label>
						</div>
					</div>
				</div>
				<input class="button" type="submit" name="updateFilm" value="Сохранить изменения" />				
			</form>
		</div>
		<div class="mb-100 pl-20">
			<a href="index.php" class="button">Вернуться на главную</a>
		</div>

	</div><!-- build:jsLibs js/libs.js -->
	<script src="libs/jquery/jquery.min.js"></script><!-- endbuild -->
	<!-- build:jsVendor js/vendor.js -->
	<script src="libs/jquery-custom-scrollbar/jquery.custom-scrollbar.js"></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIr67yxxPmnF-xb4JVokCVGgLbPtuqxiA"></script><!-- endbuild -->
	<!-- build:jsMain js/main.js -->
	<script src="js/main.js"></script><!-- endbuild -->
	<script defer="defer" src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</body>

</html>