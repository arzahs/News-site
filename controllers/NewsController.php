<?php


include_once $_SERVER["DOCUMENT_ROOT"]."/models/News.php";
class NewsController
{

    public function actionList(){
       // $newsItems = array();
        $newsItems = News::getAll();
        $view = new View();
        $view->assign("items", $newsItems);
        $view->display("news/newslist.php");

        return true;
    }

    public function actionView($numberNews){
        $newsItem = News::getOneById($numberNews);
        echo "<pre>".$newsItem."</pre>";
        return true;
    }
}