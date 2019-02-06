<?php 
//Ошибка!!!! [05-Feb-2019 14:57:36 UTC] PHP Warning:  PHP Startup: Unable to load dynamic library 'c:/ospanel/modules/php/PHP-5.5/ext/php_imagick.dll' - The application has failed to start because its side-by-side configuration is incorrect. Please see the application event log or use the command-line sxstrace.exe tool for more detail. in Unknown on line 0 [05-Feb-2019 18:09:34 Europe/Moscow] PHP Fatal error:  Class 'Imagick' not found in C:\OSPanel\domains\WD04-filmoteka-rodina\functions\image_resize_imagick.php on line 8




//Это готовая функция. она изменяет размер изображения. библиотека imagemagick установлена с версией openserver

function createThumbnail($imagePath, $cropWidth = 100, $cropHeight = 100){

	/* Чтение изображения */
	$imagick = new Imagick($imagePath);
	$width = $imagick->getImageWidth();
	$height = $imagick->getImageHeight();

	// Изменение размера
	// if ( $width > $height ) {
	// 	$imagick->thumbnailImage(0, $cropHeight);
	// } else {
	// 	$imagick->thumbnailImage($cropWidth, 0);
	// }

	$imagick->thumbnailImage($cropWidth, $cropHeight);


	// Определяем размеры полученной миниатюры
	$width = $imagick->getImageWidth();
	$height = $imagick->getImageHeight();

	// Определяем центр изображения
	$centreX = round($width / 2); // 300
	$centreY = round($height / 2); // 150

	// Определяем точку для обрезки по центру 
	$cropWidthHalf  = round($cropWidth / 2);
	$cropHeightHalf = round($cropHeight / 2);
	
	// Координаты для старта отбрезки
	$startX = max(0, $centreX - $cropWidthHalf);
	$startY = max(0, $centreY - $cropHeightHalf);

	$imagick->cropImage($cropWidth, $cropHeight, $startX, $startY);

	// Возвращаем готовое изображение
	return $imagick;
}

/* 

Usage Example

// Define full path to the image
$imagePath = 'D:\OpenServer\domains\php-school-all\php-imagick\flat.jpg';

// or with ROOT constant
define('ROOT', dirname(__FILE__).'/');
$imagePath = ROOT . 'flat.jpg';

$img = createThumbnail($imagePath);
header('Content-type: image/jpeg');
echo $img;

*/

?>