<?php
/**
 * Template Name: Contact
 *
 * @package WordPress
 * @subpackage Pillar
 * @since 2.1.6
 * @version 2.8.8
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
?>	
	<div class="banner relative">
		<a href="mailto:info@pillar-biosciences.com">Contact us for more information&nbsp;<em class="fa fa-chevron-circle-right"></em></a>
	</div>
<?php
	// Spit out the content wrapped so we can use any shortcodes
	echo do_shortcode(get_the_content());
	
	// Include the additional content commensurate with the page.
	get_template_part( 'template-parts/content', 'contact' );
?>
</main>
<?php
	// End of the loop.
endwhile;
?>
<?php get_footer(); ?>