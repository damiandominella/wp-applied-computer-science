<div class="post-preview">
    <h3 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
    <div class="post-info">
        <span class="date"><time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time(pll__('j F Y')); ?></time></span>
        |
        <span class="author"><?php the_author();?></span>
    </div>
    <?php if (isset($show_content) && $show_content) { ?> 
        <div class="content">
            <?php the_excerpt(); ?>
        </div>
    <?php } ?>
</div>

