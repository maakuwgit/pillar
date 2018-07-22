<?php
/**
 * Displays Callout content
 *
 * @package WordPress
 * @subpackage Pillar
 * @since 2.6
 * @version 2.8.7
 */
 
 	$post_id 		= get_the_ID();
 	$theme   		= get_post_meta( $post_id, 'pillar_callout_theme', true );
	$copy 			= get_post_meta( $post_id, 'pillar_callout_copy', true );
	$style 			= '';
	
	if($theme) $style = ' ' . $theme;
?>
<aside id="hero_callout" class="callout<?php echo $style; ?>">
	<figure class="wrap relative" data-background>
		<div class="feature">
			<img alt="" src="<?php echo get_theme_file_uri('/assets/images/hero-callout.jpg'); ?>">
		</div>
		<figcaption class="text-center">
			<?php echo html_entity_decode( $copy ); ?>
		</figcaption>
	</figure>
</aside>