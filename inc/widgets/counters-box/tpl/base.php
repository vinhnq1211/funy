<?php
/**
 * Created by PhpStorm.
 * User: Anh Tuan
 * Date: 12/3/2014
 * Time: 9:55 AM
 */
$counters_value = $counters_label = $jugas_animation = $icon = $label = $counter_color = $border_color = '';
$jugas_animation .= thim_getCSSAnimation( $instance['css_animation'] );

if ( $instance['counters_label'] <> '' ) {
	$counters_label = $instance['counters_label'];
}

if ( $instance['border_color'] <> '' ) {
	$border_color = 'style="border-color:' . $instance['border_color'] . '"';
}

if ( $instance['counter_color'] <> '' ) {
	$counter_color = 'style="color:' . $instance['counter_color'] . '"';
}

$e = '';
if ( $instance['counters_value'] <> '' ) {
	$counters_value = (int)$instance['counters_value'];
	$length_number = (int)$instance['display_number'];
	if ($counters_value >= 1000 && strlen($counters_value) > $length_number){
		$mod = $counters_value % 1000;
		$counters_value = $counters_value/1000;
		$e = __('K', 'mabu');
		if ($mod){
			$e .= __('+', 'mabu');
		}
	}
	
}
if ( $instance['icon'] == '' ) {
	$instance['icon'] = 'none';
}
if ( $instance['icon'] != 'none' ) {
	$icon = '<i class="fa fa-' . $instance['icon'] . '"></i>';
}

echo '<div class="counter-box ' . $jugas_animation . '" ' . $counter_color . '>';
if ( $icon ) {
	echo '<div class="icon-counter-box" ' . $border_color . '>' . $icon . '</div>';
}
if ( $counters_label != '' ) {
	$label = '<span class="counter-box-content">' . $counters_label . '</span>';
}
if ( $counters_value != '' ) {
	echo '<div class="content-box-percentage">
			<div class="counter-number"><span class="display-percentage" data-percentage="' . $counters_value . '">' . $counters_value .'</span>'.$e.'</div><div class="counter-label">' . $label . '</div></div>';
}

echo '</div>';


?>