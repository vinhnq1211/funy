<?php

// main menu

$header->addSubSection( array(
	'name'     => __( 'Mobile Menu', 'mabu' ),
	'id'       => 'display_mobile_menu',
	'position' => 15,
) );


$header->createOption( array(
	"name"    => __( "Background color", 'mabu' ),
	"desc"    => "Pick a background color for main menu",
	"id"      => "bg_mobile_menu_color",
	"default" => "#2d343d",
	"type"    => "color-opacity"
) );


$header->createOption( array(
	"name"    => __( "Text color", 'mabu' ),
	"desc"    => __( "Pick a text color for main menu", 'mabu' ),
	"id"      => "mobile_menu_text_color",
	"default" => "#FFF",
	"type"    => "color-opacity"
) );


$header->createOption( array(
	"name"    => __( "Text Hover color", 'mabu' ),
	"desc"    => __( "Pick a text hover color for main menu", 'mabu' ),
	"id"      => "mobile_menu_text_hover_color",
	"default" => "#439fdf",
	"type"    => "color-opacity"
) );