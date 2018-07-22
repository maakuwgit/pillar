<?php
/**
 * Registration Form
 * @package Theme My Login
 * @subpackage Pillar
 * @since 2.1.9
 * @version 2.8.7
 */
		$selected = $template->the_posted_value( 'user_organization', $user->ID );
?>
<div class="tml tml-register" id="theme-my-login">
	<img class="logo" alt="Pillar Biosciences" src="<?php echo get_theme_file_uri( 'assets/images/logo-pillar-full_color.svg'); ?>">
	<hr>
	<h2>Register</h2>
	<?php $template->the_errors(); ?>
	<form name="registerform" id="registerform" action="<?php $template->the_action_url( 'register', 'login_post' ); ?>" method="post">

			<label for="user_login" class="required"><?php _e( 'Username', 'theme-my-login' ); ?></label>
			<input type="text" name="user_login" id="user_login" class="input required" required value="<?php $template->the_posted_value( 'user_login' ); ?>" size="20">
			
			<label for="first_name" class="required"><?php _e( 'First Name', 'theme-my-login' ); ?></label>
			<input type="text" name="first_name" id="first_name" class="input required" value="<?php $template->the_posted_value( 'first_name' ); ?>" size="20">

			<label for="last_name" class="required"><?php _e( 'Last Name', 'theme-my-login' ); ?></label>
			<input type="text" name="last_name" id="last_name" class="input required" value="<?php $template->the_posted_value( 'last_name' ); ?>" size="20">
			
			<label for="user_position_title"><?php _e( 'Position Title', 'theme-my-login' ); ?></label>
			<input type="text" name="user_position_title" id="user_position_title" class="input" value="<?php $template->the_posted_value( 'user_position_title' ); ?>" size="20">
			
			<label for="user_organization" class="required"><?php _e( 'Organization', 'theme-my-login' ); ?></label>
			<input type="text" name="user_organization" id="user_organization" class="input required" value="<?php $template->the_posted_value( 'user_organization' ); ?>" size="20">
			
			<label for="user_organization_type" class="required"><?php _e( 'Type of Organization', 'theme-my-login' ); ?></label>
			<select name="user_organization_type" id="user_organization_type" class="input required">
				<option value=""<?php if($selected == '') echo ' selected';?>></option>
				<option value="academic_medical_center_hospital_lab"<?php if($selected == 'academic_medical_center_hospital_lab') echo ' selected';?>>Academic Medical Center Hospital Lab</option>
				<option value="academic_medical_center_research_lab"<?php if($selected == 'academic_medical_center_research_lab') echo ' selected';?>>Academic Medical Center Research Lab</option>
				<option value="commercial_testing_lab"<?php if($selected == 'commercial_testing_lab') echo ' selected';?>>Commercial testing Lab</option>
			</select>

			<label for="user_address"><?php _e( 'Address', 'theme-my-login' ); ?></label>
			<input type="text" name="user_address" id="user_address" class="input" value="<?php $template->the_posted_value( 'user_address' ); ?>" size="20">


			<label for="user_country"><?php _e( 'Country	', 'theme-my-login' ); ?></label>
			<input type="text" name="user_country" id="user_country" class="input" value="<?php $template->the_posted_value( 'user_country' ); ?>" size="20">

			<label for="user_email" class="required"><?php _e( 'Email', 'theme-my-login' ); ?></label>
			<input type="email" name="user_email" id="user_email" class="input required" value="<?php $template->the_posted_value( 'user_email' ); ?>" size="20">

			<label for="user_phone"><?php _e( 'Phone', 'theme-my-login' ); ?></label>
			<input type="text" name="user_phone" id="user_phone" class="input" value="<?php $template->the_posted_value( 'user_phone' ); ?>" size="20">

		<?php do_action( 'register_form' ); ?>

		<p class="tml-registration-confirmation" id="reg_passmail"><?php echo apply_filters( 'tml_register_passmail_template_message', __( 'Registration confirmation will be e-mailed to you.', 'theme-my-login' ) ); ?></p>

		<input type="submit" name="wp-submit" id="wp-submit" value="<?php esc_attr_e( 'Register', 'theme-my-login' ); ?>">
		<input type="hidden" name="redirect_to" value="<?php $template->the_redirect_url( 'register' ); ?>">
		<input type="hidden" name="instance" value="">
		<input type="hidden" name="action" value="register">
	</form>
	<?php $template->the_action_links( array( 'register' => false ) ); ?>
</div>