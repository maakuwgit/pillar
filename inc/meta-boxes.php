<?php
/**
 * Post and Page Custom Meta Box Fields
 *
 * @package Lovers&Nerds
 * @subpackage Pillar
 * @since 2.1.9
 * @author MaakuW
 *
 */
function add_post_meta_box() {
	$template = get_post_type();
	if( $template !== 'member' && $template !== 'article' ) {
//		add_meta_box( 'theme_seo_description_meta_box', __( 'Meta Description', 'pillar' ), 'pillar_seo_description', ['page','post'], 'normal', 'high' );
		add_meta_box( 'theme_settings', __( 'Theme', 'pillar' ), 'theme_settings_meta_box', 'page', 'side', 'high' );
		add_meta_box( 'callout_box_settings', __( 'Callout Box', 'pillar' ), 'callout_meta_box', 'page', 'normal', 'high');
		add_meta_box( 'vector_box_settings', __( 'Vector Box', 'pillar' ), 'vector_box_meta_box', 'page', 'normal', 'high');
		add_meta_box( 'gradient_box_settings', __( 'Gradient Box', 'pillar' ), 'gradient_box_meta_box', 'page', 'normal', 'high');
		add_meta_box( 'gradient2_box_settings', __( 'Gradient Box 2', 'pillar' ), 'gradient_box2_meta_box', 'page', 'normal', 'high');
		add_meta_box( 'pushdown_settings', __( 'Pushdown', 'pillar' ), 'pushdown_meta_box', 'page', 'normal', 'high');
		add_meta_box( 'photo_box_settings', __( 'Photo Box', 'pillar' ), 'photo_box_meta_box', 'page', 'normal', 'high');
	}else{
		add_meta_box( 'member_settings', __( 'Member Position', 'pillar' ), 'member_meta_box', 'member', 'normal', 'high');
	}
}
add_action( 'add_meta_boxes', 'add_post_meta_box' );
/*----------------------------------------------------------------*/
/*----------------------[ Member Settings ]-----------------------*/
/*----------------------------------------------------------------*/
if ( ! function_exists( 'member_meta_box' ) ) :
function member_meta_box( $post ) {
	$post_id = get_the_ID();

	wp_nonce_field( basename( __FILE__ ), 'pillar_settings_nonce' );
	
	$position   		= get_post_meta( $post_id, 'pillar_member_position', true );
?>
	<p>
		<input type="text" id="pillar_member_position" name="pillar_member_position" value="<?php echo $position; ?>" style="width: 100%;">
	</p>
<?php
}
endif;
/*----------------------------------------------------------------*/
/*-------------------------[ Vector Box ]-------------------------*/
/*----------------------------------------------------------------*/
if ( ! function_exists( 'vector_box_meta_box' ) ) :
function vector_box_meta_box( $post ) {
	
	$post_id = get_the_ID();

	wp_nonce_field( basename( __FILE__ ), 'pillar_settings_nonce' );
	
	$copy = get_post_meta( $post_id, 'pillar_vector_box_copy', true );
?>
<fieldset class="themediv">
	<a class="toggler"><em class="fa fa-close"></em></a>
	<article id="" class="vector-box active">
		<div class="wrap content">
			<section class="cell small-12 medium-6 large-6">	
				<div data-swapcopy<?php echo ( $copy !== '' ? ' class="active relative"' : '' ); ?>>
					<?php echo html_entity_decode( $copy ); ?>
				</div>
				<div data-swapfield<?php echo ( $copy == '' ? ' class="active"' : '' ); ?>>
					<textarea id="pillar_vector_box_copy" name="pillar_vector_box_copy" placeholder="Type your copy into this box" rows="15" cols="60"><?php echo $copy; ?></textarea>
				</div>
			</section>
		</div>
	</article>
</fieldset>
<?php
}	
endif;

