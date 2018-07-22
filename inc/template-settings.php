<?php
/**
 * Post and Page Custom Meta Box Fields
 *
 * @package Lovers&Nerds
 * @subpackage Pillar
 * @since 2.7.9.2
 * @author MaakuW
 *
 */
function pillar_settings_pages() {
	# Organization
	add_options_page( 
		'Organization', 
		'Organization', 
		'manage_options', 
		'pillar_members', 
		'pillar_members_cb'
	);
	
	# News & Events
	add_options_page( 
		'News & Events', 
		'News', 
		'manage_options', 
		'pillar_news_and_events', 
		'pillar_news_and_events_cb'
	);
	
	# Homepage
	add_options_page( 
		'Homepage', 
		'Homepage', 
		'manage_options', 
		'pillar_homepage', 
		'pillar_homepage_cb'
	);
} 
add_action( 'admin_menu', 'pillar_settings_pages' );

function pillar_settings_api_init() {
 
	/*-----------[ Blog ]------------*/
	# Blog Section
	add_settings_section(
		'pillar_setting_section_blog',
		'Blog Settings',
		'pillar_setting_section_blog_cb',
		'general'
	);
	
	add_settings_field(
		'pillar_setting_blog_heading',
		'Heading',
		'pillar_setting_blog_heading_cb',
		'general',
		'pillar_setting_section_blog'
	);
	
	add_settings_field(
		'pillar_setting_blog_bg_img',
		'Background Image',
		'pillar_setting_blog_bg_img_cb',
		'general',
		'pillar_setting_section_blog'
	);
	
	/*----------[ Members ]----------*/
	add_settings_section(
		'pillar_setting_section_members',
		false,
		'pillar_setting_section_members_cb',
		'pillar_members'
	);
	
 	add_settings_field(
		'pillar_setting_members_heading',
		'Heading',
		'pillar_setting_members_heading_cb',
		'pillar_members',
		'pillar_setting_section_members'
	);
	
 	add_settings_field(
		'pillar_setting_members_gradient_box_copy',
		'Gradient Box Copy',
		'pillar_setting_members_gradient_box_copy_cb',
		'pillar_members',
		'pillar_setting_section_members'
	);
	
	/*----------[ News & Events (Articles) ]----------*/
	add_settings_section(
		'pillar_setting_section_news_and_events',
		false,
		'pillar_setting_section_news_and_events_cb',
		'pillar_news_and_events'
	);
	
 	add_settings_field(
		'pillar_setting_news_and_events_heading',
		'Heading',
		'pillar_setting_news_and_events_heading_cb',
		'pillar_news_and_events',
		'pillar_setting_section_news_and_events'
	);
	
 	add_settings_field(
		'pillar_setting_news_and_events_subheading',
		'Subheading',
		'pillar_setting_news_and_events_subheading_cb',
		'pillar_news_and_events',
		'pillar_setting_section_news_and_events'
	);
	
 	add_settings_field(
		'pillar_setting_news_and_events_num_articles',
		'Number of articles to show',
		'pillar_setting_news_and_events_num_articles_cb',
		'pillar_news_and_events',
		'pillar_setting_section_news_and_events'
	);

	/*---------[ Homepage ]----------*/
	# Hero Section
	add_settings_section(
		'pillar_setting_section_hero',
		'Hero Settings',
		'pillar_setting_section_hero_cb',
		'pillar_homepage'
	);
	
	add_settings_field(
		'pillar_setting_homepage_bg_color',
		'Background Color',
		'pillar_setting_homepage_bg_color_cb',
		'pillar_homepage',
		'pillar_setting_section_hero'
	);
	
	add_settings_field(
		'pillar_setting_homepage_bg_img_url_color',
		'Background Image URL',
		'pillar_setting_homepage_bg_img_url_cb',
		'pillar_homepage',
		'pillar_setting_section_hero'
	);

	/* Banner */
	add_settings_section(
		'pillar_setting_section_banner',
		'Banner Settings',
		'pillar_setting_section_banner_cb',
		'pillar_homepage'
	);
	
	add_settings_field(
		'pillar_setting_banner_txt',
		'Call to Action',
		'pillar_setting_banner_txt_cb',
		'pillar_homepage',
		'pillar_setting_section_banner'
	);
	
 	add_settings_field(
		'pillar_setting_banner_url',
		'The "URL" to link to',
		'pillar_setting_banner_url_cb',
		'pillar_homepage',
		'pillar_setting_section_banner'
	);

	# Callout Box
 	add_settings_section(
		'pillar_setting_section_callout',
		'Top Callout Box Settings',
		'pillar_setting_section_callout_cb',
		'pillar_homepage'
	);
 	add_settings_field(
		'pillar_setting_callout_txt',
		'Top, Dark Callout',
		'pillar_setting_callout_txt_cb',
		'pillar_homepage',
		'pillar_setting_section_callout'
	);
 	add_settings_field(
		'pillar_setting_callout2_txt',
		'Bottom Callout Box Settings',
		'pillar_setting_callout2_txt_cb',
		'pillar_homepage',
		'pillar_setting_section_callout'
	);

	# Photobox
 	add_settings_section(
		'pillar_setting_section_photobox',
		'Photo Box Settings',
		'pillar_setting_section_photobox_cb',
		'pillar_homepage'
	);
 	add_settings_field(
		'pillar_setting_vectorbox_heading',
		'Heading',
		'pillar_setting_vectorbox_heading_cb',
		'pillar_homepage',
		'pillar_setting_section_photobox'
	);
	
 	add_settings_field(
		'pillar_setting_vectorbox_subheading',
		'Subheading',
		'pillar_setting_vectorbox_subheading_cb',
		'pillar_homepage',
		'pillar_setting_section_photobox'
	);
	
 	add_settings_field(
		'pillar_setting_vectorbox_btn_txt',
		'Button Text',
		'pillar_setting_vectorbox_btn_txt_cb',
		'pillar_homepage',
		'pillar_setting_section_photobox'
	);
	
 	add_settings_field(
		'pillar_setting_vectorbox_btn_url',
		'Button URL',
		'pillar_setting_vectorbox_btn_url_cb',
		'pillar_homepage',
		'pillar_setting_section_photobox'
	);

	# Iconbox
 	add_settings_section(
		'pillar_setting_section_iconbox',
		'Icon Box Settings',
		'pillar_setting_section_iconbox_cb',
		'pillar_homepage'
	);
 	add_settings_field(
		'pillar_setting_iconbox_heading',
		'Box 1 Heading',
		'pillar_setting_iconbox_heading_cb',
		'pillar_homepage',
		'pillar_setting_section_iconbox'
	);
 	add_settings_field(
		'pillar_setting_iconbox_copy',
		'Box 1 Copy',
		'pillar_setting_iconbox_copy_cb',
		'pillar_homepage',
		'pillar_setting_section_iconbox'
	);
 	add_settings_field(
		'pillar_setting_iconbox2_heading',
		'Box 2 Heading',
		'pillar_setting_iconbox2_heading_cb',
		'pillar_homepage',
		'pillar_setting_section_iconbox'
	);
 	add_settings_field(
		'pillar_setting_iconbox2_copy',
		'Box 2 Copy',
		'pillar_setting_iconbox2_copy_cb',
		'pillar_homepage',
		'pillar_setting_section_iconbox'
	);
	
 	add_settings_field(
		'pillar_setting_iconbox2_btn_txt',
		'Box 2 Button Text',
		'pillar_setting_iconbox2_btn_txt_cb',
		'pillar_homepage',
		'pillar_setting_section_iconbox'
	);
	
 	add_settings_field(
		'pillar_setting_iconbox2_btn_url',
		'Box 2 Button URL',
		'pillar_setting_iconbox2_btn_url_cb',
		'pillar_homepage',
		'pillar_setting_section_iconbox'
	);

	# Global
 	add_settings_section(
		'pillar_setting_section_social',
		'Social Page Settings',
		'pillar_setting_section_social_cb',
		'general'
	);
 	
 	add_settings_field(
		'pillar_setting_social_twitter_url',
		'Twitter',
		'pillar_setting_social_twitter_cb',
		'general',
		'pillar_setting_section_social'
	);
	
 	add_settings_field(
		'pillar_setting_social_linkedin_url',
		'Linkedin',
		'pillar_setting_social_linkedin_cb',
		'general',
		'pillar_setting_section_social'
	);

	//Global 	
 	register_setting( 'general', 'pillar_setting_social_twitter_url' );
 	register_setting( 'general', 'pillar_setting_social_linkedin_url' );

 	//Members
 	register_setting( 'pillar_members', 'pillar_setting_members_heading' );
 	register_setting( 'pillar_members', 'pillar_setting_members_gradient_box_copy' );

 	//News & Events
 	register_setting( 'pillar_news_and_events', 'pillar_setting_news_and_events_heading' );
 	register_setting( 'pillar_news_and_events', 'pillar_setting_news_and_events_subheading' );
 	register_setting( 'pillar_news_and_events', 'pillar_setting_news_and_events_num_articles' );
 	
 	//Blog
 	register_setting( 'general', 'pillar_setting_blog_heading' );
 	register_setting( 'general', 'pillar_setting_blog_img' );
 	
 	//Hero
 	register_setting( 'pillar_homepage', 'pillar_setting_homepage_bg_color' );
 	register_setting( 'pillar_homepage', 'pillar_setting_homepage_bg_img_url' );
 	
 	//Banner
 	register_setting( 'pillar_homepage', 'pillar_setting_banner_txt' );
 	register_setting( 'pillar_homepage', 'pillar_setting_banner_url' );
 	
 	//Callout
 	register_setting( 'pillar_homepage', 'pillar_setting_callout_txt' );
 	register_setting( 'pillar_homepage', 'pillar_setting_callout2_txt' );

 	//Photobox
 	register_setting( 'pillar_homepage', 'pillar_setting_vectorbox_heading' );
 	register_setting( 'pillar_homepage', 'pillar_setting_vectorbox_subheading' );
 	register_setting( 'pillar_homepage', 'pillar_setting_vectorbox_btn_txt' );
 	register_setting( 'pillar_homepage', 'pillar_setting_vectorbox_btn_url' );
 	
 	//Iconbox
 	register_setting( 'pillar_homepage', 'pillar_setting_iconbox_heading' );
 	register_setting( 'pillar_homepage', 'pillar_setting_iconbox_copy' );
 	register_setting( 'pillar_homepage', 'pillar_setting_iconbox2_heading' );
 	register_setting( 'pillar_homepage', 'pillar_setting_iconbox2_copy' );
 	register_setting( 'pillar_homepage', 'pillar_setting_iconbox2_btn_txt' );
 	register_setting( 'pillar_homepage', 'pillar_setting_iconbox2_btn_url' );


 } // eg_settings_api_init()
