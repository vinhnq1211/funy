<?php
/**
 * Created by Khoapq
 * Created date: 19/10/2015
 */

$number = $instance['number_posts'] ? $instance['number_posts'] : 4;

$doc_args = array(
	'post_type'      => 'wpdoc',
	'posts_per_page' => (int)$number,
	'order'          => $instance['order']
);

if ($instance['doc_cat'] != 'all'){
	$doc_args['doc-category'] = $instance['doc_cat'];
}

switch ( $instance['orderby'] ) {
	case 'recent' :
		$doc_args['orderby'] = 'post_date';
		break;
	case 'title' :
		$doc_args['orderby'] = 'post_title';
		break;
	default : //random
		$doc_args['orderby'] = 'rand';
}

$docs = new WP_Query( $doc_args );
?>
<div class="thim-document-list">
	<div class="info-box">
		<div class="image">
			<?php 
				$src = wp_get_attachment_image_src( $instance['image'], 'full' );
				$img_src = aq_resize( $src[0], 50, 50, true ); 
			?>
			<img src="<?php echo esc_attr($img_src); ?>" alt="" />
		</div>
		<div class="info-content">
			<h3 class="title"><?php echo esc_attr($instance['title']); ?></h3>
			<p class="description"><?php echo esc_attr($instance['description']); ?></p>
		</div>
	</div>

	<!-- Start: List docs -->
	<div class="docs">
		<?php 
		$html = '';
		if ($docs->have_posts()) { 
			while ( $docs->have_posts() ) {
				$docs->the_post();
				$post_meta = get_post_meta( get_the_ID(), 'wpdoc_meta', true );
				$html .= '<div class="doc">';
				$html .= '<a href="'.esc_url( get_permalink( get_the_ID() ) ).'" class="title">'.get_the_title().'</a>';
				$html .= '<div class="description">'.$post_meta['sub_title'].'</div>';
				$html .= '</div>';
			}
		}else{
			$html .= __('No Document', 'mabu');
		} 

		echo ent2ncr($html);
		?>

	</div>
	<!-- End: List docs -->
</div>
<?php wp_reset_postdata(); ?>