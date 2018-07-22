<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WordPress
 * @subpackage Pillar
 * @since 1.0
 * @version 2.0.2
 */

if ( ! function_exists( 'pillar_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function pillar_posted_on() {

	// Get the author name; wrap it in a link.
	$byline = sprintf(
		/* translators: %s: post author */
		__( 'by %s', 'pillar' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_the_author() . '</a></span>'
	);

	// Finally, let's write all of this to the page.
	echo '<span class="posted-on">' . pillar_time_link() . '</span><span class="byline"> ' . $byline . '</span>';
}
endif;


if ( ! function_exists( 'pillar_time_link' ) ) :
/**
 * Gets a nicely formatted string for the published date.
 */
function pillar_time_link() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		get_the_date( DATE_W3C ),
		get_the_date(),
		get_the_modified_date( DATE_W3C ),
		get_the_modified_date()
	);

	// Wrap the time string in a link, and preface it with 'Posted on'.
	return sprintf(
		/* translators: %s: post date */
		__( '<span class="screen-reader-text">Posted on</span> %s', 'pillar' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);
}
endif;


if ( ! function_exists( 'pillar_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function pillar_entry_footer() {

	/* translators: used between list items, there is a space after the comma */
	$separate_meta = __( ', ', 'pillar' );

	// Get Categories for posts.
	$categories_list = get_the_category_list( $separate_meta );

	// Get Tags for posts.
	$tags_list = get_the_tag_list( '', $separate_meta );

	// We don't want to output .entry-footer if it will be empty, so make sure its not.
	if ( ( ( pillar_categorized_blog() && $categories_list ) || $tags_list ) || get_edit_post_link() ) {

		echo '<footer class="entry-footer">';

			if ( 'post' === get_post_type() ) {
				if ( ( $categories_list && pillar_categorized_blog() ) || $tags_list ) {
					echo '<span class="cat-tags-links">';

						// Make sure there's more than one category before displaying.
						if ( $categories_list && pillar_categorized_blog() ) {
							echo '<span class="cat-links">' . pillar_get_svg( array( 'icon' => 'folder-open' ) ) . '<span class="screen-reader-text">' . __( 'Categories', 'pillar' ) . '</span>' . $categories_list . '</span>';
						}

						if ( $tags_list ) {
							echo '<span class="tags-links">' . pillar_get_svg( array( 'icon' => 'hashtag' ) ) . '<span class="screen-reader-text">' . __( 'Tags', 'pillar' ) . '</span>' . $tags_list . '</span>';
						}

					echo '</span>';
				}
			}

			pillar_edit_link();

		echo '</footer> <!-- .entry-footer -->';
	}
}
endif;


if ( ! function_exists( 'pillar_edit_link' ) ) :
/**
 * Returns an accessibility-friendly link to edit a post or page.
 *
 * @since Pillar 2.8
 */
function pillar_edit_link() {
	edit_post_link('<span class="fa fa-ellipsis"></span>',
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function pillar_categorized_blog() {
	$category_count = get_transient( 'pillar_categories' );

	if ( false === $category_count ) {
		// Create an array of all the categories that are attached to posts.
		$categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$category_count = count( $categories );

		set_transient( 'pillar_categories', $category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $category_count > 1;
}

/**
 * Displays a Callout in regular or "dark" theme
 *
 * Create your own pillar_callout() function to override in a child theme.
 *
 * @since Pillar 1.5
*/
function pillar_callout( $atts, $content = "" ){
	if( !$content ) return;
	$atts = shortcode_atts( array(
		'id' 			=> '',
		'theme' 		=> ''
	), $atts, 'pillar_callout' );
	if ( $atts['id'] != '' ) $id = ' id="' . $atts['id'] . '"';
	if ( $atts['theme'] != '' ) {
		$is_dark = true;
		$theme = ' ' . $atts['theme'];
	}else{
		$is_dark = false;
	}
	$output = '<aside' . $id . ' class="callout' . $theme . '">';
	if ( $is_dark ) {
		$output .= '<figure class="wrap relative" data-background>';
		$output .= '<div class="feature">';
		$output .= '<img alt="" src="' . get_template_directory_uri() .  '/assets/images/hero-callout.jpg' . '">';
		$output .= '</div><figcaption>' . $content . '</figcaption></figure>';
	}
	$output .= '</aside>';

	return $output;
}

add_shortcode( 'callout', 'pillar_callout' );

/**
 * Displays a Gradient Box section
 *
 * Create your own gradient_box() function to override in a child theme.
 *
 * @since Pillar 1.5
*/
function gradient_box( $atts, $content = "" ){
	if( !$content ) return;
	$atts = shortcode_atts( array(
		'id' 			=> false,
	), $atts, 'gradient_box' );
	$atts['id'] ? $id = ' id="' . $atts['id'] . '"' : $id = '';
	$output = '<div' . $id . ' class="gradient-box"><div class="wrap">';
	$output .= '<article class="cell small-12 medium-10 large-6">' . $content . '</article>';
	$output .= '</div></div>';
	
	return $output;
}
add_shortcode( 'gradient_box', 'gradient_box' );

/**
 * Displays a Photo Box section
 *
 * Create your own gradient_box() function to override in a child theme.
 *
 * @since Pillar 1.9
 * @version 2.0.3
*/
function photo_box( $atts, $content = "" ){
	if( !$content ) return;
	$atts = shortcode_atts( array(
		'id' 			=> false,
		'src' 	=> ''
	), $atts, 'photo_box' );
	$atts['id'] ? $id = ' id="' . $atts['id'] . '"' : $id = '';
	$atts['src'] ? $src = $atts['src'] . '' : $src = '/assets/images/hero-human_cell.jpg';
	
	$output = '<div' . $id . ' class="wrap photo-box">';
	$output .= '<figure class="relative cell small-12 medium-6 large-6 hero" data-background data-parallax="scroll" data-image-src="' .  get_template_directory_uri() . $src . '"><div class="feature">';
	$output .= '<img alt="" src="' . get_template_directory_uri() . $src . '">';
	$output .= '</div></figure>';
	$output .= '<article class="cell small-12 medium-6 large-6 vector-box"><div class="content">' . $content . '</div></article>';
	$output .= '</div>';
	
	return $output;
}
add_shortcode( 'photo_box', 'photo_box' );

/**
 * Displays a Vector Box section, using parallax SVG circles as the background
 *
 * Create your own gradient_box() function to override in a child theme.
 *
 * @since Pillar 1.9
*/
function vector_box( $atts, $content = "" ){
	if( !$content ) return;
	$atts = shortcode_atts( array(
		'id' 			=> false,
	), $atts, 'vector_box' );
	$atts['id'] ? $id = ' id="' . $atts['id'] . '"' : $id = '';
	
	$output = '<article' . $id . ' class="vector-box">';
	$output .= '<div class="wrap content">' . $content . '</div>';
	$output .= '</article>';
	
	return $output;
}
add_shortcode( 'vector_box', 'vector_box' );

/**
 * Creates a shortcode for anchors that are relative to the server automatically
 *
 * @since Pillar 1.5
 *
 * @param array $atts Attributes for the anchor.
 * @author MaakuW
 * @return array $content what the anchor tag wraps.
 */
function local_anchor( $atts, $content = "" ) {
	$atts = shortcode_atts( array(
		'id' 			=> '',
		'href' 		=> '#',
		'slug' 		=> '',
		'title' 	=> '',
		'class' 	=> '',
		'target' 	=> '',
		'rel' 		=> ''
	), $atts, 'local_anchor' );
	if ( $atts['id'] != '' ) $id = ' id="' . $atts['id'] . '"';
	if ( $atts['slug'] != '' ) $slug = $atts['slug'] . '/';
	if ( $atts['href'] != '#' ) $href = home_url($slug . $atts['href']);
	if ( $atts['title'] != '' ) $title = ' title="' . $atts['title'] . '"';
	if ( $atts['class'] != '' ) $class = ' class="' . $atts['class'] . '"';
	if ( $atts['target'] != '' ) $target = ' target="' . $atts['target'] . '"';
	if ( $atts['rel'] != '' ) $rel = ' rel="' . $atts['rel'] . '"';
	if($content){
		return '<a href="' . $href .'"' . $id . $class . $title . $target . $rel .'>' . $content . '</a>';
	}else{
		return $href;
	}
}
add_shortcode( 'local_anchor', 'local_anchor' );

/**
 * Flush out the transients used in pillar_categorized_blog.
 */
function pillar_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'pillar_categories' );
}
add_action( 'edit_category', 'pillar_category_transient_flusher' );
add_action( 'save_post',     'pillar_category_transient_flusher' );