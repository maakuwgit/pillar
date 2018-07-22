<?php
/**
 * The Organization template file
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
 * @since 2.8
 * @version 2.9
 */

get_header();
?>

<main>
	<?php
	
	if ( have_posts() ) :

		// Include the page content templates.
		get_template_part( 'template-parts/hero', 'organization' );
		get_template_part( 'template-parts/gradient_box', 'h4' );
	?>	
	<div class="generic">
	<?php
		$tax_terms = get_terms('team', array('hide_empty' => true, 'orderby' => 'ID'));
		foreach($tax_terms as $term_single) :
	?>
		<article class="wrap content">
			<div class="cell small-12">
				<h2 class="text-center"><?php echo $term_single->name; ?></h2>
				<dl>
				<?php
					//$term_single->slug
					$args = array( 
										'post_type' 		=> 'member',
										'order' 				=> 'ASC',
						        'tax_query' => array(
						            array(
						                'taxonomy' => 'team',
						                'field' => 'slug',
						                'terms' => $term_single->slug
						            )
						        )
									);
									

					$member_query = new WP_Query( $args );
		
					if($member_query) {

						while ( $member_query->have_posts() ) : $member_query->the_post();
							// Include the loop
							get_template_part( 'template-parts/content', 'member' );
						endwhile;
						
					}
					
					wp_reset_query();
				?>        
			</dl>
		</div>
	</article>
	<?php endforeach;?>
</div>
	<?
	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>
	<?php get_sidebar(); ?>
</main>
<?php get_footer();
