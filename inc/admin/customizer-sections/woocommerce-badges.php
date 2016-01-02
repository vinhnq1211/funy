<?php
$woocommerce->addSubSection( array(
	'name'     => 'Product Badges',
	'id'       => 'woo_badges',
	'position' => 4,
) );



$woocommerce->createOption( array(
	'name'    => 'Show [NEW]',
	'id'      => 'woo_badges_new',
	'type'    => 'checkbox',
	"desc"    => "Check this box to show/hidden Free badges",
	'default' => true,
) );


$woocommerce->createOption( array(
	'name'    	=> 'Day for [NEW]',
	'id'      	=> 'woo_badges_new_day',
	'type'    	=> 'number',
	'default' 	=> '7',
	'max'     	=> '365',
	'min'		=> '0',
) );

$woocommerce->createOption( array(
	'name'    => 'Show [FREE]',
	'id'      => 'woo_badges_free',
	'type'    => 'checkbox',
	"desc"    => "Check this box to show/hidden Free badges",
	'default' => true,
) );

$woocommerce->createOption( array(
	'name'    => 'Show [SALE]',
	'id'      => 'woo_badges_sale',
	'type'    => 'checkbox',
	"desc"    => "Check this box to show/hidden Sale badges",
	'default' => true,
) );


$woocommerce->createOption( array(
	'name'    => 'Show [HOT]',
	'id'      => 'woo_badges_best',
	'type'    => 'checkbox',
	"desc"    => "Check this box to show/hidden HOT badges",
	'default' => true,
) );

$woocommerce->createOption( array(
	'name'    	=> 'Total Sales for [HOT]',
	'id'      	=> 'woo_badges_best_total_sales',
	'type'    	=> 'number',
	'default' 	=> '10',
	'min'		=> '0',
	'max'     	=> '999999999',
) );

$woocommerce->createOption( array(
	'name'    	=> 'Day for [HOT]',
	'id'      	=> 'woo_badges_best_day',
	'type'    	=> 'number',
	'default' 	=> '30',
	'max'     	=> '365',
	'min'		=> '0',
) );
