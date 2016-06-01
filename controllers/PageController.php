<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/models/Page.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/models/User.php";
class PageController
{
    public function actionOne($id=1){
        $page = Page::getOneById($id);
        $view = new View();
        View::userControl($view);
        $view->assign("page", $page);
        $view->display("static_page.php");
        return true;
    }
}