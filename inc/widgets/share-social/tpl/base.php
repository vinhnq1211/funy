<div class="thim-share-social">
<?php
	if ( $instance['title'] ) {
		echo '<div class="widget-title">'.ent2ncr(esc_attr( $instance['title'] )).'</div>';
	}
	echo '<ul class="share-buttons">';
		if ( $instance['facebook'] == '1' ) {
			echo '<li><a target="_blank" class="facebook" href="http://www.facebook.com/sharer/sharer.php?u='.esc_url(get_the_permalink()).'"><i class="fa fa-facebook"></i></a></li>';
		}
		if ( $instance['twitter'] == '1' ) {
			echo '<li><a target="_blank" class="twitter" href="http://twitter.com/intent/tweet/?url='.esc_url(get_the_permalink()).'&amp;text='.urlencode(get_the_title()).'"><i class="fa fa-twitter"></i></a></li>';
		}
		if ( $instance['google'] == '1' ) {
			echo '<li><a target="_blank" class="google" href="https://plus.google.com/share?url=' . urlencode( get_permalink() ) . '&amp;title=' . esc_attr( get_the_title() ) . '" title="' . __( 'Google Plus', 'mabu' ) . '" ><i class="fa fa-google"></i></a></li>';
		}
	echo '</ul>';
?>
</div>
