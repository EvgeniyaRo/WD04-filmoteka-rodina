<?php

//соединение с БД
require ('config.php');
require ('database.php');
$link = db_connect();

//вывод фильмов
require ('models/films.php');
$films = films_all($link);
$addImg = add_img();

if ( array_key_exists('newFilm', $_POST) ) {
	//Обработка ошибок
	$errors = array();
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
		$result = add_film($link, $_POST['title'], $_POST['genre'], $_POST['year'], $_POST['description'], $addImg);
		if ( $result ) {
		 	$result_sucsess = "Фильм был успешно добавлен";
		} else {
		 	$result_error = "Фильм НЕ был добавлен, произошла ошибка.";
		}
	}
}

include ('views/head.tpl');
include ('views/notifications.tpl');
include ('views/new_film.tpl');
include ('views/footer.tpl');
?>