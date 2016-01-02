<?php
/*
 * Creating a logo Options
 */
$logo = $titan->createThemeCustomizerSection( array(
	'name'     => __( 'Logo', 'mabu' ),
	'position' => 1,
) );

$logo->createOption( array(
	'name'    => __( 'Header Logo', 'mabu' ),
	'id'      => 'logo',
	'type'    => 'upload',
	'desc'    => __( 'Upload your logo', 'mabu' ),
	'default' => get_template_directory_uri( 'template_directory' ) . "/images/logo.png",
) );

$logo->createOption( array(
	'name'    => __( 'Width Logo', 'mabu' ),
	'id'      => 'width_logo',
	'type'    => 'number',
	'default' => '127',
	'max'     => '1024',
	'min'     => '0',
	'step'    => '1',
	'desc'    => 'width logo (px)'
) );

$logo->createOption( array(
	'name' => __( 'Favicon', 'mabu' ),
	'id'   => 'favicon',
	'type' => 'upload',
	'desc' => __( 'Upload your favicon', 'mabu' ),
	'default' => get_template_directory_uri( 'template_directory' ) . "/images/favicon.png",
) );
?>