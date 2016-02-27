<?php

include $_SERVER["DOCUMENT_ROOT"]."/models/Category.php";
class News
{

    const SHOW_BY_DEFAULT = 6;

    public static function getOneById($id){
        $id = intval($id);

        if($id){
            $db = Db::getConnection();
            $result = $db->query("SELECT * FROM news WHERE id=".$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $newsItem = $result->fetch();
            $newsItem["category"] = Category::getById($newsItem["news_category_id"]);
            return $newsItem;
        }



    }

    public static function getAllByCategory($numberCategory, $page = 1)
    {   $page = intval($page);
        $numberCategory = intval($numberCategory);

        if ($numberCategory) {
            $db = Db::getConnection();
            $offset = ($page-1)*self::SHOW_BY_DEFAULT;
            $result = $db->query("SELECT * FROM news
            WHERE news_category_id=" . $numberCategory.' ORDER BY date DESC LIMIT '.self::SHOW_BY_DEFAULT.' OFFSET '.$offset);
            $i = 0;
            while ($row = $result->fetch()) {
                $newsItems[$i]["id"] = $row["id"];
                $newsItems[$i]["title"] = $row["title"];
                $newsItems[$i]["article"] = $row["article"];
                $newsItems[$i]["date"] = $row["date"];
                $newsItems[$i]["image"] = $row["image"];
                $newsItems[$i]["category"] = Category::getById($numberCategory);
                $newsItems[$i]["status"] = $row["status"];
                $i++;
            }
            return $newsItems;
            }

    }

    public static function getCountNews($idcategory = 0)
    {
        $db = Db::getConnection();
        if ($idcategory == 0) {
            $result = $db->query("SELECT COUNT(*) FROM news");
        }else{
            $result = $db->query("SELECT COUNT(*) FROM news WHERE news_category_id=".$idcategory);
            var_dump($result);
        }
        $count = $result->fetch(PDO::FETCH_NUM);
        return intval($count[0]);
    }

    public static function getAll($page = 1){
        $page = intval($page);
        $offset = ($page-1)*self::SHOW_BY_DEFAULT;
        $db = Db::getConnection();
        $result = $db->query('SELECT id, title, article, image, date, news_category_id, status
        FROM news ORDER BY date DESC LIMIT '.self::SHOW_BY_DEFAULT.' OFFSET '.$offset);
        $i = 0;
        while($row=$result->fetch()){
            $newsItems[$i]["id"] = $row["id"];
            $newsItems[$i]["title"] = $row["title"];
            $newsItems[$i]["article"] = $row["article"];
            $newsItems[$i]["date"] = $row["date"];
            $newsItems[$i]["image"] = $row["image"];
            $newsItems[$i]["category"] = Category::getById($row["news_category_id"]);
            $newsItems[$i]["status"] = $row["status"];
            $i++;
        }

        return $newsItems;
    }
}