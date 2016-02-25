<?php


class News
{

    public static function getOneById($id){
        $id = intval($id);

        if($id){
            $db = Db::getConnection();
            $result = $db->query("SELECT * FROM news WHERE id=".$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $newsItem = $result->fetch();
            print_r($newsItem);
            return $newsItem;
        }



    }


    public static function getAll(){
        $db = Db::getConnection();
        $result = $db->query('SELECT id, title, article, date FROM news ORDER BY date DESC LIMIT 10');
        $i = 0;
        while($row=$result->fetch()){
            $newsItems[$i]["id"] = $row["id"];
            $newsItems[$i]["title"] = $row["title"];
            $newsItems[$i]["article"] = $row["article"];
            $newsItems[$i]["date"] = $row["date"];
            $i++;
        }

        return $newsItems;
    }
}