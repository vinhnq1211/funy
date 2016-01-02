<div class="thim-widget-copyright-text text-<?php echo esc_attr($instance['text_align']); ?>">
	<?php
	global $theme_options_data;
		if ( isset( $theme_options_data['thim_copyright_text'] ) ) {
			echo '<p class="text-copyright">' . $theme_options_data['thim_copyright_text'] . '</p>';
		}
	?>
</div>