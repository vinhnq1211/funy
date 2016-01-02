<?php
if ( class_exists( 'THIM_Our_Team' ) ) {
	class Thim_Team_Widget extends Thim_Widget {
		function __construct() {
			parent::__construct(
				'team',
				__( 'Thim: Our Team', 'mabu' ),
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
						'label'   => __( 'Number Members', 'mabu' ),
						'default' => '8'
					),

					'per_row'        => array(
						'type'    => 'number',
						'label'   => __( 'Number member in row', 'mabu' ),
						'default' => '4'
					),
				),

				TP_THEME_DIR . 'inc/widgets/team/'
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

	function thim_team_register_widget() {
		register_widget( 'Thim_Team_Widget' );
	}

	add_action( 'widgets_init', 'thim_team_register_widget' );
}