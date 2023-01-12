<div class="presses_item equipment-list__item product-post">
    <a href="<?= get_permalink(); ?>" class="product-post__img">
        <?php
            $enable_new_product_ico = get_field('enable_new_product_ico');
            if(get_field('enable_new_product_ico') === true ) {?>
        <div class="sticker_new">NEW</div>
        <?php } else { ?>
        <?php } ?>

        <?php
            $enable_price_off_ico = get_field('enable_price_off_ico');
            if(get_field('enable_price_off_ico') === true ) {?>
        <div class="sticker_price_off">15% off </div>
        <?php } else { ?>
        <?php } ?>

        <?php
            $enable_new_product_ico = get_field('enable_no_air_compressor_required');
            if(get_field('enable_no_air_compressor_required') === true ) {?>
        <div class="sticker_no_air_compressor"></div>
        <?php } else { ?>
        <?php } ?>
        <?php echo get_the_post_thumbnail(get_the_ID(), 'big'); ?>
    </a>

    <a href="<?= get_permalink(); ?>" class="content_part product-post__title">
        <?php echo get_the_title(); ?>
    </a>

    <a href="<?= get_permalink(); ?>" class="link_to_item button" tabindex="0"><?php _e('Learn More', 'anatol'); ?></a>
</div>