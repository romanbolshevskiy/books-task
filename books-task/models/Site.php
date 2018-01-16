<?php


class Site  {


	public static function getLatest($count) {

		$db = Database::getConnection();
		
		$c = (int) $count;
		//echo  $c;
		$result = $db->query('SELECT * FROM product WHERE status = "1" ORDER BY id DESC LIMIT ' . $c );

		$i = 0;
		while ($row = $result->fetch()) {
		 	$latest[$i]['id'] = $row['id'];
	        $latest[$i]['name'] = $row['name'];
	        $latest[$i]['image'] = $row['image'];
	        $latest[$i]['price'] = $row['price'];
	        $latest[$i]['is_new'] = $row['is_new'];
	        $i++;
		}

		return $latest;

	}

	// продукти по категорії //
	public static function getCatProducts($cat_id, $page , $count) {

		$db = Database::getConnection();
		
		$c = (int) $count;
		$categoryProducts = [];
		if($page != 1){
			$page1 = explode('-', $page); // news  view  12
			$p = $page1[1];

			$offset = ($p - 1) * $c; // шоб з другої сторінки починався офсет -відступ
			$offset = (int)($offset) ; //для пагінації
			//echo "offset: $offset";

			//echo  $c;
			$result = $db->query('SELECT * FROM product WHERE status = 1 AND category_id = ' .$cat_id . ' ORDER BY id  LIMIT ' . $c . ' OFFSET '. $offset);
		}
		else{

			$result = $db->query('SELECT * FROM product WHERE status = 1 AND category_id = ' .$cat_id . ' ORDER BY id  LIMIT ' . $c );
		}



		$i = 0;
		while ($row = $result->fetch()) {
		 	$categoryProducts[$i]['id'] = $row['id'];
	        $categoryProducts[$i]['name'] = $row['name'];
	        $categoryProducts[$i]['image'] = $row['image'];
	        $categoryProducts[$i]['price'] = $row['price'];
	        $categoryProducts[$i]['is_new'] = $row['is_new'];
	        $i++;
		}

		return $categoryProducts;

	}


	public static function getProductById($id) {


		$db = Database::getConnection();
		$result = $db->query('SELECT * FROM product WHERE id =' . $id );
		$product = [];
		$i = 0;
		while ($row = $result->fetch()) {
		 	$product[$i]['id'] = $row['id'];
	      $product[$i]['name'] = $row['name'];
	      $product[$i]['code'] = $row['code'];
	      $product[$i]['price'] = $row['price'];
	      $product[$i]['is_new'] = $row['is_new'];
	      $product[$i]['description'] = $row['description'];

	      $product[$i]['brand'] = $row['brand'];
			$product[$i]['category_id'] = $row['category_id'];
			$product[$i]['availability'] = $row['availability'];
			$product[$i]['is_recommended'] = $row['is_recommended'];
			$product[$i]['status'] = $row['status'];


	        $i++;
		}

		return $product;

	}

    /**
     * Возвращает список рекомендуемых товаров
     * @return array <p>Массив с товарами</p>
     */
   public static function getRecommendedProducts() {
     // Соединение с БД
   		$db = Database::getConnection();
		$result = $db->query('SELECT * FROM courses WHERE  is_recommended = "1" ORDER BY id_c DESC');
     	$i = 0;
     	while ($row = $result->fetch()) {
		   $productsList[$i] = $row;
		  
		   $i++;
		}
     return $productsList;
   }


   //  для адміна //

    /**   * Возвращает список товаров   * @return array <p>Массив с товарами</p>  */
    public static function getProductsList() {
        // Соединение с БД
      $db = Database::getConnection();
	$result = $db->query('SELECT * FROM product ORDER BY id ASC');

      $productsList = array();
      $i = 0;
     	while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['code'] = $row['code'];
            $productsList[$i]['price'] = $row['price'];
            $i++;
     	}
     	return $productsList;
    }

      /* pagination */ 

    public static function  getCountCourses() {
        $db = Database::getConnection();
        $result = $db->query("SELECT SUM(total.count) AS sum_count FROM(SELECT  COUNT(id_b) as count FROM books ) AS total");
        $row = $result->fetch();// якшо не пусто то тру
        if($row['sum_count'])  return $row['sum_count'];
        else return false;
    }


    public static function  getCoursesInTop($page,$count) {
        $page = intval($page);
        $offset = $count*($page-1);
        $db = Database::getConnection();
        $result = $db->query("
            SELECT * FROM books
            LIMIT ".$count." OFFSET ".$offset);
        $i = 0;
        while ($row = $result->fetch()) {
            $course[$i] = $row;
            $i++;
        }
        return $course;
    }


    /* pagination */







    public static function 	getBooks() {
        $db = Database::getConnection();
        $result = $db->query('SELECT * FROM  books ');
        $i = 0;
		while ($row = $result->fetch()) {
            $course[$i] = $row;
            $i++;
		}
		return $course;
    }



  	/**    * Добавляет новый товар * @param array $options <p>Массив с информацией о товаре</p>  * @return integer <p>id добавленной в таблицу записи</p>  */

   	public static function insertBooks($options)  {
   		$db = Database::getConnection();
		$query = "INSERT INTO books (title, author, year, pages)
	        VALUES (:title,:author, :year,:pages)" ;   
	    $result = $db->prepare($query);
	    $result->bindParam(':title', $options[0], PDO::PARAM_STR);
	    $result->bindParam(':author', $options[1], PDO::PARAM_STR);
	    $result->bindParam(':year', $options[2], PDO::PARAM_INT);
	    $result->bindParam(':pages', $options[2], PDO::PARAM_INT);
		return $result->execute();
   	}


    //видалення даних
    public static function deleteAllBooks()  {
        $db = Database::getConnection();
        $result = $db->prepare("DELETE  FROM books "); 
        $result->execute();    
    }



}