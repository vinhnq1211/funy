<?php
$image = $css_animation =  $style_width = '';
if ( $instance['image'] ): 
		$img_id = explode( ",", $instance['image'] );
		$css_animation = $instance['css_animation'];
		$css_animation = thim_getCSSAnimation( $css_animation );
	?>
	<div class="thim-roundslider <?php echo esc_attr( $css_animation ); ?>">
		<ul class="sliders">
			<?php 
			$i = 0;
			foreach ($img_id as $key => $id) {
				$src = wp_get_attachment_image_src( $id, $instance['image_size'] );
				if ( $src ) {
					$img_size = '';
					$src_size = @getimagesize( $src['0'] );
					$image    = '<img src ="' . esc_url( $src['0'] ) . '" ' . $src_size[3] . ' alt=""/>';
				}
				echo '<li class="slider">'.$image.'</li>';
				$i++;
			}
			?>
		</ul>
		<div class="control-wrapper">
			<ul class="controls">
				<?php 
					foreach ($img_id as $key => $id) {
						echo '<li class="control"></li>';
					}
				?>
			</ul>
		</div>
	</div>
			
<?php endif; ?>
