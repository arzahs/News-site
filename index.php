<?php

//общие настройки и подключение файлов

ini_set("display_errors", 1);
error_reporting(E_ALL);
//подулючаем важные файлы
require_once("components/Router.php");
require_once("components/Db.php");
require_once("components/View.php");




session_start();
//маршрутизация
$router = new Router();
$router->run();