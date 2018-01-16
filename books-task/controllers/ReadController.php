<?php
include_once ROOT. '/models/Courses.php'; // підключення моделі
include_once ROOT. '/models/Site.php'; // підключення моделі


class ReadController {

	public function actionIndex() {
    

    $content = file ('./files/books.txt');
    

    require_once(ROOT . '/views/content/read.php'); // підключаєм вюшку
		return true;
	}



}