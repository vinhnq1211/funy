<?php
/**
 * Created by: Khoapq
 * Created Date: 1/10/2015
 */
class Feature_Box_Widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'feature-box',
			__( 'Thim: Feature Box', 'mabu' ),
			array(
				'description' => __( 'Add feature box', 'mabu' ),
				'help'        => '',
				'panels_groups' => array('thim_widget_group')
			),
			array(),
			array(

				'title'         => array(
					'type'    => 'text',
					'label'   => __( 'Title', 'mabu' ),
 					'description'    => __( 'Title Box', 'mabu' )
				),

				'heading_1'         => array(
					'type'    => 'text',
					'label'   => __( 'Heading', 'mabu' ),
 					'description'    => __( 'Heading text', 'mabu' )
				),

				'heading_2'         => array(
					'type'    => 'text',
					'label'   => __( 'Heading 2', 'mabu' ),
 					'description'    => __( 'Heading text 2', 'mabu' )
				),

				'content'         => array(
					'type'    => 'textarea',
					'label'   => __( 'Content', 'mabu' ),
 					'description'    => __( 'Content text here', 'mabu' )
				),

				'image' => array(
					'type'  => 'multimedia',
 					'label' => __( 'Image', 'mabu' ),
					'description'  => __( 'Select image from media library.', 'mabu' )
				),

				'link'         => array(
					'type'    => 'text',
					'label'   => __( 'Learm More Link', 'mabu' ),
					'description'    => __( 'Enter URL if you want this feature to have a link.', 'mabu' )
				),
				'link_target'       => array(
					"type"    => "select",
					"label"   => __( "Link Target", 'mabu' ),
 					"options" => array(
						"_self"              => __( "Same window", 'mabu' ),
						"_blank" => __( "New window", 'mabu' ),
 					),
				),
				'css_animation'       => array(
					"type"    => "select",
					"label"   => __( "CSS Animation", 'mabu' ),
					"options" => array(
						"default" => __( "Default", 'mabu' ),
						"style2" => __( "Style 2", 'mabu' ),
						"style3" => __( "Style 3", 'mabu' )
					),
				),

				'layout'       => array(
					"type"    => "select",
					"label"   => __( "Layout", 'mabu' ),
					"description"=>"Layout Box",
					"options" => array(
						"left"              => __( "Float Left", 'mabu' ),
						"right" => __( "Float Right", 'mabu' ),
					),
				),

				'template'       => array(
					"type"    => "select",
					"label"   => __( "Template", 'mabu' ),
					"options" => array(
						"base" => __( "Default", 'mabu' ),
						"step" => __( "Step by Step", 'mabu' ),
					),
				),
			),
			TP_THEME_DIR . 'inc/widgets/feature-box/'
		);
	}

	/**
	 * Initialize the CTA widget
	 */


	function get_template_name( $instance ) {
		return $instance['template'] ? $instance['template'] : 'base';
	}

	function get_style_name( $instance ) {
		return false;
	}

}
function thim_feature_box_register_widget() {
	register_widget( 'Feature_Box_Widget' );
}

add_action( 'widgets_init', 'thim_feature_box_register_widget' );