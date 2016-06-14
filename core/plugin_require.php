<?php
if( ! defined( 'ABSPATH' ) ) exit;

if (!function_exists('sirfurniture_setup')) {

	function sirfurniture_setup() {

        global $sirfurniture_global;
        $sirfurniture_global = array();

		add_theme_support( 'gnucommerce' );
		
		require_once( trailingslashit( get_template_directory() ) . 'core/tgm/class-tgm-plugin-activation.php' );
		require_once( trailingslashit( get_template_directory() ) . 'core/classes/customize.php' );
        require_once( trailingslashit( get_template_directory() ) . 'core/admin/customize/customize.php' );
        
        require_once( trailingslashit( get_template_directory() ) . 'core/hooks.php' );
        require_once( trailingslashit( get_template_directory() ) . 'core/widget/gnucommerce_widget.php' );

        require_once( trailingslashit( get_template_directory() ) . 'core/widget/gnucommerce_item_widget.php' );
        require_once( trailingslashit( get_template_directory() ) . 'core/widget/widget_functions.php' );

    
        require_once( trailingslashit( get_template_directory() ) . 'core/template-functions.php' );
        require_once( trailingslashit( get_template_directory() ) . 'core/template-hooks.php' );
	}

	add_action( 'after_setup_theme', 'sirfurniture_setup', 12 );


    /* widget_action */
    add_action( 'sirfurniture_footer1', 'sirfurniture_footer_widget1' );
    add_action( 'sirfurniture_footer2',	'sirfurniture_footer_widget2' );
    add_action( 'sirfurniture_footer3',	'sirfurniture_footer_widget3' );
    add_action( 'sirfurniture_footer4',	'sirfurniture_footer_widget4' );
}

if( !function_exists('sirfurniture_footer_widget1') ){
    function sirfurniture_footer_widget1(){
        if ( is_active_sidebar( 'footer-widget-1' ) ) {
            ?>
				<?php dynamic_sidebar( 'footer-widget-1' ); ?>
            <?php
        }
    }
}

if( !function_exists('sirfurniture_footer_widget2') ){
    function sirfurniture_footer_widget2(){
        if ( is_active_sidebar( 'footer-widget-2' ) ) {
            ?>
				<?php dynamic_sidebar( 'footer-widget-2' ); ?>
            <?php
        }
    }
}

if( !function_exists('sirfurniture_footer_widget3') ){
    function sirfurniture_footer_widget3(){
        if ( is_active_sidebar( 'footer-widget-3' ) ) {
            ?>
				<?php dynamic_sidebar( 'footer-widget-3' ); ?>
            <?php
        }
    }
}

if( !function_exists('sirfurniture_footer_widget4') ){
    function sirfurniture_footer_widget4(){
        if ( is_active_sidebar( 'footer-widget-4' ) ) {
            ?>
				<?php dynamic_sidebar( 'footer-widget-4' ); ?>
            <?php
        }
    }
}

if (!function_exists('sirfurniture_get_option')) {
    function sirfurniture_get_option($id, $default=''){
		$sirfurniture_option = get_theme_mod($id);
			
		if( $sirfurniture_option ){
            return $sirfurniture_option;
        }
		
        return $default;
    }
}

// Add styles
add_action( 'wp_enqueue_scripts', 'sir_comm_add_enqueue_styles' );
function sir_comm_add_enqueue_styles() {

    wp_enqueue_style( 'sir-comm-add-style',
        get_template_directory_uri() . '/css/add.css'
    );
    
    // Add script
    wp_enqueue_script( 'sir_comm_mainjs', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), false, true );
}

if ( !class_exists( 'SIR_register_required_plugins' ) ) :

Class SIR_register_required_plugins {
    public function __construct() {
        add_action( 'tgmpa_register', array( $this, 'required_plugins') );
    }

    public function required_plugins(){

		$plugins = array(

			array(
				'name'      => 'GNUCommerce',
				'slug'      => 'gnucommerce',
				'required'  => false,
			),
	
		);

		$config = array(
			'menu'         => 'sirfurniture-install-plugins', 
			'parent_slug'  => 'themes.php',
		);

		tgmpa( $plugins, $config );

    }
}

new SIR_register_required_plugins();

endif;  //Class exists SR_register_required_plugins end if
?>