add_action( 'admin_init', 'pillar_settings_api_init' );

/* Members */
 function pillar_setting_section_members_cb() {
 	echo '<p>An archive of all Organization members. You can customize the heading and gradient box copy of articles shown.</p>';
 }
 
 function pillar_setting_members_heading_cb() {
 	echo '<input name="pillar_setting_members_heading" id="pillar_setting_members_heading" type="text" value="' . esc_html( get_option( 'pillar_setting_members_heading' ) ) . '" class="regular-text">';
 }
 
 function pillar_setting_members_gradient_box_copy_cb() {
 	echo '<textarea name="pillar_setting_members_gradient_box_copy" id="pillar_setting_members_gradient_box_copy" class="regular-text">' . esc_html( get_option( 'pillar_setting_members_gradient_box_copy' ) ) . '</textarea>';
 }

/* News & Events */
 function pillar_setting_section_news_and_events_cb() {
 	echo '<p>An archive of all your Articles (and Events in the future). You can customize the heading, subheading and number of articles shown.</p>';
 }
 
 function pillar_setting_news_and_events_heading_cb() {
 	echo '<input name="pillar_setting_news_and_events_heading" id="pillar_setting_news_and_events_heading" type="text" value="' . esc_html( get_option( 'pillar_setting_news_and_events_heading' ) ) . '" class="regular-text">';
 }
 
 function pillar_setting_news_and_events_subheading_cb() {
 	echo '<input name="pillar_setting_news_and_events_subheading" id="pillar_setting_news_and_events_subheading" type="text" value="' . esc_html( get_option( 'pillar_setting_news_and_events_subheading' ) ) . '" class="regular-text">';
 }
 
 function pillar_setting_news_and_events_num_articles_cb() {
 	echo '<input name="pillar_setting_news_and_events_num_articles" id="pillar_setting_news_and_events_num_articles" type="number" value="' . get_option( 'pillar_setting_news_and_events_num_articles' ) . '" class="small-text">&nbsp;articles';
 }
 
