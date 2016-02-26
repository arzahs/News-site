<?php
//прописываю маршруты
return array(
    "news/category/([0-9]+)" => "news/category/$1",
    "news/view/([0-9]+)" => "news/view/$1",
    "news/page-([0-9]+)" => "news/list/$1",
    "home" => "home/test",
    "page-([0-9]+)" => "news/list/$1",
    "" => "news/list"
);