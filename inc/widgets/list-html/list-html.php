<?php
 class List_Html_Widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'list-html',
			__( 'Thim: List Html Two Columns', 'mabu' ),
			array(
				'description' => __( 'Add html', 'mabu' ),
				'help'        => '',
				'panels_groups' => array( 'thim_widget_group' ),
			),
			array(),
			array(
				'list-html' => array(
					'type'      => 'repeater',
					'label'     => __( 'Text', 'mabu' ),
					'item_name' => __( 'Text', 'mabu' ),
					'fields'    => array(
						'title'   => array(
							"type"    => "text",
							"label"   => __( "Title", 'mabu' ),
							"default" => "Title",
							'fallback'      => true,
							'state_handler' => array(
								'template[base]' 		=> array( 'show' ),
								'template[ostyle]'     	=> array( 'hide' ),
							)
						),
						'content' => array(
							"type"  => "textarea",
							"label" => __( "Content", 'mabu' ),
							'allow_html_formatting' => true,
						),
						'image'   => array(
							"type"    => "media",
							"label"   => __( "Image", 'mabu' ),
							'fallback'      => true,
							'state_handler' => array(
								'template[base]' 		=> array( 'hide' ),
								'template[ostyle]'     	=> array( 'show' ),
							)
						),
					),
				),

				'title'          => array(
					'type'          => 'text',
					'fallback'      => true,
					'label'         => __( 'Enter title of box', 'mabu' ),
					'default'       => '',
					'state_handler' => array(
						'template[base]' 		=> array( 'hide' ),
						'template[ostyle]'     	=> array( 'show' ),
					)
				),

				'template'      => array(
					"type"    => "select",
					"label"   => __( "Template", 'mabu' ),
					'default' => 'base',
					"options" => array(
						"base"  => __( "Default", 'mabu' ),
						"ostyle"   => __( "O-Style", 'mabu' ),
					),
					'state_emitter' => array(
						'callback' => 'select',
						'args'     => array( 'template' )
					)
				),

			),
			TP_THEME_DIR . 'inc/widgets/list-html/'
		);
	}

	/**
	 * Initialize the CTA widget
	 */

	function get_template_name( $instance ) {
		return $instance['template'] ? $instance['template'] : 'base';
	}

	function get_style_name( $instance ) {
		return 'basic';
	}
}


function thim_list_html_register_widget() {
	register_widget( 'List_Html_Widget' );
}

add_action( 'widgets_init', 'thim_list_html_register_widget' );