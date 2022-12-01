<h3 class="tab_item_title"><?php the_field('optional_title'); ?></h3>
<?php
    if (have_rows('optional_features')) { ?>
<div class="optional_cards">
    <?php 
        $i = 1;
        while (have_rows('optional_features')) : the_row();
        
        $optional_image = get_sub_field('optional_image');
        $size = "thumbnail"; // (thumbnail, medium, large, full or custom size)
        $opt_image = wp_get_attachment_image_src( $optional_image, $size );
        
        if (!empty($optional_image)) : // with image
            if ($i % 2) : //  image lef 
    ?>
    <div class="optional_card">
        <div class="opt_img_col">
            <?php if( !empty($optional_image) ): ?>

            <img loading="lazy" class="lozad people-image" alt="Image of <?php the_sub_field('title'); ?>"
                src="<?php echo $opt_image[0]; ?>" />
            <?php endif; ?>
        </div>

        <div class="opt_card_body">
            <h5 class="card-title"><?php the_sub_field('title'); ?></h5>
            <?php the_sub_field('content'); ?>
        </div>

    </div>
    <?php else : ?>

    <div class="optional_card mb-3">
        <div class="opt_img_col">
            <?php if( !empty($optional_image) ): ?>

            <img loading="lazy" class="lozad people-image" alt="Image of <?php the_sub_field('title'); ?>"
                src="<?php echo $opt_image[0]; ?>" />
            <?php endif; ?>
        </div>

        <div class="opt_card_body .opt_card_body--full">
            <h5 class="card-title"><?php the_sub_field('title'); ?></h5>
            <?php the_sub_field('content'); ?>
        </div>
    </div>
    <?php
            endif;
        else : // without image
            ?>
    <div class="optional_card mb-3">

        <div class="opt_card_body">
            <h5 class="card-title"><?php the_sub_field('title'); ?></h5>
            <?php the_sub_field('content'); ?>
        </div>

    </div>
    <?php
        endif;
        $i++;
        endwhile; ?>
</div>

<?php } ?>