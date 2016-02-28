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

}