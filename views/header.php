<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Новостной сайт</title>
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
  <link rel="stylesheet" href="<?php echo "http://".$_SERVER["HTTP_HOST"]."/static/css/app.css" ?>">
</head>
<body>
  <header>
    <nav>
    <div class="nav-wrapper container">
      <a href="/" class="brand-logo">Новостной сайт</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="/" >Новости</a></li>
        <?php if(isset($isAdmin) && $isAdmin == true): ?>
          <li><a href="/news/add">Добавить новость</a></li>
        <?php endif; ?>

        <?php if(isset($isLogged) && $isLogged == true): ?>
        <li><a href="/docs">Документация</a></li>
          <li><a href="/auth/logout">Выйти</a></li>
        <?php endif; ?>
        <?php if(!isset($isLogged) || $isLogged == false): ?>
        <li><a href="/auth">Войти</a></li>
        <?php endif; ?>


      </ul>
    </div>
  </nav>
  </header>
  <main class="container">