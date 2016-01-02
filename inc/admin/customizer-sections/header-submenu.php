<?php
// main menu

$header->addSubSection( array(
	'name'     => __( 'Sub Menu', 'mabu' ),
	'id'       => 'display_sub_menu',
	'position' => 6,
) );

$header->createOption( array(
	"name"    => __( "Color Border Top", 'mabu' ),
	"id"      => "sub_menu_border_top_color",
	"default" => "#fff",
	"type"    => "color-opacity"
) );
$header->createOption( array(
	"name"        => __( "Background color", 'mabu' ),
	"desc"        => "Pick a background color for sub menu",
	"id"          => "sub_menu_bg_color",
	"default"     => "#fff",
	"type"        => "color-opacity",
	'livepreview' => '$("#main_menu li .sub-menu").css("background-color", value);
                                        $("#main_menu ul.navbar-nav>li.menu-item-has-children>ul.sub-menu").css("border-top-color", value)'
) );

$header->createOption( array(
	"name"    => __( "Color Border Bottom", 'mabu' ),
	"id"      => "sub_menu_border_color",
	"default" => "#eee",
	"type"    => "color-opacity"
) );

$header->createOption( array(
	"name"        => __( "Text color", 'mabu' ),
	"desc"        => __( "Pick a text color for sub menu", 'mabu' ),
	"id"          => "sub_menu_text_color",
	"default"     => "#2d343d",
	"type"        => "color-opacity",
	'livepreview' => '$("#main_menu li .sub-menu li a").css("color", value);'
) );
$header->createOption( array(
	"name"    => __( "Text color hover", 'mabu' ),
	"desc"    => __( "Pick a text color hover for sub menu", 'mabu' ),
	"id"      => "sub_menu_text_color_hover",
	"default" => "#439fdf",
	"type"    => "color-opacity"
) );