/*----------------------------------------------------------------*/
/*-----------------------[ Callout Box ]--------------------------*/
/*----------------------------------------------------------------*/
if ( ! function_exists( 'callout_meta_box' ) ) :
function callout_meta_box( $post ) {
	
	$post_id = get_the_ID();

	wp_nonce_field( basename( __FILE__ ), 'pillar_settings_nonce' );
	
		$theme   		= get_post_meta( $post_id, 'pillar_callout_theme', true );
		$copy 			= get_post_meta( $post_id, 'pillar_callout_copy', true );
		$thumb 		= get_the_post_thumbnail_url($post);
	 
		if($thumb) {
			$src = ' src="' . get_the_post_thumbnail_url($post, 'thumbnail') . '" srcset="' .  get_the_post_thumbnail_url($post, 'large') . ' 2x, ' . get_the_post_thumbnail_url($post, 'fullsize') . ' 3x" data-src-large="' . get_the_post_thumbnail_url($post, 'large') . '" data-src-xlarge="' . get_the_post_thumbnail_url($post, 'fullsize') . '"';
		}else{
			$src = ' src="http://via.placeholder.com/640x40" srcset="http://via.placeholder.com/1024x768 2x, http://via.placeholder.com/1800x780 3x" data-src-large="http://via.placeholder.com/1024x768" data-src-xlarge="http://via.placeholder.com/1800x780"';
		}
?>
<fieldset class="themediv">
	<div>
		<label title="Light Callout Boxes contain a solid background-color">
			<input type="radio" id="pillar_callout_theme_light" name="pillar_callout_theme" value="light"<?php if( $theme == 'light' ) echo ' checked'; ?>> <?php esc_html_e( 'Light', 'pillar' ); ?>
		</label>
		<label type="radio" for="pillar_callout_theme_dark" title="Dark Callout Boxes use a grey background-color and a background image. Text will appear white.">
			<input type="radio" id="pillar_callout_theme_dark" name="pillar_callout_theme" value="dark"<?php if( $theme == 'dark' ) echo ' checked'; ?>> <?php esc_html_e( 'Dark', 'pillar' ); ?>
			</label>
		<textarea id="pillar_callout_copy" name="pillar_callout_copy" placeholder="Type your copy into this box"><?php echo $copy; ?></textarea>
	</div>
	<aside id="vision_callout" class="callout dark active">
		<figure class="wrap relative" data-background>
			<div class="feature">
				<img alt=""<?php echo $src;?>>
			</div>
			<figcaption>
				<?php echo html_entity_decode( $copy ); ?>
			</figcaption>
		</aside>
</fieldset>
<?php
}	
endif;
/*----------------------------------------------------------------*/
/*-------------------------[ Photo Box ]--------------------------*/
/*----------------------------------------------------------------*/
if ( ! function_exists( 'photo_box_meta_box' ) ) :
function photo_box_meta_box( $post ) {
	
	$post_id = get_the_ID();

	wp_nonce_field( basename( __FILE__ ), 'pillar_settings_nonce' );
	
	$copy = get_post_meta( $post_id, 'pillar_photo_vector_box_copy', true );
	$url 	= get_post_meta( $post_id, 'pillar_photo_box_url', true );

	if($url) {
		$src = ' src="' . $url . '"';
	}else{
		$src = ' src="' . get_theme_file_uri( '/assets/images/hero-results_in_hours.jpg' ) . '"';
	}
?>
<fieldset class="themediv">
	<a class="toggler"><em class="fa fa-close"></em></a>
	<section id="results" class="wrap photo-box active">
		<figure class="relative cell small-12 medium-6 large-6 hero" data-background data-parallax="scroll">
			<div class="feature hide">
				<div data-swapimg<?php echo ( $src !== '' ? ' class="active relative"' : '' ); ?>>
					<img alt=""<?php echo $src; ?>>
				</div>
				<div data-swapfield<?php echo ( $src == '' ? ' class="active"' : '' ); ?>>
					<input id="pillar_photo_box_url" name="pillar_photo_box_url" type="text" placeholder="Type your copy into this box" value="<?php echo $url; ?>" style="width:100%;">
				</div>
			</div>
		</figure>
		<article class="cell small-12 medium-6 large-6 vector-box">
			<div class="content">
				<div data-swapcopy<?php echo ( $copy !== '' ? ' class="active relative"' : '' ); ?>>
					<?php echo html_entity_decode( $copy ); ?>
				</div>
				<div data-swapfield<?php echo ( $copy == '' ? ' class="active"' : '' ); ?>>
					<textarea id="pillar_photo_vector_box_copy" name="pillar_photo_vector_box_copy" placeholder="Type your copy into this box" rows="15" cols="60"><?php echo $copy; ?></textarea>
				</div>
			</div>
		</article>
	</section>
</fieldset>
<?php
}	
endif;
/*----------------------------------------------------------------*/
/*-------------------------[ Pushdown ]---------------------------*/
/*----------------------------------------------------------------*/
if ( ! function_exists( 'pushdown_meta_box' ) ) :
function pushdown_meta_box( $post ) {
	
	$post_id = get_the_ID();

	wp_nonce_field( basename( __FILE__ ), 'pillar_settings_nonce' );
	
	$copy = get_post_meta( $post_id, 'pillar_pushdown_copy', true );
	$btn_txt = get_post_meta( $post_id, 'pillar_pushdown_btn_txt', true);
	$caption = get_post_meta( $post_id, 'pillar_pushdown_push_caption', true);
	$url = get_post_meta( $post_id, 'pillar_pushdown_push_img', true);

?>
<fieldset class="themediv">
	<a class="toggler"><em class="fa fa-close"></em></a>
	<aside id="browser_results" class="callout dark wrap active">
		<figure class="wrap relative" data-background>
			<div class="feature hide">
				<img alt="" src="<?php echo get_theme_file_uri( '/assets/images/hero-callout.jpg' ); ?>">
			</div>
			<figcaption>
				<div data-swapcopy<?php echo ( $copy !== '' ? ' class="active relative"' : '' ); ?>>
					<h2 class="text-center"><?php echo $copy;?><br class="show-for-phablet"> <button class="button" data-pushdown="browser_results"><?php echo $btn_txt; ?>&nbsp;<em class="fa fa-chevron-circle-down"></em></button></h2>
				</div>
				<div data-swapfield<?php echo ( $copy == '' ? ' class="active"' : '' ); ?>>
					<input id="pillar_pushdown_copy" name="pillar_pushdown_copy" placeholder="Type your a single line of copy here" value="<?php echo $copy; ?>" type="text">
					<input id="pillar_pushdown_btn_txt" name="pillar_pushdown_btn_txt" placeholder="Button Text" value="<?php echo $btn_txt; ?>" type="text">
				</div>
			</figcaption>
		</figure>
	</aside>
	<figure class="pushdown open active" data-pushdown-id="browser_results">
		<div class="text-center">
			<div data-swapimg<?php echo ( $url !== '' ? ' class="active relative"' : '' ); ?>>
				<?php if($url !== '' ): ?><img alt="" src="<?php echo $url; ?>" style="width:100%; max-width: 600px;"><?php endif; ?>
			</div>
			<div data-swapfield<?php echo ( $url == '' ? ' class="active"' : '' ); ?>>
				<input id="pillar_pushdown_push_img" name="pillar_pushdown_push_img" type="text" placeholder="Type your copy into this box" value="<?php echo $url; ?>" style="width:100%;">
			</div>
		</div>
		<figcaption>
			<div data-swapcopy<?php echo ( $caption !== '' ? ' class="active relative"' : '' ); ?>>
				<p class="text-center"><small><em><?php echo html_entity_decode( $caption ); ?></em></small></p>
			</div>
			<div data-swapfield<?php echo ( $caption == '' ? ' class="active"' : '' ); ?>>
				<textarea id="pillar_pushdown_push_caption" name="pillar_pushdown_push_caption" placeholder="Type your copy into this box" rows="15" cols="60"><?php echo $caption; ?></textarea>
			</div>
		</figcaption>
	</figure>
</fieldset>
<?php
}	
endif;
/*----------------------------------------------------------------*/
/*----------------------[ Gradient Boxes ]------------------------*/
/*----------------------------------------------------------------*/
if ( ! function_exists( 'gradient_box_meta_box' ) ) :
function gradient_box_meta_box( $post ) {
	
	$post_id = get_the_ID();

	wp_nonce_field( basename( __FILE__ ), 'pillar_settings_nonce' );
	
	$copy = get_post_meta( $post_id, 'pillar_gradient_box_copy', true );
?>
<fieldset class="themediv">
	<a class="toggler"><em class="fa fa-close"></em></a>
	<section class="gradient-box active">
		<div class="wrap">
			<article class="cell small-12 medium-10 large-6">
				<div data-swapcopy<?php echo ( $copy !== '' ? ' class="active"' : '' ); ?>>
					<?php echo html_entity_decode( $copy ); ?>
				</div>
				<div data-swapfield<?php echo ( $copy == '' ? ' class="active"' : '' ); ?>>
					<textarea id="pillar_gradient_box_copy" name="pillar_gradient_box_copy" placeholder="Type your copy into this box" rows="6"><?php echo $copy; ?></textarea>
				</div>
			</article>
		</div>
	</section>
</fieldset>
<?php 
}	
endif;

