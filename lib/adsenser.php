<?php
// Create Custom Settings Menu
add_action('admin_menu', 'adshare_menu');
function adshare_menu() {
	//Create Sub-Level Menu Page under Settings
	add_submenu_page( 'options-general.php', 'Ad Share Settings', 'Ad Share', 'manage_options', 'adshare_settings_page', 'adshare_settings_page');
}
function adshare_settings_page() {
	//must check that the user has the required capability
	if (!current_user_can('manage_options'))
	{
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
?>
<div class="wrap">
		<h2>Ad Share Settings</h2>
		<form method="post" action="options.php">
			<?php wp_nonce_field('update-options') ?>
			<p><strong>Default Channel:</strong><br />
				<input type="text" name="channel-id" size="45" value="<?php echo get_option('channel-id'); ?>" />
			</p>
			<p><input type="submit" name="Submit" value="Save" /></p>
			<input type="hidden" name="action" value="update" />
			<input type="hidden" name="page_options" value="channel-id" />
		</form>
	</div>
<?php
}
add_action( 'show_user_profile', 'adshare_profile_fields' );
add_action( 'edit_user_profile', 'adshare_profile_fields' );
function adshare_profile_fields( $user ) { ?>
	<h3>Extra Field</h3>
	<table class="form-table">
		<tr>
			<th><label for="twitter">Adsense Channel:</label></th>
			<td>
				<input type="text" name="channel-id" id="channel-id" value="<?php echo esc_attr( get_the_author_meta( 'channel-id', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Don't mess with this.</span>
			</td>
		</tr>
	</table>
<?php }
add_action( 'personal_options_update', 'adshare_save_profile_fields' );
add_action( 'edit_user_profile_update', 'adshare_save_profile_fields' );
function adshare_save_profile_fields( $user_id ) {
	if ( !current_user_can( 'edit_user', $user_id ) ){
		return false;
	}
	update_user_meta( $user_id, 'channel-id', $_POST['channel-id'] ); //
}
function adsense_ad() {
    if(get_the_author_meta( 'channel-id' )){
        $input = array(get_option('channel-id'), get_the_author_meta( 'channel-id' ));
    }else{
        $input = array(get_option('channel-id'));
    }
    shuffle($input);
?>
<script type="text/javascript">
	<!--
	google_ad_client = "ca-pub-656408727383623";
	google_ad_slot = "<?php echo $input[0]; ?>";
	google_ad_width = 120;
	google_ad_height = 600;
	//-->
</script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
<?php
}
?>