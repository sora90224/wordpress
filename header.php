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
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
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
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', SIR_CMM_NAME ); ?></a>

		<header id="masthead" class="site-header" role="banner">

        <div class="site-header-main">
            <div class="site-branding">
                <?php sircomm_the_custom_logo(); ?>
                <?php if ( is_front_page() && is_home() ) : ?>
                    <h1 class="site-title">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                         <?php bloginfo( 'name' ); ?> 
                        </a>
                          
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
                    <!-- <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>  -->

                <?php endif;

                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) : ?>
                    <!-- <p class="site-description"><?php echo $description; ?></p> -->
                <?php endif; ?>
            </div>
            <a href="#" class="hd_cart_btn">장바구니</a>
            <button id="menu-toggle" class="menu-toggle">전체메뉴</button>

            <ul id="gnb">
                <li><a href="#">분류1</a></li>
                <li><a href="#">분류2</a></li>
                <li><a href="#">분류3</a></li>
                <li><a href="#">분류4</a></li>
                <li><a href="#">분류5</a></li>
            </ul>
        </div>
        <!-- .site-header-main -->
        <!--카테고리-->

        <div class="hd_cate"><!-- site-inner -->
            <?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>
                <div class="hd-search">
                    <input type="text" placeholder="검색어" class="hd-search-input">
                    <input type="submit" value="검색" class="hd-search-btn">
                </div>
                <div class="site-inner">
                    <ul class="site-header-top-link">
                        <?php if( is_user_logged_in () ){   //로그인 했으면 ?>
                        <li class="site-link-logout"><a href="<?php echo wp_logout_url(); ?>"><?php _e('로그아웃', SIR_CMM_NAME); ?></a></li>
                        <li class="site-link-mypage"><a href="#">마이페이지</a></li>
                        <?php } else {  //로그인 하지 않았다면 ?>
                        <li class="site-link-login"><a href="<?php echo wp_login_url(); ?>"><?php _e('로그인', SIR_CMM_NAME); ?></a></li>
                        <?php } ?>
                    </ul> 
                </div>

                <div id="site-header-menu" class="site-header-menu">
                    <?php if ( has_nav_menu( 'primary' ) ) : ?>
                        <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', SIR_CMM_NAME ); ?>">
                            <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'primary',
                                    'menu_class'     => 'primary-menu',
                                 ) );
                            ?>
                        </nav><!-- .main-navigation -->
                    <?php endif; ?>

                    <?php if ( has_nav_menu( 'social' ) ) : ?>
                        <nav id="social-navigation" class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', SIR_CMM_NAME ); ?>">
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

            <button type="button" class="menu-close-btn">메뉴닫기</button>

        </div>
        <script>
        jQuery( document ).ready( function( $ ) {
            $(".menu-close-btn").on("click", function(){
                $(".hd_cate").css("display","none");
            });
        } );
        </script>
        <!--카테고리-->
		</header><!-- .site-header -->
		<div id="content" class="site-content site-inner">
