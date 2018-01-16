<?php
include_once ROOT. '/models/Courses.php'; // підключення моделі
include_once ROOT. '/models/Site.php'; // підключення моделі


class UploadController {

	public function actionIndex() {
    

    Site::deleteAllBooks();

    $content = file ('./files/books.txt');
    foreach ($content  as $k=>$v) { // читаем построчно  
    $line = explode ('##', $v); //string
      for($i=0;$i<=count($line);$i++){
          if($i==0){
            $a[$i]= $line[$i]."#";  
          }
          else if($i==count($line)){
            $a[$i]= "#".$line[$i]; 
          }
          else{
            $a[$i]= "#".$line[$i]."#"; 
          }

          $uk=array('#name#','#/name#','#author#','#/author#','#year#','#/year#','#page_numbers#','#/page_numbers#');
          $en=array('');

          $url[$i]= str_replace($uk, $en, $a[$i]);                
      }
      Site::insertBooks($url); 
    }

    header("Location: /");
		return true;
	}



}