/* Blog */
 function pillar_setting_section_blog_cb() {
 	echo '<p>The <em>Blog</em> page is an archive of all your Posts. You can customize the heading and background image below.</p>';
 }
 
 function pillar_setting_blog_heading_cb() {
 	echo '<input name="pillar_setting_blog_heading" id="pillar_setting_blog_heading" type="text" value="' . esc_html( get_option( 'pillar_setting_blog_heading' ) ) . '" class="regular-text">';
 }
 
 function pillar_setting_blog_bg_img_cb() {
 	echo '<input name="pillar_setting_blog_img" id="pillar_setting_blog_img" type="text" value="' . esc_html( get_option( 'pillar_setting_blog_img' ) ) . '" class="regular-text">';
 }
  
/* Hero */
 function pillar_setting_section_hero_cb() {
 	echo '<p>A large image element appears at the the top of frontpage of the website. The <em>Background Image</em> and <em>Background Color</em> of the image, can be customized below</p>';
 }
 
 function pillar_setting_homepage_bg_color_cb() {
 	echo '<input name="pillar_setting_homepage_bg_color" id="pillar_setting_homepage_bg_color" type="text" value="' . esc_html( get_option( 'pillar_setting_homepage_bg_color' ) ) . '" class="regular-text" data-iris>';
 }
 
 function pillar_setting_homepage_bg_img_url_cb() {
 	echo '<input name="pillar_setting_homepage_bg_img_url" id="pillar_setting_homepage_bg_img_url" type="text" value="' . esc_html( get_option( 'pillar_setting_homepage_bg_img_url' ) ) . '" class="regular-text">';
 }
 
 /* Banner */
 function pillar_setting_section_banner_cb() {
 	echo '<p>Spanning the full width of the screen, this element display a short blurb of text over an image</p>';
 }
 function pillar_setting_banner_txt_cb() {
 	echo '<input name="pillar_setting_banner_txt" id="pillar_setting_banner_txt" type="text" value="' . esc_html( get_option( 'pillar_setting_banner_txt' ) ) . '" class="regular-text">';
 }
 function pillar_setting_banner_url_cb() {
 	echo '<input name="pillar_setting_banner_url" id="pillar_setting_banner_url" type="text" value="' . esc_html( get_option( 'pillar_setting_banner_url' ) ) . '" class="regular-text">';
 }
 
 /* Callouts */
 function pillar_setting_section_callout_cb() {
 	echo '<p>Spanning the full width of the screen, this element display a short blurb of text over an image. There are two for this theme, one on top below the <em>Hero</em> and one just above the final 3 grey blocks</p>';
 }
 function pillar_setting_callout_txt_cb() {
 	echo '<input name="pillar_setting_callout_txt" id="pillar_setting_callout_txt" type="text" value="' . esc_html( get_option( 'pillar_setting_callout_txt' ) ) . '" class="regular-text">';
 }
 function pillar_setting_callout2_txt_cb() {
 	echo '<input name="pillar_setting_callout2_txt" id="pillar_setting_callout2_txt" type="text" value="' . esc_html( get_option( 'pillar_setting_callout2_txt' ) ) . '" class="regular-text">';
 }

