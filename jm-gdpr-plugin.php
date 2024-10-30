<?php

/*
Plugin Name: GDPR4Everyone
Description: GDPR4Everyone small websites allow you to easily inform users that your sites using cookies and get their consent with privacy policy.
Version: 0.1
Author: Jakub Mudra
Author URI: https://profiles.wordpress.org/jakubmudra123
*/

require_once("jmGDPRPolicy.php");
require_once( "jmGDPRAdmin.php" );
require_once( "jmGDPRCookie.php");
require_once( "jmGDPRShortcodes.php");



class jmGDPRPlugin
{

	public $adminInterface;
	public $policyControler;
	public $CookieControler;
	public $ShortcodeControler;

	/**
	 * jm_gdpr_plugin constructor.
	 */
	public function __construct() {


		$this->adminInterface = new jm_GDPRAdmin();
		$this->CookieControler = new jm_GDPRCookie();
		$this->ShortcodeControler = new jmGDPRShortcodes();
		$this->privacyPolicy();

		add_action("init", [$this,"set"]);
		add_action("init",[$this,"parseDeleteAction"],100);

		load_plugin_textdomain('jmgdpr', FALSE,dirname(plugin_basename(__FILE__)).'/lang/');

	}


	function parseDeleteAction(){
		if(isset($_GET['jmGDPRDeleteSubmit'])){
			if(!empty($_GET['jmGDPREmail']) AND !empty($_GET['jmGDPRPassword'])){
				$this->ShortcodeControler->deleteUserProcess($_GET['jmGDPREmail'],$_GET['jmGDPRPassword']);
			}else {
				echo "<script>alert('".__('You must enter all credentials to delete account. Try it again','jmgdpr')."');</script>";
			}

		}
	}
	/**
	 *set function - set setting of plugin
	 */
	public function set(){
		//Cookies
		register_setting( 'jmgdpr_settings_group', 'jmgdpr_show_cookie_message' );
		register_setting( 'jmgdpr_settings_group', 'jmgdpr_cookie_message' );
		register_setting( 'jmgdpr_settings_group', 'jmgdpr_cookie_link_text' );
		register_setting( 'jmgdpr_settings_group', 'jmgdpr_cookie_link_href' );
		register_setting( 'jmgdpr_settings_group', 'jmgdpr_cookie_ok_text' );


		//Privacy
		register_setting( 'jmgdpr_settings_group', 'jmgdpr_privacy_checkbox_label' );
		register_setting( 'jmgdpr_settings_group', 'jmgdpr_privacy_policy_link' );
		register_setting( 'jmgdpr_settings_group', 'jmgdpr_show_privacy_checkbox' );
	}


	public function install(){

		$this->set();
		update_option("jmgdpr_cookie_message","Snažíme se poskytovat služby v co nejvyšší kvalitě, proto naše stránky využívají technologii cookies. Většina internetových prohlížečů je automaticky nastavena tak, aby byly soubory cookies příjímány. Změnu můžete provést v nastavení svého prohlížeče.");
		update_option("jmgdpr_cookie_link_text","Více informací o ochraně osobních údajů.");
		update_option("jmgdpr_cookie_link_href", "https://policies.google.com/technologies/cookies?hl=cs");
		update_option("jmgdpr_cookie_ok_text","Beru na vědomí");
		update_option("jmgdpr_privacy_checkbox_label","I agree with privacy policy");
		update_option("jmgdpr_show_cookie_message","true");
		update_option("jmgdpr_show_privacy_checkbox","true");

	}
	/**
	 *Privacy
	 */
	private function privacyPolicy(){
		if( get_option('jmgdpr_show_privacy_checkbox') == "true"){
			$this->policyControler = new jmGDPRPolicy();
			//Add field to registration
			add_action("register_form",[$this->policyControler, "addFieldToForm" ]);
			//Add filter to validate it
			add_filter("registration_errors",[$this->policyControler, "fieldValidation" ],10,3);
			//Save it
			add_action("user_register",[$this->policyControler,"fieldSave"]);
		}
	}


	public function enqueue_scripts()
	{
		// Register the script like this for a plugin:
		wp_register_script( 'cookieconsent', plugins_url( '/assets/cookieconsent.js', __FILE__ ));


		wp_enqueue_style( 'cookieconsents-style', plugins_url( '/assets/cookieconsen.css', __FILE__ ) );
		// For either a plugin or a theme, you can then enqueue the script:
		wp_enqueue_script( 'cookieconsent' );
	}







}

//Init function to run
$jmGDPRPlugin = new jmGDPRPlugin();

register_activation_hook(__FILE__,[$jmGDPRPlugin,"install"]);

add_action( 'wp_enqueue_scripts', [$jmGDPRPlugin,"enqueue_scripts"] );