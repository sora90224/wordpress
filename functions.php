<?php
/**
 * sir community functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 */

/**
 * sir community only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'sircomm_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own sircomm_setup() function to override in a child theme.
 *
 * @since sir community 1.0
 */
function sircomm_setup() {

	// wp-content/languages/theme-name/de_DE.mo
	load_theme_textdomain( 'sir-furniture', trailingslashit( WP_LANG_DIR ) . 'sir-furniture' );
	// wp-content/themes/child-theme-name/languages/de_DE.mo
	load_theme_textdomain( 'sir-furniture', get_stylesheet_directory() . '/languages' );
	// wp-content/themes/theme-name/languages/de_DE.mo
	load_theme_textdomain( 'sir-furniture', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 *
	 *  @since sir community 1.2
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// menu add register
	register_nav_menus( array(
        'pre_header_menu'   =>  __( 'Header Menu', 'sir-furniture' ),
		'primary' => __( 'Primary Menu', 'sir-furniture' ),
        'sub_footer_menu' => __( 'Footer Menu', 'sir-furniture' ),
        'sidebar_menu' => __( 'Sidebar Menu', 'sir-furniture' ),
		'social'  => __( 'Social Links Menu', 'sir-furniture' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', sircomm_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // sircomm_setup
add_action( 'after_setup_theme', 'sircomm_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since sir community 1.0
 */
function sircomm_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sircomm_content_width', 840 );
}
add_action( 'after_setup_theme', 'sircomm_content_width', 0 );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since sir community 1.0
 */
function sircomm_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'sir-furniture' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'sir-furniture' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 1', 'sir-furniture' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'sir-furniture' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 2', 'sir-furniture' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'sir-furniture' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'sircomm_widgets_init' );

if ( ! function_exists( 'sircomm_fonts_url' ) ) :
/**
 * Register Google fonts for sir community.
 *
 * Create your own sircomm_fonts_url() function to override in a child theme.
 *
 * @since sir community 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function sircomm_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'sir-furniture' ) ) {
		$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'sir-furniture' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'sir-furniture' ) ) {
		$fonts[] = 'Inconsolata:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since sir community 1.0
 */
function sircomm_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'sircomm_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since sir community 1.0
 */
function sircomm_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'sircomm-fonts', sircomm_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

	// Theme stylesheet.
	wp_enqueue_style( 'sircomm-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'sircomm-ie', get_template_directory_uri() . '/css/ie.css', array( 'sircomm-style' ), '20160412' );
	wp_style_add_data( 'sircomm-ie', 'conditional', 'lt IE 10' );

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'sircomm-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'sircomm-style' ), '20160412' );
	wp_style_add_data( 'sircomm-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'sircomm-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'sircomm-style' ), '20160412' );
	wp_style_add_data( 'sircomm-ie7', 'conditional', 'lt IE 8' );

	// Load the html5 shiv.
	wp_enqueue_script( 'sircomm-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'sircomm-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'sircomm-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20160412', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'sircomm-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20160412' );
	}

	wp_enqueue_script( 'sircomm-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20160412', true );

	wp_localize_script( 'sircomm-script', 'screenReaderText', array(
		'expand'   => __( 'expand child menu', 'sir-furniture' ),
		'collapse' => __( 'collapse child menu', 'sir-furniture' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'sircomm_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since sir community 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function sircomm_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'sircomm_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @since sir community 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function sircomm_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since sir community 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function sircomm_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

	if ( 'page' === get_post_type() ) {
		840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	} else {
		840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'sircomm_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since sir community 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function sircomm_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'sircomm_post_thumbnail_sizes_attr', 10 , 3 );

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @since sir community 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function sircomm_widget_tag_cloud_args( $args ) {
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'sircomm_widget_tag_cloud_args' );

if(! function_exists('is_gnucommerce_activated') ){
    function is_gnucommerce_activated(){
        return class_exists( 'GNUCommerce' ) ? true : false;
    }
}

if(! function_exists('is_gnucommerce_page') ){
    function is_gnucommerce_page(){
        if( is_gnucommerce_activated() ){
            if( gc_is_shop_archive() ){
                return true;
            }
            $gc_options = get_option(GC_OPTION_KEY);
            $checks = array('product_page_id', 'cart_page_id', 'checkout_page_id', 'mypage_page_id');

            foreach( $checks as $v ){
                if( isset($gc_options[$v]) && !empty($gc_options[$v]) ){
                    if( get_the_ID () == $gc_options[$v] ){
                        return true;
                    }
                }
            }
        }

        return false;
    }
}

if(! function_exists('sircomm_do_shortcode') ){
    function sircomm_do_shortcode( $tag, array $atts = array(), $content = null ) {
        global $shortcode_tags;

        if ( ! isset( $shortcode_tags[ $tag ] ) ) {
            return false;
        }

        return call_user_func( $shortcode_tags[ $tag ], $atts, $content, $tag );
    }
}   //end if function

if(! function_exists('sirfurniture_gnucommerce_get_by') ){

    function sirfurniture_gnucommerce_get_by($type=''){

        if( !is_gnucommerce_activated() ){
            return '';
        }

        switch ($type){
            case 'carturl' :
                return gc_get_page_url('cart');
                break;
        }

        return '';

    }

}   //end if function


if(! function_exists('sirfurniture_first_and_last') ){
    function sirfurniture_first_and_last($output) {
        $output = preg_replace('/class="menu-item/', 'class="first-menu-item menu-item', $output, 1);
        $output = substr_replace($output, 'class="', strripos($output, 'class="border-deco'), strlen('class="border-deco'));
        return $output;
    }
}   //end if function

if(! function_exists('sirfurniture_footer_default_content_by') ){
    function sirfurniture_footer_default_content_by($type){
        if( $type == 'footer1' ){
            return "서울특별시 강남구 강남대로 123, 역삼동 1004호\nT.02-1234-5678\nF.02-1234-5678";
        } else if ($type=='footer2'){
            return "월-금 am 11:00 - pm 05:00\n점심시간 : am 12:00 - pm 01:00";
        } else if ($type=='footer3'){
            return "국민은행 : 123456-00-123456\n예금주: 홍길동";
        }
    }
}   //end if function

function sirfurniture_mypage_print(){

    if( is_gnucommerce_activated() ){
        echo '<a href="'.gc_get_page_url('mypage').'">'.__('Mypage', 'sir-furniture').'</a>';
    } else {
        if( is_user_logged_in() ){
            $user_id      = get_current_user_id();
            $current_user = wp_get_current_user();

            if ( current_user_can( 'read' ) ) {
                $profile_url = get_edit_profile_url( $user_id );
            } elseif ( is_multisite() ) {
                $profile_url = get_dashboard_url( $user_id, 'profile.php' );
            } else {
                $profile_url = '#';
            }
        }
        echo '<a href="'.$profile_url.'">'.__('Edit My Profile', 'sir-furniture').'</a>';
    }
}

require_once get_template_directory() . '/core/plugin_require.php';
?>