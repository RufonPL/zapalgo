<?php
/**
 * Edit address form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$page_title = ( $load_address === 'billing' ) ? __( 'Billing Address', 'woocommerce' ) : __( 'Shipping Address', 'woocommerce' );

do_action( 'woocommerce_before_edit_account_address_form' ); ?>

<?php if ( ! $load_address ) : ?>
	<?php wc_get_template( 'myaccount/my-address.php' ); ?>
<?php else : ?>
	<script type="text/javascript">
		jQuery(document).ready(function() { 
			$("#billing_first_name, #shipping_first_name").attr('placeholder', 'First Name*');
			$("#billing_last_name, #shipping_last_name").attr('placeholder', 'Last Name*');
			$("#billing_company, #shipping_company").attr('placeholder', 'Company Name');
			$("#billing_email, #shipping_email").attr('placeholder', 'Email Address*');
			$("#billing_phone, #shipping_phone").attr('placeholder', 'Phone*');
			$("#billing_address_1, #shipping_address_1").attr('value', '');
			$("#billing_address_2, #shipping_address_2").attr('value', '');
			$("#billing_city, #shipping_city").attr('placeholder', 'Town / City*');
			$("#billing_state, #shipping_state").attr('placeholder', 'State / County*');
			$("#billing_postcode, #shipping_postcode").attr('placeholder', 'Postcode / ZIP*');
		});
	</script>

	<form method="post" class="edit-address-data">

		<h3><?php echo apply_filters( 'woocommerce_my_account_edit_address_title', $page_title ); ?></h3>

		<?php do_action( "woocommerce_before_edit_address_form_{$load_address}" ); ?>

		<?php foreach ( $address as $key => $field ) : ?>

			<?php woocommerce_form_field( $key, $field, ! empty( $_POST[ $key ] ) ? wc_clean( $_POST[ $key ] ) : $field['placeholder'] ); ?>

		<?php endforeach; ?>

		<?php do_action( "woocommerce_after_edit_address_form_{$load_address}" ); ?>

		<p>
			<input type="submit" class="button" name="save_address" value="<?php esc_attr_e( 'Save Address', 'woocommerce' ); ?>" />
			<?php wp_nonce_field( 'woocommerce-edit_address' ); ?>
			<input type="hidden" name="action" value="edit_address" />
		</p>

	</form>

<?php endif; ?>

<?php do_action( 'woocommerce_after_edit_account_address_form' ); ?>
