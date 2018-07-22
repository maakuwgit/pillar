<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Pillar
 * @since 1.0
 * @version 2.6.4
 */

?>
	<footer id="colophon" class="site-footer">
		<div class="wrap">
			<?php get_template_part( 'template-parts/logo', 'image' ); ?>
			<?php if ( is_user_logged_in() == false ): ?>
			<aside class="cell small-12 medium-9 large-6">
				<p>
					<a href="<?php echo bloginfo('url');?>/login/">Login</a> or <a href="<?php echo bloginfo('url');?>/login/?register">register</a> to receive information on programs and&nbsp;new products</p>
			</aside>
			<?php endif; ?>
		</div>
		<?php get_template_part( 'template-parts/footer', 'widgets' );?>
		<?php get_template_part( 'template-parts/site', 'info' );?>
	</footer><!-- #colophon -->
</div>
<?php wp_footer(); ?>
</body>
</html>
