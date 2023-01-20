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
        <div class="hide-tabs-button svg-wrapper">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="256"
                height="256" viewBox="0 0 256 256" xml:space="preserve">

                <g style="stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;"
                    transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                    <path
                        d="M 90 45 C 90 20.187 69.813 0 45 0 C 20.187 0 0 20.187 0 45 c 0 24.813 20.187 45 45 45 C 69.813 90 90 69.813 90 45 z M 10 45 c 0 -19.299 15.701 -35 35 -35 s 35 15.701 35 35 S 64.299 80 45 80 S 10 64.299 10 45 z"
                        style="stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;"
                        transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                    <path
                        d="M 49.926 62.777 V 27.222 c 0 -2.761 -2.238 -5 -5 -5 s -5 2.239 -5 5 v 35.555 c 0 2.762 2.239 5 5 5 S 49.926 65.539 49.926 62.777 z"
                        style="stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;"
                        transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                    <path
                        d="M 63.896 48.882 c 0 -1.279 -0.488 -2.559 -1.464 -3.536 c -1.953 -1.953 -5.119 -1.953 -7.071 0 L 45 55.706 l -10.361 -10.36 c -1.953 -1.953 -5.119 -1.953 -7.071 0 c -1.952 1.953 -1.952 5.119 0 7.072 l 13.896 13.896 c 1.953 1.952 5.119 1.952 7.071 0 l 13.896 -13.896 C 63.408 51.441 63.896 50.161 63.896 48.882 z"
                        style="stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;"
                        transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                </g>
            </svg>
        </div>
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
        <li
            class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?> woocommerce-MyAccount-navigation-link--disabled">
            <a href="<?php echo esc_url( wc_get_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
</nav>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
<script>
let url = window.location.hostname + window.location.pathname;
let dashboard = document.querySelectorAll('.woocommerce-MyAccount-navigation-link--dashboard');
if (url == 'testsite.antest.s-host.net/my-account/' || url == 'testsite.antest.s-host.net/ru/my-account/' || url ==
    'testsite.antest.s-host.net/es/my-account/') {
    console.log(dashboard);
    dashboard[0].classList.add('is-active');
}
</script>

<script src="<?php echo get_template_directory_uri();?>/js/showingTabs.js"></script>