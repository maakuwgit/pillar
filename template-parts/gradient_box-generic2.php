<?php
/**
 * Displays a generic gradient box. Use this if you do not want a wrapper around your content
 *
 * @package WordPress
 * @subpackage Pillar
 * @since 1.4
 * @version 2.8.7
 */
 	$post_id 		= get_the_ID();
	$copy 			= get_post_meta( $post_id, 'pillar_gradient_box2_copy', true );

	echo do_shortcode('[gradient_box]' . html_entity_decode( $copy ) . '[/gradient_box]');
?>