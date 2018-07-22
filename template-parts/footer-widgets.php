<?php
/**
 * Displays footer widgets if assigned
 *
 * @package WordPress
 * @subpackage Pillar
 * @since 1.0
 * @version 2.6.2
 */

$twitter_url 	= get_option('pillar_setting_social_twitter_url' );
$linkedin_url = get_option('pillar_setting_social_linkedin_url' );
 
?>
<dl class="wrap">
	<dt class="social cell widget">
		<a href="<?php echo $twitter_url; ?>" target="_blank"><em class="fa fa-twitter"></em></a>
		<a href="<?php echo $linkedin_url; ?>" target="_blank"><em class="fa fa-linkedin-square"></em></a>
	</dt>
<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
<?php dynamic_sidebar( 'sidebar-1' ); ?>
<?php endif; ?>
</dl>