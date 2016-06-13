<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! function_exists( 'sirfurniture_homepage_content' ) ) {
	/**
	 * Display homepage content
	 * Hooked into the `homepage` action in the homepage template
	 */
	function sirfurniture_homepage_content() {
		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		} // end of the loop.
	}
}

if( ! function_exists( 'sirfurniture_shop_main_banner' ) ){
	/**
	 * Display homepage content
	 * homepage_main_banner
	 */
	function sirfurniture_shop_main_banner() {

        if ( is_front_page() ) {
            if ( sirfurniture_get_option('sir_enable_slideshow') == 'on' || !sirfurniture_get_option('sir_enable_slideshow') ) {
        ?>
        <div id="shop-main-banner">
            <ul class="main-banner">
                <li><a href="<?php echo esc_url(sirfurniture_get_option('sir_slideshow_1_url','#'))?>"><img src="<?php echo esc_url(sirfurniture_get_option('sir_slideshow_1_image', get_template_directory_uri().'/img/slider_ex_img.png'))?>" alt="<?php echo esc_attr(sirfurniture_get_option('sir_slideshow_1_alt','image1'))?>"></a></li>
                <li><a href="<?php echo esc_url(sirfurniture_get_option('sir_slideshow_2_url','#'))?>"><img src="<?php echo esc_url(sirfurniture_get_option('sir_slideshow_2_image', get_template_directory_uri().'/img/slider_ex_img.png'))?>" alt="<?php echo esc_attr(sirfurniture_get_option('sir_slideshow_2_alt','image2'))?>"></a></li>
                <li><a href="<?php echo esc_url(sirfurniture_get_option('sir_slideshow_3_url','#'))?>"><img src="<?php echo esc_url(sirfurniture_get_option('sir_slideshow_3_image', get_template_directory_uri().'/img/slider_ex_img.png'))?>" alt="<?php echo esc_attr(sirfurniture_get_option('sir_slideshow_3_alt','image3'))?>"></a></li>
            </ul>
        </div>
        <?php
            }
        }

	}

}

if( ! function_exists( 'sirfurniture_shop_sub_banner' ) ){
	/**
	 * Display homepage content
	 * homepage_sub_banner ( left banner )
	 */
	function sirfurniture_shop_sub_banner() {

        if ( is_front_page() ) {
            if ( sirfurniture_get_option('sir_enable_banner') == 'on' || !sirfurniture_get_option('sir_enable_banner') ) {
        ?>
        <div class="shop-main-wr">
            <ul id="main-subbn">
                <li><a href="<?php echo esc_url(sirfurniture_get_option('sir_banner_1_url','#'))?>" target="<?php echo esc_url(sirfurniture_get_option('sir_banner_1_target','_self'))?>"><img src="<?php echo esc_url(sirfurniture_get_option('sir_banner_1_image', get_template_directory_uri().'/img/banner_example.png'))?>" alt="<?php echo esc_attr(sirfurniture_get_option('sir_banner_1_alt','banner_image1'))?>"></a></li>
                <li><a href="<?php echo esc_url(sirfurniture_get_option('sir_banner_2_url','#'))?>" target="<?php echo esc_url(sirfurniture_get_option('sir_banner_2_target','_self'))?>"><img src="<?php echo esc_url(sirfurniture_get_option('sir_banner_2_image', get_template_directory_uri().'/img/banner_example.png'))?>" alt="<?php echo esc_attr(sirfurniture_get_option('sir_banner_2_alt','banner_image2'))?>"></a></li>
                <li><a href="<?php echo esc_url(sirfurniture_get_option('sir_banner_3_url','#'))?>" target="<?php echo esc_url(sirfurniture_get_option('sir_banner_3_target','_self'))?>"><img src="<?php echo esc_url(sirfurniture_get_option('sir_banner_3_image', get_template_directory_uri().'/img/banner_example.png'))?>" alt="<?php echo esc_attr(sirfurniture_get_option('sir_banner_3_alt','banner_image3'))?>"></a></li>
            </ul>
        </div>
        <?php
            }
        }
	}

}

