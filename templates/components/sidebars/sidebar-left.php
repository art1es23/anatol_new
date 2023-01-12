<!-- <style>
    <?php include __DIR__ . '/css/components/sidebars/sidebar-woocommerce.css'; ?>
</style> -->
<?php
    global $dm_settings;
    if ($dm_settings['left_sidebar'] != 0) : ?>
<div class="col-md-<?php echo $dm_settings['left_sidebar_width']; ?> dmbs-left">
    <?php dynamic_sidebar( 'Left Sidebar' ); ?>
</div>
<?php endif; ?>