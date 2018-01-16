<?php

  include_once ROOT. '/models/Courses.php'; // підключення моделі
  include_once ROOT. '/models/Site.php'; // підключення моделі


	class SiteController {

		public function actionIndex() {


      $booksAll=Site::getBooks();

    
       if($_FILES["filename"]["size"] > 1024*3*1024)
       {
         echo ("Размер файла превышает три мегабайта");
         exit;
       }
       // Проверяем загружен ли файл
       if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
       {
         // Если файл загружен успешно, перемещаем его
         // из временной директории в конечную
         move_uploaded_file($_FILES["filename"]["tmp_name"], "files/books.txt");
       } else {
          //echo("Ошибка загрузки файла");
       }


			require_once(ROOT . '/views/site/index.php'); // підключаєм вюшку
			return true;
		}



	}