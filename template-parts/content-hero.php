<?php
/**
 * Displays hero images
 *
 * @package WordPress
 * @subpackage Pillar
 * @since 1.4
 * @version 2.1.9
 */
 $feature_style = $figure_style = $src = '';
 $post_type = get_post_type();
 
 if( !is_archive() ) {
	 $post_id  	= $post->ID;
	 $color   	= get_post_meta( $post_id, 'pillar_color', true );
	 $theme   	= get_post_meta( $post_id, 'pillar_theme', true );
	 $align   	= get_post_meta( $post_id, 'pillar_theme_align', true );
	 $valign   	= get_post_meta( $post_id, 'pillar_theme_valign', true );
	 $thumb 		= get_the_post_thumbnail_url($post);
	 $title = get_the_title();
	 
	 if($thumb) {
		 $src = ' src="' . get_the_post_thumbnail_url($post, 'thumbnail') . '" srcset="' .  get_the_post_thumbnail_url($post, 'large') . ' 2x, ' . get_the_post_thumbnail_url($post, 'fullsize') . ' 3x" data-src-large="' . get_the_post_thumbnail_url($post, 'large') . '" data-src-xlarge="' . get_the_post_thumbnail_url($post, 'fullsize') . '"';
	 }else{
		$src = ' src="http://via.placeholder.com/640x40" srcset="http://via.placeholder.com/1024x768 2x, http://via.placeholder.com/1800x780 3x" data-src-large="http://via.placeholder.com/1024x768" data-src-xlarge="http://via.placeholder.com/1800x780"';
	 }
}else{
	switch($post_type) {
		case 'member':
			$color = '#6b81aa';
			$theme = 'dark';
			$align = 'right';
			$valign = 'bottom';
			$title = get_option( 'pillar_setting_members_heading' );
			$src = ' src="/wp-content/uploads/hero-organization-640x124.jpg" srcset="/wp-content/uploads/hero-organization-1800x350.jpg 2x, /wp-content/uploads/hero-organization.jpg 3x" data-src-large="/wp-content/uploads/hero-organization-1800x350.jpg" data-src-xlarge="/wp-content/uploads/hero-organization.jpg"';
		break;
		default:
			$color = '#001e52';
			$theme = 'dark';
			$align = 'left';
			$valign = 'center';
			$title = get_option( 'pillar_setting_news_and_events_heading' );
			$src = ' src="/wp-content/uploads/hero-new_and_events-640x124.jpg" srcset="/wp-content/uploads/hero-new_and_events-1800x350.jpg 2x, /wp-content/uploads/hero-new_and_events.jpg 3x" data-src-large="/wp-content/uploads/hero-new_and_events-1800x350.jpg" data-src-xlarge="/wp-content/uploads/hero-new_and_events.jpg"';
		break;
	}
}
$feature_style = ' style="';
 if($align || $color){
	 $figure_style = $feature_style;
	 if($color) $feature_style .= 'background-color:'.$color.';';
	 if($align) $figure_style .= 'background-position:'.$align.' '.$valign.';';
	 $figure_style .= '"';
 }else{
	 $feature_style .= 'background-color:#373e49;';
 }
$feature_style .= '"';

?>
<figure class="wrap relative hero<?php if($theme) echo ' ' . $theme;?>" data-background<?php if($figure_style) echo ' ' . $figure_style;?>>
	<div class="feature"<?php echo $feature_style; ?>>
		<img<?php echo $src; ?> alt="">
	</div>
	<figcaption class="text-center">
		<h1 class="page-title"><?php
			echo $title;
			if( !is_archive() ){
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						__( '<em class="fa fa-pencil"></em>', 'pillar' ),
						get_the_title()
					),
					'',
					'', get_the_id(), 'edit-post'
				);
			}else{
				if( current_user_can( 'manage_options' ) ) : ?>
				<a href="/wp-admin/options-general.php#pillar_setting_iconbox_text"><em class="fa fa-pencil"></em></a>
				<?php endif;
			}
?></h1>
	</figcaption>
</figure>