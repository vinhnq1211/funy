<?php
if ( class_exists( 'THIM_Testimonials' ) ) {
	class Testimonials_Widget extends Thim_Widget {
		function __construct() {
			parent::__construct(
				'testimonials',
				__( 'Thim: Testimonials', 'mabu' ),
				array(
					'description'   => '',
					'help'          => '',
					'panels_groups' => array( 'thim_widget_group' ),
					'panels_icon'   => 'dashicons dashicons-welcome-learn-more'
				),
				array(),
				array(

					'number'        => array(
						'type'    => 'number',
						'label'   => __( 'Number Posts', 'mabu' ),
						'default' => '4'
					),

					'item_visible'          => array(
						'type'          => 'number',
						'fallback'      => true,
						'label'         => __( 'Item Visible', 'mabu' ),
						'default'       => '5',
						'state_handler' => array(
							'template[base]' 	=> array( 'hide' ),
							'template[style2]' 	=> array( 'hide' ),
							'template[style3]' 	=> array( 'show' ),
						)
					),

					'mousewheel'             => array(
						'type'    => 'checkbox',
						'label'   => esc_html__( 'Mousewheel Scroll', 'mabu' ),
						'default' => false,
						'state_handler' => array(
							'template[base]' 	=> array( 'hide' ),
							'template[style2]' 	=> array( 'hide' ),
							'template[style3]' 	=> array( 'show' ),
						)
					),

					'template' => array(
						"type"    	=> "select",
						"label"   	=> __( "Template", 'mabu' ),
						"default"	=> "base",
						"options"	=> array(
							"base"              => __( "Default", 'mabu' ),
							"style2"        => __( "Style 2", 'mabu' ),
							"style3"        => __( "Style 3", 'mabu' )
						),
						'state_emitter' => array(
							'callback' => 'select',
							'args'     => array( 'template' )
						)
					)
				),
				TP_THEME_DIR . 'inc/widgets/testimonials/'
			);
		}

		/**
		 * Initialize the CTA widget
		 */


		function get_template_name( $instance ) {
			return $instance['template'] ?  $instance['template'] : 'base';
		}

		function get_style_name( $instance ) {
			return false;
		}

		function enqueue_frontend_scripts() {
			wp_enqueue_script( 'thim-content-slider', TP_THEME_URI . 'inc/widgets/testimonials/js/jquery.thim-content-slider.js', array( 'jquery' ), '', true );
		}


	}

	function thim_testimonials_register_widget() {
		register_widget( 'Testimonials_Widget' );
	}

	add_action( 'widgets_init', 'thim_testimonials_register_widget' );
}