if ( ! function_exists( 'gradient_box2_meta_box' ) ) :
function gradient_box2_meta_box( $post ) {
	
	$post_id = get_the_ID();

	wp_nonce_field( basename( __FILE__ ), 'pillar_settings_nonce' );
	
	$copy = get_post_meta( $post_id, 'pillar_gradient_box2_copy', true );
?>
<fieldset class="themediv">
	<a class="toggler"><em class="fa fa-close"></em></a>
	<section class="gradient-box active">
		<div class="wrap">
			<article class="cell small-12 medium-10 large-6">
				<div data-swapcopy<?php echo ( $copy !== '' ? ' class="active"' : '' ); ?>>
					<?php echo html_entity_decode( $copy ); ?>
				</div>
				<div data-swapfield<?php echo ( $copy == '' ? ' class="active"' : '' ); ?>>
					<textarea id="pillar_gradient_box2_copy" name="pillar_gradient_box2_copy" placeholder="Type your copy into this box" rows="6"><?php echo $copy; ?></textarea>
				</div>
			</article>
		</div>
	</section>
</fieldset>
<?php 
}	
endif;
/*----------------------------------------------------------------*/
/*----------------------[ Theme Settings ]------------------------*/
/*----------------------------------------------------------------*/
if ( ! function_exists( 'theme_settings_meta_box' ) ) :
function theme_settings_meta_box( $post ) {
	
	$post_id = get_the_ID();

	wp_nonce_field( basename( __FILE__ ), 'pillar_settings_nonce' );
	
		$theme   		= get_post_meta( $post_id, 'pillar_theme', true );
		$color 			= get_post_meta( $post_id, 'pillar_color', true );
		$align   		= get_post_meta( $post_id, 'pillar_theme_align', true );
		$valign   	= get_post_meta( $post_id, 'pillar_theme_valign', true );
		
		$project 		= get_post_meta( $post_id, 'pillar_is_project', true );
?>
<fieldset class="themediv">
		<p>
			<label title="If there is a dark background image, use this option for lighter (more readable) text" for="pillar_theme_light">
				<input type="radio" id="pillar_theme_light" name="pillar_theme" value="light"<?php if( $theme == 'light' ) echo ' checked'; ?>> <?php esc_html_e( 'Light', 'pillar' ); ?>
			</label>
			<label type="radio" for="pillar_theme_dark" title="If there is a light background image, use this option for darker (more readable) text">
				<input type="radio" id="pillar_theme_dark" name="pillar_theme" value="dark"<?php if( $theme == 'dark' ) echo ' checked'; ?>> <?php esc_html_e( 'Dark', 'pillar' ); ?>
			</label>
		</p>
		<p>
			<label for="pillar_theme_align"><?php esc_html_e( 'X Alignment', 'pillar' ); ?></label>
			<select id="pillar_theme_align" name="pillar_theme_align">
				<option default value="center" <?php  selected( $align, 'center' ); ?>>Center</option>
				<option value="right" <?php  selected( $align, 'right' ); ?>>Right</option>
				<option value="left" <?php selected( $align, 'left' ); ?>>Left</option>
			</select>
		</p>
		<p>
			<label for="pillar_theme_valign"><?php esc_html_e( 'Y Alignment', 'pillar' ); ?></label>
			<select id="pillar_theme_valign" name="pillar_theme_valign">
				<option default value="top" <?php  selected( $valign, 'top' ); ?>>Top</option>
				<option value="center" <?php  selected( $valign, 'center' ); ?>>Center</option>
				<option value="bottom" <?php selected( $valign, 'bottom' ); ?>>Bottom</option>
			</select>
		</p>
		<p>
			<label class="block" for="pillar_color"><?php esc_html_e( 'Color', 'pillar' ); ?>:</label>
			<input id="pillar_color" name="pillar_color" type="text" value="<?php echo $color; ?>" data-iris>
		</p>
</fieldset>
<?php
}	
endif;
/**
 * This callback adds the markup for the Description Meta Tag meta box
 *
 * @since Pillar 2.3
 *
 */
