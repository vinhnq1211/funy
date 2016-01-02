<?php
class Counters_Box_Widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'counters-box',
			__( 'Thim: Counters Box', 'mabu' ),
			array(
				'description' => __( 'Counters Box', 'mabu' ),
				'help'        => '',
				'panels_groups' => array( 'thim_widget_group' ),
			),
			array(),
			array(

				'counters_label'   => array(
					"type"    => "text",
					"label"   => __( "Counters label", 'mabu' ),
				),

				'counters_value'   => array(
					"type"    => "number",
					"label"   => __( "Counters Value", 'mabu' ),
					"default" => "20",
				),

				'display_number'   => array(
					"type"    => "number",
					"label"   => __( "Length Of Number", 'mabu' ),
					"default" => "2",
				),

				'icon'   => array(
					"type"    => "icon",
					"label"   => __( "Icon", 'mabu' ),
				),
				'border_color'   => array(
					"type"    => "color",
					"label"   => __( "Border Color Icon", 'mabu' ),
				),

				'counter_color'   => array(
					"type"    => "color",
					"label"   => __( "Counters Box Icon", 'mabu' ),
				),


 				'css_animation' => array(
					"type"    => "select",
					"label"   => __( "CSS Animation", 'mabu' ),
					"options" => array(
						""              => __( "No", 'mabu' ),
						"top-to-bottom" => __( "Top to bottom", 'mabu' ),
						"bottom-to-top" => __( "Bottom to top", 'mabu' ),
						"left-to-right" => __( "Left to right", 'mabu' ),
						"right-to-left" => __( "Right to left", 'mabu' ),
						"appear"        => __( "Appear from center", 'mabu' )
					),
				)
			),
			TP_THEME_DIR . 'inc/widgets/counters-box/'
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
	function enqueue_frontend_scripts(){
		//wp_enqueue_script( 'thim-waypoints', TP_THEME_URI . 'js/jquery.waypoints.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script('thim-counters-box', TP_THEME_URI .'inc/widgets/counters-box/js/counters-box.js', array( 'jquery' ), '', true  );
 	}
}

function thim_counters_box_widget() {
	register_widget( 'Counters_Box_Widget' );
}

add_action( 'widgets_init', 'thim_counters_box_widget' );