<?php

class Thim_Share_Social_Widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'share-social',
			__( 'Thim: Share Social', 'mabu' ),
			array(
				'description' => __( 'Share Social', 'mabu' ),
				'help'        => '',
				'panels_groups' => array('thim_widget_group')
			),
			array(),
			array(

				'title'	=> array(
					'type'		=> 'text',
					'label' 	=> __( 'Title', 'mabu' ),
					'default'	=> __( 'Share on', 'mabu' )
				),


				'facebook'	=> array(
					'type'		=> 'select',
					'label' 	=> __( 'Facebook', 'mabu' ),
					'default'	=> true,
					'options' 	=> array(
						true 	=> __('Yes', 'mabu'),
						false 	=> __('No', 'mabu'),
					)
				),

				'twitter'	=> array(
					'type'		=> 'select',
					'label' 	=> __( 'Twitter', 'mabu' ),
					'default'	=> true,
					'options' 	=> array(
						true 	=> __('Yes', 'mabu'),
						false 	=> __('No', 'mabu'),
					)
				),

				'google'	=> array(
					'type'		=> 'select',
					'label' 	=> __( 'Google', 'mabu' ),
					'default'	=> true,
					'options' 	=> array(
						true 	=> __('Yes', 'mabu'),
						false 	=> __('No', 'mabu'),
					)
				),

			),
			TP_THEME_DIR . 'inc/widgets/share-social/'
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

function thim_share_social_register_widget() {
	register_widget( 'Thim_Share_Social_Widget' );
}

add_action( 'widgets_init', 'thim_share_social_register_widget' );