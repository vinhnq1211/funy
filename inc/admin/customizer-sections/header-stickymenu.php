<?php

// header Options
$header->addSubSection( array(
	'name'     => __( 'Sticky Menu', 'mabu' ),
	'id'       => 'display_header_menu',
	'position' => 14,
) );

$header->createOption( array(
	'name' => __( 'Sticky Menu on scroll', 'mabu' ),
	'desc' => __( 'Check to enable a fixed header when scrolling, uncheck to disable.', 'mabu' ),
	'id'   => 'header_sticky',
	'type' => 'checkbox',
	'default' => true
) );

$header->createOption( array(
	'name'    => __( 'Config Sticky Menu?', 'mabu' ),
	'desc'    => '',
	'id'      => 'config_att_sticky',
	'options' => array( 'sticky_same'   => 'The same with main menu',
						'sticky_custom' => 'Custom'
	),
	'type'    => 'select',
	'default' => 'sticky_custom'
) );

$header->createOption( array(
	'name'    => __( 'Sticky Background color', 'mabu' ),
	'desc'    => __( 'Pick a background color for main menu', 'mabu' ),
	'id'      => 'sticky_bg_main_menu_color',
	'default' => '#439fdf',
	'type'    => 'color-opacity'
) );

$header->createOption( array(
	'name'    => __( 'Text color', 'mabu' ),
	'desc'    => __( 'Pick a text color for main menu', 'mabu' ),
	'id'      => 'sticky_main_menu_text_color',
	'default' => '#FFF',
	'type'    => 'color-opacity'
) );

$header->createOption( array(
	'name'    => __( 'Text Hover color', 'mabu' ),
	'desc'    => __( 'Pick a text hover color for main menu', 'mabu' ),
	'id'      => 'sticky_main_menu_text_hover_color',
	'default' => '#FFF',
	'type'    => 'color-opacity'
) );