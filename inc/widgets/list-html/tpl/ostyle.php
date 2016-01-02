<div class="thim-list-html-wrapper <?php echo esc_attr($instance['template']); ?>">
	<h3 class="title-box"><?php echo esc_attr($instance['title']); ?></h3>
	<div class="list-html-content row">
		<?php 
		$html = '';
			foreach ($instance['list-html'] as $i => $item) {
				$html .= '<div class="col-sm-6 item">';
				$html .= '	<div class="inner">';
				if ($item['image']) {
					$html .= '		<div class="media">';
					$html .= '			<img src="'.wp_get_attachment_url( $item['image'] ).'">';
					$html .= '		</div>';
				}
				if ($item['content']!='') {
					$html .= '		<div class="content">';
					$html .= 			$item['content'];
					$html .= '		</div>';
				}
				$html .= '	</div>';
				$html .= '</div>';
			}
		echo ent2ncr($html);
		?>
		<div class="line-wrapper"><span class="line-top"></span><span class="text"><?php esc_html_e('or','mabu');?></span><span class="line-bottom"></span></div>
	</div>
</div>
