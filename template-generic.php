<?php
/**
 * Template Name: Generic
 *
 * @package WordPress
 * @subpackage Pillar
 * @since 2.1.6
 * @version 2.1.8.2
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
	get_template_part( 'template-parts/content', 'generic' );
?>
</main>
<?php
	// End of the loop.
endwhile;
?>
<?php get_footer(); ?>