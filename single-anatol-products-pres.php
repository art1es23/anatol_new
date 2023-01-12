<?php
/* Template Name: Press Single */
get_header(); ?>

<style>
<?php include 'css/components/hero-templates/hero-template.css';
include 'css/components/template-form.css';
include 'css/components/equipments-list.css';
include 'css/components/support-section.css';
include 'css/components/another-equipments.css';
include 'css/components/tabs.css';
include 'css/components/related-products-slider.css';
include 'css/page-templates/page-product/product.css';
?>
</style>

<?php get_template_part('templates/components/hero-section/template-part-head-press'); ?>
<section class="equipment_info">
    <div class="equipment_info--wrapper container">

        <div class="equipment_info__item equipment_info__item--left">

            <?php get_template_part('templates/components/section-templates/equipment/single-parts/thumbnails'); ?>
            <?php $enable_new_product_ico = get_field('enable_new_product_ico');
                if(get_field('enable_new_product_ico') === true ) {?>
            <div class="sticker_new">NEW</div>

            <?php
                } else { ?> <?php } ?>
            <?php
                $enable_price_off_ico = get_field('enable_price_off_ico');
                if(get_field('enable_price_off_ico') === true ) {?>
            <div class="sticker_price_off">15% off</div>
            <?php
                } else { ?> <?php } ?>
            <?php
                $enable_no_air_compressor_required = get_field('enable_no_air_compressor_required');
                if(get_field('enable_no_air_compressor_required') === true ) {?>
            <div class="sticker_no_air_compressor">
                <img src="<?php bloginfo("template_url"); ?>/images/icons/no_air_ico.webp"
                    alt="No air compressor sticker!" width="54" height="54">
            </div>
            <?php
                } else { ?>
            <?php } ?>
        </div>

        <div class="equipment_info__item equipment_info__item--right">

            <div class="equipment_info__description"> <?php the_field('short_description'); ?></div>
            <div class="get_a_quote button red-button draw-red"><?php _e('Get a Quote', 'anatol'); ?></div>

            <?php $full_price = get_field('eq_full_price'); if( !empty($full_price) ): ?>
            <?php 
                global $user_ip, $user_country, $SxGeo;
                require_once( trailingslashit( get_stylesheet_directory() ) . 'SxGeo.php' );
                $SxGeo = new SxGeo( trailingslashit( get_stylesheet_directory() ) . 'SxGeo.dat' );
                if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                    $user_ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
                } else {
                    $user_ip = $_SERVER['REMOTE_ADDR'];
                }
                $user_country = $SxGeo->getCountry($user_ip);
            ?>

            <?php if ($user_country === 'US') { ?>
            <div id="monthly_payment" class="monthly_payment CIT-widget cit-widget-inline-button"
                cit-data-amount="<?php echo $full_price;?>" cit-data-new-tab="1">
                <a href="https://anatolequipment.directcapital.com" class="CIT-button--link" target="_blank">Business
                    Financing Available</a>
            </div>
            <?php } ?>
            <?php if( get_field('payment_term_new') ): ?>
            <div class="more_cit_info" style="display: none;"><?php the_field('payment_term_new'); ?></div>
            <?php endif; ?>
            <?php endif; ?>

            <div class="action_buttons">

                <!-- <span class="s_helpers"></span> -->

                <?php if(has_term(array('presses-en', 'presses-polish', 'presses-russian', 'presses-spanish'), 'anatol-products_cat')) {
                        $compare_page_id = icl_object_id(1872, 'page', false,ICL_LANGUAGE_CODE);
                        ?>

                <a href="<?=get_permalink($compare_page_id);?>" class="action_buttons__item ab_compare">
                    <span class="svg-wrapper ab_icon">
                        <svg enable-background="new 0 0 50 50" height="50px" id="Layer_1" version="1.1"
                            viewBox="0 0 50 50" width="50px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path
                                d="M15.494,46  C14.116,46,13,47.125,13,48.512C13,48.668,13,49,13,49h24c0,0,0-0.332,0-0.488C37,47.125,35.884,46,34.506,46  C34.35,46,15.65,46,15.494,46z"
                                stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" />
                            <path d="M23,3c0-1.104,0.896-2,2-2  s2,0.896,2,2v43h-4V3z" stroke-linejoin="round"
                                stroke-miterlimit="10" stroke-width="2" />
                            <path d="M33,32  c1.167,2.911,4.304,5,8,5s6.833-2.089,8-5H33z" stroke-linejoin="round"
                                stroke-miterlimit="10" stroke-width="2" />
                            <path
                                d="  M22.803,4.796c-2.224-1.222-4.081-3.316-6.424-3.719C13.312,0.55,9.231,2.892,9.231,2.892"
                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                stroke-width="2" />
                            <path d="  M40.768,8.314c0,0-3.062-3.571-6.131-4.099c-2.385-0.409-4.879,1-7.432,1.38"
                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                stroke-width="2" />
                            <polyline points="49,32 41,9 33,32   " stroke-linejoin="round" stroke-miterlimit="10"
                                stroke-width="2" />
                            <path d="M1,26  c1.167,2.911,4.304,5,8,5s6.833-2.089,8-5H1z" stroke-linejoin="round"
                                stroke-miterlimit="10" stroke-width="2" />
                            <polyline points="17,26 9,3 1,26   " stroke-linejoin="round" stroke-miterlimit="10"
                                stroke-width="2" />
                        </svg>
                    </span>
                    <span><?php _e('Compare'); ?></span>
                </a>
                <span class="ab_separator"></span>
                <?php } ?>

                <?php 
                    $download_brochure	= get_field('brochure');

                    if(!empty($download_brochure)) {?>

                <a href="<?php echo $download_brochure['url']; ?>" class="action_buttons__item download_bro"
                    target="_blank">
                    <span class="svg-wrapper ab_icon">
                        <svg enable-background="new 0 0 32 32" height="32px" id="Layer_1" version="1.1"
                            viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g>
                                <polyline points="   649,137.999 675,137.999 675,155.999 661,155.999  "
                                    stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                    stroke-width="2" />
                                <polyline points="   653,155.999 649,155.999 649,141.999  " stroke-linecap="round"
                                    stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" />
                                <polyline points="   661,156 653,162 653,156  " stroke-linecap="round"
                                    stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" />
                            </g>
                            <g>
                                <path
                                    d="M15.293,25.707C15.484,25.898,15.74,26,16,26c0.129,0,0.259-0.024,0.383-0.076C16.756,25.77,17,25.404,17,25V3   c0-0.552-0.448-1-1-1s-1,0.448-1,1v19.586l-7.293-7.293c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414L15.293,25.707z" />
                                <path
                                    d="M20,22c0.256,0,0.512-0.098,0.707-0.293l5-5c0.391-0.391,0.391-1.024,0-1.414c-0.391-0.39-1.023-0.391-1.414,0.001l-5,5   c-0.391,0.391-0.391,1.023,0,1.414C19.488,21.902,19.744,22,20,22z" />
                                <path
                                    d="M29,21c-0.553,0-1,0.447-1,1v6H4v-6c0-0.553-0.448-1-1-1s-1,0.447-1,1v7c0,0.553,0.448,1,1,1h26c0.553,0,1-0.447,1-1v-7   C30,21.447,29.553,21,29,21z" />
                            </g>
                        </svg>
                    </span>
                    <span><?php _e('Download Brochure', 'anatol'); ?></span>
                </a>
                <span class="ab_separator"></span>
                <?php } ?>

                <a href="/where-to-buy" class="action_buttons__item where_to_buy">
                    <span class="svg-wrapper ab_icon">
                        <svg viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M224 464c0 26.51-21.49 48-47.1 48s-47.1-21.49-47.1-48S149.5 416 176 416S224 437.5 224 464zM569.5 44.73C563.4 36.64 554.1 32 543.1 32H360v102.1l23.03-23.03c9.375-9.375 24.56-9.375 33.94 0s9.375 24.56 0 33.94l-64 64C348.3 213.7 342.1 216 336 216s-12.28-2.344-16.97-7.031l-64-64c-9.375-9.375-9.375-24.56 0-33.94s24.56-9.375 33.94 0L312 134.1V32H121.1L119.6 19.51C117.4 8.19 107.5 0 96 0H23.1C10.75 0 0 10.75 0 23.1S10.75 48 23.1 48h52.14l60.28 316.5C138.6 375.8 148.5 384 160 384H488c13.25 0 24-10.75 24-23.1C512 346.7 501.3 336 488 336H179.9L170.7 288h318.4c14.29 0 26.84-9.47 30.77-23.21l54.86-191.1C577.5 63.05 575.6 52.83 569.5 44.73zM463.1 416c-26.51 0-47.1 21.49-47.1 48s21.49 48 47.1 48s47.1-21.49 47.1-48S490.5 416 463.1 416z" />
                        </svg>
                    </span>
                    <span><?php _e('Where to buy', 'anatol'); ?></span>
                </a>

                <span class="ab_separator"></span>

                <a class="action_buttons__item ab_rq_demo" href="/request-a-demo/" target="_blank">
                    <span class="svg-wrapper ab_icon">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.69,12.06a1,1,0,0,1-1.34,0L2.87,4.35A2,2,0,0,1,4,4H20a2,2,0,0,1,1.13.35Z" />
                            <path
                                d="M22,6.26V17a3,3,0,0,1-3,3H5a3,3,0,0,1-3-3V6.26l8.68,7.92a2,2,0,0,0,1.32.49,2,2,0,0,0,1.33-.51Z" />
                        </svg>
                    </span>
                    <span><?php _e('Request a Live Demo', 'anatol'); ?></span>
                </a>

                <!-- <span class="s_helpers"></span> -->
            </div>
        </div>
    </div>

