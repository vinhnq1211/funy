<?php
/**
 * Created by Khoapq
 * Created date: 19/10/2015
 */

$number = $instance['number_posts'] ? $instance['number_posts'] : 4;

$job_args = array(
	'post_type'      => 'job_listing',
	'posts_per_page' => (int)$number,
	'order'          => $instance['order']
);

if ($instance['cat_id'] != 'all'){
	$job_args['job_listing_category'] = $instance['cat_id'];
}

switch ( $instance['orderby'] ) {
	case 'recent' :
		$job_args['orderby'] = 'post_date';
		break;
	case 'title' :
		$job_args['orderby'] = 'post_title';
		break;
	default : //random
		$job_args['orderby'] = 'rand';
}

$jobs = new WP_Query( $job_args );
?>
<div class="thim-job-list">
	<h3 class="widget-title"><?php echo esc_attr($instance['title']); ?></h3>
	<!-- Start: List docs -->
	<div class="jobs">
		<?php 
		$post_id = get_the_ID();
		$html = '';
		if ($jobs->have_posts()) { 
			while ( $jobs->have_posts() ) {
				$jobs->the_post();
				$active = (is_single() && $post_id == get_the_ID()) ? 'active' : '';
				$html .= '<div class="job '.$active.'">';
				$html .= '<a href="'.esc_url( get_permalink( get_the_ID() ) ).'" class="title">'.get_the_title().'</a>';
				if ($instance['description']){
					$html .= '<div class="description">'.get_the_excerpt().'</div>';
				}
				$html .= '</div>';
			}
		}
		echo ent2ncr($html);
		?>
	</div>
	<!-- End: List jobs -->
</div>
<?php wp_reset_postdata(); ?>