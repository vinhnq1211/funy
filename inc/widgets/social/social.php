<?php

class Thim_Social_Widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'social',
			__( 'Thim: Social Links', 'mabu' ),
			array(
				'description' => __( 'Social Links', 'mabu' ),
				'help'        => '',
				'panels_groups' => array('thim_widget_group')
			),
			array(),
			array(
				'title'          => array(
					'type'  => 'text',
					'label' => __( 'Title', 'mabu' )
				),
				'link_face'      => array(
					'type'  => 'text',
					'label' => __( 'Facebook Url', 'mabu' )
				),
				'link_twitter'   => array(
					'type'  => 'text',
					'label' => __( 'Twitter Url', 'mabu' )
				),
				'link_google'    => array(
					'type'  => 'text',
					'label' => __( 'Google Url', 'mabu' )
				),
				'link_dribble'   => array(
					'type'  => 'text',
					'label' => __( 'Dribble Url', 'mabu' )
				),
				'link_linkedin'  => array(
					'type'  => 'text',
					'label' => __( 'Linked in Url', 'mabu' )
				),
				'link_pinterest' => array(
					'type'  => 'text',
					'label' => __( 'Pinterest Url', 'mabu' )
				),
				'link_digg'      => array(
					'type'  => 'text',
					'label' => __( 'Digg Url', 'mabu' )
				),
				'link_youtube'   => array(
					'type'  => 'text',
					'label' => __( 'Youtube Url', 'mabu' )
				),
				'link_target'    => array(
					"type"    => "select",
					"label"   => __( "Link Target", 'mabu' ),
					"options" => array(
						"_self"  => __( "Same window", 'mabu' ),
						"_blank" => __( "New window", 'mabu' ),
					),
				),

				'style'	=> array(
					'type'		=> 'select',
					'label' 	=> __( 'Style', 'mabu' ),
					'default'	=> 'default',
					'options' 	=> array(
						'default' 	=> __('Default', 'mabu'),
						'style2' 	=> __('Style 2', 'mabu'),
					)
				),

				'align'	=> array(
					'type'		=> 'select',
					'label' 	=> __( 'Align', 'mabu' ),
					'default'	=> 'left',
					'options' 	=> array(
						'left' 	=> __('Left', 'mabu'),
						'right' 	=> __('Right', 'mabu'),
						'center' 	=> __('Center', 'mabu'),
					)
				),

			),
			TP_THEME_DIR . 'inc/widgets/social/'
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

function thim_social_register_widget() {
	register_widget( 'Thim_Social_Widget' );
}

add_action( 'widgets_init', 'thim_social_register_widget' );