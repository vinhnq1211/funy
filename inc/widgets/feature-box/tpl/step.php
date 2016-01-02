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

$uniqid = 'id_'.uniqid();
?>
<div class="thim-feature-box template-<?php echo esc_attr($instance['template']); ?>">
	<div class="row">
		<div class="col-sm-12">
			<?php echo ent2ncr($feature_title); ?>
			<?php echo ent2ncr($feature_heading_2); ?>
			<?php echo ent2ncr($feature_content); ?>
		</div>
		<?php if ($img_id): ?>
				<?php 
					$html = '';
					foreach ($img_id as $key => $id) {
						$src = wp_get_attachment_image_src( $id, 'full' );
						if ( $src ) {
							$img_size = '';
							$src_size = @getimagesize( $src['0'] );
							$image    = '<div class="step-image"><img src ="' . esc_url( $src['0'] ) . '" ' . $src_size[3] . ' alt=""/></div>';
						}
						$html .= $image;
						break;
					}
					echo ent2ncr($html);
				?>
		<?php endif; ?>
	</div>
</div>