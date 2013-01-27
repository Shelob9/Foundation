<?php
// Create Custom Settings Menu
add_action('admin_menu', 'amzshare_menu');
function amzshare_menu() {
	//Create Sub-Level Menu Page under Settings
	add_submenu_page( 'options-general.php', 'Amazon Tracking Settings', 'Amazon Tracking', 'manage_options', 'amzshare_settings_page', 'amzshare_settings_page');
}
function amzshare_settings_page() {
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
				<input type="text" name="amz-track" size="45" value="<?php echo get_option('amz-track'); ?>" />
			</p>
			<p><input type="submit" name="Submit" value="Save" /></p>
			<input type="hidden" name="action" value="update" />
			<input type="hidden" name="page_options" value="amz-track" />
		</form>
	</div>
<?php
}
add_action( 'show_user_profile', 'amzshare_profile_fields' );
add_action( 'edit_user_profile', 'amzshare_profile_fields' );
function amzshare_profile_fields( $user ) { ?>
	<h3>Extra Field</h3>
	<table class="form-table">
		<tr>
			<th><label for="twitter">Amazon Tracking Code:</label></th>
			<td>
				<input type="text" name="amz-track" id="amz-track" value="<?php echo esc_attr( get_the_author_meta( 'amz-track', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Don't mess with this.</span>
			</td>
		</tr>
	</table>
<?php }
add_action( 'personal_options_update', 'amzshare_save_profile_fields' );
add_action( 'edit_user_profile_update', 'amzshare_save_profile_fields' );
function amzshare_save_profile_fields( $user_id ) {
	if ( !current_user_can( 'edit_user', $user_id ) ){
		return false;
	}
	update_user_meta( $user_id, 'amz-track', $_POST['amz-track'] ); //
}
function amazon_track() {
    if(get_the_author_meta( 'amz-track' )){
        $input = array(get_option('amz-track'), get_the_author_meta( 'amz-track' ));
    }else{
        $input = array(get_option('amz-track'));
    }
    shuffle($input);
?>
<?php echo $input[0]; ?>
<?php
}
?>