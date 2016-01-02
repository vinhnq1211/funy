<?php
$display->addSubSection( array(
	'name'     => 'Job Single',
	'id'       => 'display_job_single',
	'position' => 8,
) );

$display->createOption( array(
	'name'    => 'Select Layout Default',
	'id'      => 'job_single_layout',
	'type'    => 'radio-image',
	'options' => array(
		'full-content'  => $url . 'body-full.png',
		'sidebar-left'  => $url . 'sidebar-left.png',
		'sidebar-right' => $url . 'sidebar-right.png'
	),
	'default' => 'full-content'
) );

$display->createOption( array(
	'name'    => 'Hide Title',
	'id'      => 'job_single_hide_title',
	'type'    => 'checkbox',
	"desc"    => "Check this box to hide/unhide title",
	'default' => false,
) );

$display->createOption( array(
	'name'        => 'Top Image',
	'id'          => 'job_single_top_image',
	'type'        => 'upload',
	'desc'        => 'Enter URL or Upload an top image file for header',
	'livepreview' => ''
) );

$display->createOption( array(
	'name'        => 'Background Heading Color',
	'id'          => 'job_single_heading_bg_color',
	'type'        => 'color-opacity',
	'livepreview' => ''
) );

$display->createOption( array(
	'name'    => 'Text Color Heading',
	'id'      => 'job_single_heading_text_color',
	'type'    => 'color-opacity',
	'default' => '#fff',
) );


$display->createOption( array(
	'name'    => __('Custom Title','mabu'),
	'id'      => 'job_single_custom_title',
	'type'    => 'text',
	'default' => '',
) );

$display->createOption( array(
	'name'    => __('sub Title','mabu'),
	'id'      => 'job_single_sub_title',
	'type'    => 'text',
	'default' => '',
) );

$display->createOption( array(
	'name'    => __( 'Display Meta', 'mabu' ),
	'id'      => 'job_single_metabox',
	'type'    => 'checkbox',
	"desc"    => "Show job meta box after title of single Job",
	'default' => false,
) );

$display->createOption( array(
	'name'    => __( 'Facebook', 'mabu' ),
	'id'      => 'job_single_sharing_facebook',
	'type'    => 'checkbox',
	"desc"    => "Show the facebook sharing option in single Job.",
	'default' => true,
) );

$display->createOption( array(
	'name'    => __( 'Twitter', 'mabu' ),
	'id'      => 'job_single_sharing_twitter',
	'type'    => 'checkbox',
	"desc"    => "Show the twitter sharing option in single Job.",
	'default' => true,
) );


$display->createOption( array(
	'name'    => __( 'Google Plus', 'mabu' ),
	'id'      => 'job_single_sharing_google',
	'type'    => 'checkbox',
	"desc"    => "Show the g+ sharing option in single Job.",
	'default' => true,
) );

