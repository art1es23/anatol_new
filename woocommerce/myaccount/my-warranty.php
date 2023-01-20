<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);
?>
<?php $cur_user_id = get_current_user_id();?>
<?php 
	$args = array(
   	'post_type' => 'warranty',
      'publish' => true,
		'meta_query' => array(
			array(
				'key' => 'user_id_warrranty',
				'value' => $cur_user_id,
				'compare' => '='
			)
		)
   );
   query_posts($args);
   if ( have_posts() ) : ?>
<?php while(have_posts()) : the_post(); ?>
<?php $post_id = get_the_ID();
		$first_name_warranty = get_post_meta( $post_id, 'first_name_warranty', true );
		$last_name_warranty = get_post_meta( $post_id, 'last_name_warranty', true );
		$address_line_one = get_post_meta( $post_id, 'address_line_one', true );
		$address_line_two = get_post_meta( $post_id, 'address_line_two', true );
		$city_warranty = get_post_meta( $post_id, 'city_warranty', true );
		$state_warranty = get_post_meta( $post_id, 'state_warranty', true );
		$zip_code_warranty = get_post_meta( $post_id, 'zip_code_warranty', true );
		$phone_warranty = get_post_meta( $post_id, 'phone_warranty', true );
		$email_warranty = get_post_meta( $post_id, 'email_warranty', true );
		$equipment_purchased_warranty = get_post_meta( $post_id, 'equipment_purchased_warranty', true );
		$serial_number_warranty = get_post_meta( $post_id, 'serial_number_warranty', true );
		$purchase_date_warranty = get_post_meta( $post_id, 'purchase_date_warranty', true );
		$installation_date_warranty = get_post_meta( $post_id, 'installation_date_warranty', true );
		$user_id_warrranty = get_post_meta( $post_id, 'user_id_warrranty', true );
		?>
<div class="warranty">
    <div class='warranty__title'><?php echo $equipment_purchased_warranty?> / SN:
        <?php echo $serial_number_warranty ?> </span></div>
    <div class="warranty-info">
        <div class='warranty-info__item'>
            <span><?php _e('Equipment Purchased', 'anatol'); ?></span><span><?php echo $equipment_purchased_warranty ?></span>
        </div>
        <div class='warranty-info__item'>
            <span><?php _e('Serial Number', 'anatol'); ?></span><span><?php echo $serial_number_warranty ?></span>
        </div>
        <div class='warranty-info__item'>
            <span><?php _e('Purchase Date', 'anatol'); ?></span><span><?php echo $purchase_date_warranty ?></span>
        </div>
        <div class='warranty-info__item'>
            <span><?php _e('Installation Date', 'anatol'); ?></span><span><?php echo $installation_date_warranty ?></span>
        </div>
        <div class='warranty-info__item'>
            <span><?php _e('Warranty registration date', 'anatol'); ?></span><span><?php echo get_the_date('n-j-Y') ?></span>
        </div>
    </div>
</div>
<?php endwhile; ?>
<?php endif; ?>
<?php if ( !have_posts() ): ?>
<?php
             $current_language_code = apply_filters( 'wpml_current_language', null );
            if($current_language_code == 'en'):?>
<div class="dont_have_warranty">You do not have a registered warranty.</div>
<div class="dont_have_warranty_btn"><a id="register_warranty_onclick" href="#">Register your product</a></div>
<?php
            elseif($current_language_code == 'ru'):?>
<div class="dont_have_warranty">У вас нет зарегистрированной гарантии.</div>
<div class="dont_have_warranty_btn"><a id="register_warranty_onclick" href="#">Зарегистрируйте свой продукт</a></div>
<?php
            elseif($current_language_code == 'es'):?>
<div class="dont_have_warranty">No tienes una garantía registrada.</div>
<div class="dont_have_warranty_btn"><a id="register_warranty_onclick" href="#">Registre su producto</a></div>
<?php
            endif;
            ?>
<?php endif; ?>
<!--<p>
	<?php
	printf(
		/* translators: 1: user display name 2: logout url */
		wp_kses( __( 'Hello %1$s (not %1$s? <a href="%2$s">Log out</a>)', 'woocommerce' ), $allowed_html ),
		'<strong>' . esc_html( $current_user->display_name ) . '</strong>',
		esc_url( wc_logout_url() )
	);
	?>
</p>-->



<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */