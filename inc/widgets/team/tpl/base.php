<?php
/**
 * Created by Khoapq
 * Created date: 06/10/2015
 */
$col = 12/$instance['per_row'];
$data = array();
$number = $instance['number'] ? $instance['number'] : 4;
$team_args = array(
	'post_type'      => 'our_team',
	'posts_per_page' => (int)$number
);
$members = new WP_Query( $team_args );
$html = '';
if ( $members->have_posts() ): ?>
	<div class="thim-our-team">
		<div class="row members">
		<?php 	
		$i = 0;
			while ( $members->have_posts() ): 
				$i++;
				$members->the_post();
				$regency = get_post_meta( get_the_ID(), 'regency', true );
				$show_social = false;
				if ($regency != '') {
				 	$regency = '<div class="regency">'.$regency.'</div>';
				 	$show_social = true;
				}
				$face_url 	= get_post_meta( get_the_ID(), 'face_url', true );
				if ($face_url != '') {
				 	$face_url = '<li><a href="'.$face_url.'"><i class="fa fa-facebook"></i></a></li>';
				 	$show_social = true;
				}
				$twitter_url 		= get_post_meta( get_the_ID(), 'twitter_url', true );
				if ($twitter_url != '') {
				 	$twitter_url = '<li><a href="'.$twitter_url.'"><i class="fa fa-twitter"></i></a></li>';
				 	$show_social = true;
				}
				$rss_url 			= get_post_meta( get_the_ID(), 'rss_url', true );
				if ($rss_url != '') {
				 	$rss_url = '<li><a href="'.$rss_url.'"><i class="fa fa-rss"></i></a></li>';
				 	$show_social = true;
				}
				$skype_url 			= get_post_meta( get_the_ID(), 'skype_url', true );
				if ($skype_url != '') {
				 	$skype_url = '<li><a href="'.$skype_url.'"><i class="fa fa-skype"></i></a></li>';
				 	$show_social = true;
				}
				$dribbble_url 		= get_post_meta( get_the_ID(), 'dribbble_url', true );
				if ($dribbble_url != '') {
				 	$dribbble_url = '<li><a href="'.$dribbble_url.'"><i class="fa fa-dribbble"></i></a></li>';
				 	$show_social = true;
				}
				$linkedin_url 		= get_post_meta( get_the_ID(), 'linkedin_url', true );
				if ($linkedin_url != '') {
				 	$linkedin_url = '<li><a href="'.$linkedin_url.'"><i class="fa fa-linkedin"></i></a></li>';
				 	$show_social = true;
				}
				$our_team_phone 	= get_post_meta( get_the_ID(), 'our_team_phone', true );
				if ($our_team_phone != '') {
				 	$our_team_phone = '<div class="phone"><i class="fa fa-phone"></i> '. $our_team_phone .'</div>';
				}
				$our_team_email 	= get_post_meta( get_the_ID(), 'our_team_email', true );
				if ($our_team_email != '') {
				 	$our_team_email = '<div class="email"><i class="fa fa-envelope"></i> '. $our_team_email .'</div>';
				}
				$html .= '<div class="member col-sm-'.$col.'">';
				$html .= '	<div class="inner">';
				if ( has_post_thumbnail() ) {
					$html .= '<div class="avatar-wrapper">';
					$html .= '<div class="avatar-inner">';
					$html .= feature_images( 200, 200 );
					$html .= '</div>';
					if ($show_social){
						$html .= '<div class="social"><ul>';
						$html .= $face_url;
						$html .= $twitter_url;
						$html .= $rss_url;
						$html .= $skype_url;
						$html .= $dribbble_url;
						$html .= $linkedin_url;
						$html .= '</ul></div>';
					}
					$html .= '</div>';
				}

				$html .= ' 		<div class="info">';
				$html .= '			<div class="name">'.the_title( ' ', ' ', false ).'</div>';
				$html .= $regency;
				$html .= $our_team_phone;
				$html .= $our_team_email;
				$html .= '		</div>';
				
				$html .= '	</div>';
				$html .= '</div>';
				if ($i % $instance['per_row'] == 0){
					$html .= '<div class="clearfix"></div>';
				}
			endwhile; 
			echo ent2ncr($html);
		?>
		</div>
	</div>
<?php endif; 

wp_reset_postdata();
?>
