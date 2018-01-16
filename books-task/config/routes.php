<?php
	return array(
		
		
	
		//search 	
		'/find/' => 'find/index',
		'/sort/' => 'sort/index',
		
		//chat
	
		'/courses/page-([0-9]+)' => 'courses/courses/$1', //actionCourses ContentController
		
		'/courses/([a-z0-9-]+)' => 'courses/one/$1', //actionCourses ContentController
		
		'/courses/' => 'courses/courses', //actionCourses ContentController
		
		
		'/upload' => 'upload/index', //actionContact sITEController
		'/read' => 'read/index', //actionContact sITEController


		'/' => 'site/index' , //  actionIndex в SiteController
	
	);