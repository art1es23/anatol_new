<?php
/* Template Name: Сторінка магазину*/
get_header(); 
?>

<style>
<?php include 'css/woocommerce.css';
?>
</style>
<?PHP get_template_part('template-parts/template-part-head-press'); ?>

<div class="page-wrap woo_page_satalog">
    <div class="container">
        <!--
                    <div class="widget-mob-search product_sidebar">
                        <?php dynamic_sidebar('bproduct-sidebar'); ?>
                        <div class="filt-content">
                            <span class="more-info">Show filter</span>
                            <div class="more-content" style="display: none;">
									<?php dynamic_sidebar('mfproduct-sidebar'); ?>
                            </div>
                        </div>
                    </div>
				<div class="page-content-woo">
					<div class="entry woocommerce">
						<?php woocommerce_content(); ?>
					</div>	
				</div>-->
        <div
            class="products_content <?php if ( is_shop() ) { ?>category_cont <?php } else { echo 'single_pr_cont'; } ?>	">
            <div class="product_sidebar">
                <div class="widget-mob-search">
                    <?php dynamic_sidebar('bproduct-sidebar'); ?>
                    <div class="filt-content">
                        <span class="more-info">Show filter</span>
                        <div class="more-content" style="display: none;">
                            <?php dynamic_sidebar('mfproduct-sidebar'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 prtfilter_box">
                    <?php do_action( 'woocommerce_sidebar' ); ?>
                </div>
            </div>
            <div class="product_content_row">
                <div class="entry woocommerce">
                    <?php woocommerce_content(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>