<?php


$header->addSubSection( array(
	'name'     => __('Toolbar','mabu'),
 	'id'       => 'display_top_header',
	'position' => 3,
) );


$header->createOption( array(
	'name'    => __( 'Show or Hide Toolbar', 'mabu' ),
	'id'      => 'topbar_show',
	'type'    => 'checkbox',
	"desc"    => "show/hide",
	'default' => false,
	'livepreview' => '
		if(value == false){
			$("#masthead .top-header").css("display", "none");
		}else{
			$("#masthead .top-header").css("display", "block");
		}
	'

) );

$header->createOption( array(
	'name'    => __( 'Width', 'mabu' ),
	'id'      => 'toolbar_layout',
	'type'    => 'select',
	'options' => array(
		'boxed' => __( 'Boxed', 'mabu' ),
		'wide'  => __( 'Wide', 'mabu' ),
	),
	'default' => 'wide',
) );


$header->createOption( array(
	'name'    => __( 'Font Size', 'mabu' ),
	'id'      => 'font_size_top_header',
	'type'    => 'select',
	'options' => $font_sizes,
	'default' => '13px',
	'livepreview' => '$("#masthead .top-header .top-left, #masthead .top-header .top-right").css("fontSize", value);'
 ) );

$header->createOption( array(
	'name'        => __( 'Background color', 'mabu' ),
	'id'          => 'bg_top_color',
	'type'        => 'color-opacity',
	'default'     => '#ffffff',
	'livepreview' => '$(".top-header").css("background-color", value);'
) );

$header->createOption( array(
	'name'        => __( 'Text color', 'mabu' ),
	'id'          => 'top_header_text_color',
	'type'        => 'color-opacity',
	'default'     => '#ffffff',
	'livepreview' => '$(".top-header,.top-header a").css("color", value);'
) );

$header->createOption( array(
	'name'        => __( 'Link color', 'mabu' ),
	'id'          => 'top_header_link_color',
	'type'        => 'color-opacity',
	'default'     => '#ffffff',
	'livepreview' => '$(".top-header a").hover(function (e) {
		$(this).css("color", value);
		e.stopPropagation();
  	});;'
) );

$header->createOption( array(
	'name'    => __( 'Left toolbar (width)', 'mabu' ),
	'id'      => 'width_left_top',
	'type'    => 'number',
	'default' => '50',
	'max'     => '100',
	'min'     => '0',
	'step'    => '8.33333333333',
	'desc'    => 'Left toolbar (width %)',
	'livepreview' => '$(".top-left").css("width", value +"%");
			$(".top-right").css("width", ( 100 - value ) +"%")'
) );