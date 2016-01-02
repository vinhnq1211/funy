<?php

class Slider_Images_Widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'slider-images',
			__( 'Thim: Round Slider', 'mabu' ),
			array(
				'description' => __( 'Add Round Slider', 'mabu' ),
				'help'        => '',
				'panels_groups' => array('thim_widget_group')
			),
			array(),
			array(
				'image'         => array(
					'type'        => 'multimedia',
					'label'       => __( 'Image', 'mabu' ),
					'description' => __( 'Select image from media library.', 'mabu' )
				),

				'image_size'    => array(
					'type'        => 'text',
					'label'       => __( 'Image size', 'mabu' ),
					'description' => __( 'Enter image size. Example: "thumbnail", "medium", "large", "full"', 'mabu' )
				),

				'css_animation' => array(
					"type"    => "select",
					"label"   => __( "CSS Animation", 'mabu' ),
					"options" => array(
						""              => __( "No", 'mabu' ),
						"top-to-bottom" => __( "Top to bottom", 'mabu' ),
						"bottom-to-top" => __( "Bottom to top", 'mabu' ),
						"left-to-right" => __( "Left to right", 'mabu' ),
						"right-to-left" => __( "Right to left", 'mabu' ),
						"appear"        => __( "Appear from center", 'mabu' )
					),
				),
			),
			TP_THEME_DIR . 'inc/widgets/slider-images/'
		);
	}

	/**
	 * Initialize the CTA widget
	 */


	function get_template_name( $instance ) {
		return 'base';
	}

	function get_style_name( $instance ) {
		return false;
	}

	function enqueue_frontend_scripts() {
		wp_enqueue_script( 'thim-roundabout-js', TP_THEME_URI . 'js/jquery.roundabout.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'thim-roundslider', TP_THEME_URI . 'inc/widgets/slider-images/js/thim-roundslider.js', array( 'jquery' ), '', true );
	}
}


function thim_slider_images_widget() {
	register_widget( 'Slider_Images_Widget' );
}

add_action( 'widgets_init', 'thim_slider_images_widget' );