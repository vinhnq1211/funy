<?php

class Icon_Box_Widget extends Thim_Widget {
	function __construct() {
		parent::__construct(
			'icon-box',
			__( 'Thim: Icon Box', 'mabu' ),
			array(
				'description'   => __( 'Add icon box', 'mabu' ),
				'help'          => '',
				'panels_groups' => array( 'thim_widget_group' ),
 			),
			array(),
			array(
				'sub-title'           => array(
					'type'  => 'text',
					'label' => __( 'Sub Title', 'mabu' ),
				),
				'title_group'         => array(
					'type'   => 'section',
					'label'  => __( 'Title Options', 'mabu' ),
					'hide'   => true,
					'fields' => array(
						'title'            => array(
							'type'                  => 'text',
							'label'                 => __( 'Title', 'mabu' ),
							"default"               => "This is an icon box.",
							"description"           => __( "Provide the title for this icon box.", 'mabu' ),
							'allow_html_formatting' => true
						),
						'color_title'      => array(
							'type'  => 'color',
							'label' => __( 'Color Title', 'mabu' ),
						),
						'size'             => array(
							"type"        => "select",
							"label"       => __( "Size Heading", 'mabu' ),
							"default"     => "h3",
							"options"     => array(
								"h2" => __( "h2", 'mabu' ),
								"h3" => __( "h3", 'mabu' ),
								"h4" => __( "h4", 'mabu' ),
								"h5" => __( "h5", 'mabu' ),
								"h6" => __( "h6", 'mabu' )
							),
							"description" => __( "Select size heading.", 'mabu' )
						),
						'font_heading'     => array(
							"type"          => "select",
							"label"         => __( "Font Heading", 'mabu' ),
							"options"       => array(
								"default" => __( "Default", 'mabu' ),
								"custom"  => __( "Custom", 'mabu' )
							),
							"description"   => __( "Select Font heading.", 'mabu' ),
							'state_emitter' => array(
								'callback' => 'select',
								'args'     => array( 'custom_font_heading' )
							)
						),
						'custom_heading'   => array(
							'type'          => 'section',
							'label'         => __( 'Custom Heading Option', 'mabu' ),
							'hide'          => true,
							'state_handler' => array(
								'custom_font_heading[custom]'  => array( 'show' ),
								'custom_font_heading[default]' => array( 'hide' ),
							),
							'fields'        => array(
								'custom_font_size'   => array(
									"type"        => "number",
									"label"       => __( "Font Size", 'mabu' ),
									"suffix"      => "px",
									"default"     => "14",
									"description" => __( "custom font size", 'mabu' ),
									"class"       => "color-mini"
								),
								'custom_font_weight' => array(
									"type"        => "select",
									"label"       => __( "Custom Font Weight", 'mabu' ),
									"class"       => "color-mini",
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
								),
								'custom_mg_bt'       => array(
									"type"   => "number",
									"class"  => "color-mini",
									"label"  => __( "Margin Bottom Value", 'mabu' ),
									"value"  => 0,
									"suffix" => "px",
								),
							)
						),
						'line_after_title' => array(
							'type'  => 'checkbox',
							'label' => __( 'Show Separator', 'mabu' ),
						),
					),
				),
				'desc_group'          => array(
					'type'   => 'section',
					'label'  => __( 'Description', 'mabu' ),
					'hide'   => true,
					'fields' => array(
						'content'              => array(
							"type"                  => "textarea",
							"label"                 => __( "Add description", 'mabu' ),
							"default"               => "Write a short description, that will describe the title or something informational and useful.",
							"description"           => __( "Provide the description for this icon box.", 'mabu' ),
							'allow_html_formatting' => true
						),
						'custom_font_size_des' => array(
							"type"        => "number",
							"label"       => __( "Custom Font Size", 'mabu' ),
							"suffix"      => "px",
							"default"     => "",
							"description" => __( "custom font size", 'mabu' ),
							"class"       => "color-mini",
						),
						'custom_font_weight'   => array(
							"type"        => "select",
							"label"       => __( "Custom Font Weight", 'mabu' ),
							"class"       => "color-mini",
							"options"     => array(
								""     => __( "Normal", 'mabu' ),
								"bold" => __( "Bold", 'mabu' ),
								"100"  => __( "100", 'mabu' ),
								"200"  => __( "200", 'mabu' ),
								"300"  => __( "300", 'mabu' ),
								"400"  => __( "400", 'mabu' ),
								"500"  => __( "500", 'mabu' ),
								"600"  => __( "600", 'mabu' ),
								"700"  => __( "700", 'mabu' ),
								"800"  => __( "800", 'mabu' ),
								"900"  => __( "900", 'mabu' )
							),
							"description" => __( "Select Custom Font Weight", 'mabu' ),
						),
						'color_description'    => array(
							"type"  => "color",
							"label" => __( "Color Description", 'mabu' ),
							"class" => "color-mini",
						),
					),
				),
				'read_more_group'     => array(
					'type'   => 'section',
					'label'  => __( 'Link Icon Box', 'mabu' ),
					'hide'   => true,
					'fields' => array(
						// Add link to existing content or to another resource
						'link'                   => array(
							"type"        => "text",
							"label"       => __( "Add Link", 'mabu' ),
							"description" => __( "Provide the link that will be applied to this icon box.", 'mabu' )
						),
						// Select link option - to box or with read more text
						'read_more'              => array(
							"type"          => "select",
							"label"         => __( "Apply link to:", 'mabu' ),
							"options"       => array(
								"complete_box" => "Complete Box",
								"title"        => "Box Title",
								"more"         => "Display Read More"
							),
							"description"   => __( "Select whether to use color for icon or not.", 'mabu' ),
							'state_emitter' => array(
								'callback' => 'select',
								'args'     => array( 'read_more_op' )
							)
						),
						// Link to traditional read more
						'button_read_more_group' => array(
							'type'          => 'section',
							'label'         => __( 'Option Button Read More', 'mabu' ),
							'hide'          => true,
							'state_handler' => array(
								'read_more_op[more]'         => array( 'show' ),
								'read_more_op[complete_box]' => array( 'hide' ),
								'read_more_op[title]'        => array( 'hide' ),
							),
							'fields'        => array(
								'read_text'                  => array(
									"type"        => "text",
									"label"       => __( "Read More Text", 'mabu' ),
									"default"     => "Read More",
									"description" => __( "Customize the read more text.", 'mabu' ),
								),
								'read_more_text_color'       => array(
									"type"        => "color",
									"class"       => "",
									"label"       => __( "Text Color Read More", 'mabu' ),
									"description" => __( "Select whether to use text color for Read More Text or default.", 'mabu' ),
									"class"       => "color-mini",
								),
								'border_read_more_text'      => array(
									"type"        => "color",
									"label"       => __( "Border Color Read More Text:", 'mabu' ),
									"description" => __( "Select whether to use border color for Read More Text or none.", 'mabu' ),
									"class"       => "color-mini",
								),
								'bg_read_more_text'          => array(
									"type"        => "color",
									"class"       => "mini",
									"label"       => __( "Background Color Read More Text:", 'mabu' ),
									"description" => __( "Select whether to use background color for Read More Text or default.", 'mabu' ),
									"class"       => "color-mini",
								),
								'read_more_text_color_hover' => array(
									"type"        => "color",
									"class"       => "",
									"label"       => __( "Text Hover Color Read More", 'mabu' ),
									"description" => __( "Select whether to use text color for Read More Text or default.", 'mabu' ),
									"class"       => "color-mini",
								),

								'bg_read_more_text_hover'    => array(
									"type"        => "color",
									"label"       => __( "Background Hover Color Read More Text:", 'mabu' ),
									"description" => __( "Select whether to use background color when hover Read More Text or default.", 'mabu' ),
									"class"       => "color-mini",
								),

							)
						),
					),
				),
				// Play with icon selector
				'icon_type'           => array(
					"type"          => "select",
					"class"         => "",
					"label"         => __( "Icon to display:", 'mabu' ),
					"default"       => "font-awesome",
					"options"       => array(
						"font-awesome"  => "Font Awesome Icon",
						"font-7-stroke" => "Font 7 stroke Icon",
						"custom"        => "Custom Image Icon",
					),
					'state_emitter' => array(
						'callback' => 'select',
						'args'     => array( 'icon_type_op' )
					)
				),
				'font_7_stroke_group' => array(
					'type'          => 'section',
					'label'         => __( 'Font 7 Stroke Icon', 'mabu' ),
					'hide'          => true,
					'state_handler' => array(
						'icon_type_op[font-awesome]'  => array( 'hide' ),
						'icon_type_op[custom]'        => array( 'hide' ),
						'icon_type_op[font-7-stroke]' => array( 'show' ),
					),
					'fields'        => array(
						'icon'      => array(
							"type"        => "icon-7-stroke",
							"class"       => "",
							"label"       => __( "Select Icon:", 'mabu' ),
							"description" => __( "Select the icon from the list.", 'mabu' ),
							"class_name"  => 'font-7-stroke',
						),
						// Resize the icon
						'icon_size' => array(
							"type"        => "number",
							"class"       => "",
							"label"       => __( "Icon Font Size ", 'mabu' ),
							"suffix"      => "px",
							"default"     => "14",
							"description" => __( "Select the icon font size.", 'mabu' ),
							"class_name"  => 'font-7-stroke'
						),
					),
				),
				'font_awesome_group'  => array(
					'type'          => 'section',
					'label'         => __( 'Font Awesome Icon', 'mabu' ),
					'hide'          => true,
					'state_handler' => array(
						'icon_type_op[font-awesome]'  => array( 'show' ),
						'icon_type_op[custom]'        => array( 'hide' ),
						'icon_type_op[font-7-stroke]' => array( 'hide' ),
					),
					'fields'        => array(
						'icon'      => array(
							"type"        => "icon",
							"class"       => "",
							"label"       => __( "Select Icon:", 'mabu' ),
							"description" => __( "Select the icon from the list.", 'mabu' ),
							"class_name"  => 'font-awesome',
						),
						// Resize the icon
						'icon_size' => array(
							"type"        => "number",
							"class"       => "",
							"label"       => __( "Icon Font Size ", 'mabu' ),
							"suffix"      => "px",
							"default"     => "14",
							"description" => __( "Select the icon font size.", 'mabu' ),
							"class_name"  => 'font-awesome'
						),
					),
				),
				'font_image_group'    => array(
					'type'          => 'section',
					'label'         => __( 'Custom Image Icon', 'mabu' ),
					'hide'          => true,
					'state_handler' => array(
						'icon_type_op[font-awesome]'  => array( 'hide' ),
						'icon_type_op[custom]'        => array( 'show' ),
						'icon_type_op[font-7-stroke]' => array( 'hide' ),
					),
					'fields'        => array(
						// Play with icon selector
						'icon_img' => array(
							"type"        => "media",
							"label"       => __( "Upload Image Icon:", 'mabu' ),
							"description" => __( "Upload the custom image icon.", 'mabu' ),
							"class_name"  => 'custom',
						),
					),
				),
				// // Resize the icon
				'width_icon_box'      => array(
					"type"    => "number",
					"class"   => "",
					"default" => "100",
					"label"   => __( "Width Box Icon", 'mabu' ),
					"suffix"  => "px",
				),
				'color_group'         => array(
					'type'   => 'section',
					'label'  => __( 'Color Options', 'mabu' ),
					'hide'   => true,
					'fields' => array(
						// Customize Icon Color
						'icon_color'              => array(
							"type"        => "color",
							"class"       => "color-mini",
							"label"       => __( "Select Icon Color:", 'mabu' ),
							"description" => __( "Select the icon color.", 'mabu' ),
						),
						'icon_border_color'       => array(
							"type"        => "color",
							"label"       => __( "Icon Border Color:", 'mabu' ),
							"description" => __( "Select the color for icon border.", 'mabu' ),
							"class"       => "color-mini",
						),
						'icon_bg_color'           => array(
							"type"        => "color",
							"label"       => __( "Icon Background Color:", 'mabu' ),
							"description" => __( "Select the color for icon background.", 'mabu' ),
							"class"       => "color-mini",
						),
						'icon_hover_color'        => array(
							"type"        => "color",
							"label"       => __( "Hover Icon Color:", 'mabu' ),
							"description" => __( "Select the color hover for icon.", 'mabu' ),
							"class"       => "color-mini",
						),
						'icon_border_color_hover' => array(
							"type"        => "color",
							"label"       => __( "Hover Icon Border Color:", 'mabu' ),
							"description" => __( "Select the color hover for icon border.", 'mabu' ),
							"class"       => "color-mini",
						),
						// Give some background to icon
						'icon_bg_color_hover'     => array(
							"type"        => "color",
							"label"       => __( "Hover Icon Background Color:", 'mabu' ),
							"description" => __( "Select the color hover for icon background .", 'mabu' ),
							"class"       => "color-mini",
						),
					)
				),
				'layout_group'        => array(
					'type'   => 'section',
					'label'  => __( 'Layout Options', 'mabu' ),
					'hide'   => true,
					'fields' => array(
						'box_icon_style' => array(
							"type"    => "select",
							"class"   => "",
							"label"   => __( "Icon Shape", 'mabu' ),
							"options" => array(
								""       => __( "None", 'mabu' ),
								"circle" => __( "Circle", 'mabu' ),
							),
							"std"     => "circle",
						),
						'pos'            => array(
							"type"        => "select",
							"class"       => "",
							"label"       => __( "Box Style:", 'mabu' ),
							"default"     => "top",
							"options"     => array(
								"left"  => "Icon at Left",
								"right" => "Icon at Right",
								"top"   => "Icon at Top"
							),
							"description" => __( "Select icon position. Icon box style will be changed according to the icon position.", 'mabu' ),
						),
						'text_align_sc'  => array(
							"type"    => "select",
							"class"   => "",
							"label"   => __( "Text Align Shortcode:", 'mabu' ),
							"options" => array(
								"text-left"   => "Text Left",
								"text-right"  => "Text Right",
								"text-center" => "Text Center"
							)
						),
					),
				),

				'widget_background'   => array(
					"type"          => "select",
					"label"         => __( "Widget Background", 'mabu' ),
					"default"       => "none",
					"options"       => array(
						"none"     => "None",
						"bg_video" => "Video Background",
						"bg_image" => "Image Background",
					),
					'state_emitter' => array(
						'callback' => 'select',
						'args'     => array( 'bg_video_style' , 'bg_image_style')
					)
				),
				'self_video'          => array(
					'type'          => 'media',
					'fallback'      => true,
					'label'         => __( 'Select video', 'mabu' ),
					'description'   => __( "Select an uploaded video in mp4 format. Other formats, such as webm and ogv will work in some browsers. You can use an online service such as <a href='http://video.online-convert.com/convert-to-mp4' target='_blank'>online-convert.com</a> to convert your videos to mp4.", 'mabu' ),
					'default'       => '',
					'library'       => 'video',
					'state_handler' => array(
						'bg_video_style[bg_video]' => array( 'show' ),
						'bg_video_style[none]'     => array( 'hide' ),
						'bg_video_style[bg_image]' => array( 'hide' ),
					)
				),
				'self_poster'         => array(
					'type'          => 'media',
					'label'         => __( 'Select cover image', 'mabu' ),
					'default'       => '',
					'library'       => 'image',
					'state_handler' => array(
						'bg_video_style[bg_video]' => array( 'show' ),
						'bg_video_style[none]'     => array( 'hide' ),
						'bg_video_style[bg_image]' => array( 'hide' ),
					)
				),
				'background_image'          => array(
					'type'          => 'media',
					'fallback'      => true,
					'label'         => __( 'Select Background Image', 'mabu' ),
					'default'       => '',
					'library'       => 'image',
					'state_handler' => array(
						'bg_image_style[bg_video]' => array( 'hide' ),
						'bg_image_style[none]'     => array( 'hide' ),
						'bg_image_style[bg_image]' => array( 'show' ),
					)
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
				)
			),
			TP_THEME_DIR . 'inc/widgets/icon-box/'
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

	function enqueue_frontend_scripts() {
		wp_enqueue_script( 'icon-box', TP_THEME_URI . 'inc/widgets/icon-box/js/icon-box.js', array( 'jquery' ), '', true );
	}
}

function icon_box_register_widget() {
	register_widget( 'Icon_Box_Widget' );
}

add_action( 'widgets_init', 'icon_box_register_widget' );