<?php

//соединение с БД
require ('config.php');
require ('database.php');
$link = db_connect();

//редактирование
require ('models/films.php');
if ( array_key_exists('updateFilm', $_POST) ) {
	//Обработка ошибок
	$errors = array();
	$addImg = add_img();
	if ( $_POST['title'] == "" ) {
		$errors[] = "Введите название";
	}
	if ( $_POST['genre'] == "" ) {
		$errors[] = "Введите жанр";
	}
	if ( $_POST['year'] == "" ) {
		$errors[] = "Введите год";
	}
	//если ошибок нет сохраняем фильм в базу данных
	if ($errors == []){
		$result = update_film($link, $_POST['title'], $_POST['genre'], $_POST['year'], $_GET['id'], $_POST['description'], $addImg);
		if ( $result ) {
		 	$result_sucsess = "Фильм был успешно обновлен";
		} else {
		 	$result_error = "Фильм НЕ был обновлен, произошла ошибка.";
		}
	}
}
//Удаление фильма
if (@$_GET['action'] == 'delete') {
	$result = delete_film($link, $_GET['id']);

	if ( $result ) {
		$result_info = "Фильм " . $_GET['title'] . " был удален";
	} else {
		$result_error = "Что-то пошло не так" . $_GET['title'];
	}
}

$film = get_film($link, $_GET['id']);



include ('views/head.tpl');
include ('views/notifications.tpl');
include ('views/edit.tpl');
include ('views/footer.tpl');
?>





