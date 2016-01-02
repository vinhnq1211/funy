<?php

class Thim_Copyright_Widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'copyright',
			__( 'Thim: Copyright', 'mabu' ),
			array(
				'description' => __( 'Display copyright text', 'mabu' ),
				'help'        => '',
				'panels_groups' => array('thim_widget_group')
			),
			array(),
			array(
				'text_align'  => array(
					"type"    => "select",
					"label"   => __( "Text Align", 'mabu' ),
					"options" => array(
						"left"  	=> __( "Left", 'mabu' ),
						"right" 	=> __( "Right", 'mabu' ),
						"center"  	=> __( "Center", 'mabu' ),
					),
				),

			),
			TP_THEME_DIR . 'inc/widgets/copyright/'
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

function thim_copyright_register_widget() {
	register_widget( 'Thim_Copyright_Widget' );
}

add_action( 'widgets_init', 'thim_copyright_register_widget' );