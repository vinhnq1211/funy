<?php

$link         = $regency = '';
$limit        = $instance['number'] ? $instance['number'] : 10;
$item_visible = $instance['item_visible']  ? $instance['item_visible'] : 5;
$mousewheel   = $instance['mousewheel'] ? 1 : 0;

$s3_args = array(
	'post_type'      => 'testimonials',
	'posts_per_page' => $limit,
	'ignore_sticky_posts' => true
);

$style3_testimonial = new WP_Query( $s3_args );

$module_id = uniqid();
$html = '<div class="thim-testimonial-slider">';
$html .= '<span class="before-slider"></span>';
if ( $style3_testimonial->have_posts() ) {
	$html .= '<div id="'.$module_id.'" class="testimonial-slider" data-visible="' . $item_visible . '" data-mousewheel="' . $mousewheel . '">';
	while ( $style3_testimonial->have_posts() ) : $style3_testimonial->the_post();
		$link    = get_post_meta( get_the_ID(), 'website_url', true );
		$regency = get_post_meta( get_the_ID(), 'regency', true );

		$html .= '<div class="item">';
		if ( has_post_thumbnail() ) {
			$html .= '<div class="image">';
										$src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
										$img_src = aq_resize( $src[0], 100, 100, true ); 
			$html .= '<img src="'.esc_attr($img_src).'" alt="'.get_the_title().'" title="'.get_the_title().'" />';
			$html .= '</div>';
		}
		$html .= '<div class="content">';
		if ( $link <> '' ) {
			$html .= '<h3 class="title"><a href="' . $link . '">' . get_the_title() . '</a></h3>';
		} else {
			$html .= '<h3 class="title">' . get_the_title() . '</h3>';
		}
		$html .= '<div class="regency">' . esc_attr( $regency ) . '</div>';
		$html .= '<div class="description">' . get_the_content() . '</div>';
		$html .= '</div></div>';

	endwhile;
	$html .= '</div>';
}
$html .= '</div>';
echo ent2ncr( $html );

wp_reset_postdata();
?>

<script>
	(function($){
		$(document).ready(function(){
			$('#<?php echo esc_attr($module_id); ?>').each(function () {
			   var 	elem 			= $(this),
			    	item_visible 	= parseInt(elem.data('visible')),
			    	autoplay 		= elem.data('autoplay') ? true : false,
		    		mousewheel 		= elem.data('mousewheel') ? true : false;
			   var 	testimonial_slider = $(this).thimContentSlider({
					    items            : elem,
					    itemsVisible     : item_visible,
					    mouseWheel       : mousewheel,
					    autoPlay         : autoplay,
					    itemMaxWidth     : 100,
					    itemMinWidth     : 100,
					    activeItemRatio  : 1.18,
					    activeItemPadding: 0,
					    itemPadding      : 15
			   		});
			});
		});
	})(jQuery);
</script>


