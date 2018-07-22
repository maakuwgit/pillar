<?php
/**
 * Displays member copy
 *
 * @package WordPress
 * @subpackage Pillar
 * @since 1.4
 * @version 2.9
 */
 $post_id 		= get_the_ID();
 $position = get_post_meta( $post_id, 'pillar_member_position', true );
 $thumb 		= get_the_post_thumbnail_url($post);
 $title = get_the_title();
 
 if($thumb) {
	 $src = ' src="' . get_the_post_thumbnail_url($post, 'thumbnail') . '" srcset="' .  get_the_post_thumbnail_url($post, 'large') . ' 2x, ' . get_the_post_thumbnail_url($post, 'fullsize') . ' 3x" data-src-large="' . get_the_post_thumbnail_url($post, 'large') . '" data-src-xlarge="' . get_the_post_thumbnail_url($post, 'fullsize') . '"';
 }else{
	$src = ' src="http://via.placeholder.com/400x400"';
 }

?>
		<dt>
			<?php if ( is_user_logged_in() ) : ?>
			<div class="user thumbnail">
				<img alt=""<?php echo $src;?>>
			</div>
			<?php endif; ?>
			<span class="h4"><?php echo $title;?><?php echo edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						__( '&nbsp;<em class="fa fa-pencil"></em>', 'pillar' ),
						$title
					),
					'',
					'', get_the_id(), 'edit-post'
				);;?></span> <?php echo html_entity_decode($position);?></dt>
		<dd class="has-more">
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