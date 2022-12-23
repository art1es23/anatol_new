<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

    defined( 'ABSPATH' ) || exit;
    global $product;
    do_action( 'woocommerce_before_single_product' );

    if ( post_password_required() ) {
        echo get_the_password_form();
        return;
    } ?>

<div
    class="container products_content <?php if ( is_shop() ) { ?>category_cont <?php } else { echo 'single_pr_cont'; } ?>	">
    <div class="hide-sidebar"></div>

    <div class="product_sidebar">
        <!--<div class="widget-mob-search">
                <?php dynamic_sidebar('bproduct-sidebar'); ?>
                <div class="filt-content">
                    <span class="more-info">Show filter</span>
                    <div class="more-content" style="display: none;">
                            <?php dynamic_sidebar('mfproduct-sidebar'); ?>
                    </div>
                </div>
            </div>-->
        <div class="col-md-3 prtfilter_box filt-content">
            <span class="more-info filter_button">Show filter</span>
            <div class="woocommerce_filter">
                <?php do_action( 'woocommerce_sidebar' ); ?>
            </div>
        </div>
    </div>

    <div class="product_content_row">
        <div id="product-<?php the_ID(); ?>" class="single_product_cont">
            <div class="half_left">
                <div class="equipment_thumbnail">
                    <?php do_action( 'woocommerce_before_single_product_summary' ); ?>
                </div>
            </div>

            <div class="half_right">
                <div class="equipment_right_info product_single_info">
                    <?php echo woocommerce_template_single_title(); ?>

                    <?php if ( $product->is_on_sale() ) : ?>
                    <?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsales">' . esc_html__( 'Sale!', 'woocommerce' ) . '</span>', $post, $product ); ?>
                    <?php endif; ?>

                    <?php if($product->is_type('variable')){ ?>
                    <div class="variations-cart-box">
                        <?php woocommerce_variable_add_to_cart(); ?>
                    </div>

                    <?php }else{ ?>
                    <div class="price_cart_box clearfix">
                        <div class="prcb_block price_box ">
                            <?php echo woocommerce_template_single_price(); ?>
                        </div>
                        <?php if (get_post_meta(get_the_ID(), '_stock_status', true) == 'outofstock') {
                                echo '<div class="outofstock">Out of stock</div>';
                                } else {
                                echo ' ';
                            }?>
                    </div>
                    <?php } ?>

                    <div class="attributes_product">
                        <div class="attr_line">
                            <div class="attribute_label_name">ID:</div>
                            <div class="attribute_data"># <?php the_ID(); ?></div>
                        </div>

                        <?php
                            $attributes = $product->get_attributes();
                            if ( !$attributes ) {
                                return;
                            }
                            foreach ( $attributes as $attribute ) {
                                if ( $attribute->get_variation() ) {
                                    continue;
                                }
                                $name = $attribute->get_name();

                                if ( $attribute->is_taxonomy() ) {
                                    $terms = wp_get_post_terms( $product->get_id(), $name, 'all' );
                                    $cwtax = $terms[0]->taxonomy;
                                    $cw_object_taxonomy = get_taxonomy($cwtax);

                                    if ( isset ($cw_object_taxonomy->labels->singular_name) ) {
                                        $tax_label = $cw_object_taxonomy->labels->singular_name;

                                    } elseif ( isset( $cw_object_taxonomy->label ) ) {
                                        $tax_label = $cw_object_taxonomy->label;

                                        if ( 0 === strpos( $tax_label, 'Product ' ) ) {
                                            $tax_label = substr( $tax_label, 8 );
                                        }
                                    } ?>

                        <div class="attr_line">
                            <div class="attribute_label_name"><?php echo $tax_label; ?>: </div>
                            <?php
								$tax_terms = array();
								
                                foreach ( $terms as $term ) {
									$single_term = esc_html( $term->name );
									array_push( $tax_terms, $single_term );
								} ?>

                            <div class="attribute_data"><?php echo implode(', ', $tax_terms); ?></div>
                        </div>

                        <?php } else { $value_string = implode( ', ', $attribute->get_options() ); ?>

                        <div class="attr_line">
                            <div class="attribute_label_name"><?php echo wc_attribute_label($name); ?>: </div>
                            <div class="attribute_data"><?php echo esc_html($value_string); ?></div>
                        </div>
                        <?php }}?>
                    </div>

                    <?php
        				if ($product->is_purchasable() && $product->is_in_stock() ) {
					?>

                    <div class="flex-price-box">
                        <?php woocommerce_simple_add_to_cart(); ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <?php
            $thecontent = get_the_content();

            if(!empty($thecontent)) { ?>
        <div class="product_description"><?php the_content(); ?></div>
        <?php } ?>

        <?php wc_get_template_part( '/single-product/related'); ?>
    </div>
</div>

<script src="<?php echo get_template_directory_uri();?>/js/toggleSidebar.js"></script>