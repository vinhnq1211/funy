<?php
$event = $titan->createMetaBox( array(
	'name'      => __( 'Event Options', 'mabu' ),
	'id'        => 'event-options',
	'post_type' => array( 'post' ),
) );

$event->createOption( array(
	'name' => __( 'Use Page Event', 'mabu' ),
	'id'   => 'use_event',
	'type' => 'checkbox',
	'desc' => ' '
) );

$event->createOption( array(
	'name'    => __( 'Desc', 'mabu' ),
	'id'      => 'desc',
	'type'    => 'text',
	'default' => '',
) );

$event->createOption( array(
	'name'    => __( 'Start Date', 'mabu' ),
	'id'      => 'start_date',
	'type'    => 'date',
	'desc'    => __( 'Choose a date', 'mabu' ),
	'default' => ''
	
) );

$event->createOption( array(
	'name'    => __( 'End Date', 'mabu' ),
	'id'      => 'end_date',
	'type'    => 'date',
	'desc'    => __( 'Choose a date', 'mabu' ),
	'default' => '',
) );


