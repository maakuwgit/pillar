<?php
/**
 * Displays a gradient box with the content wrapped in an h4
 *
 * @package WordPress
 * @subpackage Pillar
 * @since 1.4
 * @version 2.8
 */
 $copy = get_option( 'pillar_setting_members_gradient_box_copy' );
?>
<div id="<?php echo 'gb_' . random_id(); ?>" class="gradient-box">
	<div class="wrap">
		<article class="cell small-12 medium-10 large-6">
			<h4><?php echo $copy; ?></h4>
		</article>
	</div>
</div>