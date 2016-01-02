<?php
$thim_animation = $des = $html = $css = $subtitle = $line_heading = $class = $no_title = '';
$thim_animation .= thim_getCSSAnimation( $instance['css_animation'] );
$sub_css = '';
if ( $instance['textcolor'] ) {
	$css .= $sub_css .= 'color:' . $instance['textcolor'] . ';';
}

if ( $instance['font_heading'] == 'custom' ) {
	if ( $instance['custom_font_heading']['custom_font_size'] <> '' ) {
		$css .= 'font-size:' . $instance['custom_font_heading']['custom_font_size'] . 'px;';
	}
	if ( $instance['custom_font_heading']['custom_font_weight'] <> '' ) {
		$css .= 'font-weight:' . $instance['custom_font_heading']['custom_font_weight'] . ';';
	}
	if ( $instance['custom_font_heading']['custom_font_style'] <> '' ) {
		$css .= 'font-style:' . $instance['custom_font_heading']['custom_font_style'] . ';';
	}
}

if ( $css ) {
	$css = ' style="' . $css . '"';
}

if ( $instance['line'] ) {
	$line_heading = '<span class="line-heading"></span>';
	$class        = ' wrapper-line-heading';
}
if ( $instance['title'] ){
	$title = '<' . $instance['size'] . $css . ' class="heading__primary' . $class . '">' . $instance['title'] . '</' . $instance['size'] . '>';
}else{
	$no_title = ' no-title';
}
if ( $instance['sub-title'] ) {
	$subtitle = '<p class="heading__secondary" style="'.$sub_css.'">' . $instance['sub-title'] . '</p>';
}
$heading_padding = '';
if ( $instance['heading_padding'] != '') {
	$heading_padding = 'padding: '.$instance['heading_padding'];
}
$align = $instance['align'] ? $instance['align'] : 'center';
echo '<div class="thim-heading text-'.$align.'">';
echo '<div class="sc-heading article_heading' . $thim_animation . $no_title .' " style="'.$heading_padding.';">';
echo ent2ncr($line_heading);
echo ent2ncr($title);
echo '</div>';
echo ent2ncr($subtitle);
echo '</div>';

