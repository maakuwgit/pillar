<?php
/**
 * Displays Vector Box
 *
 * @package WordPress
 * @subpackage Pillar
 * @since 1.4
 * @version 2.8.7
 */
 
 	$post_id 					= get_the_ID();
	$vector_box_copy 	= get_post_meta( $post_id, 'pillar_vector_box_copy', true );
?>
<article class="vector-box">
	<div class="wrap content">
		<?php echo html_entity_decode( $vector_box_copy ); ?>
	</div>
</article>
