<?php
/**
 * The template for displaying the homepage.
 *
 * Template name: Homepage
 *
 * @package gnucommerce-2016-summer-tt
 */

get_header(); ?>

	<div id="primary" class="content-area">
	    
        <?php
        do_action( 'homepage' );
        ?>

        적용할 내용을 여기에 적습니다.
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>