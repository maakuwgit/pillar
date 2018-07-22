<?php
/**
 * Template Name: Callout + Gradient Box
 *
 * @package WordPress
 * @subpackage Pillar
 * @since 2.1.6
 * @version 2.8.7
 */

get_header(); ?>
<?php
// Start the loop.
while ( have_posts() ) : the_post();
?>
<main class="grey">
<?php
	// Include the page content template.
	get_template_part( 'template-parts/content', 'hero' );
	
	// Include the additional content commensurate with the page.
	get_template_part( 'template-parts/callout', 'generic' );
	get_template_part( 'template-parts/gradient_box', 'generic' );
		
	// Spit out the content wrapped so we can use any shortcodes
	echo do_shortcode(get_the_content());
?>
</main>
<?php
	// End of the loop.
endwhile;
?>
<?php get_footer(); ?>