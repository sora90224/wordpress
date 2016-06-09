<?php

if ( ! function_exists( 'gnusmmt_homepage_content' ) ) {
	/**
	 * Display homepage content
	 * Hooked into the `homepage` action in the homepage template
	 */
	function gnusmmt_homepage_content() {
		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		} // end of the loop.
	}
}

if( ! function_exists( 'gnusmmt_shop_main_banner' ) ){
	/**
	 * Display homepage content
	 * homepage_main_banner
	 */
	function gnusmmt_shop_main_banner() {
        ?>
        <div id="shop-main-banner">
            <ul class="main-banner">
                <li><img src="http://theme.sir.kr/youngcart5/data/banner/34" alt=""></li>
                <li><img src="http://theme.sir.kr/youngcart5/data/banner/34" alt=""></li>
                <li><img src="http://theme.sir.kr/youngcart5/data/banner/34" alt=""></li>
            </ul>
        </div>
        <?php
	}

}

if( ! function_exists( 'gnusmmt_shop_sub_banner' ) ){
	/**
	 * Display homepage content
	 * homepage_sub_banner ( left banner )
	 */
	function gnusmmt_shop_sub_banner() {
        ?>
        <div class="shop-main-wr">
            <ul id="main-subbn">
                <li><a href="#"><img src="http://theme.sir.kr/youngcart5/data/banner/32" alt=""></a></li>
                <li><a href="#"><img src="http://theme.sir.kr/youngcart5/data/banner/32" alt=""></a></li>
                <li><a href="#"><img src="http://theme.sir.kr/youngcart5/data/banner/32" alt=""></a></li>
            </ul>
        </div>
        <?php
	}

}

if( !function_exists('gnusmmt_latest_shop_args_filter') ){
    function gnusmmt_latest_shop_args_filter($args){

        $args['no_print_beforeafter'] = true;

        return $args;
    }
}

if ( ! function_exists( 'gnusmmt_latest_gnucommerce_shop' ) ) {
	/**
	 * Display homepage content
	 * @param array $args the product section args.
	 */

	function gnusmmt_latest_gnucommerce_shop( $args ) {

		if ( is_gnucommerce_activated() ) {

			$args = apply_filters( 'gnusmmt_latest_gnucommerce_args', array(
				'limit' 			=> 4,
				'columns' 			=> 4,
				'category' 	=> 0,
				'orderby' 			=> 'name',
				'title'				=> __( 'Shop by Category', SIR_THEME_NAME),
                'background_url'    =>  get_template_directory_uri().'/img/1464665185_m.png',
			) );

            echo '<div class="shop-main-wr">';
            echo '<ul id="main-event">';
            echo '<li class="main-event-li">
                    <div style="background-image:url('.$args['background_url'].')" class="main-event-image"><a href="#" class="more-btn">'.__( 'more', SIR_THEME_NAME).'</a></div>';

            add_filter('gnucommerce_latest_shop_print_args', 'gnusmmt_latest_shop_args_filter' );

            echo sircomm_do_shortcode( 'gnucommerce_shop_latest', array(
				'list_mod'  => intval( $args['limit'] ),
				'list_row' => intval( $args['columns'] ),
				'orderby' => esc_attr( $args['orderby'] ),
				'category'  => esc_attr( $args['category'] ),
                'ul_class'  => 'main-event-prd',
                'list_skin' => 'gnucommerce/template/latest.php',
            ));

            remove_filter('gnucommerce_latest_shop_print_args', 'gnusmmt_latest_shop_args_filter' );

            echo '</li>
            </ul>
            </div>';
		}
	}
}