/* PhotoBox */
 function pillar_setting_section_photobox_cb() {
 	echo '<p>This element shows an image on the left, and a box on the right with a short <em>Heading</em> and a nice chunk of copy for a <em>Subheading</em> (no more than 300 characters, please).</p>';
 }
 
 function pillar_setting_vectorbox_heading_cb() {
 	echo '<input name="pillar_setting_vectorbox_heading" id="pillar_setting_vectorbox_heading" type="text" value="' . esc_html( get_option( 'pillar_setting_vectorbox_heading' ) ) . '" class="regular-text">';
 }

 function pillar_setting_vectorbox_subheading_cb() {
 	echo '<textarea name="pillar_setting_vectorbox_subheading" id="pillar_setting_vectorbox_subheading" class="regular-text">' . esc_html( get_option( 'pillar_setting_vectorbox_subheading' ) ) . '</textarea>';
 }

 function pillar_setting_vectorbox_btn_txt_cb() {
 	echo '<input name="pillar_setting_vectorbox_btn_txt" id="pillar_setting_vectorbox_btn_txt" class="regular-text" value="' . esc_html( get_option( 'pillar_setting_vectorbox_btn_txt' ) ) . '">';
 }

 function pillar_setting_vectorbox_btn_url_cb() {
 	echo '<input name="pillar_setting_vectorbox_btn_url" id="pillar_setting_vectorbox_btn_url" class="regular-text" value="' . esc_html( get_option( 'pillar_setting_vectorbox_btn_url' ) ) . '">';
 }

