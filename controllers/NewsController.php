<?php


include_once $_SERVER["DOCUMENT_ROOT"]."/models/News.php";
class NewsController
{

    public function actionList($page = 1){
        $newsItems = News::getAll($page);
        $categoryItems = Category::getAll();
        $view = new View();
        $view->assign("page", $page);
        $view->assign("items", $newsItems);
        $view->assign("categories", $categoryItems);
        $view->assign("activeCategory", 0);
        $view->display("news/newslist.php");
        return true;
    }

    public function actionCategory($numberCategory){
        $newsItems = News::getAllByCategory($numberCategory);
        $categoryItems = Category::getAll();
        $view = new View();
        $view->assign("items", $newsItems);
        $view->assign("categories", $categoryItems);
        $view->assign("activeCategory", $numberCategory);
        $view->display("news/newslist.php");

        return true;
    }
    public function actionView($numberNews){
        $newsItem = News::getOneById($numberNews);
        echo "<pre>".$newsItem."</pre>";
        return true;
    }
}