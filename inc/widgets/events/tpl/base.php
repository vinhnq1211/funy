<?php

$number	= $instance['number'] ? $instance['number'] : 3;
$col 	= 12 / ( $instance['column'] ? $instance['column'] : 3 );

$event_args = array(
	'post_type'              => array( 'tp_event' ),
	'posts_per_page'         => $number,
	'order'                  => 'DESC',
);

$events = new WP_Query( $event_args );
?>

<div class="thim-events">
	<div class="list row">
		<?php 
		$html = '';
			if ($events->have_posts()) { 
				while ( $events->have_posts() ) {
					$events->the_post();
					$src = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
					$img_src = aq_resize( $src[0], 370, 276, true ); 

					$html .= '<div class="event col-sm-'.$col.'">';
					$html .= '	<div class="inner">';
					$html .= '		<div class="media">';
					$html .= '			<img src="'.esc_attr($img_src).' ">';
					$html .= '		</div>';
					$html .= '		<div class="content">';
					$html .= '			<h3 class="title"><a href="'.esc_url( get_permalink( get_the_ID() ) ).'">'. get_the_title().'</a></h3>';
					$html .= '			<div class="date"><i class="fa fa-calendar"></i> '.get_the_date().'</div>';
					$html .= '		</div>';
					$html .= '	</div>';
					$html .= '</div>';
				}
			}
		echo ent2ncr($html);
		?>
	</div>

	<div class="archive-link">
		<div class="thim-button text-center style4">
			<a href="<?php echo esc_url(get_post_type_archive_link('tp_event')); ?>" class="inner">View All Events</a>
		</div>
	</div>
</div>
<?php wp_reset_postdata(); ?>