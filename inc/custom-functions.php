<?php
function thim_hex2rgb( $hex ) {
	$hex = str_replace( "#", "", $hex );
	if ( strlen( $hex ) == 3 ) {
		$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
		$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
		$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
	} else {
		$r = hexdec( substr( $hex, 0, 2 ) );
		$g = hexdec( substr( $hex, 2, 2 ) );
		$b = hexdec( substr( $hex, 4, 2 ) );
	}
	$rgb = array( $r, $g, $b );

	return $rgb; // returns an array with the rgb values
}

function thim_getExtraClass( $el_class ) {
	$output = '';
	if ( $el_class != '' ) {
		$output = " " . str_replace( ".", "", $el_class );
	}

	return $output;
}

function thim_getCSSAnimation( $css_animation ) {
	$output = '';
	if ( $css_animation != '' ) {
		$output = ' wpb_animate_when_almost_visible wpb_' . $css_animation;
	}

	return $output;
}

function excerpt( $limit ) {
	$content = get_the_excerpt();
	$content = apply_filters( 'the_content', $content );
	$content = str_replace( ']]>', ']]&gt;', $content );
	$content = explode( ' ', $content, $limit );
	array_pop( $content );
	$content = implode( " ", $content );

	return $content;
}

/************ List Comment ***************/
if ( !function_exists( 'thim_comment' ) ) {
	function thim_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		//extract( $args, EXTR_SKIP );
		if ( 'div' == $args['style'] ) {
			$tag       = 'div';
			$add_below = 'comment';
		} else {
			$tag       = 'li';
			$add_below = 'div-comment';
		}
		?>
		<<?php echo ent2ncr( $tag ) ?> <?php comment_class( 'description_comment' ) ?> id="comment-<?php comment_ID() ?>">
		<div class="wrapper-comment">
			<?php
			if ( $args['avatar_size'] != 0 ) {
				echo get_avatar( $comment, $args['avatar_size'] );
			}
			?>
			<div class="comment-right">
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'mabu' ) ?></em>
				<?php endif; ?>

				<div class="comment-extra-info">
					<div class="author"><?php printf( __( '<span class="author-name">%s</span>', 'mabu' ), get_comment_author_link() ) ?></div>
					<div class="date">
						<?php printf( get_comment_date(), get_comment_time() ) ?></div>
					<?php edit_comment_link( __( 'Edit', 'mabu' ), '', '' ); ?>

					<?php comment_reply_link( array_merge( $args, array(
						'add_below' => $add_below,
						'depth'     => $depth,
						'max_depth' => $args['max_depth']
					) ) ) ?>
				</div>

				<div class="content-comment">
					<?php comment_text() ?>
				</div>
			</div>
		</div>
	<?php
	}
}
/************end list comment************/
/********************************************************************
 * Get image attach
 ********************************************************************/
function feature_images( $width, $height ) {
	global $post;
	if ( has_post_thumbnail() ) {
		$get_thumbnail = simplexml_load_string( get_the_post_thumbnail( $post->ID, 'full' ) );
		$thumbnail_src = $get_thumbnail->attributes()->src;
		$img_url       = $thumbnail_src;
		$data          = @getimagesize( $img_url );
		$width_data    = $data[0];
		$height_data   = $data[1];
		if ( !( $width_data > $width ) && !( $height_data > $height ) ) {
			return '<img src="' . $img_url[0] . '" alt= "' . get_the_title() . '" title = "' . get_the_title() . '" />';
		} else {
			$crop       = ( $height_data < $height ) ? false : true;
			$image_crop = aq_resize( $img_url[0], $width, $height, $crop );

			return '<img src="' . $image_crop . '" alt= "' . get_the_title() . '" title = "' . get_the_title() . '" />';
		}
	}
}

#remove field in Display settings
require TP_THEME_DIR . 'inc/wrapper-before-after.php';

add_filter( 'thim_mtb_setting_after_created', 'thim_mtb_setting_after_created', 10, 2 );
function thim_mtb_setting_after_created( $mtb_setting ) {
	$mtb_setting->removeOption( array( 6,11 ) );

	$settings = array(
		'name' => __( 'No Padding Content', 'mabu' ),
		'id'   => 'mtb_no_padding',
		'type' => 'checkbox',
		'desc' => ' ',
	);

	$mtb_setting->insertOptionBefore( $settings, 15 );

	return $mtb_setting;
}

