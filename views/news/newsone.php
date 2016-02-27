<?php require $_SERVER["DOCUMENT_ROOT"]."/views/header.php" ?>
    <div class="col s12">
        <h2><?=$news["title"] ?></h2>
        <div class="card-meta">
            <time datetime="<?=$news["date"]; ?>" class="post-date"><?=$news["date"]; ?></time>
            &nbsp;/&nbsp;<a href="<?php echo "/news/category/".$news["news_category_id"];?>" class="category blue-text"><?=$news["category"]; ?></a>
        </div>
        <div class="flow-text">
            <img src="<?php echo "http://".$_SERVER["HTTP_HOST"]."/static/img/".$news['image'] ?>" class="news-img" alt="">
            <p><?=$news["article"]; ?></p>
        </div>



    </div>

<?php require $_SERVER["DOCUMENT_ROOT"]."/views/footer.php" ?>