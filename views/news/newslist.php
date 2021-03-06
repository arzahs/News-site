  <?php require $_SERVER["DOCUMENT_ROOT"]."/views/header.php" ?>
    <div>
      <h5 class="center-align">Последние новости</h5>
    </div>
    <div class="row">

  <div class="col s3 ">

    <div class="card">
    <div class="collection">
      <a href="/" class="collection-item <?php if($activeCategory==0) echo "active" ?> ">Все</a>
      <?php foreach($categories as $category): ?>
       <a href="<?php echo "/news/category/".$category["id"] ?>"
          class="collection-item <?php if($activeCategory == $category["id"]) echo "active"; ?>">
         <?php echo $category["name"]; ?></a>
      <?php endforeach; ?>
   </div>

    </div>
  </div>
  <div class="col s9">

    <?php foreach($items as $item): ?>

     <div class="card">
      <div class="card-img">
          <img src="<?php echo "http://".$_SERVER["HTTP_HOST"]."/static/img/".$item['id'].".jpg"?>">
      </div>
      <span class="card-title"><?php echo $item['title']; ?></span>
      <div class="card-content">
        <p><?php

          echo rtrim(mb_substr(strip_tags($item['article']), 0, 225, "UTF-8"), "!,. ")."[..]";

          ?></p>
      </div>
      <div class="card-action">
        <a href="/news/view/<?php echo $item["id"] ?>" class="blue-text">Читать детальнее</a>
        <div class="card-meta">
          <time datetime="<?php echo $item["date"] ?>" class="post-date"><?php echo $item["date"] ?></time>
          &nbsp;/&nbsp;<a href="#" class="category blue-text"><?php echo $item["category"]; ?></a>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
    </div>
        <?php if($numberPages != 1): ?>
            <?php require $_SERVER["DOCUMENT_ROOT"]."/views/pagination.php" ?>
        <?php endif ?>
      </div>



      <?php require $_SERVER["DOCUMENT_ROOT"]."/views/footer.php" ?>
