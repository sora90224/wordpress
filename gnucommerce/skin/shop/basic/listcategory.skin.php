<?php
if( !defined('GC_NAME') ) exit;

do_action( GC_NAME.'_skin_action', __FILE__, plugin_dir_path( __FILE__) );

$cats = $categories['category_info'];

if ( $cats ) {

	echo $categories['wrap_before'];

	foreach ( $cats as $key => $crumb ) {

		if ( ! empty( $crumb[1] ) && sizeof( $cats ) !== $key + 1 ) {
		} else {
			echo '<h2 class="shop-tit"><span>'.esc_html( $crumb[0] ).'</span></h2>';
		}

		if ( sizeof( $cats ) !== $key + 1 ) {
			echo $categories['delimiter'];
		}

	}

	echo $categories['wrap_after'];

}

?>

<?php do_action('gc_category_view_after'); ?>