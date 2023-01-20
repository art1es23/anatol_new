<?php
/* 
    Template Name: Presses
    Template Post Type: post 
*/
get_header(); ?>

<style>
<?php // include locate_template('css/components/hero-templates/hero-template.css');
// include locate_template('css/components/template-form.css');
include locate_template('css/components/equipments-list.css');
include locate_template('css/components/support-section.css');
include locate_template('css/components/another-equipments.css');
include locate_template('css/components/tabs.css');
include locate_template('css/components/related-products-slider.css');
include locate_template('css/page-templates/page-product/product.css');
?>
</style>

<?php get_template_part('templates/components/hero-templates/template-part-head-press'); ?>
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
                <img src="<?php bloginfo("template_url"); ?>/assets/images/icons/no_air_ico.webp"
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
                    <span class="svg-wrapper action-icons svg-compare"></span>
                    <span><?php _e('Compare'); ?></span>
                </a>
                <span class="ab_separator"></span>
                <?php } ?>

                <?php 
                    $download_brochure	= get_field('brochure');

                    if(!empty($download_brochure)) {?>

                <a href="<?php echo $download_brochure['url']; ?>" class="action_buttons__item download_bro"
                    target="_blank">
                    <span class="svg-wrapper action-icons svg-download"></span>
                    <span><?php _e('Download Brochure', 'anatol'); ?></span>
                </a>
                <span class="ab_separator"></span>
                <?php } ?>

                <a href="/where-to-buy" class="action_buttons__item where_to_buy">
                    <span class="svg-wrapper action-icons svg-where-to-buy"></span>
                    <span><?php _e('Where to buy', 'anatol'); ?></span>
                </a>

                <span class="ab_separator"></span>

                <a class="action_buttons__item ab_rq_demo" href="/request-a-demo/" target="_blank">
                    <span class="svg-wrapper action-icons svg-request"></span>
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