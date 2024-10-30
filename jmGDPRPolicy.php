<?php

class jmGDPRPolicy {


    //Add field with PRIVACY POLICY checkbox to the end of register form
	function addFieldToForm(){
		?>
		<p>
			<label for="jmgdpr_privacy_policy"><?php _e( 'Privacy Policy', 'jm-gdpr-plugin' ) ?><br />
				<input type="checkbox" name="jmgdpr_privacy_policy" id="jmgdpr_privacy_policy" class="checkbox" /> <?php echo get_option("jmgdpr_privacy_checkbox_label");?>
			</label>
            <a href="<? echo get_permalink(get_option("jmgdpr_privacy_policy_link")["page_id"]); ?>"><?php echo __("More info", "jmgdpr"); ?></a>
		</p>
		<?php
	}

	//Validate this field
	function fieldValidation($errors, $sanitized_user_login, $user_email){

		if ( ! isset( $_POST['jmgdpr_privacy_policy'] ) ) {
			$errors->add( 'policy_error',  __("ERROR: Please accept our privacy policy!", "jmgdpr"));
		}
		return $errors;
	}

	//Save this field
	function fieldSave($user_id){
		if(isset($_POST['jmgdpr_privacy_policy'])){
			update_user_meta( $user_id, 'jmgdpr_privacy_policy', true );
		}
	}


}