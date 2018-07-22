<?php
/**
 * Displays generic content
 *
 * @package WordPress
 * @subpackage Pillar
 * @since 1.4
 * @version 2.8
 */

?>
<div class="generic">
	<article class="wrap content">
		<div class="cell small-12">
			<?php echo do_shortcode(get_the_content()); ?>
		</div>
	</article>
</div>