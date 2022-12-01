<?php
/* Template Name: Sellers */
get_header(); ?>
<?php get_template_part('template-parts/template-part-head-bg-black'); ?>
<section class="sellers_content" id="sellers_content">
    <div class="sellers_body_content">
        <div class="sellers_body_text">
            <div class="section_title">
                <h2><?php the_field('sellers_first_section_title'); ?></h2>
            </div>
            <div class="sellers_content">
                <?php the_field('sellers_first_section_content'); ?>
            </div>
        </div>
        <div class="sellers_body_img">
            <div class="sellers_img"><img loading="lazy" class="lozad" src="<?php the_field('first_section_img'); ?>"
                    alt=""></div>
        </div>
    </div>
</section>
<?php
$featured_posts = get_field('seller_product_items');
if( $featured_posts ): ?>


<section class="related_products">
    <div class="container">

        <div class="section_title"><?php the_field('seller_product_title'); ?></div>
        <div class="related_products_sliderr equipments_list">
            <?php foreach( $featured_posts as $post ): 

        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post); ?>

            <div class="rp_slide_item">
                <a href="<?=get_permalink();?>" class="">
                    <div class="image_part">
                        <?php echo get_the_post_thumbnail(get_the_ID(), array(300, 210)); ?>
                    </div>
                    <div class="content_part">
                        <div class="c_icon">
                            <div class="c_default"></div>
                        </div>
                        <div class="equipment_box_title"><?php echo get_the_title(); ?></div>

                    </div>
                </a>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>
<?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
<?php endif; ?>
<section style="background-image: url(<?php the_field('sellers_second_map_img'); ?>)" class="sellers_map">
    <div class="sellers_map_content">
        <div class="section_title">
            <h2><?php the_field('sellers_second_section_title'); ?></h2>
        </div>
        <div class="sellers_map_body">
            <div class="sellers_in">
                <?php 
				$img_url = get_field('sellers_second_section_img'); ?>
                <div class="thumbnail-wrap">
                    <div class="thumbnail">
                        <img loading="lazy" class="lozad" src="<?php echo $img_url ?>" alt="">
                    </div>
                    <div class="position_wrap">
                        <h3 class="name"><?php the_field('seller_name'); ?></h3>
                        <?php if(get_field('seller_position')){ ?>
                        <div class="position">
                            <?php the_field('seller_position'); ?>
                        </div>
                        <?php } ?>
                        <?php if(get_field('seller_phone')){?>
                        <div class="phone">
                            <i class="fa fa-phone"></i><a
                                href="tel:<?php the_field('seller_phone'); ?>"><?php the_field('seller_phone'); ?></a>
                        </div>
                        <?php } ?>
                        <?php if(get_field('seller_skype')){ ?>
                        <div class="skype">
                            <i class="fa fa-skype"></i><a
                                href="skype:<?php  the_field('seller_skype'); ?>?call"><?php if ( get_field( 'seller_skype_name' ) ): ?><?php  the_field('seller_skype_name'); ?><?php else: ?><?php  the_field('seller_skype'); ?><?php endif; ?></a>
                        </div>
                        <?php } ?>
                        <?php if(get_field('seller_whatsapp')){ ?>
                        <div class="whatsapp">
                            <i class="fa fa-whatsapp"></i><a
                                href="whatsapp://send?abid=<?php  the_field('seller_whatsapp'); ?>"><?php  the_field('seller_whatsapp'); ?></a>
                        </div>
                        <?php } ?>
                        <?php if(get_field('seller_email')){ ?>
                        <div class="email">
                            <i class="fa fa-envelope-o"></i><a
                                href="mailto:<?php  the_field('seller_email'); ?>"><?php  the_field('seller_email'); ?></a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="sellers_in_content">
                    <?php  the_field('seller_description'); ?>
                </div>

            </div>
            <div class="wrapper_link_btn">
                <a class='wrapper_link_btn_where' href="https://anatol.com/where-to-buy/">view other territories</a>
            </div>
        </div>
</section>
<?php get_template_part('templates/equipment/another-equipments'); ?>
<?php get_footer(); ?>