<?php
	include_once ROOT.'/models/Courses.php';
	include_once ROOT.'/models/Site.php';
	include_once ROOT.'/components/Pagination.php';


	class CoursesController {

		public function actionCourses($page=1) {
			
			$books_list_all = Site::getCoursesInTop($page,3); //прості курси незалежні від головних


			$url = explode("/", $_SERVER['REQUEST_URI']);
			
			$total = Site::getCountCourses();//кількість товарів 
			$pagination = new Pagination($total, $page, $count=3,'page-');

			require_once(ROOT . '/views/content/courses/courses.php'); // підключаєм вюшку
			return true;
		}



}