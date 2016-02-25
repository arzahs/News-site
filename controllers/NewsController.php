<?php


include_once $_SERVER["DOCUMENT_ROOT"]."/models/News.php";
class NewsController
{

    public function actionList(){
       // $newsItems = array();
        $newsItems = News::getAll();
        echo "<pre>";
        print_r($newsItems);
        echo "</pre>";
        return true;
    }

    public function actionView($numberNews){
        $newsItem = News::getOneById($numberNews);
        echo "<pre>".$newsItem."</pre>";
        return true;
    }
}