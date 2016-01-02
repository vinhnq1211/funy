<?php
// main menu
$header->addSubSection( array(
	'name'     => __( 'Main Menu', 'mabu' ),
	'id'       => 'display_main_menu',
	'position' => 5,
) );

$header->createOption( array(
	'name'    => __( 'Select a Layout', 'mabu' ),
	'id'      => 'header_style',
	'type'    => 'radio-image',
	'options' => array(
		"header_v1" => get_template_directory_uri( 'template_directory' ) . "/images/admin/header/header_1.jpg",
	),
	'default' => 'header_v1',
) );

$header->createOption( array(
	'name'    => __( 'Header Position', 'mabu' ),
	'id'      => 'header_position',
	'type'    => 'select',
	'options' => array(
		'header_default' => __( 'Default', 'mabu' ),
		'header_overlay' => __( 'Overlay', 'mabu' ),
	),
	'default' => 'header_overlay',
) );

$header->createOption( array(
	"name"    => __( "Background color", 'mabu' ),
	"desc"    => __( "Pick a background color for main menu", 'mabu' ),
	"id"      => "bg_main_menu_color",
	"default" => "rgba(67, 159, 223, 0)",
	"type"    => "color-opacity"
) );

$header->createOption( array(
	"name"    => __( "Text color", 'mabu' ),
	"desc"    => __( "Pick a text color for main menu", 'mabu' ),
	"id"      => "main_menu_text_color",
	"default" => "#FFF",
	"type"    => "color-opacity"
) );

$header->createOption( array(
	"name"    => __( "Text Hover color", 'mabu' ),
	"desc"    => __( "Pick a text hover color for main menu", 'mabu' ),
	"id"      => "main_menu_text_hover_color",
	"default" => "#FFF",
	"type"    => "color-opacity"
) );

$header->createOption( array(
	"name"    => __( "Font Size", 'mabu' ),
	"desc"    => "Default is 13",
	"id"      => "font_size_main_menu",
	"default" => "13px",
	"type"    => "select",
	"options" => $font_sizes
) );

$header->createOption( array(
	"name"    => __( "Font Weight", 'mabu' ),
	"desc"    => "Default bold",
	"id"      => "font_weight_main_menu",
	"default" => "400",
	"type"    => "select",
	"options" => array( 'bold'   => 'Bold',
	                    'normal' => 'Normal',
	                    '100'    => '100',
	                    '200'    => '200',
	                    '300'    => '300',
	                    '400'    => '400',
	                    '500'    => '500',
	                    '600'    => '600',
	                    '700'    => '700',
	                    '800'    => '800',
	                    '900'    => '900'
	),
) );