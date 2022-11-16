<a href="<?= get_permalink(); ?>" class="equipment_item">
    <div class="image_part"><?php
                            $enable_new_product_ico = get_field('enable_new_product_ico');
                            if(get_field('enable_new_product_ico') === true ) {?>
                                    <div class="sticker_new">NEW</div>									
								<?php
                            } else { ?>
							<?php
                            }
                            ?>
							<?php
                            $enable_price_off_ico = get_field('enable_price_off_ico');
                            if(get_field('enable_price_off_ico') === true ) {?>
                                    <div class="sticker_price_off">15% off </div>								
								<?php
                            } else { ?>
							<?php
                            }
                            ?>
							<?php
                            $enable_new_product_ico = get_field('enable_no_air_compressor_required');
                            if(get_field('enable_no_air_compressor_required') === true ) {?>
                                    <div class="sticker_no_air_compressor"></div>									
								<?php
                            } else { ?>
							<?php
                            }
                            ?>
        <?php echo get_the_post_thumbnail(get_the_ID(), array(300, 210)); ?>
    </div>
    <div class="content_part">
        <div class="c_icon">
            <div class="c_default"></div>
        </div>
        <div class="equipment_box_title"><?php echo get_the_title(); ?></div>
        <?php
        $sidedescription = '';
        if (!empty(get_field('list_short_description'))) {
            $sidedescription = get_field('list_short_description');
        } elseif (!empty(get_field('wpcf-sidedescription'))) {
            $sidedescription = get_field('wpcf-sidedescription');
            $sidedescription = preg_replace("/<blockquote.*?>.*?<\/blockquote>/im", "$1", str_replace("\n", '', $sidedescription));
        }
        if (!empty($sidedescription)) { ?>
                <blockquote><?php echo $sidedescription; ?></blockquote>
            <?php
        } ?>
    </div>
</a>