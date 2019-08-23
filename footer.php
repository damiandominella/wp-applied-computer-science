<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package applied-computer-science
 */

?>

	</div><!-- #content -->

	<footer id="footer" class="site-footer">
		<div class="prefooter">
			<div class="container">
				<div class="row">
					<?php dynamic_sidebar( 'footer' ); ?>
				</div>
			</div>
		</div>
		<div class="copyright">
			<p>&copy; <?php echo date('Y'); ?> | Developed with <i class="fas fa-heart"></i> by <a class="grey" target="_blank" href="https://github.com/damiandominella">Damian Dominella</a></p>
		</div>
	</footer><!-- #footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
