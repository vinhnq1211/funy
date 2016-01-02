<?php

class Thim_Loginout_Widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'loginout',
			__( 'Thim: Login/Out', 'mabu' ),
			array(
				'description' => __( 'Displays a login link, or if a user is logged in, displays a logout link', 'mabu' ),
				'help'        => '',
				'panels_groups' => array('thim_widget_group')
			),
			array(),
			array(
			),
			TP_THEME_DIR . 'inc/widgets/loginout/'
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

function thim_loginout_register_widget() {
	register_widget( 'Thim_Loginout_Widget' );
}

add_action( 'widgets_init', 'thim_loginout_register_widget' );