<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/models/User.php";
class UserController
{
    public function actionRegister(){
        $view = new View();
        $firstName = "";
        $lastName = "";
        $login = "";
        $password = "";
        $email = "";

        if(isset($_POST["action"])){
            $firstName = $_POST["first_name"];
            $lastName = $_POST["last_name"];
            $login = $_POST["login"];
            $password = $_POST["password"];
            $email = $_POST["email"];
            $errors = false;
            if(!User::checkName($firstName)){
                $errors[] = "Имя пользователя слишком короткое";
            }
            if(!User::checkName($lastName)){
                $errors[] = "Фамилия пользователя слишком короткая";
            }
            if(!User::checkName($login)){
                $errors[] = "Логин слишком короткий";
            }
            if(!User::checkEmail($email)){
                $errors[] = "E-mail введен не корректно";
            }
            if(!User::checkPassword($password)){
                $errors[] = "Пароль слишком короткий";
            }
            if(!User::checkLoginExist($login)){
                $errors[] = "Такой логин уже существует";
            }
            if(!User::checkEmailExist($login)){
                $errors[] = "Такой e-mail уже существует";
            }
            $view->assign("errors", $errors);
            if($errors == false){
                $result = User::register($firstName, $lastName, $login, $password, $email);
                if($result){
                    $view2 = new View();
                    $view2->assign("register", true);
                    $view2->display("auth/auth.php");
                    return true;
                }
            }
        }

        $view->assign("password", $password);
        $view->assign("login", $login);
        $view->assign("last_name", $lastName);
        $view->assign("first_name", $firstName);
        $view->assign("email", $email);
        $view->display("auth/register.php");
        return true;
    }

    public function actionAuth(){
        $view = new View();
        $view->display("auth/auth.php");
        return true;
    }


}