<?php
/**
 * Displays Vector Box
 *
 * @package WordPress
 * @subpackage Pillar
 * @since 1.4
 * @version 2.8.4
 */
 
 	$post_id 					= get_the_ID();
	
	$copy = get_post_meta( $post_id, 'pillar_pushdown_copy', true );
	$btn_txt = get_post_meta( $post_id, 'pillar_pushdown_btn_txt', true);
	$caption = get_post_meta( $post_id, 'pillar_pushdown_push_caption', true);
	$url = get_post_meta( $post_id, 'pillar_pushdown_push_img', true);
?>
<aside id="results" class="callout dark wrap">
	<figure class="wrap relative" data-background>
		<div class="feature">
			<img alt="" src="<?php echo get_theme_file_uri( '/assets/images/hero-callout.jpg' ); ?>">
		</div>
		<figcaption>
			<h2 class="text-center"><?php echo $copy;?><br class="show-for-phablet"> <button class="button" data-pushdown="results"><?php echo $btn_txt; ?>&nbsp;<em class="fa fa-chevron-circle-down"></em></button></h2>
		</figcaption>
	</figure>
</aside>
<figure class="pushdown" data-pushdown-id="results">
	<?php if($url !== '') : ?>
		<div class="text-center">
			<img alt="" src="<?php echo $url; ?>" style="width:100%; max-width: 600px;">
		</div>
		<?php if($caption !== '') : ?>
		<figcaption>
			<p class="text-center"><small><em><?php echo $caption; ?></em></small></p>
			<div class="nav">
				<button class="button icon" data-pushdown="results"><em class="fa fa-chevron-up"></em></button>
			</div>
		</figcaption>
		<?php endif; ?>
	<?php endif; ?>
</figure>