<?php
class jmGDPRShortcodes {

	function __construct() {

		add_shortcode("GDPRDeleteUserForm",[$this,"deleteUser"]);

	}

	function deleteUser(){
		$return = "<form action=''><input type='text' name='jmGDPREmail' placeholder='".__( "Please enter email of account to be deleted", "jmrgdpr" )."'><input type='password' name='jmGDPRPassword' placeholder='".__( "Please enter password to account", "jmrgdpr" )."'><input type='submit' name='jmGDPRDeleteSubmit' value='".__( "Delete this account", "jmrgdpr" )."'> </form>";
		return $return;
	}

	function deleteUserProcess($email, $password){
		require_once(ABSPATH.'wp-admin/includes/user.php');


		$user = get_user_by( 'email', $email );
		if ( $user && wp_check_password( $password, $user->data->user_pass, $user->ID) ) {
			wp_delete_user( $user->ID );
			echo "<script>alert('" . __( "Account you entered and all data with it was successful deleted", "jmrgdpr" ) . "');</script>";
		} else {
			echo "<script>alert('" . __( 'Password or email you entered was wrong. Try it again', 'jmrgdpr') . "');</script>";
		}
	}



}