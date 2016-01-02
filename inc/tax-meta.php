<?php
require_once get_template_directory() . '/framework/libs/tax-meta-class/Tax-meta-class.php';
if ( is_admin() ) {
	/*
	   * prefix of meta keys, optional
	   */
	$prefix = 'thim_';
	/*
	   * configure your meta box
	   */
	$config = array(
		'id'             => 'category_meta_box',
		// meta box id, unique per meta box
		'title'          => 'Category Meta Box',
		// meta box title
		'pages'          => array( 'category' ),
		// taxonomy name, accept categories, post_tag and custom taxonomies
		'context'        => 'normal',
		// where the meta box appear: normal (default), advanced, side; optional
		'fields'         => array(),
		// list of meta fields (can be added by field arrays)
		'local_images'   => false,
		// Use local or hosted images (meta box images for add/remove)
		'use_with_theme' => false
		//change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
	);

	$my_meta          = new Tax_Meta_Class( $config );
	/*
   * Add fields to your meta box
   */
	$my_meta->addSelect( $prefix . 'layout', array(
		''              => 'Using in Theme Option',
		'full-content'    => 'No Sidebar',
		'sidebar-left'  => 'Left Sidebar',
		'sidebar-right' => 'Right Sidebar'
	),array( 'name' => __( 'Custom Layout ', 'mabu' ), 'std' => array( '' ) ) );

	$my_meta->addSelect( $prefix . 'custom_heading', array(
		''       => 'Using in Theme Option',
		'custom' => 'Custom',
	),array( 'name' => __( 'Custom Heading ', 'mabu' ), 'std' => array( '' ) ) );

	$my_meta->addImage( $prefix . 'archive_top_image', array( 'name' => __( 'Background images Heading', 'mabu' ) ) );
	$my_meta->addColor( $prefix . 'archive_cate_heading_bg_color', array( 'name' => __( 'Background Color Heading', 'mabu' ) ) );
	$my_meta->addColor( $prefix . 'archive_cate_heading_text_color', array( 'name' => __( 'Text Color Heading', 'mabu' ) ) );
	$my_meta->addCheckbox( $prefix . 'archive_cate_hide_title', array( 'name' => __( 'Hide Title', 'mabu' ) ) );
	$my_meta->Finish();



	/**
	 * Custom Woocommerce Category Meta
	 */

	$thim_wc_config = array(
		'id' 				=> 'woocommerce_meta_box', 
		'title'				=> 'Product Meta Box',
		'pages'				=> array('product_cat'),
		'context'			=> 'normal',
		'fields'			=> array(),
		'local_images'		=> false,
		'use_with_theme'	=> false
	);

	$thim_wc_meta = new Tax_Meta_Class($thim_wc_config);

	$thim_wc_meta->addCheckbox(
		$prefix.'category_show_related_products',
		array(
			'name'	=> __('Hide Related ','mabu'),
			'desc'	=> __('Hide related products in single product','mabu'),
		)
	);

	$thim_wc_meta->addSelect( $prefix . 'category_custom_columns', array(
		'default'   => 'Default',
		1 			=> '1',
		2 			=> '2',
		3 			=> '3',
		4 			=> '4',
		5 			=> '5',
		6 			=> '6',
		7 			=> '7',
		8 			=> '8',
		9 			=> '9',
		10 			=> '10'
	),array( 'name' => __( 'Custom columns', 'mabu' ), 'std' => array( 'default' ) ) );


	$thim_wc_meta->addtext(
		$prefix.'category_products_per_page',
		array( 'name' => __( 'Number of Products per Page', 'mabu' ), 'std' => '' )
	);

	$thim_wc_meta->Finish();

}
