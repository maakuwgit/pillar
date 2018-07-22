<?php
/**
 * The News & Events template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Pillar
 * @since 1.0
 * @version 2.9.1
 */

get_header();
?>

<main>
	<?php
	if ( have_posts() ) :

		// Include the page content template.
		get_template_part( 'template-parts/content', 'hero' );	
	?>
			<div class="banner">
				<a href="http://amp17.amp.org" target="_blank">Come Visit Pillar at AMP&nbsp;2017&nbsp;<em class="fa fa-chevron-circle-right"></em></a>
			</div>
		<?php
		
		/* Start the Loop */
		while ( have_posts() ) : the_post();

			/*
			 * Include the Post-Format-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			 */
			get_template_part( 'template-parts/content', 'article' );

		endwhile;

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>
	<?php get_sidebar(); ?>
</main>
<?php get_footer();