</section>

<?php get_template_part('templates/components/section-templates/equipment/single-parts/tabs_content'); ?>

<?php
    $term_list = wp_get_post_terms(get_the_ID(), 'anatol-products_cat', array("fields" => "all"));
    $cat_id = 0;
    if(!empty($term_list)) {
        foreach($term_list as $term) {
            if(!empty($term->parent)) {
                $cat_id = $term->term_id;
            }
        }
    }
    if(!empty($cat_id)) {
        $args = array(
            'post_type'		=> array('anatol-products-conv', 'anatol-products-acce', 'anatol-products-flas', 'anatol-products-pre-', 'anatol-products-pres'),
            'post__not_in'	=> array(get_the_ID()),
            'tax_query'		=> array(
                array(
                    'taxonomy' => 'anatol-products_cat',
                    'field' => 'term_id',
                    'terms' => $cat_id
                )
            )
        );
        $query = new WP_Query( $args );
        if($query->have_posts()) {
            $related_cat_title = '';
            switch( $cat_id ){
                case 3: $related_cat_title = __('Vector Models'); break;
                case 17: $related_cat_title = __('Titan Models'); break;
                case 239: $related_cat_title = __('VOLT Models'); break;
                default: $related_cat_title = __('Related Products');
            }
            ?>

<?php }
			wp_reset_query();
		}
 ?>

