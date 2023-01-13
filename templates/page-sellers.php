)<?php
/* Template Name: Sellers NEW*/
get_header(); ?>

<style>
<?php // include locate_template('css/components/hero-templates/hero-template.css');
include locate_template('css/components/another-equipments.css');
include locate_template('css/components/about-description.css');
include locate_template('css/components/presses-item.css');
include locate_template('css/components/automatic-presses.css');
include locate_template('css/page-templates/page-seller-country/page-seller-country.css');
?>
</style>


<?php get_template_part('templates/components/hero-templates/template-part-head-bg-black'); ?>

<section class="about-us" id="sellers_content">
    <div class="about-us-description">
        <h2 class="section_title"><?php the_field('sellers_first_section_title'); ?></h2>
        <div class="about-us-description__content">
            <?php the_field('sellers_first_section_content'); ?>
        </div>
    </div>
    <div class="about-us-img--wrapper">
        <img loading="lazy" class="lozad" src="<?php the_field('first_section_img'); ?>" width="300" height="210"
            alt="">
    </div>
</section>

<?php
$featured_posts = get_field('seller_product_items');
if( $featured_posts ): ?>

<section class="automatic_presses section_presses white_text" id="automatic-presses">
    <div class="swiper automatic_presses--wrapper container">

        <div class="section_title"><?php the_field('seller_product_title'); ?></div>
        <div class="swiper-wrapper presses_content_row presses_content_row_slider">

            <?php foreach( $featured_posts as $post ): 

        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post); ?>

            <div class="swiper-slide presses_item">
                <div class="image_item">
                    <a href="<?= get_permalink(); ?>" class="equipment_item">
                        <?php echo get_the_post_thumbnail($item, array(300, 210)); ?>
                    </a>
                    <?php
                        $enable_new_product_ico = get_field('enable_no_air_compressor_required');
                        if(get_field('enable_no_air_compressor_required') === true ) {?>
                    <div class="sticker_no_air_compressor"></div>
                    <?php
                        } else {} ?>
                </div>

                <div class="content_part">
                    <div class="equipment_title"><?php echo get_the_title(); ?></div>
                </div>

                <a href="<?= get_permalink(); ?>" class="link_to_item button"
                    tabindex="0"><?php _e('Learn More', 'anatol'); ?></a>
            </div>
            <?php endforeach; ?>

        </div>
        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
</section>
<?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
<?php endif; ?>


<!-- <section style="background-image: url(<?php the_field('sellers_second_map_img'); ?>)" class="sellers_map"> -->
<section class="sellers-country">
    <div class="sellers-country--wrapper container">

        <!-- <div class="section_title"> -->
        <h2 class="section_title"><?php the_field('sellers_second_section_title'); ?></h2>
        <!-- </div> -->

        <div class="sellers-country__description seller-description">
            <div class="seller-description__item seller-description__item--left">
                <?php $img_url = get_field('sellers_second_section_img'); ?>

                <div class="seller-description--wrapper">

                    <div class="seller-description__thumb img-wrapper">
                        <img loading="lazy" class="lozad" src="<?php echo $img_url ?>" width="202" height="202" alt="">
                    </div>

                    <div class="seller-description__info">
                        <h3 class="seller-description__name"><?php the_field('seller_name'); ?></h3>

                        <?php if(get_field('seller_position')){ ?>
                        <div class="seller-description__position">
                            <?php the_field('seller_position'); ?>
                        </div>
                        <?php } ?>

                        <?php if(get_field('seller_phone')){?>
                        <div class="seller-description__phone">
                            <i class="fa fa-phone"></i><a
                                href="tel:<?php the_field('seller_phone'); ?>"><?php the_field('seller_phone'); ?></a>
                        </div>
                        <?php } ?>

                        <?php if(get_field('seller_skype')){ ?>
                        <div class="seller-description__skype">
                            <i class="fa fa-skype"></i><a
                                href="skype:<?php  the_field('seller_skype'); ?>?call"><?php if ( get_field( 'seller_skype_name' ) ): ?><?php  the_field('seller_skype_name'); ?><?php else: ?><?php  the_field('seller_skype'); ?><?php endif; ?></a>
                        </div>
                        <?php } ?>

                        <?php if(get_field('seller_whatsapp')){ ?>
                        <div class="seller-description__whatsapp">
                            <i class="fa fa-whatsapp"></i><a
                                href="whatsapp://send?abid=<?php  the_field('seller_whatsapp'); ?>"><?php  the_field('seller_whatsapp'); ?></a>
                        </div>
                        <?php } ?>

                        <?php if(get_field('seller_email')){ ?>
                        <div class="seller-description__email">
                            <i class="fa fa-envelope-o"></i><a
                                href="mailto:<?php  the_field('seller_email'); ?>"><?php  the_field('seller_email'); ?></a>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="seller-description__content">
                    <?php the_field('seller_description'); ?>
                </div>

            </div>
            <div class="seller-description__item seller-description__item--right">
                <div class="seller-description__map img-wrapper">
                    <img src="<?php echo the_field('sellers_second_map_img'); ?>" alt="">
                </div>

                <a class='wrapper_link_btn wrapper_link_btn_where button' href="https://anatol.com/where-to-buy/">view
                    other
                    territories</a>
            </div>
        </div>
</section>
<?php get_template_part('templates/components/section-templates/another-equipments'); ?>

<!-- Slider Init -->
<script defer src="<?php echo get_template_directory_uri();?>/js/libs/swiper/swiper-bundle.min.js"></script>
<script defer src="<?php echo get_template_directory_uri();?>/js/sliders-swiper.js"></script>

<?php get_footer(); ?>