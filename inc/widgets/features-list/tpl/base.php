<?php
/**
 * Created by Khoapq
 * Created date: 1/10/2015
 */
$col = 12/$instance['per_row'];
$data = array();
$features_id = 'features_'.uniqid();
?>
<div id="<?php echo esc_attr($features_id); ?>" class="thim-features-list <?php echo esc_attr($instance['style']); ?>">
	<?php if (isset($instance['features'])): ?>
	<div class="row list_features">
		<?php
			$html = '';
			switch ($instance['style']) {
				case 'style2':
					foreach ($instance['features'] as $key => $feature) {
						$css 	= ($key < $instance['display_items']) ? ' show' : ' added';
						$image 	= '';
						$src 	= wp_get_attachment_image_src( $feature['image'], $feature['image_size'] );
						if ( $src) {
							$images_size = @getimagesize( $src['0'] );
							$image       = '<img src ="' . $src['0'] . '" ' . $images_size['3'] . ' alt=""/>';
						}
							$item = '';
							$item .= '<div class="item col-sm-'.$col.$css.'">';
							$item .= '	<div class="row item-inner text-center">';

							
							$item .= '		<div class="col-sm-12 right">';
							$item .= '			<div class="content">';
							$item .= '				<div class="title">'.$feature['title'].'</div>';
							$item .= '				<div class="description">'.$feature['text'].'</div>';
							$item .= '			</div>';
							$item .= '		</div>';

							if ($image != ''){
								$item .= '		<div class="col-sm-12 left"><div class="image">'.$image.'</div></div>';
							}elseif( $feature['icon'] != ''){
								$item .= '		<div class="col-sm-12 left"><div class="icon">'.$feature['icon'].'</div></div>';
							}

							$item .= '	</div>';
							$item .= '</div>';

						if ($key < $instance['display_items']){
							$html .= $item;
						}else{
							$showmore .= $item;
						}
					}
					break;
				
				default:
					foreach ($instance['features'] as $key => $feature) {
						$item_first =  ($key % $instance['per_row']) == 0 ? ' first' : '';
						$css 	= ($key < $instance['display_items']) ? ' show' : ' added';
						$image 	= '';
						$src 	= wp_get_attachment_image_src( $feature['image'], $feature['image_size'] );
						if ( $src) {
							$images_size = @getimagesize( $src['0'] );
							$image       = '<img src ="' . $src['0'] . '" ' . $images_size['3'] . ' alt=""/>';
						}
							$item_content_col = 12;
							$item = '';
							$item .= '<div class="item col-sm-'.$col.$css.$item_first.'">';
							$item .= '	<div class="row item-inner">';

							if ($image != ''){
								$item .= '		<div class="col-sm-3 left"><div class="image">'.$image.'</div></div>';
								$item_content_col = 9;
							}elseif( $feature['icon'] != ''){
								$item .= '		<div class="col-sm-2 left"><div class="icon">'.$feature['icon'].'</div></div>';
								$item_content_col = 10;
							}
							$item .= '		<div class="col-sm-'.$item_content_col.' right">';
							$item .= '			<div class="content">';
							$item .= '				<div class="title">'.$feature['title'].'</div>';
							$item .= '				<div class="description">'.$feature['text'].'</div>';
							$item .= '			</div>';
							$item .= '		</div>';

							$item .= '	</div>';
							$item .= '</div>';

						if ($key < $instance['display_items']){
							$html .= $item;
						}else{
							$showmore .= $item;
						}
					}
					break;
			}
			
		?>
		<?php echo ent2ncr($html); ?>
	</div>

		<?php if (sizeof($instance['features']) > $instance['display_items']): ?>
			<div class="show-more">
				<a href="" class="btn-show-more" data-id="<?php echo esc_attr($features_id); ?>" data-showmore="<?php echo esc_html($showmore); ?>"><?php _e('Show More', 'mabu'); ?></a>
			</div>
		<?php endif; ?>
	<?php endif; ?>
</div>