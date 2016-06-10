<?php
if ( ! defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'Gnusmmt_shortcodes' ) ) :

    class Gnusmmt_shortcodes{

        public function __construct() {
            if( ! is_admin() ){
                add_action( 'template_redirect', array( $this, 'init' ), 12 );
            }
        }

        public static function init() {

            if ( is_gnucommerce_activated() ) {
                $shortcodes = array(
                    'gnusmmt_shop_latest'    => __CLASS__ . '::shop_latest',
                );

                foreach( $shortcodes as $key => $fn ){
                    add_shortcode( apply_filters( $key."_shortcode_tag", $key ), $fn );
                }
            }
        }

        public static function shortcode_wrapper($function,$atts=array(),$args=array()){

            ob_start();

            call_user_func( $function, $atts );

            return ob_get_clean();
        }

        public static function shop_latest($atts) {

            include_once( GC_SHORTCODE_DIR_PATH.'/shop.php' );
            include_once( __DIR__. '/gnucommerce_shop_class.php';  );

            return self::shortcode_wrapper( array( 'GC_shortcode_shop_latest', 'output' ), $atts, $args );
        }
    }

endif;  //Class exists Gnusmmt_shortcodes end if

New Gnusmmt_shortcodes();
?>