<?php
    $term_list = wp_get_post_terms(get_the_ID(), 'anatol-products_cat', array("fields" => "all"));
    $cat_id = 0;
		if(!empty($term_list)) {
			foreach($term_list as $term) {
				if(empty($term->parent)) {
					$cat_id = $term->term_id;
				}
			}
		}
?>


<?php
$featured_posts = get_field('similar_items');
if( $featured_posts ): ?>
<section class="related-products">
    <div class="swiper related-products--wrapper container">

        <div class="section_title"><?php _e('RELATED PRODUCTS', 'anatol'); ?></div>
        <div class="swiper-wrapper related-products_slider related-products-list">
            <?php foreach( $featured_posts as $post ): 

				// Setup this post for WP functions (variable must be named $post).
				setup_postdata($post); ?>

            <!-- <div class="swiper-slide related-products-list__item product-post"> -->
            <a href="<?=get_permalink();?>" class="swiper-slide related-products-list__item product-post">
                <div class="product-post__img">
                    <?php echo get_the_post_thumbnail(get_the_ID(), array(300, 210)); ?>
                </div>
                <div class="content_part">
                    <!-- <div class="c_icon">
                            <div class="c_default"></div>
                        </div> -->
                    <h3 class="product-post__title">
                        <?php echo get_the_title(); ?>
                    </h3>

                </div>
            </a>
            <!-- </div> -->
            <?php endforeach; ?>

        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

    </div>
</section>
<?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
<?php endif; ?>

<?php get_template_part('templates/components/section-templates/another-equipments'); ?>

<!-- INIT YOUTUBE VIDEOS -->
<script defer src="<?php echo get_template_directory_uri();?>/js/initVideo.js"></script>

<!-- Slider Init -->
<script defer src="<?php echo get_template_directory_uri();?>/js/libs/swiper/swiper-bundle.min.js"></script>
<script defer src="<?php echo get_template_directory_uri();?>/js/sliders-swiper.js"></script>
<!-- MODAL SLIDER -->
<script defer src="<?php echo get_template_directory_uri();?>/js/modalSlider.js"></script>

<?php get_footer(); ?>