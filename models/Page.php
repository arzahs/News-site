<?php

/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 01.06.16
 * Time: 16:58
 */


include $_SERVER["DOCUMENT_ROOT"]."/models/Category.php";

class Page
{
    public static function getOneById($id){
        $id = intval($id);

        if($id){
            $db = Db::getConnection();
            $result = $db->query("SELECT * FROM page WHERE id=".$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $pageItem = $result->fetch();
            return $pageItem;
        }
    }

}