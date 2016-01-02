<?php

class Thim_List_Post_Widget extends Thim_Widget {
	function __construct() {

		$list_image_size = $this->get_image_sizes();
		$image_size = array();
		$image_size['none'] = __("No Image", 'mabu');
		if(is_array($list_image_size) && !empty($list_image_size)){
			foreach( $list_image_size as $key=>$value){
				if($value['width'] && $value['height']){
					$image_size[$key] = $value['width'].'x'.$value['height']; 
				}else{
					$image_size[$key] = $key;
				}
			}
		}

		parent::__construct(
			'list-post',
			__( 'Thim: List Posts', 'mabu' ),
			array(
				'description'   => __( 'Show Post', 'mabu' ),
				'help'          => '',
				'panels_groups' => array( 'thim_widget_group' ),

			),
			array(),
			array(
				'title'        => array(
					'type'    => 'text',
					'label'   => __( 'Title', 'mabu' ),
					'default' => __( "From Blog", 'mabu' )
				),

				'h'      => array(
					"type"    => "select",
					"label"   => __( "Title heading", 'mabu' ),
					'default' => 'h3',
					"options" => array(
						"h1" => __( "H1", 'mabu' ),
						"h2" => __( "H2", 'mabu' ),
						"h3" => __( "H3", 'mabu' ),
						"h4" => __( "H4", 'mabu' ),
						"h5" => __( "H5", 'mabu' ),
						"h6" => __( "H6", 'mabu' ),
					),
				),

				'cat_id' => array(
					'type' 		=> 'select',
					'label'		=> __('Select Categories', 'mabu'),
					'default'	=> 'none',
					'options'	=> $this->thim_get_categories()
				),

				'link_cat'      => array(
					"type"    => "select",
					"label"   => __( "Display link to Category", 'mabu' ),
					"options" => array(
						"yes" => __( "Yes", 'mabu' ),
						"no"  => __( "No", 'mabu' )
					),
				),

				'number_posts' => array(
					'type'    => 'number',
					'label'   => __( 'Number Post', 'mabu' ),
					'default' => '4'
				),

				'orderby'      => array(
					"type"    => "select",
					"label"   => __( "Order by", 'mabu' ),
					"options" => array(
						"popular" => __( "Popular", 'mabu' ),
						"recent"  => __( "Recent", 'mabu' ),
						"title"   => __( "Title", 'mabu' ),
						"random"  => __( "Random", 'mabu' ),
					),
				),

				'order'        => array(
					"type"    => "select",
					"label"   => __( "Order by", 'mabu' ),
					"options" => array(
						"asc"  => __( "ASC", 'mabu' ),
						"desc" => __( "DESC", 'mabu' )
					),
				),

				'image_size' => array(
					'type'    => 'select',
					'label'   => __( 'Select Image Size', 'mabu' ),
					'default' => 'none',
					'options' => $image_size,
				),

				'style' => array(
					'type'    => 'select',
					'label'   => __( 'Style', 'mabu' ),
					'default' => 'default',
					'options' => array(
						'default'	=> __('Default','mabu'),
						'style2'	=> __('Style 2','mabu'),
					)
				),

				'date' => array(
					'type'    => 'select',
					'label'   => __( 'Date', 'mabu' ),
					'default' => 'show',
					'options' => array(
						'show'	=> __('Show','mabu'),
						'hidden'	=> __('Hidden','mabu'),
					)
				),

				'comment' => array(
					'type'    => 'select',
					'label'   => __( 'Comment', 'mabu' ),
					'default' => 'show',
					'options' => array(
						'show'	=> __('Show','mabu'),
						'hidden'	=> __('Hidden','mabu'),
					)
				),

				'content' => array(
					'type'    => 'select',
					'label'   => __( 'Show Content', 'mabu' ),
					'default' => 'show',
					'options' => array(
						'show'	=> __('Show','mabu'),
						'hidden'	=> __('Hidden','mabu'),
					)
				),

				'readmore' => array(
					'type'    => 'select',
					'label'   => __( 'Read More', 'mabu' ),
					'default' => 'show',
					'options' => array(
						'show'	=> __('Show','mabu'),
						'hidden'	=> __('Hidden','mabu'),
					)
				),

				'tpl' => array(
					'type'    => 'select',
					'label'   => __( 'Templates', 'mabu' ),
					'default' => 'base',
					'options' => array(
						'base'	=> __('Default','mabu'),
						'simple'	=> __('Simple List','mabu'),
					)
				),

			),
			TP_THEME_DIR . 'inc/widgets/list-post/'
		);
	}

	/**
	 * Initialize the CTA widget
	 */

	function get_template_name( $instance ) {
		return $instance['tpl'] ? $instance['tpl'] : 'base';
	}

	function get_style_name( $instance ) {
		return false;
	}


	// list image size
    function get_image_sizes( $size = '' ) {

        global $_wp_additional_image_sizes;

        $sizes = array();
        $get_intermediate_image_sizes = get_intermediate_image_sizes();

        // Create the full array with sizes and crop info
        foreach( $get_intermediate_image_sizes as $_size ) {

                if ( in_array( $_size, array( 'thumbnail', 'medium', 'large' ) ) ) {

                        $sizes[ $_size ]['width'] = get_option( $_size . '_size_w' );
                        $sizes[ $_size ]['height'] = get_option( $_size . '_size_h' );
                        $sizes[ $_size ]['crop'] = (bool) get_option( $_size . '_crop' );

                } elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {

                        $sizes[ $_size ] = array(
                                'width' => $_wp_additional_image_sizes[ $_size ]['width'],
                                'height' => $_wp_additional_image_sizes[ $_size ]['height'],
                                'crop' =>  $_wp_additional_image_sizes[ $_size ]['crop']
                        );

                }

        }

        // Get only 1 size if found
        if ( $size ) {

                if( isset( $sizes[ $size ] ) ) {
                        return $sizes[ $size ];
                } else {
                        return false;
                }

        }

        return $sizes;
    }


    // Get list category
    function thim_get_categories(){
    	$args = array(
		  'orderby' 	=> 'id',
		  'parent' 		=> 0
		 );
		$items = array();
		$items['all'] = 'All';
		$categories = get_categories( $args );
		if (isset($categories)) {
			foreach ($categories as $key => $cat) {
				$items[$cat -> cat_ID] = $cat -> cat_name;
				$childrens = get_term_children($cat->term_id, $cat->taxonomy);
				if ($childrens){
					foreach ($childrens as $key => $children) {
						$child = get_term_by( 'id', $children, $cat->taxonomy);
						$items[$child->term_id] = '--'.$child->name;

					}
				}
			}
		}
		return $items;
    }
}

function list_post_register_widget() {
	register_widget( 'Thim_List_Post_Widget' );
}

add_action( 'widgets_init', 'list_post_register_widget' );