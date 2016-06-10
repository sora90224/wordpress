<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Homepage
 *
 * @see  gnusmmt_homepage_content()
 */
//add_action( 'homepage', 'gnusmmt_homepage_content',      10 );

/**
 * Homepage
 *
 * @see  shop_main_banner
 */
add_action( 'homepage', 'gnusmmt_shop_main_banner',      20 );

/**
 * Homepage
 *
 * @see  shop_sub_banner
 */
add_action( 'homepage', 'gnusmmt_shop_sub_banner',      25 );

/**
 * Homepage
 *
 * @see  shop_sub_banner
 */
add_action( 'homepage', 'gnusmmt_latest_gnucommerce_shop',      26 );

/**
 * Homepage
 *
 * @see  shop_sub_banner
 */
add_action( 'homepage', 'gnusmmt_latest_gnucommerce_shop_type',      30 );


add_filter( 'gc_get_icon_url', 'gnusmmt_get_icon_url' );
?>