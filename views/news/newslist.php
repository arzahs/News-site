  <?php require $_SERVER["DOCUMENT_ROOT"]."/views/header.php" ?>
    <div>
      <h5 class="center-align">Последние новости</h5>
    </div>
    <div class="row">

  <div class="col s3 ">
    <div class="card">
    <div class="collection">
       <a href="#!" class="collection-item active">Все</a>
       <a href="#!" class="collection-item">Украина</a>
       <a href="#!" class="collection-item">Мир</a>
       <a href="#!" class="collection-item">Политика</a>
       <a href="#!" class="collection-item">Экономика</a>
       <a href="#!" class="collection-item">Технологии</a>
       <a href="#!" class="collection-item">Авто</a>
       <a href="#!" class="collection-item">Стиль жизни</a>
   </div>

    </div>
  </div>
  <div class="col s9">

    <?php foreach($items as $item): ?>

     <div class="card">
      <div class="card-img">
          <img src="static/img/<?php echo $item['image'] ?>">
      </div>
      <span class="card-title"><?php echo $item['title']; ?></span>
      <div class="card-content">
        <p><?php

          echo rtrim(substr(strip_tags($item['article']), 0, 225), "!,. ")."[..]";

          ?></p>
      </div>
      <div class="card-action">
        <a href="/news/view/<?php echo $item["id"] ?>" class="blue-text">Читать детальнее</a>
        <div class="card-meta">
          <time datetime="<?php echo $item["date"] ?>" class="post-date"><?php echo $item["date"] ?></time>
          &nbsp;/&nbsp;<a href="#" class="category blue-text">Украина</a>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
    </div>
      <div class="container">
        <ul class="pagination">
          <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
          <li class="active"><a href="#!">1</a></li>
          <li class="waves-effect"><a href="#!">2</a></li>
          <li class="waves-effect"><a href="#!">3</a></li>
          <li class="waves-effect"><a href="#!">4</a></li>
          <li class="waves-effect"><a href="#!">5</a></li>
          <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        </ul>
      </div>
      </div>



      <?php require $_SERVER["DOCUMENT_ROOT"]."/views/footer.php" ?>
