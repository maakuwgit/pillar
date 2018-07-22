<?php
/**
 * Displays a generic gradient box. Use this if you do not want a wrapper around your content
 *
 * @package WordPress
 * @subpackage Pillar
 * @since 1.4
 * @version 2.8
 */
 
 	$post_id 		= get_the_ID();
	$url   		= get_post_meta( $post_id, 'pillar_photo_box_url', true );
	$copy 			= get_post_meta( $post_id, 'pillar_photo_vector_box_copy', true );
	
	if($url) {
		$src = ' src="' . $url . '"';
	}else{
		$src = ' src="/assets/images/hero-results_in_hours.jpg"';
	}
	
	echo do_shortcode('[photo_box ' . $src . ']' . html_entity_decode( $copy ) . '[/photo_box]');
?>