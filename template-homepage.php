<?php
/**
 * The template for displaying the homepage.
 *
 * Template name: Homepage
 *
 * @package sir-furniture
 */

get_header(); ?>

	<div id="primary" class="shop-main">
	    
        <?php
        /*
         *  @sirfurniture_shop_main_banner   hook 20
         *  @sirfurniture_shop_sub_banner    hook 25
         *  @sirfurniture_latest_gnucommerce_shop    hook 26
         *  @sirfurniture_main_widget_area    hook 30
         *  @sirfurniture_latest_gnucommerce_shop_type    hook 40
        */
        do_action( 'homepage' );
        ?>
	</div>

<script>
jQuery(document).ready(function($) {
    $(".site-inner").addClass("shop-inner").removeClass("site-inner");
});
</script>
<?php get_footer(); ?>