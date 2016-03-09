<?php
//прописываю маршруты
return array(
    "auth/logout" => "user/logout",
    "auth/register" => "user/register",
    "auth" => "user/auth",
    "news/category/([0-9]+)/page-([0-9]+)" => "news/category/$1/$2",
    "news/category/([0-9]+)" => "news/category/$1",
    "news/view/([0-9]+)" => "news/view/$1",
    "news/rss.xml" => "news/rss",
    "news/add" => "news/add",
    "news/all.json" => "news/alljson",
    "news/news-([0-9]+).json" => "news/onejson/$1",
    "news/page-([0-9]+)" => "news/list/$1",
    "home" => "home/test",
    "page-([0-9]+)" => "news/list/$1",
    "" => "news/list"
);