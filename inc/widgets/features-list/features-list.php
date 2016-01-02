<?php
class Features_List_Widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'features-list',
			__( 'Thim: Features List', 'mabu' ),
			array(
				'description' => __( 'Add features list', 'mabu' ),
				'help'        => '',
				'panels_groups' => array('thim_widget_group')
			),
			array(),
			array(
				'features' => array(
					'type' => 'repeater',
					'label' => __('Features', 'mabu'),
					'item_name' => __('Feature item', 'mabu'),
					'fields' => array(
						// The text under the icon

						'title' => array(
							'type' => 'text',
							'label' => __('Title text', 'mabu'),
						),

						'text' => array(
							'type' => 'textarea',
							'allow_html_formatting' => true,
							'label' => __('Text', 'mabu')
						),

						'image' => array(
							'type'  => 'media',
		 					'label' => __( 'Image', 'mabu' ),
							'description'  => __( 'Select image from media library.', 'mabu' )
						),

						'image_size'         => array(
							'type'    => 'text',
							'label'   => __( 'Image size', 'mabu' ),
		 					'description'    => __( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'mabu' )
						),

						'icon' => array(
							'type'  => 'text',
		 					'label' => __( 'Icon', 'mabu' ),
							'description'  => __( 'Ex: <i class="fa fa-facebook"></i>', 'mabu' )
						),
					),
				),


				'per_row' => array(
					'type' => 'number',
					'label' => __('Features per row', 'mabu'),
					'default' => 3,
				),

				'display_items' => array(
					'type' => 'number',
					'label' => __('Features display in first load', 'mabu'),
					'default' => 6,
				),

				'style' => array(
					'type' => 'select',
					'label' => __('Style', 'mabu'),
					'default' => 'default',
					'options' => array(
						'default' 		=> __('Default', 'mabu'),
						'default-plus' 	=> __('Default Plus', 'mabu'),
						'simple' 		=> __('Simple - Not Image', 'mabu'),
						'style2' 		=> __('Style 2', 'mabu')
					)
				),

			),
			TP_THEME_DIR . 'inc/widgets/features-list/'
		);

		
	}

	/**
	 * Initialize the CTA widget
	 */
	function enqueue_frontend_scripts() {
		wp_enqueue_script( 'thim-features-list', TP_THEME_URI . 'inc/widgets/features-list/js/features-list.js', array( 'jquery' ), true );
	}

	function get_template_name( $instance ) {
		return ($instance['style'] == 'style2' || $instance['style'] == 'default') ? 'base' : $instance['style'];
	}

	function get_style_name( $instance ) {
		return false;
	}

}

function thim_features_list_register_widget() {
	register_widget( 'Features_List_Widget' );
}

add_action( 'widgets_init', 'thim_features_list_register_widget' );