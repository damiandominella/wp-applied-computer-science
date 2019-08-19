<div class="article">
    <h3 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
    <div class="post-info">
        <span class="date"><time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time(pll__('j F Y')); ?></time></span>
        |
        <span class="author"><?php the_author();?></span>

        <?php if (get_field('expiry_date')) { ?> 
            |
        <?php $date = DateTime::createFromFormat('Ymd', get_field('expiry_date')); ?>
        <span class="expiry">
        <?php _e("Scadenza", "applied-computer-science"); ?> <?php echo " " . date_i18n(pll__('j F Y'), $date->getTimestamp()); ?>
        </span>
        <?php } ?>
    </div>
    <div class="tags">
        <?php the_tags('', ' / ') ?>
    </div>
    <div class="content">
        <?php the_content(); ?>
    </div>
</div>

