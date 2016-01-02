<?php
/**
 * Created by: Khoapq
 * Date: 15/10/2015
 */
class Accordion_Widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'accordion',
			__( 'Thim: Accordion', 'mabu' ),
			array(
				'description' => __( 'Add Accordion', 'mabu' ),
				'help'        => '',
				'panels_groups' => array('thim_widget_group')
			),
			array(),
			array(
				'title' => array(
					'type' => 'text',
					'label' => __('Title', 'mabu'),
					'default' => ''
				),

				'panel' => array(
					'type' => 'repeater',
					'label' => __('Panel List', 'mabu'),
					'item_name' => __('Panel', 'mabu'),
					'fields' => array(
						'panel_title' => array(
							'type' => 'text',
							'label' => __('Panel Title', 'mabu'),
						),

						'panel_body' => array(
							'type' => 'textarea',
							'allow_html_formatting' => true,
							'label' => __('Panel Body', 'mabu'),
						),
					),
				),
			),
			TP_THEME_DIR . 'inc/widgets/accordion/'
		);

		
	}


	function get_template_name( $instance ) {
		return 'base';
	}

	function get_style_name( $instance ) {
		return false;
	}

}

function thim_accordion_register_widget() {
	register_widget( 'Accordion_Widget' );
}

add_action( 'widgets_init', 'thim_accordion_register_widget' );