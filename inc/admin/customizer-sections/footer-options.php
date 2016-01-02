<?php

$footer->addSubSection( array(
	'name'     => __( 'Footer', 'mabu' ),
	'id'       => 'display_footer',
	'position' => 10,
) );

$footer->createOption( array(
	'name'    => __( 'Background footer images', 'mabu' ),
	'id'      => 'footer_background_img',
	'type'    => 'upload',
	'desc'    => __( 'Upload your background', 'mabu' ),
) );
$footer->createOption( array(
	'name'        => 'Text Color',
	'id'          => 'footer_text_font_color',
	'type'        => 'color-opacity',
	'default'     => '#878b91',
) );

$footer->createOption( array(
	'name'        => 'Background Color',
	'id'          => 'footer_bg_color',
	'type'        => 'color-opacity',
	'default'     => '#373f48',
	'livepreview' => '$("footer#colophon .footer").css("background-color", value);'
) );
