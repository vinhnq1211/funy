<?php
global $product, $woocommerce;
$title = $instance['title'] ? $instance['title'] : get_the_title();
$description = $instance['description'] ? $instance['description'] : get_the_excerpt();
$price = '<span class="symbol">'.get_woocommerce_currency_symbol().'</span>'.$product->get_price();
?>
<div class="thim-woo-box">
	<div class="row">
		<div class="col-sm-6">
			<div class="media">
				<?php 
				if ($instance['image']) :
						$src   = wp_get_attachment_image_src( $instance['image'], 'full' );
						if ( $src) {
							$images_size = @getimagesize( $src['0'] );
							echo '<img src ="' . $src['0'] . '" ' . $images_size['3'] . ' alt=""/>';
						}
				endif;
				?>
				<div class="price">
					<?php echo ent2ncr($price); ?>
				</div>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="content">
				<h3 class="title"><?php echo ent2ncr($title); ?></h3>
				<div class="description"><?php echo ent2ncr($description); ?></div>
				<div class="buttons">
					<?php echo do_shortcode('[add_to_cart id="'.$product->id.'" show_price="false" style=""]');?>
				</div>
			</div>
		</div>
	</div>
</div>