<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package applied-computer-science
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="container">

	<header class="entry-header">	
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
		<span class="blog-name"><?php echo get_bloginfo();?></span>
	</header><!-- .entry-header -->

	<?php //applied_computer_science_post_thumbnail(); ?>

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
	<div class="entry-content">
		<?php
		the_content();
		?>
	</div><!-- .entry-content -->
		</div> <!-- .container -->
</article>