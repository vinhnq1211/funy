<?php
$display->addSubSection( array(
	'name'     => 'Loading',
	'id'       => 'display_loading',
	'position' => 10,
) );

$display->createOption( array(
	'name'    => 'Show Loading',
	'id'      => 'display_loading_show',
	'type'    => 'checkbox',
	"desc"    => "Check this box to show/hidden loading",
	'default' => false,
) );

$display->createOption( array(
	'name'        => 'Background Color',
	'id'          => 'display_loading_bg',
	'type'        => 'color-opacity',
	'livepreview' => '',
	'default'		=> '#439fdf'
) );

$display->createOption( array(
	'name'        => 'Icon Color',
	'id'          => 'display_loading_color',
	'type'        => 'color-opacity',
	'livepreview' => '',
	'default'		=> '#FFF'
) );