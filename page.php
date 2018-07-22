<?php
/**
 * The main page style. The rest should be defined by custom fields
 *
 * @package WordPress
 * @subpackage Pillar
 * @since 1.4
 * @version 1.9
 */

get_header(); ?>
<?php
// Start the loop.
while ( have_posts() ) : the_post();
?>
<main>
<?php
	// Include the page content template.
	get_template_part( 'template-parts/content', 'hero' );
		
	// Spit out the content wrapped so we can use any shortcodes
	echo do_shortcode(get_the_content());
?>
</main>
<?php
	// End of the loop.
endwhile;
?>
<?php get_footer(); ?>