<?php

add_action( 'widgets_init', 'sirfurniture_widgets_init' );

/**
 * Register our sidebars and widgetized areas.
 *
 */
function sirfurniture_widgets_init() {

    if( is_gnucommerce_activated() ){
        register_widget( 'sir_latest_board_widget' );
        register_widget( 'sir_latest_item_widget' );
    }

    register_sidebar( array(
        'name'          => __( 'Main #1', 'sir-furniture' ),
        'id'            => 'main-widget-1',
        'description' 		=> __('Appears at the Main #1', 'sir-furniture' ),
        'before_widget' => '<div class="main_widget">',
        'after_widget'  => '<div>',
        'before_title'  => '',
        'after_title'   => '',
    ));

    register_sidebar( array(
        'name'          => __( 'Footer #1', 'sir-furniture' ),
        'id'            => 'footer-widget-1',
        'description' 		=> __('Appears at the Footer #1', 'sir-furniture' ),
        'before_widget' => '<div class="footer_widget">',
        'after_widget'  => '<div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ));

    register_sidebar( array(
        'name'          => __( 'Footer #2', 'sir-furniture' ),
        'id'            => 'footer-widget-2',
        'description' 		=> __('Appears at the Footer #2', 'sir-furniture' ),
        'before_widget' => '<div class="footer_widget">',
        'after_widget'  => '<div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ));

    register_sidebar( array(
        'name'          => __( 'Footer #3', 'sir-furniture' ),
        'id'            => 'footer-widget-3',
        'description' 		=> __('Appears at the Footer #3', 'sir-furniture' ),
        'before_widget' => '<div class="footer_widget">',
        'after_widget'  => '<div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ));

    register_sidebar( array(
        'name'          => __( 'Footer #4', 'sir-furniture' ),
        'id'            => 'footer-widget-4',
        'description' 		=> __('Appears at the Footer #4', 'sir-furniture' ),
        'before_widget' => '<div class="footer_widget">',
        'after_widget'  => '<div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ));
}
?>