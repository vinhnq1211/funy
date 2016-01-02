<?php
/**
 * Created By: Khoapq
 * Date: 30/09/2015
 */
class Client_Logo_Widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'client-logo',
			__( 'Thim: Client Logo', 'mabu' ),
			array(
				'description' => __( 'Add client logo', 'mabu' ),
				'help'        => '',
				'panels_groups' => array('thim_widget_group')
			),
			array(),
			array(
				'image'         => array(
					'type'        => 'multimedia',
					'label'       => __( 'Logo', 'mabu' ),
					'description' => __( 'Select image from media library.', 'mabu' )
				),

				'image_size'    => array(
					'type'        => 'text',
					'label'       => __( 'Logo size', 'mabu' ),
					'description' => __( 'Enter image size. Example: "thumbnail", "medium", "large", "full"', 'mabu' )
				),
				'image_link'    => array(
					'type'        => 'text',
					'label'       => __( 'Logo Link', 'mabu' ),
					'description' => __( 'Enter URL if you want this image to have a link. These links are separated by comma (Ex: #,#,#,#)', 'mabu' )
				),

				'link_target'   => array(
					"type"    => "select",
					"label"   => __( "Link Target", 'mabu' ),
					"options" => array(
						"_self"  => __( "Same window", 'mabu' ),
						"_blank" => __( "New window", 'mabu' ),
					),
				),

				'items'   => array(
					"type"    		=> "number",
					"label"   		=> __( "Items", 'mabu' ),
					'description'	=> __('This variable allows you to set the maximum amount of items displayed at a time with the widest browser width', 'mabu'),
					'default'		=> 6
				),

				'autoPlay'   => array(
					"type"    => "select",
					"label"   => __( "Auto Play", 'mabu' ),
					"options" => array(
						"false"  => __( "False", 'mabu' ),
						"true" => __( "True", 'mabu' ),
					),
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
			TP_THEME_DIR . 'inc/widgets/client-logo/'
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

	function enqueue_frontend_scripts(){
		wp_enqueue_script('thim-client-logo', TP_THEME_URI .'inc/widgets/client-logo/js/owl.carousel.js', array( 'jquery' ), '', true  );
 	}
}


function thim_client_logo_widget() {
	register_widget( 'Client_Logo_Widget' );
}

add_action( 'widgets_init', 'thim_client_logo_widget' );