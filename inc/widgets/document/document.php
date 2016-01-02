<?php
class Document_Widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'document',
			__( 'Thim: Document List', 'mabu' ),
			array(
				'description' => __( 'Add document list', 'mabu' ),
				'help'        => '',
				'panels_groups' => array('thim_widget_group')
			),
			array(),
			array(
				'title'        => array(
					'type'    => 'text',
					'label'   => __( 'Title', 'mabu' ),
					'default' => __( "Documents", 'mabu' )
				),

				'description'        => array(
					'type'    => 'text',
					'label'   => __( 'Description', 'mabu' ),
					'default' => ''
				),

				'image'        => array(
					'type'    => 'media',
					'label'   => __( 'Image', 'mabu' )
				),

				'doc_cat' => array(
					'type' 		=> 'select',
					'label'		=> __('Documentation Categories', 'mabu'),
					'default'	=> 'none',
					'options'	=> $this->thim_get_categories()
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

			),
			TP_THEME_DIR . 'inc/widgets/document/'
		);

		
	}


	function get_template_name( $instance ) {
		return 'base';
	}

	function get_style_name( $instance ) {
		return false;
	}

	// Get list category
    function thim_get_categories(){
    	$args = array(
		  'taxonomy' 	=> 'doc-category'
		 );
		$items = array();
		$items['all'] = 'All';
		$categories = get_categories( $args );
		if (isset($categories)) {
			foreach ($categories as $key => $cat) {
				$items[$cat -> slug] = $cat -> cat_name;
				$childrens = get_term_children($cat->term_id, $cat->taxonomy);
				if ($childrens){
					foreach ($childrens as $key => $children) {
						$child = get_term_by( 'id', $children, $cat->taxonomy);
						$items[$child->slug] = '--'.$child->name;

					}
				}
			}
		}
		return $items;
    }

}

function thim_document_register_widget() {
	register_widget( 'Document_Widget' );
}

add_action( 'widgets_init', 'thim_document_register_widget' );