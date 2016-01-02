<?php
/*
 * Post and Page Display Settings
 */
$display->addSubSection( array(
	'name'     => 'Page Documentation',
	'id'       => 'display_page_document',
	'position' => 7,
	'desc'     => 'it just works with header option: Overlay'
) );

$display->createOption( array(
	'name'        => 'Top Image',
	'id'          => 'document_top_image',
	'type'        => 'upload',
	'desc'        => 'Enter URL or Upload an top image file for header',
	'livepreview' => ''
) );

$display->createOption( array(
	'name'        => 'Background Top Heading Color',
	'id'          => 'document_heading_bg_color',
	'type'        => 'color-opacity',
	'default'     => '#439fdf',
	'livepreview' => ''
) );

$display->createOption( array(
	'name'        => 'Archive Custom Description',
	'id'          => 'document_sub_title',
	'type'        => 'text',
	'default'     => 'Resolve all of your questions in no time'
) );