<?php
class Thim_List_Job_Widget extends Thim_Widget {
	function __construct() {

		parent::__construct(
			'list-job',
			__( 'Thim: List Jobs', 'mabu' ),
			array(
				'description'   => __( 'Show list job by category', 'mabu' ),
				'help'          => '',
				'panels_groups' => array( 'thim_widget_group' ),

			),
			array(),
			array(
				'title'        => array(
					'type'    => 'text',
					'label'   => __( 'Title', 'mabu' ),
					'default' => __( "Jobs", 'mabu' ),
				),

				'cat_id' => array(
					'type' 		=> 'select',
					'label'		=> __('Select Categories', 'mabu'),
					'default'	=> 'none',
					'options'	=> $this->thim_get_categories(),
				),

				'orderby'      => array(
					"type"    => "select",
					"label"   => __( "Order by", 'mabu' ),
					"options" => array(
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

				'number_posts' => array(
					'type'    => 'number',
					'label'   => __( 'Number Job', 'mabu' ),
					'default' => '4',
				),


				'description'      => array(
					"type"    => "select",
					"label"   => __( "Display Description", 'mabu' ),
					"options" => array(
						true  => __( "Yes", 'mabu' ),
						false   => __( "No", 'mabu' ),
					),
				),

			),
			TP_THEME_DIR . 'inc/widgets/list-job/'
		);
	}

	/**
	 * Initialize the CTA widget
	 */

	function get_template_name( $instance ) {
		return 'base';
	}

	function get_style_name( $instance ) {
		return false;
	}


    // Get list category
    function thim_get_categories(){
    	$args = array(
		  'taxonomy' 	=> 'job_listing_category'
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

function thim_list_job_register_widget() {
	register_widget( 'Thim_List_Job_Widget' );
}

add_action( 'widgets_init', 'thim_list_job_register_widget' );