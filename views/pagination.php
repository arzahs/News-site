<div class="container">
        <ul class="pagination">
          <li class="<?php if($page==1){ echo "disabled";} else {echo "waves-effect";} ?>"><a href="<?php if($page != 1 ){
                  if($activeCategory!=0){
                      echo 'http://'.$_SERVER["HTTP_HOST"]."/news/category/".$activeCategory.'/page-'.($page-1);
                  }else{
                      echo '/page-'.($page-1);
                  }
                }?>"><i class="material-icons">chevron_left</i></a></li>
            <?php $thisPage = 0; while($thisPage++<$numberPages): ?>
    <li class="<?php if($thisPage == $page){echo "active";} else{ echo "waves-effect"; }?>"><a href="<?php
        if($activeCategory!=0){
            echo 'http://'.$_SERVER["HTTP_HOST"]."/news/category/".$activeCategory.'/page-'.$thisPage;
        }else{
            echo '/page-'.$thisPage;
        } ?>"><?=$thisPage?></a></li>
<?php endwhile ?>
<li class="<?php if($page==$numberPages){ echo "disabled";} else {echo "waves-effect";} ?>"><a href="<?php if($page != $numberPages ){
        if($activeCategory!=0){
            echo 'http://'.$_SERVER["HTTP_HOST"]."/news/category/".$activeCategory.'/page-'.($page+1);
        }else{
            echo '/page-'.($page+1);
        }
    } ?>"><i class="material-icons">chevron_right</i></a></li>
</ul>
</div>