<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); ?>


<?PHP get_template_part('template-parts/template-part-head-press'); ?>
<style>
<?php include 'css/components/related-products-slider.css';
// include 'css/components/equipments-list.css';
include 'css/page-templates/store/woo.css';
include 'css/page-templates/store/page-woo-item.css';
?>
</style>

<!-- <div class="single_equipment"> -->
<?php while ( have_posts() ) : the_post(); ?>
<section class="equipment_info">
    <!-- asljdoajslkdjalksdkl -->
    <div class="container">
        <div class="flex_half">
            <?php wc_get_template_part( 'content', 'single-product' ); ?>
        </div>
    </div>
</section>
<?php endwhile; ?>

<?PHP wc_get_template_part( '/single-product/up-sells'); ?>
<!-- </div> -->

<!-- Slider Init -->
<script defer src="<?php echo get_template_directory_uri();?>/js/libs/swiper/swiper-bundle.min.js"></script>
<script defer src="<?php echo get_template_directory_uri();?>/js/sliders-swiper.js"></script>

<?php get_footer();
/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */