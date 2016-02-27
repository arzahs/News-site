<?php


include_once $_SERVER["DOCUMENT_ROOT"]."/models/News.php";
class NewsController
{

    public function actionList($page = 1){
        $newsItems = News::getAll($page);
        $categoryItems = Category::getAll();

        //получаю данные для пагинации
        $numberItems = News::SHOW_BY_DEFAULT;
        $countItems = News::getCountNews();
        $numberPages = ceil($countItems/intval($numberItems)); //округляю колличество страниц

        //отправляю данные на вьюху
        $view = new View();
        $view->assign("page", $page);
        $view->assign("items", $newsItems);
        $view->assign("categories", $categoryItems);
        $view->assign("activeCategory", 0);
        $view->assign("numberPages", $numberPages);
        $view->display("news/newslist.php");
        return true;
    }

    public function actionCategory($numberCategory, $page = 1){
        $newsItems = News::getAllByCategory($numberCategory, $page);
        $categoryItems = Category::getAll();

        $numberItems = News::SHOW_BY_DEFAULT;
        $countItems = News::getCountNews($numberCategory);
        $numberPages = ceil($countItems/intval($numberItems));

        $view = new View();
        $view->assign("page", $page);
        $view->assign("items", $newsItems);
        $view->assign("categories", $categoryItems);
        $view->assign("activeCategory", $numberCategory);
        $view->assign("numberPages", $numberPages);
        $view->display("news/newslist.php");

        return true;
    }
    public function actionView($numberNews){
        $newsItem = News::getOneById($numberNews);
        $view = new View();
        $view->assign("news", $newsItem);
        $view->display("news/newsone.php");
        return true;
    }
}