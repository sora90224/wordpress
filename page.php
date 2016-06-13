<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 */

$is_shop_template = is_gnucommerce_page();
$content_area_class = $is_shop_template ? 'content-area-shop' : 'content-area';

get_header(); ?>

<div id="primary" class="<?php echo $content_area_class; ?>">
	<main id="main"  role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->
<?php
if( !$is_shop_template ){
get_sidebar();
}
?>
<?php get_footer(); ?>