/* IconBox */
 function pillar_setting_section_iconbox_cb() {
 	echo '<p>This element shows an image on the left, and a box on the right with a short <em>Heading</em> and a nice chunk of copy for a <em>Subheading</em> (no more than 300 characters, please).</p>';
 }
 
 function pillar_setting_iconbox_heading_cb() {
 	echo '<input name="pillar_setting_iconbox_heading" id="pillar_setting_iconbox_heading" type="text" value="' . esc_html( get_option( 'pillar_setting_iconbox_heading' ) ) . '" class="regular-text">';
 }

 function pillar_setting_iconbox_copy_cb() {
 	echo '<textarea name="pillar_setting_iconbox_copy" id="pillar_setting_iconbox_copy" class="regular-text">' . esc_html( get_option( 'pillar_setting_iconbox_copy' ) ) . '</textarea>';
 }
 
 function pillar_setting_iconbox2_heading_cb() {
 	echo '<input name="pillar_setting_iconbox2_heading" id="pillar_setting_iconbox2_heading" type="text" value="' . esc_html( get_option( 'pillar_setting_iconbox2_heading' ) ) . '" class="regular-text">';
 }

 function pillar_setting_iconbox2_copy_cb() {
 	echo '<textarea name="pillar_setting_iconbox2_copy" id="pillar_setting_iconbox2_copy" class="regular-text">' . esc_html( get_option( 'pillar_setting_iconbox2_copy' ) ) . '</textarea>';
 }

 function pillar_setting_iconbox2_btn_txt_cb() {
 	echo '<input name="pillar_setting_iconbox2_btn_txt" id="pillar_setting_iconbox2_btn_txt" class="regular-text" value="' . esc_html( get_option( 'pillar_setting_iconbox2_btn_txt' ) ) . '">';
 }

 function pillar_setting_iconbox2_btn_url_cb() {
 	echo '<input name="pillar_setting_iconbox2_btn_url" id="pillar_setting_iconbox2_btn_url" class="regular-text" value="' . esc_html( get_option( 'pillar_setting_iconbox2_btn_url' ) ) . '">';
 }

