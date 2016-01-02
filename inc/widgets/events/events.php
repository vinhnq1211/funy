<?php
class thim_events_widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'events',
			__( 'Thim: Events', 'nem' ),
			array(
				'description' => __( 'Display events', 'nem' ),
				'help'        => '',
				'panels_groups' => array('thim_widget_group')
			),
			array(),
			array(

				'column'         => array(
					'type'    => 'number',
					'label'   => __( 'Column', 'nem' ),
					'default' => '3'
				),


				'number'         => array(
					'type'    => 'number',
					'label'   => __( 'Number Events', 'nem' ),
					'default' => '3'
				),

				'display_link'         => array(
					'type'    => 'select',
					'label'   => __( 'Link View All', 'nem' ),
					'default' => 'yes',
					'options' => array(
							'yes' => 'Show',
							'no'	=> 'Hidden'
						)
				),

			),
			TP_THEME_DIR . 'inc/widgets/events/'
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
function thim_events_widget_register() {
	register_widget( 'thim_events_widget' );
}

add_action( 'widgets_init', 'thim_events_widget_register' );