if( !function_exists('sirfurniture_latest_shop_args_filter') ){
    function sirfurniture_latest_shop_args_filter($args){

        $args['no_print_beforeafter'] = true;

        return $args;
    }
}

if ( ! function_exists( 'sirfurniture_latest_gnucommerce_shop' ) ) {
	/**
	 * Display homepage content
	 * @param array $args the product section args.
	 */

	function sirfurniture_latest_gnucommerce_shop( $args=array() ) {

		if ( is_gnucommerce_activated() ) {

			$args = wp_parse_args($args, apply_filters( 'sirfurniture_latest_gnucommerce_args', array(
				'limit' 			=> 4,
				'columns' 			=> 4,
				'category' 	=> '',
                'order' =>  'DESC',
				'orderby' 			=> 'date',
				'title'				=> '',
                'background_url'    =>  get_template_directory_uri().'/img/1464665185_m.png',
                'background_class'=> '',
                'link_url' =>   gc_get_shop_url(),
			) ));

            $title = '';
            $add_class = '';
            if( $args['background_url'] ){
                $background = "background-image:url('".$args['background_url']."')";
            } else {
                $background = '';
                $add_class = '';
            }

            if( $args['title'] ){
                $title = '<h2>'.esc_html($args['title']).'</h2>';
            }

            if( !$args['link_url'] ){

                if($args['category']){
                    $term = get_term_by('name', $args['category'], GC_CATEGORY_TAXONOMY);

                    $args['link_url'] = get_term_link( $term, GC_CATEGORY_TAXONOMY );
                } else {
                    $args['link_url'] = gc_get_shop_url();
                }
            }

            echo '<div class="shop-main-wr">';
            echo '<ul id="main-event">';
            echo '<li class="main-event-li">
                    <div style="'.$background.'" class="main-event-image '.$args['background_class'].'">
                    '.$title.'
                    <a href="'.esc_url( $args['link_url'] ).'" class="more-btn">'.__( 'more', 'sir-furniture').'</a></div>';

            add_filter('gnucommerce_latest_shop_print_args', 'sirfurniture_latest_shop_args_filter' );

            $short_attr = array(
				'list_mod'  => intval( $args['columns'] ),
				'list_row' => intval( $args['limit'] ),
                'order' => esc_attr( $args['order'] ),
				'orderby' => esc_attr( $args['orderby'] ),
				'category'  => esc_attr( $args['category'] ),
                'ul_class'  => 'main-event-prd',
                'list_skin' => 'gnucommerce/template/latest.php',
            );

            echo sircomm_do_shortcode( 'gnucommerce_shop_latest', $short_attr);

            remove_filter('gnucommerce_latest_shop_print_args', 'sirfurniture_latest_shop_args_filter' );

            echo '</li>
            </ul>
            </div>';
		}
	}
}

if( ! function_exists( 'sirfurniture_main_widget_area') ){
    function sirfurniture_main_widget_area(){
        if ( is_active_sidebar( 'main-widget-1' ) ) {
            dynamic_sidebar( 'main-widget-1' );
        }
    }
}

