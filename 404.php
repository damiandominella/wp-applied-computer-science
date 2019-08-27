<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package applied-computer-science
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<div class="container">


			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( '404 - Page not found.', 'applied-computer-science' ); ?></h1>
					<span class="blog-name"><?php echo get_bloginfo();?></span>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'applied-computer-science' ); ?></p>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
