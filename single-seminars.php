<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package applied-computer-science
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

            $fields = get_fields();
            $date_end = '';
            $n_dates = count($fields['date']);
            if ($n_dates > 1 && @$fields['date'][$n_dates - 1]['data']) {
                $date_end = date_i18n(pll__('j F Y'), DateTime::createFromFormat('Ymd', $fields['date'][$n_dates - 1]['data'])->getTimestamp());
            }
            $date = date_i18n(pll__('j F Y'), DateTime::createFromFormat('Ymd', $fields['date'][0]['data'])->getTimestamp()) . (@$date_end ? ' - ' . $date_end : '');    

			get_template_part( 'template-parts/content', get_post_type() );

			?> 
			<div class="container">
				<?php if ($fields['relatore']) : ?>
					<h3><?php _e("Relatore", "applied-computer-science"); ?></h3>
					<p><?php echo $fields['relatore'] ?></p>
				<?php endif; ?>

				<?php if ($fields['docente']) : ?>
					<h3><?php _e("Docente di riferimento", "applied-computer-science"); ?></h3>
					<p><?php echo $fields['docente'] ?></p>
				<?php endif; ?>
				
				<?php if ($fields['vincoli']) : ?>
					<h3><?php _e("Vincoli di partecipazione", "applied-computer-science"); ?></h3>
					<p><?php echo $fields['vincoli'] ?></p>
				<?php endif; ?>
				
				<?php if (count($fields['date']) > 0) : ?>
					<h3><?php _e("Date", "applied-computer-science"); ?></h3>
				
					<table class="big">
						<thead class="dark">
							<tr>
								<th><?php _e("Luogo", "applied-computer-science"); ?></th>
								<th><?php _e("Data", "applied-computer-science"); ?></th>
								<th><?php _e("Orario", "applied-computer-science"); ?></th>
								<th><?php _e("Crediti (CFU)", "applied-computer-science"); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($fields['date'] as $date) : ?>
								<?php if (!($date['data'] && $date['orario'])) continue ?>
								<tr>
									<td><?php echo $date['luogo'] ?></td>
									<td><?php echo date_i18n(pll__('j F Y'), DateTime::createFromFormat('Ymd', $date['data'])->getTimestamp()) ?></td>
									<td><?php echo $date['orario'] ?></td>
									<td><?php echo $date['crediti'] ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				<?php endif; ?>
			</div>
		
		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
