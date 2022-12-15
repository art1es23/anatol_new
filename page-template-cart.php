<?PHP
/* Template Name: Cart Woo */

	get_header(); ?>

<style>
<?php include 'css/components/hero-templates/hero-template.css';
include 'css/woocommerce.css';
include 'css/page-templates/store/cart.css';
?>
</style>
<?php get_template_part('template-parts/template-part-head-press'); ?>


<div class="woo_container">
    <div class="woo_container--wrapper container">
        <!-- start content container -->
        <div class="products_content <?php 
			if ( is_shop() ) { ?>category_cont <?php } 
			else { echo 'single_pr_cont'; } ?>	">

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

            <!-- <div class="product_content_row"> -->
            <div class="cart_content">
                <h2 class="page-header"><?php the_title(); ?></h2>
                <?php // theloop
      					if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
                <?php endwhile; ?>
                <?php else : ?>
                <?php get_404_template(); ?>
                <?php endif; ?>
            </div>
            <!-- </div> -->
        </div>
    </div>
</div>


<!-- <section class="another_equipment fix-bg">
    <div class="container">
        <div class="section_title regional-offices-title">You may also be interested</div>
    </div> -->
<?php get_template_part('templates/equipment/another-equipments'); ?>
<!-- </section> -->

<?php get_footer(); ?>