/* Global */
 function pillar_setting_section_social_cb() {
 	echo '<p>The URL for selected social profiles can be typed/pasted into the fields below. If a link is included, the corresponding social-network icon will appear as a link in the footer to the left of the footer widgets.</p>';
 }

 function pillar_setting_social_twitter_cb() {
 	echo '<input name="pillar_setting_social_twitter_url" id="pillar_setting_social_twitter_url" type="text" value="' . get_option( 'pillar_setting_social_twitter_url' ) . '" class="regular-text">';
 }

 function pillar_setting_social_linkedin_cb() {
 	echo '<input name="pillar_setting_social_linkedin_url" id="pillar_setting_social_linkedin_url" type="text" value="' . get_option( 'pillar_setting_social_linkedin_url' ) . '" class="regular-text">';
 }
 
 function pillar_homepage_cb() {
	 if ( ! current_user_can( 'manage_options' ) ) return;
	 
	 if ( isset( $_GET['settings-updated'] ) ) {
		 // add settings saved message with the class of "updated"
		 add_settings_error( 'pillar_messages', 'pillar_message', __( 'Settings Saved', 'pillar' ), 'updated' );
	 }
	 
	 // show error/update messages
	 settings_errors( 'pillar_messages' );
?>
 <div class="wrap">
	 <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
	 <form action="options.php" method="post">
	 <?php
	 // output security fields for the registered setting "wporg"
	 settings_fields( 'pillar_homepage' );
	 // output setting sections and their fields
	 // (sections are registered for "wporg", each field is registered to a specific section)
	 do_settings_sections( 'pillar_homepage' );
	 // output save settings button
	 submit_button( 'Save Settings' );
	 ?>
	 </form>
 </div>
 <?php
 }
 
 function pillar_news_and_events_cb() {
	 if ( ! current_user_can( 'manage_options' ) ) return;
	 
	 if ( isset( $_GET['settings-updated'] ) ) {
		 // add settings saved message with the class of "updated"
		 add_settings_error( 'pillar_messages', 'pillar_message', __( 'Settings Saved', 'pillar' ), 'updated' );
	 }
	 
	 // show error/update messages
	 settings_errors( 'pillar_messages' );
?>
 <div class="wrap">
	 <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
	 <form action="options.php" method="post">
	 <?php
	 // output security fields for the registered setting "wporg"
	 settings_fields( 'pillar_news_and_events' );
	 // output setting sections and their fields
	 // (sections are registered for "wporg", each field is registered to a specific section)
	 do_settings_sections( 'pillar_news_and_events' );
	 // output save settings button
	 submit_button( 'Save Settings' );
	 ?>
	 </form>
 </div>
 <?php
 }
 
 function pillar_members_cb() {
	 if ( ! current_user_can( 'manage_options' ) ) return;
	 
	 if ( isset( $_GET['settings-updated'] ) ) {
		 // add settings saved message with the class of "updated"
		 add_settings_error( 'pillar_messages', 'pillar_message', __( 'Settings Saved', 'pillar' ), 'updated' );
	 }
	 
	 // show error/update messages
	 settings_errors( 'pillar_messages' );
?>
 <div class="wrap">
	 <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
	 <form action="options.php" method="post">
	 <?php
	 // output security fields for the registered setting "wporg"
	 settings_fields( 'pillar_members' );
	 // output setting sections and their fields
	 // (sections are registered for "wporg", each field is registered to a specific section)
	 do_settings_sections( 'pillar_members' );
	 // output save settings button
	 submit_button( 'Save Settings' );
	 ?>
	 </form>
 </div>
 <?php
 }

?>