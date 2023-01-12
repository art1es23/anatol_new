<!-- <style>
<?php include __DIR__ . '/css/components/sidebars/sidebar-woocommerce.css';
?>
</style> -->
<?php
/**
 * The sidebar containing the main widget area
 */

if ( is_active_sidebar( 'shop_wc' )  ) : ?>
<div id="secondary" class="widget-area">
    <?php if ( is_active_sidebar( 'shop_wc' ) ) : ?>
    <div class="filter_widget" id="widget-area" role="complementary">
        <?php dynamic_sidebar( 'shop_wc' ); ?>
    </div><!-- .widget-area -->
    <?php endif; ?>

</div><!-- .secondary -->
<?php endif; ?>