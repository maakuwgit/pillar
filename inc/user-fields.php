<?php

if ( ! function_exists( 'pillar_user_fields' ) ) :
/**
 * Create additional User fields
 *
 * @package Lovers&Nerds
 * @since Pillar 2.3
 * @version 2.8.7
 * @author MaakuW
 *
 */
 /*Dev Note: Double-check all the fields are being stored correctly. The Institution and Institution Type were swapped*/
  function pillar_user_fields( $user ) { 
	
		$selected = esc_attr( get_the_author_meta( 'user_organization_type', $user->ID ) );
		
	?>
	
  <h3>Pillar User</h3>
  <table class="form-table">
  	<tr class="form-required">
			<th scope="row">
				<label for="user_position_title">Position Title</label>
			</th>
			<td>
				<input class="regular-text ltr" name="user_position_title" type="text" id="user_position_title" value="<?php echo esc_attr( get_the_author_meta( 'user_position_title', $user->ID ) ); ?>" aria-required="true" autocapitalize="none" autocorrect="off" maxlength="60">
			</td>
		</tr>
  	<tr class="form-required">
			<th scope="row">
				<label for="user_phone">Phone</label>
			</th>
			<td>
				<input class="regular-text ltr" name="user_phone" type="tel" id="user_phone" value="<?php echo esc_attr( get_the_author_meta( 'user_phone', $user->ID ) ); ?>" aria-required="false" autocorrect="off" maxlength="10">
			</td>
		</tr>
  	<tr class="form-required">
			<th scope="row">
				<label for="user_address">Address</label>
			</th>
			<td>
				<textarea class="regular-text ltr" name="user_address" id="user_address" aria-required="false" autocapitalize="none" autocorrect="off" maxlength="300"><?php echo esc_attr( get_the_author_meta( 'user_address', $user->ID ) ); ?></textarea>
			</td>
		</tr>
  	<tr class="form-required">
			<th scope="row">
				<label for="user_country">Country</label>
			</th>
			<td>
				<input class="regular-text ltr" name="user_country" type="text" id="user_country" value="<?php echo esc_attr( get_the_author_meta( 'user_country', $user->ID ) ); ?>" aria-required="false" autocapitalize="none" autocorrect="off" maxlength="50">
			</td>
		</tr>
  	<tr class="form-required">
			<th scope="row">
				<label for="user_organization">Institution</label>
			</th>
			<td>
				<input class="regular-text ltr" name="user_organization" type="text" id="user_organization" value="<?php echo esc_attr( get_the_author_meta( 'user_organization', $user->ID ) ); ?>" aria-required="true" autocapitalize="none" autocorrect="off" maxlength="50">
			</td>
  	</tr>
  	<tr class="form-required">
			<th scope="row">
				<label for="user_organization_type">Institution Type</label>
			</th>
			<td>
				<select name="user_organization_type" id="user_organization_type" class="input required">
					<option value=""<?php if($selected == '') echo ' selected';?>></option>
					<option value="academic_medical_center_hospital_lab"<?php if($selected == 'academic_medical_center_hospital_lab') echo ' selected';?>>Academic Medical Center Hospital Lab</option>
					<option value="academic_medical_center_research_lab"<?php if($selected == 'academic_medical_center_research_lab') echo ' selected';?>>Academic Medical Center Research Lab</option>
					<option value="commercial_testing_lab"<?php if($selected == 'commercial_testing_lab') echo ' selected';?>>Commercial testing Lab</option>
				</select>
			</td>
		</tr>
  </table>
<?php
	}
  add_action( 'show_user_profile', 'pillar_user_fields' );
  add_action( 'edit_user_profile', 'pillar_user_fields' );
endif;

if ( ! function_exists( 'pillar_save_user_fields' ) ) :
/**
 * Save additional User field values
 *
 * @package Lovers&Nerds
 * @since Pillar 2.3
 * @author MaakuW
 *
 */

  function pillar_save_user_fields( $user_id ) {
  	if ( !current_user_can( 'edit_user', $user_id ) )
      return false;

  	update_user_meta( $user_id, 'user_position_title', $_POST['user_position_title'] );
  	update_user_meta( $user_id, 'user_phone', $_POST['user_phone'] );
  	update_user_meta( $user_id, 'user_address', $_POST['user_address'] );
  	update_user_meta( $user_id, 'user_country', $_POST['user_country'] );
  	update_user_meta( $user_id, 'user_organization', $_POST['user_organization'] );
  	update_user_meta( $user_id, 'user_organization_type', $_POST['user_organization_type'] );
  }
	
	add_action( 'personal_options_update', 'pillar_save_user_fields' );
  add_action( 'edit_user_profile_update', 'pillar_save_user_fields' );
endif;