<?php
class Single_Images_Widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'single-images',
			__( 'Thim: Single Images', 'mabu' ),
			array(
				'description' => __( 'Add heading text', 'mabu' ),
				'help'        => '',
				'panels_groups' => array('thim_widget_group')
			),
			array(),
			array(
				'image' => array(
					'type'  => 'media',
 					'label' => __( 'Image', 'mabu' ),
					'description'  => __( 'Select image from media library.', 'mabu' )
				),

				'image_size'         => array(
					'type'    => 'text',
					'label'   => __( 'Image size', 'mabu' ),
 					'description'    => __( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'mabu' )
				),
				'image_link'         => array(
					'type'    => 'text',
					'label'   => __( 'Image Link', 'mabu' ),
					'description'    => __( 'Enter URL if you want this image to have a link.', 'mabu' )
				),
				'link_target'       => array(
					"type"    => "select",
					"label"   => __( "Link Target", 'mabu' ),
 					"options" => array(
						"_self"              => __( "Same window", 'mabu' ),
						"_blank" => __( "New window", 'mabu' ),
 					),
				),
				'image_alignment'       => array(
					"type"    => "select",
					"label"   => __( "Image alignment", 'mabu' ),
					"description"=>"Select image alignment.",
					"options" => array(
						"left"              => __( "Align Left", 'mabu' ),
						"right" => __( "Align Right", 'mabu' ),
						"center" => __( "Align Center", 'mabu' )
					),
				),
				'image_parallax'         => array(
					'type'    => 'checkbox',
					'label'   => __( 'Images Parallax', 'mabu' ),
 				),
				'css_animation'       => array(
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
			TP_THEME_DIR . 'inc/widgets/single-images/'
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
}
function thim_single_images_register_widget() {
	register_widget( 'Single_Images_Widget' );
}

add_action( 'widgets_init', 'thim_single_images_register_widget' );