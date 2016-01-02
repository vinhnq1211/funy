<?php
$display->addSubSection( array(
	'name'     => __( 'Sharing', 'mabu' ),
	'id'       => 'share_archive',
	'position' => 3,
) );


$display->createOption( array(
	'name'    => __( 'Facebook', 'mabu' ),
	'id'      => 'archive_sharing_facebook',
	'type'    => 'checkbox',
	"desc"    => "Show the facebook sharing option in post.",
	'default' => true,
) );

$display->createOption( array(
	'name'    => __( 'Twitter', 'mabu' ),
	'id'      => 'archive_sharing_twitter',
	'type'    => 'checkbox',
	"desc"    => "Show the twitter sharing option in post.",
	'default' => true,
) );


$display->createOption( array(
	'name'    => __( 'Google Plus', 'mabu' ),
	'id'      => 'archive_sharing_google',
	'type'    => 'checkbox',
	"desc"    => "Show the g+ sharing option in post.",
	'default' => true,
) );

$display->createOption( array(
	'name'    => __( 'Pinterest', 'mabu' ),
	'id'      => 'archive_sharing_pinterest',
	'type'    => 'checkbox',
	"desc"    => "Show the pinterest sharing option in post.",
	'default' => true,
) );

