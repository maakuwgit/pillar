<?php
/**
 * Login Form
 * @package Theme My Login
 * @subpackage Pillar
 * @since 2.1.2
 * @version 2.2
 */
?>
<div class="tml tml-login" id="theme-my-login">
	<img class="logo" alt="Pillar Biosciences" src="<?php echo get_theme_file_uri( 'assets/images/logo-pillar-full_color.svg'); ?>">
	<hr>
	<h2>Login</h2>
	<p class="message">Pillar Biosciences members login below. If you are a first time visitor <a href="<?php echo bloginfo('url') . '/register/';?>">register&nbsp;here</a>.</p>
	<?php $template->the_action_template_message( 'login' ); ?>
	<?php $template->the_errors(); ?>
	<form name="loginform" id="loginform" action="<?php $template->the_action_url( 'login', 'login_post' ); ?>" method="post">
		<p class="tml-user-login-wrap">
			<label for="user_login"><?php
				if ( 'username' == $theme_my_login->get_option( 'login_type' ) ) {
					_e( 'Username', 'theme-my-login' );
				} elseif ( 'email' == $theme_my_login->get_option( 'login_type' ) ) {
					_e( 'Email', 'theme-my-login' );
				} else {
					_e( 'Enter your email or username', 'theme-my-login' );
				}
			?></label>
			<input type="text" name="log" id="user_login" class="input" value="<?php $template->the_posted_value( 'log' ); ?>" size="20">
		</p>

		<p class="tml-user-pass-wrap">
			<label for="user_pass"><?php _e( 'Password', 'theme-my-login' ); ?></label>
			<input type="password" name="pwd" id="user_pass" class="input" value="" size="20" autocomplete="off">
		</p>

		<?php do_action( 'login_form' ); ?>

		<div class="tml-rememberme-submit-wrap">
			<p class="tml-rememberme-wrap">
				<input name="rememberme" type="checkbox" id="rememberme" value="forever">
				<label for="rememberme"><?php esc_attr_e( 'Remember Me', 'theme-my-login' ); ?></label>
			</p>

			<input type="submit" name="wp-submit" id="wp-submit" value="<?php esc_attr_e( 'Log In', 'theme-my-login' ); ?>">
			<input type="hidden" name="redirect_to" value="<?php $template->the_redirect_url( 'login' ); ?>">
			<input type="hidden" name="instance" value="">
			<input type="hidden" name="action" value="login">
		</div>
	</form>
	<?php $template->the_action_links( array( 'login' => false ) ); ?>
</div>
