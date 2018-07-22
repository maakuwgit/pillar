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
 
	$color = '#6b81aa';
	$theme = 'dark';
	$align = 'right';
	$valign = 'bottom';
	$src = ' src="/wp-content/uploads/hero-organization-640x124.jpg" srcset="/wp-content/uploads/hero-organization-1800x350.jpg 2x, /wp-content/uploads/hero-organization.jpg 3x" data-src-large="/wp-content/uploads/hero-organization-1800x350.jpg" data-src-xlarge="/wp-content/uploads/hero-organization.jpg"';

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
			echo get_option( 'pillar_setting_members_heading' );
			if( current_user_can( 'manage_options' ) ) : ?>
				<a href="/wp-admin/options-general.php?page=pillar_members#pillar_setting_members_heading"><em class="fa fa-pencil"></em></a>
				<?php endif;?></h1>
	</figcaption>
</figure>