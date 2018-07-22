<?php
/**
 * Template Name: Default + Callout
 *
 * @package WordPress
 * @subpackage Pillar
 * @since 2.6
 * @version 2.7.8
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
	get_template_part( 'template-parts/content', 'callout' );
?>
</main>
<?php
	// End of the loop.
endwhile;
?>
<?php get_footer(); ?>