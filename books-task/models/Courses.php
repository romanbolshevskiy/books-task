<?php
class Courses{

  


    public static function getCourseInfo($id) {
        $db = Database::getConnection();
        $result = $db->prepare("SELECT * FROM shops WHERE id_shop = :id" );
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $i = 0;
        while ($row = $result->fetch()) {
            $user[$i] = $row;
            $i++;
        }
        return $user;
    }


    public static function checkNameExists($name) {
        $db = Database::getConnection();
        $result = $db->prepare("SELECT COUNT(name) AS count FROM courses WHERE name=:name");
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->execute();
        $row = $result->fetch();// якшо не пусто то тру
        if($row['count']) return true;
        else return false;
    }




    public static function update($budni_start, $budni_end, $saturday_start,  $saturday_end, $sunday_start, $sunday_end, $id) {
        $db = Database::getConnection();
        $result = $db->prepare(" UPDATE shops SET hour_start_b=:bs, hour_end_b=:be, hour_start_sat=:sat_s,  hour_end_sat=:sat_e, hour_start_sunday=:sun_s, hour_end_sunday=:sun_e  WHERE id_shop=:id");
        $result->bindParam(':bs', $budni_start, PDO::PARAM_INT);
        $result->bindParam(':be', $budni_end, PDO::PARAM_INT);
        $result->bindParam(':sat_s', $saturday_start, PDO::PARAM_INT);
        $result->bindParam(':sat_e', $saturday_end, PDO::PARAM_INT);
        $result->bindParam(':sun_s', $sunday_start, PDO::PARAM_INT);
        $result->bindParam(':sun_e', $sunday_end, PDO::PARAM_INT);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
    }



    public static function  getReccomendsCourses() {
        $db = Database::getConnection();
        // треба лефт джойн з тічерсами!!
        $result = $db->query('SELECT * FROM  courses WHERE is_recommended=1');
        $i = 0;
        while ($row = $result->fetch()) {
            $course[$i] = $row;
            $i++;
        }
        return $course;
    }


    public static function  getShops($sort) {
        $db = Database::getConnection();
        // треба лефт джойн з тічерсами!!
        if($sort =='end_hour_sort'){
            $result = $db->query('SELECT * FROM  shops ORDER BY hour_end_b  DESC');
        }
        else if($sort == 'start_hour_sort') {
            $result = $db->query('SELECT * FROM  shops ORDER BY hour_start_b ');
        }
        else{
            $result = $db->query('SELECT * FROM  shops '); 
        }
       
        $i = 0;
        while ($row = $result->fetch()) {
            $course[$i] = $row;
            $i++;
        }
        return $course;
    }


}