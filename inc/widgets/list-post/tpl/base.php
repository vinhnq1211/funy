<?php
$number_posts = 2;
if ( $instance['number_posts'] <> '' ) {
	$number_posts = $instance['number_posts'];
}
$query_args = array(
	'posts_per_page' 	=> $number_posts,
	'order'          	=> $instance['order'] == 'asc' ? 'asc' : 'desc',
);
if ($instance['cat_id'] != 'all'){
	$query_args['cat'] = $instance['cat_id'];
}
switch ( $instance['orderby'] ) {
	case 'recent' :
		$query_args['orderby'] = 'post_date';
		break;
	case 'title' :
		$query_args['orderby'] = 'post_title';
		break;
	case 'popular' :
		$query_args['orderby'] = 'comment_count';
		break;
	default : //random
		$query_args['orderby'] = 'rand';
}

$posts_display = new WP_Query( $query_args );

if ( $posts_display->have_posts() ) { ?>
	<div class="thim-list-post-wrapper row <?php echo esc_attr($instance['style']); ?>">
		<div class="inner-list col-sm-12">
			<?php
			if ( $instance['title'] ) {
				echo '<' . $instance['h'] .' class="widget-title">' . $instance['title'] . '</' . $instance['h'] . '>';
			}
			echo '<div class="thim-list-posts">';
				while ( $posts_display->have_posts() ) {
					$posts_display->the_post();
					$class = 'item-post';
					?>
					<div <?php post_class( $class ); ?>>
						<div class="article-title-wrapper">
							<a href="<?php echo esc_url( get_permalink( get_the_ID() ) ) ?>" class="article-title"><?php echo esc_attr( get_the_title() ) ?></a>
							<?php if ( ($instance['date'] == 'show') || (comments_open() && $instance['comment'] == 'show') ): ?>
								<div class="post-info">
									<?php if ($instance['date'] == 'show') : ?>
									<span class="article-date"><?php echo get_the_date() ?></span>
									<?php endif; ?>
									<?php if (comments_open() && $instance['comment'] == 'show') : ?>
									<?php 
										$num_comments = get_comments_number(); 
										if ( $num_comments == 0 ) {
											$comments = __('0 comment', 'mabu');
										} elseif ( $num_comments > 1 ) {
											$comments = $num_comments . __(' comments' , 'mabu');
										} else {
											$comments = __('1 comment', 'mabu');
										}
										$write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
									?>
									<span class="article-comment"><?php echo ent2ncr($write_comments); ?></span>
									<?php endif; ?>
								</div>
							<?php endif; ?>
							<div class="article-inner row">
								<?php
								$col = 6;
								if ($instance['image_size'] == 'none') :
									$col = 12;
								else: ?>
									<div class="col-sm-6">
										<?php do_action( 'thim_entry_top', 'medium' ); ?>
									</div>
								<?php endif; ?>
								<div class="col-sm-<?php echo esc_attr($col); ?> content">
									<?php
									if ($instance['readmore'] == 'show'){
										the_content('Read More');
									}else{
										the_content('');
									}
									?>
								</div>
							</div>
						</div>
					</div>
				<?php
				}
			echo '</div>';
			?>
		</div>
	</div>
	<?php
	if ($instance['link_cat'] == 'yes' && $instance['cat_id'] != 'all') {
		echo '<div class="link-to-category"><a href="'.get_category_link($instance['cat_id']).'">'.__('View All Post', 'mabu' ).'</a></div>';
	}
	wp_reset_postdata();
}
?>