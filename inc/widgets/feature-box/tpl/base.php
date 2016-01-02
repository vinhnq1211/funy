<?php
$thim_animation = $instance['css_animation'];
$img_id = explode( ",", $instance['image'] );
$feature_title = '';
if ($instance['title']){
	$feature_title = '<h3 class="widget-title">'.$instance['title'].'</h3>';
}
$feature_heading_1 = '';
if ($instance['heading_1']){
	$feature_heading_1 = '<div class="feature-heading-1">'.$instance['heading_1'].'</div>';
}
$feature_heading_2 = '';
if ($instance['heading_2']){
	$feature_heading_2 = '<div class="feature-heading-2">'.$instance['heading_2'].'</div>';
}
$feature_content = '';
if ($instance['content']){
	$feature_content = '<div class="feature-content">'.$instance['content'].'</div>';
}
$feature_link = '';
if ($instance['link']){
	$feature_link = '<a class="feature-link" href="'.$instance['link'].'" target="'.$instance['link_target'].'">'.__('Learm More', 'mabu').'</a>';
}
$layout_float =  $instance['layout'] != 'center' ?  $instance['layout'] : 'none';
$col = !$img_id ? 12 : 6;
$uniqid = 'id_'.uniqid();
?>
<div class="thim-feature-box <?php echo esc_attr($layout_float); ?>">
	<div class="row">
		<div class="col-sm-<?php echo esc_attr($col); ?>" style="float: <?php echo esc_attr($layout_float); ?>">
			<?php echo ent2ncr($feature_title); ?>
			<?php echo ent2ncr($feature_heading_1); ?>
			<?php echo ent2ncr($feature_heading_2); ?>
			<?php echo ent2ncr($feature_content); ?>
			<?php echo ent2ncr($feature_link); ?>
		</div>
		<?php if ($img_id): ?>
			<div class="col-sm-6" style="float: <?php echo esc_attr($layout_float); ?>">
				<?php 
					$type_images = sizeof($img_id) == 1 ? 'single' : 'slider';
					$i = 0;
					$html = '';
					$html .= '<div class="images '.$type_images.' '.$thim_animation.'" id="'.$uniqid.'">';

					foreach ($img_id as $key => $id) {
						$src = wp_get_attachment_image_src( $id, 'full' );
						if ( $src ) {
							$img_size = '';
							$src_size = @getimagesize( $src['0'] );
							$active = ($i == 0) ? 'active' : '';
							$image    = '<div class="item '.$active.'"><div class="item-inner"><img src ="' . esc_url( $src['0'] ) . '" ' . $src_size[3] . ' alt=""/></div></div>';
						}
						$html .= $image;
						$i++;
					}
					$html .= '</div>';
					echo ent2ncr($html);
				?>
			</div>
		<?php endif; ?>
	</div>
</div>