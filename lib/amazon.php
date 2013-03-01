<?php
//http://justintadlock.com/archives/2009/09/10/adding-and-using-custom-user-profile-fields
add_action( 'show_user_profile', 'add_amazon_track_code' );
add_action( 'edit_user_profile', 'add_amazon_track_code' );

function add_amazon_track_code( $user ) { ?>

	<h3>Extra profile information</h3>

	<table class="form-table">

		<tr>
			<th><label for="amz">Amazon</label></th>

			<td>
				<input type="text" name="amz" id="amz" value="<?php echo esc_attr( get_the_author_meta( 'amz', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Amazon tracking code</span>
			</td>
		</tr>

	</table>
<?php } 
add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	/* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
	update_user_meta( $user_id, 'amz', $_POST['amz'] );
}


?>