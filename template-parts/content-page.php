<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package applied-computer-science
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="container">

	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?><?php if (get_the_ID() === 106) { ?> 
			<a class="rss-link" href="<?php bloginfo('rss2_url'); ?>?post_type[]=bulletin_board"><i class="fas fa-rss"></i></a>
		<?php } ?></h1>
		<span class="blog-name"><?php echo get_bloginfo();?></span>
	</header><!-- .entry-header -->

	<?php //applied_computer_science_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		// wp_link_pages( array(
		// 	'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'applied-computer-science' ),
		// 	'after'  => '</div>',
		// ) );
		?>
	</div><!-- .entry-content -->
		</div>
</article>