if ( ! function_exists( 'pillar_seo_description' ) ) :
function pillar_seo_description( $post ) {
	$post_id 	= get_the_ID();
	$seo_description 	= get_post_meta( $post_id, 'pillar_seo_description', true );

	wp_nonce_field( basename( __FILE__ ), 'pillar_settings_nonce' );?>

	<p>
		<textarea name="pillar_seo_description" id="pillar_seo_description" style="width: 100%;" col="10"><?php echo $seo_description; ?></textarea>
	</p>
<?php
}
endif;

if ( ! function_exists( 'pillar_metabox_settings_save_details' ) ) :
/**
 * Save all metabox settings
 *
 * @since Pillar 2.3
 * @author MaakuW
 *
 */
function pillar_metabox_settings_save_details( $post_id, $post ){
	global $pagenow;

	if ( 'post.php' != $pagenow ) return $post_id;

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return $post_id;

	$post_type = get_post_type_object( $post->post_type );
	if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) )
		return $post_id;

	if ( !isset( $_POST['pillar_settings_nonce'] ) || ! wp_verify_nonce( $_POST['pillar_settings_nonce'], basename( __FILE__ ) ) )
		return $post_id;
	
	if ( isset( $_POST['pillar_theme'] ) ) {
		update_post_meta( $post_id, 'pillar_theme',  htmlentities( $_POST['pillar_theme'] ) );
	}else{
		delete_post_meta( $post_id, 'pillar_theme' );
	}

	if ( isset( $_POST['pillar_theme_align'] ) ) {
		update_post_meta( $post_id, 'pillar_theme_align',  htmlentities( $_POST['pillar_theme_align'] ) );
	}else{
		delete_post_meta( $post_id, 'pillar_theme_align' );
	}

	if ( isset( $_POST['pillar_theme_valign'] ) ) {
		update_post_meta( $post_id, 'pillar_theme_valign',  htmlentities( $_POST['pillar_theme_valign'] ) );
	}else{
		delete_post_meta( $post_id, 'pillar_theme_valign' );
	}
	
	if ( isset( $_POST['pillar_color'] ) ) {
		update_post_meta( $post_id, 'pillar_color',  $_POST['pillar_color'] );
	}else{
		delete_post_meta( $post_id, 'pillar_color' );
	}
	
	if ( isset( $_POST['pillar_callout_theme'] ) ) {
		update_post_meta( $post_id, 'pillar_callout_theme',  $_POST['pillar_callout_theme'] );
	}else{
		delete_post_meta( $post_id, 'pillar_callout_theme' );
	}
	
	if ( isset( $_POST['pillar_callout_copy'] ) ) {
		update_post_meta( $post_id, 'pillar_callout_copy',  htmlentities( $_POST['pillar_callout_copy'] ) );
	}else{
		delete_post_meta( $post_id, 'pillar_callout_copy' );
	}
	
	if ( isset( $_POST['pillar_photo_box_url'] ) ) {
		update_post_meta( $post_id, 'pillar_photo_box_url',  htmlentities( $_POST['pillar_photo_box_url'] ) );
	}else{
		delete_post_meta( $post_id, 'pillar_photo_box_url' );
	}
	
	if ( isset( $_POST['pillar_vector_box_copy'] ) ) {
		update_post_meta( $post_id, 'pillar_vector_box_copy',  htmlentities( $_POST['pillar_vector_box_copy'] ) );
	}else{
		delete_post_meta( $post_id, 'pillar_vector_box_copy' );
	}
	
	if ( isset( $_POST['pillar_photo_vector_box_copy'] ) ) {
		update_post_meta( $post_id, 'pillar_photo_vector_box_copy',  htmlentities( $_POST['pillar_photo_vector_box_copy'] ) );
	}else{
		delete_post_meta( $post_id, 'pillar_photo_vector_box_copy' );
	}
	
	if ( isset( $_POST['pillar_gradient_box_copy'] ) ) {
		update_post_meta( $post_id, 'pillar_gradient_box_copy',  htmlentities( $_POST['pillar_gradient_box_copy'] ) );
	}else{
		delete_post_meta( $post_id, 'pillar_gradient_box_copy' );
	}
	
	if ( isset( $_POST['pillar_gradient_box2_copy'] ) ) {
		update_post_meta( $post_id, 'pillar_gradient_box2_copy',  htmlentities( $_POST['pillar_gradient_box2_copy'] ) );
	}else{
		delete_post_meta( $post_id, 'pillar_gradient_box2_copy' );
	}
	
	/* Pushdown */
	if ( isset( $_POST['pillar_pushdown_copy'] ) ) {
		update_post_meta( $post_id, 'pillar_pushdown_copy',  htmlentities( $_POST['pillar_pushdown_copy'] ) );
	}else{
		delete_post_meta( $post_id, 'pillar_pushdown_copy' );
	}
	
	if ( isset( $_POST['pillar_pushdown_btn_txt'] ) ) {
		update_post_meta( $post_id, 'pillar_pushdown_btn_txt',  htmlentities( $_POST['pillar_pushdown_btn_txt'] ) );
	}else{
		delete_post_meta( $post_id, 'pillar_pushdown_btn_txt' );
	}
	
	if ( isset( $_POST['pillar_pushdown_push_caption'] ) ) {
		update_post_meta( $post_id, 'pillar_pushdown_push_caption',  htmlentities( $_POST['pillar_pushdown_push_caption'] ) );
	}else{
		delete_post_meta( $post_id, 'pillar_pushdown_push_caption' );
	}
	
	if ( isset( $_POST['pillar_pushdown_push_img'] ) ) {
		update_post_meta( $post_id, 'pillar_pushdown_push_img',  htmlentities( $_POST['pillar_pushdown_push_img'] ) );
	}else{
		delete_post_meta( $post_id, 'pillar_pushdown_push_img' );
	}
	
	/* Global */
	if ( isset( $_POST['pillar_seo_description'] ) ) {
		update_post_meta( $post_id, 'pillar_seo_description',  htmlentities( $_POST['pillar_seo_description'] ) );
	}else{
		delete_post_meta( $post_id, 'pillar_seo_description' );
	}
	
	if ( isset( $_POST['pillar_member_position'] ) ) {
		update_post_meta( $post_id, 'pillar_member_position',  htmlentities( $_POST['pillar_member_position'] ) );
	}else{
		delete_post_meta( $post_id, 'pillar_member_position' );
	}

}
add_action( 'save_post', 'pillar_metabox_settings_save_details', 10, 2 );
endif;
?>