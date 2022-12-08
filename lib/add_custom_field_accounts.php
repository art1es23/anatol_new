<?php
/**
 * Get additional account fields.
 *
 * @see https://iconicwp.com/blog/the-ultimate-guide-to-adding-custom-woocommerce-user-account-fields/
 *
 * @return array
 */
function iconic_get_account_fields() {
	return apply_filters( 'iconic_account_fields', array(
		'user_equipment' => array(
			'type'        => 'text',
			'label'       => __( 'My Equipment', 'iconic' ),
			
		),
		
	) );
}
/**
 * Add fields to registration form and account area.
 *
 * @see https://iconicwp.com/blog/the-ultimate-guide-to-adding-custom-woocommerce-user-account-fields/
 */
function iconic_print_user_frontend_fields() {
	$fields = iconic_get_account_fields();

	foreach ( $fields as $key => $field_args ) {
		woocommerce_form_field( $key, $field_args );
	}
}

add_action( 'woocommerce_register_form', 'iconic_print_user_frontend_fields', 10 ); // register form
add_action( 'woocommerce_edit_account_form', 'iconic_print_user_frontend_fields', 10 ); // my account


/**
 * Add fields to admin area.
 *
 * @see https://iconicwp.com/blog/the-ultimate-guide-to-adding-custom-woocommerce-user-account-fields/
 */
function iconic_print_user_admin_fields() {
	$fields = iconic_get_account_fields();
	?>
	<h2><?php _e( 'Additional Information', 'iconic' ); ?></h2>
	<table class="form-table" id="iconic-additional-information">
		<tbody>
		<?php foreach ( $fields as $key => $field_args ) { ?>
			<tr>
				<th>
					<label for="<?php echo $key; ?>"><?php echo $field_args['label']; ?></label>
				</th>
				<td>
					<?php $field_args['label'] = false; ?>
					<?php woocommerce_form_field( $key, $field_args ); ?>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
	<?php
}

add_action( 'show_user_profile', 'iconic_print_user_admin_fields', 10 ); // admin: edit profile
add_action( 'edit_user_profile', 'iconic_print_user_admin_fields', 10 ); // admin: edit other users


?>