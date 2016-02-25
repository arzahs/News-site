<?php

//общие настройки и подключение файлов

ini_set("display_errors", 1);
error_reporting(E_ALL);
//подулючаем важные файлы
require_once("components/Router.php");
require_once("components/Db.php");

//подключение к БД

//маршрутизация


$router = new Router();
$router->run();