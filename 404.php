<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Pillar
 * @since 1.0
 * @version 2.0
 */

get_header(); ?>
<main>
	<figure class="wrap relative hero" data-background>
		<div class="feature">
			<img width="1800" src="<?php echo get_theme_file_uri('/assets/images/hero-404.jpg');?>" class="attachment-pillar-featured-image size-pillar-featured-image wp-post-image" alt="" srcset="<?php echo get_template_directory_uri() . '/assets/images/hero-404';?>.jpg 1800w, <?php echo get_template_directory_uri() . '/assets/images/hero-404';?>-1024x664.jpg 1024w, <?php echo get_template_directory_uri() . '/assets/images/hero-404';?>-768x498.jpg 768w, <?php echo get_template_directory_uri() . '/assets/images/hero-404';?>-1203x780.jpg 1203w" sizes="100vw">
		</div>
		<figcaption class="text-center">
			<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'lons' ); ?></h1>
		</figcaption>
	</figure>
	<article class="vector-box">
		<div class="wrap content">
		  <section class="cell small-12 medium-6">
		   <h5><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'lons' ); ?></h5>
		  </section>
		  <div class="cell small-12 medium-6"><?php get_search_form(); ?></div>
		</div>
	</article>
</main>
<?php get_footer(); ?>
