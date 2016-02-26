<div class="container">
        <ul class="pagination">
          <li class="<?php if($page==1){ echo "disabled";} else {echo "waves-effect";} ?>"><a href="<?php if($page != 1 ) echo '/page-'.($page-1) ?>"><i class="material-icons">chevron_left</i></a></li>
            <?php $thisPage = 0; while($thisPage++<$numberPages): ?>
    <li class="<?php if($thisPage == $page){echo "active";} else{ echo "waves-effect"; }?>"><a href="<?php echo '/page-'.$thisPage ?>"><?=$thisPage?></a></li>
<?php endwhile ?>
<li class="<?php if($page==$numberPages){ echo "disabled";} else {echo "waves-effect";} ?>"><a href="<?php if($page != $numberPages ) echo '/page-'.($page+1) ?>"><i class="material-icons">chevron_right</i></a></li>
</ul>
</div>