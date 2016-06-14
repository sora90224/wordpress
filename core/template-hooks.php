<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Homepage
 *
 * @see  sirfurniture_homepage_content()
 */
//add_action( 'homepage', 'sirfurniture_homepage_content',      10 );

/**
 * Homepage
 *
 * @see  shop_main_banner
 */
add_action( 'homepage', 'sirfurniture_shop_main_banner',      20 );

/**
 * Homepage
 *
 * @see  shop_sub_banner
 */
add_action( 'homepage', 'sirfurniture_shop_sub_banner',      25 );

/**
 * Homepage
 *
 * @see  shop_sub_banner
 */
add_action( 'homepage', 'sirfurniture_latest_gnucommerce_shop',      26 );

/**
 * Homepage
 *
 * @see  sirfurniture_main_widget_area
 */
add_action( 'homepage', 'sirfurniture_main_widget_area',      30 );

/**
 * Homepage
 *
 * @see  shop_sub_banner
 */
add_action( 'homepage', 'sirfurniture_latest_gnucommerce_shop_type',      40 );


add_filter( 'gc_get_icon_url', 'sirfurniture_get_icon_url' );
?>