//thim_excerpt_length
function thim_excerpt_length() {
	global $theme_options_data;
	if ( isset( $theme_options_data['thim_archive_excerpt_length'] ) ) {
		$length = $theme_options_data['thim_archive_excerpt_length'];
	} else {
		$length = '50';
	}

	return $length;
}

add_filter( 'excerpt_length', 'thim_excerpt_length', 999 );
function thim_wp_new_excerpt( $text ) {
	if ( $text == '' ) {
		$text           = get_the_content( '' );
		$text           = strip_shortcodes( $text );
		$text           = apply_filters( 'the_content', $text );
		$text           = str_replace( ']]>', ']]>', $text );
		$text           = strip_tags( $text );
		$text           = nl2br( $text );
		$excerpt_length = apply_filters( 'excerpt_length', 55 );
		$words          = explode( ' ', $text, $excerpt_length + 1 );
		if ( count( $words ) > $excerpt_length ) {
			array_pop( $words );
			array_push( $words, '' );
			$text = implode( ' ', $words );
		}
	}

	return $text;
}

remove_filter( 'get_the_excerpt', 'wp_trim_excerpt' );
add_filter( 'get_the_excerpt', 'thim_wp_new_excerpt' );

function post_share() {
	global $theme_options_data;
	if ( is_singular('post')) {
		if ( (isset($theme_options_data['thim_archive_sharing_facebook']) && $theme_options_data['thim_archive_sharing_facebook'] == 1) ||
			(isset($theme_options_data['thim_archive_sharing_twitter']) && $theme_options_data['thim_archive_sharing_twitter'] == 1 )||
			(isset($theme_options_data['thim_archive_sharing_pinterest'])&& $theme_options_data['thim_archive_sharing_pinterest']) == 1 ||
			(isset($theme_options_data['thim_archive_sharing_google'])&& $theme_options_data['thim_archive_sharing_google']) == 1
		) {
			echo '<ul class="social-share">';
			if ( $theme_options_data['thim_archive_sharing_facebook'] == 1 ) {

				echo 	'<li>
							<div id="fb-root"></div>
							<script>(function(d, s, id) {
							  var js, fjs = d.getElementsByTagName(s)[0];
							  if (d.getElementById(id)) return;
							  js = d.createElement(s); js.id = id;
							  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
							  fjs.parentNode.insertBefore(js, fjs);
							}(document, \'script\', \'facebook-jssdk\'));</script>
							<div class="fb-like" data-href="'.get_permalink().'" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>
						</li>';
			}
			if ( $theme_options_data['thim_archive_sharing_google'] == 1 ) {
				echo 	'<li>
							<script src="https://apis.google.com/js/platform.js" async defer></script>
							<g:plusone></g:plusone>
						</li>';
			}
			if ( $theme_options_data['thim_archive_sharing_twitter'] == 1 ) {
				echo 	'<li>
							<a href="'.esc_url(get_permalink()).'" class="twitter-share-button">Tweet</a>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+\'://platform.twitter.com/widgets.js\';fjs.parentNode.insertBefore(js,fjs);}}(document, \'script\', \'twitter-wjs\');</script>
						</li>';
			}
			
			if ( $theme_options_data['thim_archive_sharing_pinterest'] == 1 ) {
				echo 	'<li>
							<a data-pin-do="buttonBookmark" href="//www.pinterest.com/pin/create/button/"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_20.png" alt=""/></a>
							<script async defer src="//assets.pinterest.com/js/pinit.js"></script>
						</li>';
			}

			echo '</ul>';
	 	}
	}

}
add_action( 'social_share', 'post_share');



function thim_job_share() {
	global $theme_options_data;
	if (is_singular('job_listing')) {
		$html = '';
		if ( $theme_options_data['thim_job_single_sharing_facebook'] == 1 ||
			$theme_options_data['thim_job_single_sharing_twitter'] == 1 ||
			$theme_options_data['thim_job_single_sharing_google'] == 1
		) {
			$html .= '<div class="thim-share-social">';
			$html .= '<ul class="share-buttons">';
			if ( $theme_options_data['thim_job_single_sharing_facebook'] == 1 ) {
				$html .= '<li><a target="_blank" class="facebook" href="https://www.facebook.com/sharer.php?s=100&amp;p[title]=' . get_the_title() . '&amp;p[url]=' . urlencode( get_permalink() ) . '&amp;p[images][0]=' . urlencode( wp_get_attachment_url( get_post_thumbnail_id() ) ) . '" title="' . __( 'Facebook', 'mabu' ) . '"><i class="fa fa-facebook"></i></a></li>';
			}
			if ( $theme_options_data['thim_job_single_sharing_twitter'] == 1 ) {
				$html .= '<li><a target="_blank" class="twitter" href="https://twitter.com/share?url=' . urlencode( get_permalink() ) . '&amp;text=' . esc_attr( get_the_title() ) . '" title="' . __( 'Twitter', 'mabu' ) . '"><i class="fa fa-twitter"></i></a></li>';
			}
			if ( $theme_options_data['thim_job_single_sharing_google'] == 1 ) {
				$html .= '<li><a target="_blank" class="google" href="https://plus.google.com/share?url=' . urlencode( get_permalink() ) . '&amp;title=' . esc_attr( get_the_title() ) . '" title="' . __( 'Google Plus', 'mabu' ) . '" ><i class="fa fa-google"></i></a></li>';
			}
			$html .= '</ul>';
			$html .= '</div>';
		}
		echo ent2ncr($html);
	}
}




add_filter( 'wp_nav_menu_args', 'thim_select_main_menu' );
function thim_select_main_menu( $args ) {
	global $post;
	if ( $post ) {
		if ( get_post_meta( $post->ID, 'thim_select_menu_one_page', true ) != 'default' && ( $args['theme_location'] == 'primary' ) ) {
			$menu         = get_post_meta( $post->ID, 'thim_select_menu_one_page', true );
			$args['menu'] = $menu;
		}
	}
	return $args;
}

add_filter( 'wpcf7_support_html5_fallback', '__return_true' );


/**
* About the author
*/
function thim_about_author(){
	if (!is_singular('post')) {
		return;
	}
	?>
	<div class="thim-about-author">
		<div class="author-wrapper">
			<div class="author-avatar">
				<?php echo get_avatar(get_the_author_meta('email'),90); ?>
			</div>
			<div class="author-details">
				<div class="author-bio">
					<p class="name">
						<?php the_author_link(); ?>
						<?php if (get_the_author_meta('job')) : ?>
							<br/><span class="job"><i><?php echo get_the_author_meta('job'); ?></i></span>
						<?php endif; ?>
					</p>
					<p class="description"><?php echo get_the_author_meta('description'); ?></p>

					<?php if (get_the_author_meta('user_url')) : ?>
						<p class="url"><?php _e('Website: ','mabu'); ?><a href="<?php echo get_the_author_meta('user_url'); ?>" target="_blank"><?php echo get_the_author_meta('user_url'); ?></a></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php
}

add_action('thim_about_author', 'thim_about_author');


function thim_modify_contact_methods($profile_fields) {
	$profile_fields['job'] = 'Job';
	return $profile_fields;
}
add_filter('user_contactmethods', 'thim_modify_contact_methods');



/**
 * Enqueue scripts and styles.
 */
function thim_add_scripts() {
	wp_enqueue_script( 'thim-roundslider-js', TP_THEME_URI . 'js/jquery.roundabout.min.js', array(), '', true );
	wp_enqueue_script( 'thim-funktube-js', TP_THEME_URI . 'js/jquery.funktube.js', array(), '', true );
}
add_action( 'wp_enqueue_scripts', 'thim_add_scripts' );



/**
* Remove Emoji scripts
*/
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


/**
* Optimize script files
*/
function thim_optimize_scripts() {
 global $wp_scripts;
 if ( !is_a( $wp_scripts, 'WP_Scripts' ) )
  return;
 foreach ( $wp_scripts->registered as $handle => $script ) {
  $wp_scripts->registered[$handle]->ver = null;
 }
}
add_action( 'wp_print_scripts', 'thim_optimize_scripts', 999 );
add_action( 'wp_print_footer_scripts', 'thim_optimize_scripts', 999 );
/**
* Optimize style files
*/
function thim_optimize_styles() {
 global $wp_styles;
 if ( !is_a( $wp_styles, 'WP_Styles' ) )
  return;
 foreach ( $wp_styles->registered as $handle => $style ) {
  $wp_styles->registered[$handle]->ver = null;
 }
}
add_action( 'admin_print_styles', 'thim_optimize_styles', 999 );
add_action( 'wp_print_styles', 'thim_optimize_styles', 999 );