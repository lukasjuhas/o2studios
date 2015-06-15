<?php
/**
 * Template Name: Services
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'content', 'page' );

		// End the loop.
		endwhile;
		?>

		<?php
			$args = array(
				'post_type'			  => 'service',
				'order_by'			  => 'menu_order',
				'order'				  => 'DESC',
				'posts_per_page'      => 3,
			);
			$services = new WP_Query( $args );
			if ( $services->have_posts() ) {
				while ( $services->have_posts() ) {
					$services->the_post();
					get_template_part( 'content', 'service' );
				}
			}
 		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
