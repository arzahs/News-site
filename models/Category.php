<?php

/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 25.02.16
 * Time: 14:27
 */
class Category
{
     public static function getAll(){
         $db = Db::getConnection();
         $result = $db->query('SELECT * FROM category_news');
         $i = 0;
         while($row=$result->fetch()){
             $categoryItems[$i]["id"] = row["id"];
             $categoryItems[$i]["name"] = row["name"];
             $i++;
         }

         return $categoryItems;
     }

    public static function getById($id){
        $db = Db::getConnection();
        $result = $db->query('SELECT name FROM category_news WHERE id='.$id);
        $result = $db->fetch(PDO::FETCH_ASSOC);
        $name = $result["name"];

        return $name;
    }
}