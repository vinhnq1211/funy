<?php 
	$target = '_blank';
	$instance['target'] = (string) $instance['target'];
	if (isset($instance['target'])){
		if ($instance['target'] == '_self') {
			$target = '_self';
		}
	}
?>
<div class="thim-button <?php echo esc_attr($instance['style']); ?> text-<?php echo esc_attr($instance['align']); ?>">
	<a href="<?php echo esc_attr($instance['link']); ?>" class="inner size-<?php echo esc_attr($instance['size']); ?>" target="<?php echo esc_attr($target); ?>"><?php echo esc_attr($instance['text']); ?></a>
</div>