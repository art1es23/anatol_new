<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
?>

<nav class="woocommerce-MyAccount-navigation">
	<ul>
		<?php
             $current_language_code = apply_filters( 'wpml_current_language', null );
            if($current_language_code == 'en'):?>
		<li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard">
			<a href="https://testsite.antest.s-host.net/my-account/">Dashboard</a>
		</li>
            <?php
            elseif($current_language_code == 'ru'):?>
		<li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard">
			<a href="https://testsite.antest.s-host.net/ru/my-account/">Панель управления</a>
		</li>
            <?php
            elseif($current_language_code == 'es'):?>
		<li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard">
			<a href="https://testsite.antest.s-host.net/es/my-account/">Escritorio</a>
		</li>
            <?php
            endif;
            ?>
		<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
			<li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
				<a href="<?php echo esc_url( wc_get_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
			</li>
		<?php endforeach; ?>
	</ul>
</nav>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
<script>
	let url = window.location.hostname + window.location.pathname;
	let dashboard = document.querySelectorAll('.woocommerce-MyAccount-navigation-link--dashboard');
	if (url == 'testsite.antest.s-host.net/my-account/' || url == 'testsite.antest.s-host.net/ru/my-account/' || url == 'testsite.antest.s-host.net/es/my-account/' ) {
		console.log(dashboard);
		dashboard[0].classList.add('is-active');
	}
</script>