if ( ! function_exists( 'sirfurniture_latest_gnucommerce_shop_type' ) ) {
	/**
	 * Display homepage content
	 * @param array $args the product section args.
	 */

    function sirfurniture_latest_gnucommerce_shop_type($args){

        wp_enqueue_script('jquery');
        wp_enqueue_script( 'jquery-easytabs', get_template_directory_uri() . '/js/jquery.easytabs.min.js', array( 'jquery' ), FALSE, TRUE );
        wp_enqueue_script( 'gnu_main_tabs_js', get_template_directory_uri() . '/js/tabs.js', array( 'jquery-easytabs' ), FALSE, TRUE );


        static $fn_id = 1;

		if ( is_gnucommerce_activated() ) {

			$args = apply_filters( 'sirfurniture_latest_gnucommerce_type_args', array(
				'limit' 			=> 8,
				'columns' 			=> 8,
				'category' 	=> 0,
				'orderby' 			=> 'name',
			) );

            echo '<div class="shop-main-wr">';
            echo '<div id="main-item" class="tab-wr">';
            echo '<ul class="tabsTit">
                <li class="tabsTab tabsHover"><a href="#gnumain_tab'.$fn_id.'_hit">'.__('HIT PRODUCT' , 'sir-furniture').'</a></li>
                <li class="tabsTab"><a href="#gnumain_tab'.$fn_id.'_recom">'.__('RECOMMEND PRODUCT' , 'sir-furniture').'</a></li>
                <li class="tabsTab"><a href="#gnumain_tab'.$fn_id.'_latest">'.__('LATEST PRODUCT' , 'sir-furniture').'</a></li>
                <li class="tabsTab"><a href="#gnumain_tab'.$fn_id.'_popular">'.__('POPULAR PRODUCT' , 'sir-furniture').'</a></li>
                <li class="tabsTab"><a href="#gnumain_tab'.$fn_id.'_sale">'.__('SALE PRODUCT' , 'sir-furniture').'</a></li>
            </ul>';

            add_filter('gnucommerce_shop_type_print_args', 'sirfurniture_latest_shop_args_filter' );

            echo '<div class="panel-container">';
            echo sircomm_do_shortcode( 'gnucommerce_shop', array(
                'show_type'  =>'hit',
				'list_mod'  => intval( $args['limit'] ),
				'list_row' => intval( $args['columns'] ),
				'orderby' => esc_attr( $args['orderby'] ),
				'category'  => esc_attr( $args['category'] ),
                'ul_class'  => 'main-item-list',
                'list_skin' => 'gnucommerce/template/latest_type.php',
                'tab_el_id' => 'gnumain_tab'.$fn_id.'_hit'
            ));

            echo sircomm_do_shortcode( 'gnucommerce_shop', array(
                'show_type'  =>'recom',
				'list_mod'  => intval( $args['limit'] ),
				'list_row' => intval( $args['columns'] ),
				'orderby' => esc_attr( $args['orderby'] ),
				'category'  => esc_attr( $args['category'] ),
                'ul_class'  => 'main-item-list',
                'list_skin' => 'gnucommerce/template/latest_type.php',
                'tab_el_id' => 'gnumain_tab'.$fn_id.'_recom'
            ));

            echo sircomm_do_shortcode( 'gnucommerce_shop', array(
                'show_type'  =>'latest',
				'list_mod'  => intval( $args['limit'] ),
				'list_row' => intval( $args['columns'] ),
				'orderby' => esc_attr( $args['orderby'] ),
				'category'  => esc_attr( $args['category'] ),
                'ul_class'  => 'main-item-list',
                'list_skin' => 'gnucommerce/template/latest_type.php',
                'tab_el_id' => 'gnumain_tab'.$fn_id.'_latest'
            ));

            echo sircomm_do_shortcode( 'gnucommerce_shop', array(
                'show_type'  =>'popular',
				'list_mod'  => intval( $args['limit'] ),
				'list_row' => intval( $args['columns'] ),
				'orderby' => esc_attr( $args['orderby'] ),
				'category'  => esc_attr( $args['category'] ),
                'ul_class'  => 'main-item-list',
                'list_skin' => 'gnucommerce/template/latest_type.php',
                'tab_el_id' => 'gnumain_tab'.$fn_id.'_popular'
            ));

            echo sircomm_do_shortcode( 'gnucommerce_shop', array(
                'show_type'  =>'sale',
				'list_mod'  => intval( $args['limit'] ),
				'list_row' => intval( $args['columns'] ),
				'orderby' => esc_attr( $args['orderby'] ),
				'category'  => esc_attr( $args['category'] ),
                'ul_class'  => 'main-item-list',
                'list_skin' => 'gnucommerce/template/latest_type.php',
                'tab_el_id' => 'gnumain_tab'.$fn_id.'_sale'
            ));

            remove_filter('gnucommerce_shop_type_print_args', 'sirfurniture_latest_shop_args_filter' );

            echo '
            </div>
            </div>
            </div>';
		}

        $fn_id++;
    }

}

if( ! function_exists('sirfurniture_get_icon_url') ){
    function sirfurniture_get_icon_url($icon_url){
        
        $icon_url = get_template_directory_uri();
        return $icon_url;
    }
}
?>