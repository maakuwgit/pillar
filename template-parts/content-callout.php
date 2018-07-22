<?php
/**
 * Displays Callout Template content
 *
 * @package WordPress
 * @subpackage Pillar
 * @since 2.6
 * @version 2.8
 */
 
 	$post_id 		= get_the_ID();
	$theme   		= get_post_meta( $post_id, 'pillar_callout_theme', true );
	$copy 			= get_post_meta( $post_id, 'pillar_callout_copy', true );
	$style 			= '';
	
	if($theme) $style = ' ' . $theme;
?>
<aside id="<?php echo 'hero_' . random_id(); ?>" class="callout<?php echo $style; ?>">
	<figure class="wrap relative" data-background>
		<div class="feature">
			<img alt="" src="<?php echo get_theme_file_uri('/assets/images/hero-callout.jpg'); ?>">
		</div>
		<figcaption class="text-center">
			<?php echo html_entity_decode( $copy ); ?>
		</figcaption>
	</figure>
</aside>
<div class="gradient-box">
	<div class="wrap">
		<div class="cell small-12 medium-10 large-6">
			<?php echo do_shortcode(get_the_content()); ?>
		</div>
	</div>
</div>