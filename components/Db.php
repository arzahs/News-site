<?php

/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 25.02.16
 * Time: 10:23
 */
class Db
{
    public static function getConnection(){
        $pathDbConfigs = $_SERVER["DOCUMENT_ROOT"]."/configs/db.php";
        $configs = include($pathDbConfigs);
        $dsn = "mysql:host={$configs["host"]};dbname={$configs["db"]}";
        $db = new PDO($dsn, $configs["user"], $configs["password"]);
        return $db;
    }
}