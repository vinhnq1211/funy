<?php

class Heading_Widget extends Thim_Widget {

	function __construct() {
		parent::__construct(
			'heading',
			__( 'Thim: Heading', 'mabu' ),
			array(
				'description'   => __( 'Add heading text', 'mabu' ),
				'help'          => '',
				'panels_groups' => array( 'thim_widget_group' )
			),
			array(),
			array(
				'title'               => array(
					'type'    => 'text',
					'label'   => __( 'Heading Text', 'mabu' ),
					'default' => '',
				),

				'sub-title'           => array(
					'type'    => 'text',
					'label'   => __( 'Sub Heading', 'mabu' ),
					'default' => '',
					'allow_html_formatting' => true,
				),
				
				'line'                => array(
					'type'    => 'checkbox',
					'label'   => __( 'Show Separator', 'mabu' ),
					'default' => false,
				),
				'textcolor'           => array(
					'type'    => 'color',
					'label'   => __( 'Text Heading color', 'mabu' ),
					'default' => '',
				),
				'size'                => array(
					"type"    => "select",
					"label"   => __( "Size Heading", 'mabu' ),
					"options" => array(
						"h2" => __( "h2", 'mabu' ),
						"h3" => __( "h3", 'mabu' ),
						"h4" => __( "h4", 'mabu' ),
						"h5" => __( "h5", 'mabu' ),
						"h6" => __( "h6", 'mabu' ),
					),
					"default" => "h3"
				),

				'heading_padding'           => array(
					'type'    => 'text',
					'label'   => __( 'Heading Padding', 'mabu' ),
					'default' => '',
				),

				'font_heading'        => array(
					"type"          => "select",
					"label"         => __( "Font Heading", 'mabu' ),
					"default"       => "default",
					"options"       => array(
						"default" => __( "Default", 'mabu' ),
						"custom"  => __( "Custom", 'mabu' )
					),
					"description"   => __( "Select Font heading.", 'mabu' ),
					'state_emitter' => array(
						'callback' => 'select',
						'args'     => array( 'font_heading_type' )
					)
				),
				'custom_font_heading' => array(
					'type'          => 'section',
					'label'         => __( 'Custom Font Heading', 'mabu' ),
					'hide'          => true,
					'state_handler' => array(
						'font_heading_type[custom]'  => array( 'show' ),
						'font_heading_type[default]' => array( 'hide' ),
					),
					'fields'        => array(
						'custom_font_size'   => array(
							"type"        => "number",
							"label"       => __( "Font Size", 'mabu' ),
							"suffix"      => "px",
							"default"     => "14",
							"description" => __( "custom font size", 'mabu' ),
							"class"       => "color-mini",
						),
						'custom_font_weight' => array(
							"type"        => "select",
							"label"       => __( "Custom Font Weight", 'mabu' ),
							"options"     => array(
								"normal" => __( "Normal", 'mabu' ),
								"bold"   => __( "Bold", 'mabu' ),
								"100"    => __( "100", 'mabu' ),
								"200"    => __( "200", 'mabu' ),
								"300"    => __( "300", 'mabu' ),
								"400"    => __( "400", 'mabu' ),
								"500"    => __( "500", 'mabu' ),
								"600"    => __( "600", 'mabu' ),
								"700"    => __( "700", 'mabu' ),
								"800"    => __( "800", 'mabu' ),
								"900"    => __( "900", 'mabu' )
							),
							"description" => __( "Select Custom Font Weight", 'mabu' ),
							"class"       => "color-mini",
						),
						'custom_font_style'  => array(
							"type"        => "select",
							"label"       => __( "Custom Font Style", 'mabu' ),
							"options"     => array(
								"inherit" => __( "inherit", 'mabu' ),
								"initial" => __( "initial", 'mabu' ),
								"italic"  => __( "italic", 'mabu' ),
								"normal"  => __( "normal", 'mabu' ),
								"oblique" => __( "oblique", 'mabu' )
							),
							"description" => __( "Select Custom Font Style", 'mabu' ),
							"class"       => "color-mini",
						),
					),
				),

				'css_animation'       => array(
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
				),

				'align'       => array(
					"type"    => "select",
					"label"   => __( "Align", 'mabu' ),
					"options" => array(
						"center"  	=> __( "Center", 'mabu' ),
						"left"		=> __( "Left", 'mabu' ),
						"right" 	=> __( "Right", 'mabu' )
					),
				),

			),
			TP_THEME_DIR . 'inc/widgets/heading/'
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

function thim_heading_register_widget() {
	register_widget( 'Heading_Widget' );
}

add_action( 'widgets_init', 'thim_heading_register_widget' );