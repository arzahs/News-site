<?php


include_once $_SERVER["DOCUMENT_ROOT"]."/models/News.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/models/User.php";
class NewsController
{


    public function actionList($page = 1){
        $newsItems = News::getAll($page);
        $categoryItems = Category::getAll();

        //получаю данные для пагинации
        $numberItems = News::SHOW_BY_DEFAULT;
        $countItems = News::getCountNews();
        $numberPages = ceil($countItems/intval($numberItems)); //округляю колличество страниц
        //получаю данные про пользователя

        //отправляю данные на вьюху
        $view = new View();
        View::userControl($view);
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
        View::userControl($view);
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
        View::userControl($view);
        $view->display("news/newsone.php");
        return true;
    }

    public function actionAdd(){
        $article = "";
        $title = "";
        $categoryNumber = 1;
        $errors = false;
        //проверка на аутенфикацию пользователя
        $userId = User::checkUserLogged();
        $isAdmin = User::isAdmin($userId);
        if($isAdmin == false) {
            header("Location: /");
        }
        $categoryItems = Category::getAll();
        if(isset($_POST["action"])){
            $article = $_POST["article"];
            $title = $_POST["title"];
            $categoryNumber = $_POST["category"];

            //валидация данных
            //отправляем данные в базу данных

            if($errors==false){
                $result = News::addNews($title, $article, $categoryNumber, $userId);
                if($result!=0){

                    if(is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        $namePathToLoad = $_SERVER['DOCUMENT_ROOT'] . "/static/img/{$result}.jpg";
                        if(move_uploaded_file($_FILES["image"]["tmp_name"], $namePathToLoad)){
                            header("Location: /");
                        }else{
                            $errors[] = "Ошибка записи файла!";
                        }

                    }

                }else{
                    $errors[] = "Ошибка записи в Базу Данных";
                }
            }

            //переправляем пользователя на главную страницу

        }
        $view = new View();
        View::userControl($view);
        $view->assign("errors", $errors);
        $view->assign("categories", $categoryItems);
        $view->display("news/newsadd.php");
            //считываем данные из формы

        return true;
    }
}