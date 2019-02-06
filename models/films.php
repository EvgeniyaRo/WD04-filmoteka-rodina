<?php

//Запрос всех фильмов
function films_all($link){
	$query = "SELECT * FROM `films`";
	$films = array();
	if ( $result = mysqli_query($link, $query) ) {

	
		while ( $row = mysqli_fetch_array($result) ) {

			$films[] = $row;

			// print_r($films);
		}
	}
	return $films;
}
//Добавление фильма в БД из формы
function add_film($link, $title, $type, $year, $description){
	$query = "INSERT INTO `films` (`title`, `type`, `year`, `description`)
		 VALUES ('".mysqli_real_escape_string($link, $_POST['title'])."',
		 '".mysqli_real_escape_string($link, $_POST['genre'])."',
		 '".mysqli_real_escape_string($link, $_POST['year'])."',
		 '".mysqli_real_escape_string($link, $_POST['description'])."')";
	if ( mysqli_query($link, $query) ) {
		 	$result = true;
		} else {
		 	$result = false;
	}
	return $result;
}

//Запрос одного фильма для редактирования
function get_film($link, $id){
	$query = "SELECT * FROM films WHERE id = '". mysqli_real_escape_string($link, $id) ."' LIMIT 1";
	$result = mysqli_query($link, $query);
	if ( $result == mysqli_query($link, $query) ) {
		$film = mysqli_fetch_array($result);
	}
	
	return $film;
}

//Сохранение после редактирования
function update_film($link, $title, $type, $year, $id, $description){
	echo "<pre>";
	print_r($_FILES);
	echo "</pre>";
//обработка картинки
	if (isset($_FILES['photo']['name']) && $_FILES['photo']['tmp_name'] != "" ) {
		$fileName = $_FILES['photo']['name'];
		$fileTmpLog = $_FILES['photo']['tmp_name'];
		$fileType = $_FILES['photo']['type'];
		$fileSize = $_FILES['photo']['size'];
		$fileError = $_FILES['photo']['error'];
		$kaboom = explode('.', $fileName);
		$fileExt = end($kaboom);

		list($width, $heigth) = getimagesize($fileTmpLog);
		if ($width < 10 || $heigth < 10 ) {
			$errors[] = 'Этот файл не является изображением';
		}

		$db_file_name = rand(1000000000, 9999999999) . '.' .$fileExt;

		if ($fileSize > 10485760) {
			$errors[] = 'Этот файл весит больше 10МБ';
		} elseif (!preg_match("/\.(gif|jpg|png|jpeg)$/i", $fileExt)) {
			$errors[] = 'Расширение должно быть gif, jpg, jpeg, png';
		} elseif ($fileError == 1) {
			$errors[] = 'Произошла ошибка';
		}

		$photoFolderLocation = ROOT . 'data/films/full';
		$photoFolderLocationMin = ROOT . 'data/films/min/';
		//$photoFolderLocationFull = ROOT . 'data/films/full/';
		$uploadeFile = $photoFolderLocation . $db_file_name;
		$moveResult = move_uploaded_file($fileTmpLog, $uploadeFile);

		if (!$moveResult) {
			$errors[] = 'Произошла ошибка';
		}

		require_once(ROOT . "/functions/image_resize_imagick.php");
		$targetFile = $photoFolderLocation . $db_file_name;
		$resizedFile = $photoFolderLocationMin . $db_file_name;
		$wmax = 137;
		$hmax = 200;
		$image = createThumbnail($targetFile, $wmax, $hmax);
		$image->writeImage($resizedFile);


	}

	$query = "UPDATE films
			SET title = '".mysqli_real_escape_string($link, $title)."',
				type = '".mysqli_real_escape_string($link, $type)."',
				year = '".mysqli_real_escape_string($link, $year)."',
				description = '".mysqli_real_escape_string($link, $description)."',
				photo = '".mysqli_real_escape_string($link, $db_file_name)."'
				WHERE id = '".mysqli_real_escape_string($link, $id)."'
				LIMIT 1";
	if ( mysqli_query($link, $query) ) {
		 	$result = true;
		} else {
		 	$result = false;
	}
	return $result;
}

//Удаление фильма
function delete_film($link, $id){
	$query = "DELETE FROM films WHERE
			id='". mysqli_real_escape_string($link, $id) ."'  LIMIT 1";
	mysqli_query($link, $query);
	if ( mysqli_affected_rows($link) > 0) {
		$result = true;
		// $result_info = "Фильм был удален";
	} else {
		$result = false;
		// $result_error = "Что-то пошло не так";
	}
	return $result;
}


?>