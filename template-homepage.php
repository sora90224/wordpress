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
         *  @gnusmmt_shop_main_banner   hook 20
         *  @gnusmmt_shop_sub_banner    hook 25
         *  @gnusmmt_latest_gnucommerce_shop    hook 26
         *  @gnusmmt_latest_gnucommerce_shop_type    hook 30
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