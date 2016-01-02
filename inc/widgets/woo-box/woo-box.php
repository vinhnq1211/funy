<?php
/**
 * Created by: Khoapq
 * Created Date: 13/10/2015
 */
class Woo_Box_Widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'woo-box',
			__( 'Thim: Woocomerce Single Product Box', 'mabu' ),
			array(
				'description' => __( 'Display single product woocommerce', 'mabu' ),
				'help'        => '',
				'panels_groups' => array('thim_widget_group')
			),
			array(),
			array(

				'title'         => array(
					'type'    => 'text',
					'label'   => __( 'Title', 'mabu' )
				),

				'description'         => array(
					'type'    => 'textarea',
					'label'   => __( 'Description', 'mabu' )
				),

				'image'         => array(
					'type'        => 'media',
					'label'       => __( 'Image', 'mabu' ),
					'description' => __( 'Select image from media library.', 'mabu' )
				),
			),
			TP_THEME_DIR . 'inc/widgets/woo-box/'
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
function thim_woo_box_register_widget() {
	register_widget( 'Woo_Box_Widget' );
}

add_action( 'widgets_init', 'thim_woo_box_register_widget' );