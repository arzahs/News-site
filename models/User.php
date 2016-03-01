<?php

/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 28.02.16
 * Time: 19:02
 */
class User
{
    public static function register($firstName, $lastName, $login, $password, $email){
      $db = Db::getConnection();
        $sql = 'INSERT INTO user(first_name, last_name, login, password, email)
                VALUES (:first_name, :last_name, :login, :password, :email)';
        $result = $db->prepare($sql);
        $result->bindParam(':first_name', $firstName, PDO::PARAM_STR);
        $result->bindParam(':last_name', $lastName, PDO::PARAM_STR);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        return $result->execute();

    }

    public static function auth($userId){
        $_SESSION["user"] = $userId;
    }

    public static function logout(){
        unset($_SESSION["user"]);
        header("Location: /");
    }

    public static function checkName($name){
        if(strlen($name) >= 2){
            return true;
        }
        return false;
    }


    public static function checkEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }
    public static function checkLoginExist($login){
        $db = Db::getConnection();
        $sql = 'SELECT COUNT(*) FROM user WHERE login=:login';
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->execute();
        if($result->fetchColumn())
            return false;
        return true;
    }
    public static function checkEmailExist($email){
        $db = Db::getConnection();
        $sql = 'SELECT COUNT(*) FROM user WHERE email=:email';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        if($result->fetchColumn())
            return false;
        return true;
    }

    public static function checkPassword($password){
        if(strlen($password) >= 6){
            return true;
        }
        return false;
    }

    public static function checkUserExist($login, $password){
        $db = Db::getConnection();
        $sql = 'SELECT * FROM user WHERE login=:login AND password=:password';
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch();
        if($user)
            return $user["id"];
        return false;

    }

    public static function checkUserLogged(){

        if(isset($_SESSION["user"])){
            return $_SESSION["user"];
        }
        header("Location: /auth/");
    }

    public static function isAdmin($idUser){
        $db = Db::getConnection();
        $sql = 'SELECT is_admin FROM user WHERE id=:id';
        $result = $db->prepare($sql);
        $result->bindParam(":id", $idUser, PDO::PARAM_INT);
        $result->execute();
        $isAdmin = $result->fetch();
        if($isAdmin == 1){
            return true;
        }
            return false;

    }

    public static function isGuest(){
        if (isset($_SESSION["user"])){
            return false;
        }
        return true;
    }
}