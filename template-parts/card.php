<div class="card">
    <h3 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
    <div class="info">
        <span class="date"><time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time(pll__('j F Y')); ?></time></span>
        |
        <span class="author"><?php the_author();?></span>
    </div>
    <!-- <div class="content">
        <?php // the_content(); ?>
    </div> -->
</div>

