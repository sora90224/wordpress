<?php
if ( ! defined( 'ABSPATH' ) ) exit;

if ( class_exists( 'GC_shortcode_Shop' ) ) :

Class Gnusmmt_shop_latest extends GC_shortcode_Shop{

    public static function output( $atts ) {

        global $wpdb, $post;

        $config = GC_VAR()->config;
        $gc = GC_VAR()->gc;

        $default = array(
            'list_skin'=> !empty($atts['skin']) ? $atts['skin'] : 'main.10.skin.php',
            'list_mod'=> !empty($atts['columns']) ? $atts['columns'] : 3,
            'list_row'=> !empty($atts['limit']) ? $atts['limit'] : 12,
            'use_cache'=>false,
            'cache_time'=>1,
            'show_type'=>'',
            'category'=>'',
            'ul_class'=>'',
            );
        
        self::$attr = wp_parse_args($atts, $default);

        $cache_fwrite = false;

        add_filter( 'posts_where', array( __CLASS__, 'posts_where' ) );
        
        if(self::$attr['list_row'] > 0){
            add_filter( 'post_limits', array( __CLASS__, 'post_limits' ), 10, 2 );
        }

        $query_args = array();

        if( self::$attr['category'] ){  //카테고리가 있다면
            $query_args = self::get_categoty_args( self::$attr['category'] );
        }

        $query = new GC_Product_Query($query_args);

        $attr = self::$attr;

        $attr['items'] = array();

        $attr['item_list'] = apply_filters( 'gc_main_item_obj', NEW GC_item_list(), 'is_shortcode' );

        while ( $query->have_posts() ) : $query->the_post();

        $attr['items'][] = $post;

        endwhile;

        gc_skin_load($attr['list_skin'], $attr);
        
        wp_reset_postdata();

        if(self::$attr['list_row'] > 0){
            remove_filter( 'post_limits', array( __CLASS__, 'post_limits' ) );
        }
        remove_filter( 'posts_where', array( __CLASS__, 'posts_where' ) );
    }

    public static function class_wrap_start(){
    }

    public static function class_wrap_end(){
    }

    public static function posts_where($sql){
        return $sql;
    }
}

endif;  //Class exists GC_shortcode_shop_latest end if

?>