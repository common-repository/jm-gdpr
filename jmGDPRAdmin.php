<?php

class jm_GDPRAdmin {


	function __construct() {
		add_action( 'admin_menu', [$this, "set"] );
	}

	function set() {
		add_menu_page( 'GDPR Plugin settings', 'GDPR Plugin', 'manage_options', 'jm-gdpr-plugin', [$this,"render"], 'dashicons-lock', 1  );
	}

	function render(){
		?>

		<div class="wrap">
			<h1 class="wp-heading-inline">GDPR4Everyone</h1>
            <p><?php echo __("You can use shortcode [GDPRDeleteUserForm] to show form to delete user by enter its email and password","jmgdpr");?></p>
			<hr class="wp-header-end">

			<h2 class="nav-tab-wrapper wp-clearfix">
				<p class="nav-tab nav-tab-active"><?php echo __("Global", "jmgdpr"); ?></p>
			</h2>

			<form action="options.php" method="post">

				<?php
				settings_fields( 'jmgdpr_settings_group' );
				do_settings_sections( 'jmgdpr_settings_group' );
				?>


				<table class="form-table">
					<tr valign="top">
						<th scope="row"><?php echo __("Show cookie message", "jmgdpr"); ?></th>
						<td><input type="radio" name="jmgdpr_show_cookie_message" value="true" <?php echo checked("true", get_option('jmgdpr_show_cookie_message') , true); ?>" /> Yes
							&nbsp;&nbsp;&nbsp;	<input type="radio" name="jmgdpr_show_cookie_message" value="false" <?php echo checked("false", get_option('jmgdpr_show_cookie_message') , true); ?>" /> No</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php echo __("Show privacy checkbox at register", "jmgdpr"); ?></th>
						<td><input type="radio" name="jmgdpr_show_privacy_checkbox" value="true" <?php echo checked("true", get_option('jmgdpr_show_privacy_checkbox') , true); ?>" /> Yes
							&nbsp;&nbsp;&nbsp;	<input type="radio" name="jmgdpr_show_privacy_checkbox" value="false" <?php echo checked("false", get_option('jmgdpr_show_privacy_checkbox') , true); ?>" /> No</td>
					</tr>



				</table>


				<h2 class="nav-tab-wrapper wp-clearfix">
					<p class="nav-tab nav-tab-active"><?php echo __("Cookies", "jmgdpr"); ?></p>
				</h2>


				<table class="form-table">
					<tr valign="top">
						<th scope="row"><?php echo __("Cookie message", "jmgdpr"); ?></th>
						<td><textarea rows="5" cols="70" name="jmgdpr_cookie_message"><?php echo get_option('jmgdpr_cookie_message'); ?></textarea></td>

					</tr>
					<tr valign="top">
						<th scope="row"><?php echo __("Show more text", "jmgdpr"); ?></th>
						<td><input type="text" name="jmgdpr_cookie_link_text" value="<?php echo get_option('jmgdpr_cookie_link_text');?>" /> </td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php echo __("Show more href", "jmgdpr"); ?></th>
						<td><input type="text" name="jmgdpr_cookie_link_href" value="<?php echo get_option('jmgdpr_cookie_link_href');?>" /> </td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php echo __("Ok label", "jmgdpr"); ?></th>
						<td><input type="text" name="jmgdpr_cookie_ok_text" value="<?php echo get_option('jmgdpr_cookie_ok_text');?>" /> </td>
					</tr>


				</table>
				<h2 class="nav-tab-wrapper wp-clearfix">
					<p class="nav-tab nav-tab-active"><?php echo __("Privacy Policy", "jmgdpr"); ?></p>
				</h2>
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><?php echo __("Privacy policy checkbox title", "jmgdpr"); ?></th>
						<td><input type="text" name="jmgdpr_privacy_checkbox_label" value="<?php echo get_option('jmgdpr_privacy_checkbox_label');?>" /> </td>
					</tr>

					<tr valign="top">
						<th scope="row"><?php echo __("Choose a page with privacy policy", "jmgdpr"); ?></th>
						<td>
							<select name="jmgdpr_privacy_policy_link[page_id]">
								<?php
								$options = get_option( 'jmgdpr_privacy_policy_link' );

								if( $pages = get_pages() ){
									foreach( $pages as $page ){
										echo '<option value="' . $page->ID . '" ' . selected( $page->ID, $options['page_id'] ) . '>' . $page->post_title . '</option>';
									}
								}
								?>
							</select>
						</td>
					</tr>



				</table>



				<?php submit_button(); ?>
				<style>
					#wpfooter{
						display: none!important;
					}
				</style>
			</form>
		</div>


		</form>
		</div>
		<?php
	}


}