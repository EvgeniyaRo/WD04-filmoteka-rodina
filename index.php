
<?php

//соединение с БД
require ('config.php');
require ('database.php');
$link = db_connect();


require ('models/films.php');
//Удаление фильма
if (@$_GET['action'] == 'delete') {
	$result = delete_film($link, $_GET['id']);

	if ( $result ) {
		$result_info = "Фильм " . $_GET['title'] . " был удален";
	} else {
		$result_error = "Что-то пошло не так" . $_GET['title'];
	}
}

//вывод фильмов
$films = films_all($link);

include ('views/head.tpl');
include ('views/notifications.tpl');
include ('views/index.tpl');
include ('views/footer.tpl');

?>


	