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
<?php } ?>