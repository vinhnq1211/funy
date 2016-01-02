<?php
$woocommerce->addSubSection( array(
	'name'     => __( 'Sharing', 'mabu' ),
	'id'       => 'woo_share',
	'position' => 3,
) );


$woocommerce->createOption( array(
	'name'    => __( 'Facebook', 'mabu' ),
	'id'      => 'woo_sharing_facebook',
	'type'    => 'checkbox',
	"desc"    => "Show the facebook sharing option in product.",
	'default' => false,
) );

$woocommerce->createOption( array(
	'name'    => __( 'Twitter', 'mabu' ),
	'id'      => 'woo_sharing_twitter',
	'type'    => 'checkbox',
	"desc"    => "Show the twitter sharing option in product.",
	'default' => false,
) );


$woocommerce->createOption( array(
	'name'    => __( 'Google Plus', 'mabu' ),
	'id'      => 'woo_sharing_google',
	'type'    => 'checkbox',
	"desc"    => "Show the g+ sharing option in product.",
	'default' => false,
) );

$woocommerce->createOption( array(
	'name'    => __( 'Pinterest', 'mabu' ),
	'id'      => 'woo_sharing_pinterest',
	'type'    => 'checkbox',
	"desc"    => "Show the pinterest sharing option in product.",
	'default' => false,
) );

