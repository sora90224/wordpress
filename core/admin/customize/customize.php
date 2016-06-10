<?php

if (!function_exists('sirfurniture_customize_panel_function')) {

	function sirfurniture_customize_panel_function() {
		
		$theme_panel = array ( 

			array( 
				"title" => __( 'Slide Banner', 'sir-furniture'),
				"description" => __( 'Slide Banner', 'sir-furniture'),
				"type" => "panel",
				"id" => "slideshow_panel",
				"priority" => "09",
			),

			/* SLIDE */ 

			array( 

				"title" => __( 'Slide Banner Settings', 'sir-furniture'),
				"type" => "section",
				"panel" => "slideshow_panel",
				"priority" => "10",
				"id" => "slideshow_settings",

			),

			array(
				
				"label" => __( "Slide Banner",'sir-furniture'),
				"description" => __( "Do you want to enable the slide banner?", 'sir-furniture'),
				"id" => "sir_enable_slideshow",
				"type" => "select",
				"section" => "slideshow_settings",
				"options" => array (
				   "off" => __( "No",'sir-furniture'),
				   "on" => __( "Yes",'sir-furniture'),
				),
				
				"std" => "on",
			
			),

			/* #1 SLIDE */ 

			array( 

				"title" => __( "Slide #1",'sir-furniture'),
				"type" => "section",
				"panel" => "slideshow_panel",
				"priority" => "10",
				"id" => "slideshow_1",

			),

			array( 

				"label" => __( "Image",'sir-furniture'),
				"description" => __( "Upload the image ( Size 1160 x 550 )",'sir-furniture'),
				"id" => "sir_slideshow_1_image",
				"type" => "upload",
				"section" => "slideshow_1",
				"std" => get_template_directory_uri().'/img/slider_ex_img.png',

			),

			array( 

				"label" => __( "Alt", 'sir-furniture'),
				"description" => __( "Input the text of this slide image alt", 'sir-furniture'),
				"id" => "sir_slideshow_1_alt",
				"type" => "text",
				"section" => "slideshow_1",
				"std" => "image1",

			),

			array( 

				"label" => __( "Url",'sir-furniture'),
				"description" => __( "Insert the url of this slide",'sir-furniture'),
				"id" => "sir_slideshow_1_url",
				"type" => "url",
				"section" => "slideshow_1",
				"std" => "#",

			),

			/* #2 SLIDE */ 

			array( 

				"title" => __( "Slide #2", 'sir-furniture'),
				"type" => "section",
				"panel" => "slideshow_panel",
				"priority" => "10",
				"id" => "slideshow_2",

			),

			array( 

				"label" => __( "Image", 'sir-furniture'),
				"description" => __( "Upload the image ( Size 1160 x 550 )",'sir-furniture'),
				"id" => "sir_slideshow_2_image",
				"type" => "upload",
				"section" => "slideshow_2",
				"std" => get_template_directory_uri().'/img/slider_ex_img.png',

			),

			array( 

				"label" => __( "Alt", 'sir-furniture'),
				"description" => __( "Input the text of this slide image alt", 'sir-furniture'),
				"id" => "sir_slideshow_2_alt",
				"type" => "text",
				"section" => "slideshow_2",
				"std" => "image2",

			),

			array( 

				"label" => __( "Url", 'sir-furniture'),
				"description" => __( "Insert the url of this slide",'sir-furniture'),
				"id" => "sir_slideshow_2_url",
				"type" => "url",
				"section" => "slideshow_2",
				"std" => "#",

			),

			/* #3 SLIDE */ 

			array( 

				"title" => __( "Slide #3", 'sir-furniture'),
				"type" => "section",
				"panel" => "slideshow_panel",
				"priority" => "10",
				"id" => "slideshow_3",

			),

			array( 

				"label" => __( "Image", 'sir-furniture'),
				"description" => __( "Upload the image ( Size 1160 x 550 )",'sir-furniture'),
				"id" => "sir_slideshow_3_image",
				"type" => "upload",
				"section" => "slideshow_3",
				"std" => get_template_directory_uri().'/img/slider_ex_img.png',

			),

			array( 

				"label" => __( "Alt", 'sir-furniture'),
				"description" => __( "Input the text of this slide image alt", 'sir-furniture'),
				"id" => "sir_slideshow_3_alt",
				"type" => "text",
				"section" => "slideshow_3",
				"std" => "image3",

			),

			array( 

				"label" => __( "Url", 'sir-furniture'),
				"description" => __( "Insert the url of this slide",'sir-furniture'),
				"id" => "sir_slideshow_3_url",
				"type" => "url",
				"section" => "slideshow_3",
				"std" => "#",

			),


            /* banner */

			array( 
				"title" => __( 'Banner', 'sir-furniture'),
				"description" => __( 'Banner', 'sir-furniture'),
				"type" => "panel",
				"id" => "banner_panel",
				"priority" => "10",
			),

			array( 

				"title" => __( 'Banner Settings', 'sir-furniture'),
				"type" => "section",
				"panel" => "banner_panel",
				"priority" => "10",
				"id" => "banner_settings",

			),

			array(
				
				"label" => __( "Banner", 'sir-furniture'),
				"description" => __( "Do you want to enable the banner?", 'sir-furniture'),
				"id" => "sir_enable_banner",
				"type" => "select",
				"section" => "banner_settings",
				"options" => array (
				   "off" => __( "No",'sir-furniture'),
				   "on" => __( "Yes",'sir-furniture'),
				),
				
				"std" => "on",
			
			),

			/* #1 Banner */ 

			array( 

				"title" => __( "Banner #1",'sir-furniture'),
				"type" => "section",
				"panel" => "banner_panel",
				"priority" => "10",
				"id" => "banner_1",

			),

			array( 

				"label" => __( "Image",'sir-furniture'),
				"description" => __( "Upload the image ( Size 375 x 165 )",'sir-furniture'),
				"id" => "sir_banner_1_image",
				"type" => "upload",
				"section" => "banner_1",
				"std" => get_template_directory_uri().'/img/banner_example.png',

			),

			array( 

				"label" => __( "Alt", 'sir-furniture'),
				"description" => __( "Input the text of this banner image alt", 'sir-furniture'),
				"id" => "sir_banner_1_alt",
				"type" => "text",
				"section" => "banner_1",
				"std" => "banner_image1",

			),

			array( 

				"label" => __( "Url", 'sir-furniture'),
				"description" => __( "Input the url of this banner", 'sir-furniture'),
				"id" => "sir_banner_1_url",
				"type" => "url",
				"section" => "banner_1",
				"std" => "#",

			),

			array( 

				"label" => __( "Url Target", 'sir-furniture'),
				"description" => __( "Input the url target of this banner", 'sir-furniture'),
				"id" => "sir_banner_1_target",
				'type'    => 'select',
                'options'    => array(
                    '_self' => '_self',
                    '_blank' => '_blank',
                ),
				"section" => "banner_1",
				"std" => "_self",

			),

			/* #2 Banner */ 

			array( 

				"title" => __( "Banner #2",'sir-furniture'),
				"type" => "section",
				"panel" => "banner_panel",
				"priority" => "10",
				"id" => "banner_2",

			),

			array( 

				"label" => __( "Image",'sir-furniture'),
				"description" => __( "Upload the image ( Size 375 x 165 )",'sir-furniture'),
				"id" => "sir_banner_2_image",
				"type" => "upload",
				"section" => "banner_2",
				"std" => get_template_directory_uri().'/img/banner_example.png',

			),

			array( 

				"label" => __( "Alt", 'sir-furniture'),
				"description" => __( "Input the text of this banner image alt", 'sir-furniture'),
				"id" => "sir_banner_2_alt",
				"type" => "text",
				"section" => "banner_2",
				"std" => "banner_image2",

			),

			array( 

				"label" => __( "Url", 'sir-furniture'),
				"description" => __( "Input the url of this banner", 'sir-furniture'),
				"id" => "sir_banner_2_url",
				"type" => "url",
				"section" => "banner_2",
				"std" => "#",

			),

			array( 

				"label" => __( "Url Target", 'sir-furniture'),
				"description" => __( "Input the url target of this banner", 'sir-furniture'),
				"id" => "sir_banner_2_target",
				'type'    => 'select',
                'options'    => array(
                    '_self' => '_self',
                    '_blank' => '_blank',
                ),
				"section" => "banner_2",
				"std" => "_self",

			),

			/* #3 Banner */ 

			array( 

				"title" => __( "Banner #3",'sir-furniture'),
				"type" => "section",
				"panel" => "banner_panel",
				"priority" => "10",
				"id" => "banner_3",

			),

			array( 

				"label" => __( "Image",'sir-furniture'),
				"description" => __( "Upload the image ( Size 375 x 165 )",'sir-furniture'),
				"id" => "sir_banner_3_image",
				"type" => "upload",
				"section" => "banner_3",
				"std" => get_template_directory_uri().'/img/banner_example.png',

			),

			array( 

				"label" => __( "Alt", 'sir-furniture'),
				"description" => __( "Input the text of this banner image alt", 'sir-furniture'),
				"id" => "sir_banner_3_alt",
				"type" => "text",
				"section" => "banner_3",
				"std" => "banner_image3",

			),

			array( 

				"label" => __( "Url", 'sir-furniture'),
				"description" => __( "Input the url of this banner", 'sir-furniture'),
				"id" => "sir_banner_3_url",
				"type" => "url",
				"section" => "banner_3",
				"std" => "#",

			),

			array( 

				"label" => __( "Url Target", 'sir-furniture'),
				"description" => __( "Input the url target of this banner", 'sir-furniture'),
				"id" => "sir_banner_3_target",
				'type'    => 'select',
                'options'    => array(
                    '_self' => '_self',
                    '_blank' => '_blank',
                ),
				"section" => "banner_3",
				"std" => "_self",

			),
		);
		
		new sirfurniture_customize($theme_panel);
		
	} 
	
	add_action( 'sirfurniture_customize_panel', 'sirfurniture_customize_panel_function', 10, 2 );

}

do_action('sirfurniture_customize_panel');

?>