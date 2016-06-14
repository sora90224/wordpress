<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 */
do_action('sir_comm_before_header');
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.css" rel="stylesheet" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
	
	<!-- bxSlider Javascript file -->
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.bxslider.min.js"></script>
    <!-- bxSlider CSS file -->
    <link href="<?php bloginfo('template_url'); ?>/jquery.bxslider.css" rel="stylesheet" />
	

</head>

<body <?php body_class(); ?>>
<div id="page"><!-- class="site" -->
	<!--<div> class="site-inner" -->
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'sir-furniture' ); ?></a>

		<header id="masthead" class="site-header" role="banner">

        <div class="site-header-main">
            
            <?php
            if ( has_nav_menu( 'pre_header_menu' ) ) :
                wp_nav_menu( array( 'depth' => 1, 'container' => '', 'menu_class' => 'site-header-gnb', 'container_id'=>'', 'theme_location' => 'pre_header_menu' ) );
            endif;
            ?>

            <div class="site-branding">
                <?php sircomm_the_custom_logo(); ?>
                <?php if ( is_front_page() && is_home() ) : ?>
                    <h1 class="site-title">
                        <!--a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                         <?php bloginfo( 'name' ); ?> 
                        </a-->
                          
                        <?php if ( get_header_image() ) : ?>
                        <?php
                            /**
                             * Filter the default custom header sizes attribute.
                             *
                             * @since sir community 1.0
                             *
                             * @param string $custom_header_sizes sizes attribute
                             * for Custom Header. Default '(max-width: 709px) 85vw,
                             * (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px'.
                             */
                            $custom_header_sizes = apply_filters( 'sircomm_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' );
                        ?>
                        <div class="header-image">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" sizes="<?php echo esc_attr( $custom_header_sizes ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                            </a>
                        </div><!-- .header-image -->
                    <?php endif; // End header image check. ?>
                    </h1>
                 <?php else : ?>
                    <h1 class="site-title">
                        <?php if ( get_header_image() ) : ?>
                        <?php
                            /**
                             * Filter the default custom header sizes attribute.
                             *
                             * @since sir community 1.0
                             *
                             * @param string $custom_header_sizes sizes attribute
                             * for Custom Header. Default '(max-width: 709px) 85vw,
                             * (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px'.
                             */
                            $custom_header_sizes = apply_filters( 'sircomm_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' );
                        ?>
                        <div class="header-image">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" sizes="<?php echo esc_attr( $custom_header_sizes ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                            </a>
                        </div><!-- .header-image -->
                    <?php endif; // End header image check. ?>
                    
                    </h1>
                <?php endif;

                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) : ?>
                    <!-- <p class="site-description"><?php echo $description; ?></p> -->
                <?php endif; ?>
            </div>
            <?php if( $carturl = sirfurniture_gnucommerce_get_by('carturl') ){ // exists cart url ?>
            <a href="<?php echo esc_url( $carturl ); ?>" class="hd_cart_btn"><?php _e('Cart', 'sir-furniture') ?></a>
            <?php } ?>
            <button id="menu-toggle" class="menu-toggle">전체메뉴</button>

        </div>
        <!-- .site-header-main -->
        <!--카테고리-->

        <div class="hd_cate"><!-- site-inner -->
            <div class="hd-cate-wr">
            <?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>
                <form role="search" method="get" id="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
                <div class="hd-search">
                    <input name="s" id="s" type="text" value="<?php echo get_search_query(); ?>" placeholder="<?php _e('검색어', 'sir-furniture'); ?>" class="hd-search-input">
                    <input type="submit" id="searchsubmit" value="<?php _e('검색', 'sir-furniture'); ?>" class="hd-search-btn">
                </div>
                </form>
                <div class="site-inner">
                    <ul class="site-header-top-link">
                        <?php if( is_user_logged_in () ){   //로그인 했으면 ?>
                        <li class="site-link-logout"><a href="<?php echo wp_logout_url(); ?>"><?php _e('로그아웃', 'sir-furniture'); ?></a></li>
                        <li class="site-link-mypage"><?php sirfurniture_mypage_print(); ?></li>
                        <?php } else {  //로그인 하지 않았다면 ?>
                        <li class="site-link-login"><a href="<?php echo wp_login_url(); ?>"><?php _e('로그인', 'sir-furniture'); ?></a></li>
                        <?php } ?>
                    </ul> 
                </div>

                <?php
                if ( has_nav_menu( 'sidebar_menu' ) ) :
                    wp_nav_menu( array( 'depth' => 1, 'container' => '', 'menu_id' => 'cate-service-menu', 'container_id'=>'', 'theme_location' => 'sidebar_menu' ) );
                endif;
                ?>

                <div id="site-header-menu" class="site-header-menu">
                    <?php if ( has_nav_menu( 'primary' ) ) : ?>
                        <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'sir-furniture' ); ?>">
                            <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'primary',
                                    'menu_class'     => 'primary-menu',
                                 ) );
                            ?>
                        </nav><!-- .main-navigation -->
                    <?php endif; ?>

                    <?php if ( has_nav_menu( 'social' ) ) : ?>
                        <nav id="social-navigation" class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'sir-furniture' ); ?>">
                            <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'social',
                                    'menu_class'     => 'social-links-menu',
                                    'depth'          => 1,
                                    'link_before'    => '<span class="screen-reader-text">',
                                    'link_after'     => '</span>',
                                ) );
                            ?>
                        </nav><!-- .social-navigation -->
                    <?php endif; ?>
                </div><!-- .site-header-menu -->
            <?php endif; ?>
            </div>
            <button type="button" class="menu-close-btn">메뉴닫기</button>

        </div>

        <!--카테고리-->
		</header><!-- .site-header -->
		<div id="content" class="site-content site-inner">
