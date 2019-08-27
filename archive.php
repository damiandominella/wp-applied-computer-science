<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package applied-computer-science
 */

get_header();
?>
	<div id="primary" class="content-area">
	<div class="container">
		<main id="main" class="site-main">

		<?php if (is_category()) { ?>
        <?php $title = single_cat_title('', false); ?>

    <?php } elseif (is_tag()) { ?> 
        <?php $title = __("Post Taggati:", "applied-computer-science") . ' ' . single_tag_title('', false); ?>

    <?php } elseif (is_author()) { ?>
        <?php the_post(); ?>
        <?php $title = __("Posts By Author:", "applied-computer-science") . ' ' . get_the_author(); ?>
        <?php rewind_posts(); ?>

    <?php } elseif (is_day()) { ?>
        <?php $title = __("Daily Archives:", "applied-computer-science") . ' ' . the_time('l, F j, Y'); ?>

    <?php } elseif (is_month()) { ?>
        <?php $title = __("Monthly Archives:", "applied-computer-science") . ' ' . the_time('F Y'); ?>

    <?php } elseif (is_year()) { ?>
        <?php $title = __("Yearly Archives:", "applied-computer-science") . ' ' . the_time('Y'); ?>
    <?php } ?>


		<header class="entry-header">
			<h1 class="entry-title"><?php echo $title; ?></h1>
			<span class="blog-name"><?php echo get_bloginfo();?></span>
		</header><!-- .entry-header -->

		<?php if ( have_posts() ) : ?>


			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/article', get_post_type() );
			endwhile;

			page_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
</div> <!-- #container -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
