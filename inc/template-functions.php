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

?>