<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Post thumbnail.
		// twentyfifteen_post_thumbnail();
	?>

	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="content">
			<?php the_content(); ?>
		</div>
		<div class="featured-image">
			<?php the_post_thumbnail(); ?>
			<div class="caption"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></div>
		</div>
		<div class="clear"></div>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
