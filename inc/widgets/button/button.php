<?php

class Thim_Button_Widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'button',
			__( 'Thim: Button', 'mabu' ),
			array(
				'description' => __( 'Button', 'mabu' ),
				'help'        => '',
				'panels_groups' => array('thim_widget_group')
			),
			array(),
			array(

				'text'	=> array(
					'type'		=> 'text',
					'label' 	=> __( 'Text', 'mabu' ),
					'default'	=> __( 'Button Text', 'mabu' )
				),


				'link'	=> array(
					'type'		=> 'text',
					'label' 	=> __( 'Link', 'mabu' ),
					'default'	=> __( '#', 'mabu' )
				),

				'target'	=> array(
					'type'		=> 'select',
					'label' 	=> __( 'Open in new window', 'mabu' ),
					'default'	=> '_blank',
					'options' 	=> array(
						'_blank' 	=> __('Yes', 'mabu'),
						'_self' 	=> __('No', 'mabu')
					)
				),


				'align'	=> array(
					'type'		=> 'select',
					'label' 	=> __( 'Align', 'mabu' ),
					'default'	=> 'left',
					'options' 	=> array(
						'left' 	=> __('Left', 'mabu'),
						'right' 	=> __('Right', 'mabu'),
						'center' 	=> __('Center', 'mabu')
					)
				),

				'style'	=> array(
					'type'		=> 'select',
					'label' 	=> __( 'Style', 'mabu' ),
					'default'	=> 'default',
					'options' 	=> array(
						'default' 	=> __('Default', 'mabu'),
						'style2' 	=> __('Style 2', 'mabu'),
						'style3' 	=> __('Style 3', 'mabu'),
						'style4' 	=> __('Style 4', 'mabu'),
						'style5' 	=> __('Style 5', 'mabu'),
					)
				),


				'size'	=> array(
					'type'		=> 'select',
					'label' 	=> __( 'Sizes', 'mabu' ),
					'default'	=> 'default',
					'options' 	=> array(
						'default' 	=> __('Default button', 'mabu'),
						'large' 	=> __('Large button', 'mabu'),
					)
				),

			),
			TP_THEME_DIR . 'inc/widgets/button/'
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

function thim_button_register_widget() {
	register_widget( 'Thim_Button_Widget' );
}

add_action( 'widgets_init', 'thim_button_register_widget' );