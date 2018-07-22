<?php
/**
 * Template Name: Default + Nav
 *
 * @package WordPress
 * @subpackage Pillar
 * @since 2.6.3
 * @version 2.6.3
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
	
	// Include the additional content commensurate with the page.
	get_template_part( 'template-parts/content', 'dna' );
	get_template_part( 'template-parts/navigation', 'dna' );
?>
</main>
<?php
	// End of the loop.
endwhile;
?>
<?php get_footer(); ?>