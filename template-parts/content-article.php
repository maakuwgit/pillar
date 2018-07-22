<?php
/**
 * Displays careers copy under gradient box
 *
 * @package WordPress
 * @subpackage Pillar
 * @since 1.4
 * @version 2.9
 */
 
 $subheading = get_option( 'pillar_setting_news_and_events_subheading' );

?>
<div class="generic">
	<article class="wrap content">
		<div class="cell small-12">
			<h2 class="text-center"><?php echo $subheading;?></h2>
			<h5><?php echo get_the_date() . ' ' . get_the_time();?>&nbsp;ET</h5>
			<dl>
				<dt><?php echo get_the_title() ;?><?php echo edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						__( '&nbsp;<em class="fa fa-pencil"></em>', 'pillar' ),
						$title
					),
					'',
					'', get_the_id(), 'edit-post'
				);;?></dt>
				<dd>
				<?php
					if( !has_excerpt() ){
						
						echo '<p>';
						the_excerpt();
						echo '</p>';
					}else{
						echo '<p>' . get_the_excerpt();
						echo '&nbsp;<a href="' . get_the_permalink() . '" class="more-link">[more]</a></p>';
					}
					echo '<div data-more>';
					echo get_the_content();
					echo '</div>';
				?>
				</dd>
			</dl>
		</div>
	</article>
</div>