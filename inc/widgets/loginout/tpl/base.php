<div class="thim-loginout">
	<?php if (is_user_logged_in()): ?>
		<a href="<?php echo esc_url(wp_logout_url( $_SERVER['REQUEST_URI'] )); ?>"><?php _e('Log out','mabu') ?></a>
	<?php else: ?>
		<?php
		 	$login_url = wp_login_url($_SERVER['REQUEST_URI']);
			$myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
			if ( $myaccount_page_id ) {
			  $login_url = get_permalink( $myaccount_page_id );
			}
			echo '<a href="'.$login_url.'" title="Login">'.__('Log in', 'mabu').'</a>';
		?>
	<?php endif; ?>
</div>