if ( ! function_exists( 'gnusmmt_latest_gnucommerce_shop_type' ) ) {
	/**
	 * Display homepage content
	 * @param array $args the product section args.
	 */

    function gnusmmt_latest_gnucommerce_shop_type($args){

        static $fn_id = 0;

		if ( is_gnucommerce_activated() ) {

			$args = apply_filters( 'gnusmmt_latest_gnucommerce_type_args', array(
				'limit' 			=> 8,
				'columns' 			=> 8,
				'category' 	=> 0,
				'orderby' 			=> 'name',
			) );

            echo '<div class="shop-main-wr">';
            echo '<div id="main-item" class="tab-wr">';
            echo '<ul class="tabsTit">
                <li class="tabsTab tabsHover"><a href="#gnumain_tab_hit'.$fn_id.'">'.__('HIT PRODUCT' , SIR_THEME_NAME).'</a></li>
                <li class="tabsTab"><a href="#gnumain_tab_recom'.$fn_id.'">'.__('RECOMMEND PRODUCT' , SIR_THEME_NAME).'</a></li>
                <li class="tabsTab"><a href="#gnumain_tab_latest'.$fn_id.'">'.__('LATEST PRODUCT' , SIR_THEME_NAME).'</a></li>
                <li class="tabsTab"><a href="#gnumain_tab_popular'.$fn_id.'">'.__('POPULAR PRODUCT' , SIR_THEME_NAME).'</a></li>
                <li class="tabsTab"><a href="#gnumain_tab_sale'.$fn_id.'">'.__('SALE PRODUCT' , SIR_THEME_NAME).'</a></li>
            </ul>';

            add_filter('gnucommerce_shop_type_print_args', 'gnusmmt_latest_shop_args_filter' );

            echo sircomm_do_shortcode( 'gnucommerce_shop', array(
                'show_type'  =>'hit',
				'list_mod'  => intval( $args['limit'] ),
				'list_row' => intval( $args['columns'] ),
				'orderby' => esc_attr( $args['orderby'] ),
				'category'  => esc_attr( $args['category'] ),
                'ul_class'  => 'main-item-list',
                'list_skin' => 'gnucommerce/template/latest_type.php',
                'tab_el_id' => 'gnumain_tab_hit'.$fn_id
            ));

            echo sircomm_do_shortcode( 'gnucommerce_shop', array(
                'show_type'  =>'recom',
				'list_mod'  => intval( $args['limit'] ),
				'list_row' => intval( $args['columns'] ),
				'orderby' => esc_attr( $args['orderby'] ),
				'category'  => esc_attr( $args['category'] ),
                'ul_class'  => 'main-item-list',
                'list_skin' => 'gnucommerce/template/latest_type.php',
                'tab_el_id' => 'gnumain_tab_recom'.$fn_id
            ));

            echo sircomm_do_shortcode( 'gnucommerce_shop', array(
                'show_type'  =>'latest',
				'list_mod'  => intval( $args['limit'] ),
				'list_row' => intval( $args['columns'] ),
				'orderby' => esc_attr( $args['orderby'] ),
				'category'  => esc_attr( $args['category'] ),
                'ul_class'  => 'main-item-list',
                'list_skin' => 'gnucommerce/template/latest_type.php',
                'tab_el_id' => 'gnumain_tab_latest'.$fn_id
            ));

            echo sircomm_do_shortcode( 'gnucommerce_shop', array(
                'show_type'  =>'popular',
				'list_mod'  => intval( $args['limit'] ),
				'list_row' => intval( $args['columns'] ),
				'orderby' => esc_attr( $args['orderby'] ),
				'category'  => esc_attr( $args['category'] ),
                'ul_class'  => 'main-item-list',
                'list_skin' => 'gnucommerce/template/latest_type.php',
                'tab_el_id' => 'gnumain_tab_popular'.$fn_id
            ));

            echo sircomm_do_shortcode( 'gnucommerce_shop', array(
                'show_type'  =>'sale',
				'list_mod'  => intval( $args['limit'] ),
				'list_row' => intval( $args['columns'] ),
				'orderby' => esc_attr( $args['orderby'] ),
				'category'  => esc_attr( $args['category'] ),
                'ul_class'  => 'main-item-list',
                'list_skin' => 'gnucommerce/template/latest_type.php',
                'tab_el_id' => 'gnumain_tab_sale'.$fn_id
            ));

            remove_filter('gnucommerce_shop_type_print_args', 'gnusmmt_latest_shop_args_filter' );

            echo '</li>
            </ul>
            </div>
            </div>';
		}

        $fn_id++;
    }

}

if( ! function_exists('gnusmmt_get_icon_url') ){
    function gnusmmt_get_icon_url($icon_url){
        
        $icon_url = get_template_directory_uri();
        return $icon_url;
    }
}
?>