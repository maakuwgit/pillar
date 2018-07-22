<?php
/**
 * Template Name: Gradient + Photo Box
 *
 * @package WordPress
 * @subpackage Pillar
 * @since 2.8
 * @version 2.8.1
 */

get_header(); ?>
<?php
// Start the loop.
while ( have_posts() ) : the_post();
?>
<main>
<?php
	// Include the page content templates.
	get_template_part( 'template-parts/content', 'hero' );
	get_template_part( 'template-parts/gradient_box', 'generic' );
	get_template_part( 'template-parts/photo_box', 'generic' );
?>
</main>
<?php
	// End of the loop.
endwhile;
?>
<?php get_footer(); ?>
