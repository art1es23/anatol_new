<?PHP
/* Template Name: Cart Woo NEW*/

get_header(); ?>

<style>
<?php include __DIR__ . '/../css/components/hero-templates/hero-template.css';
include __DIR__ . '/../css/woocommerce.css';
include __DIR__ . '/../css/page-templates/store/cart.css';
?>
</style>

<?php get_template_part('templates/components/hero-section/template-part-head-press'); ?>

<div class="woo_container">
    <div class="woo_container--wrapper container">
        <!-- start content container -->
        <div class="products_content <?php 
			if ( is_shop() ) { ?>category_cont <?php } 
			else { echo 'single_pr_cont'; } ?>	">
            <div class="hide-sidebar">Show Filters</div>

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
        </div>
    </div>
</div>

<?php get_template_part('templates/components/section-templates/another-equipments'); ?>

<script src="<?php echo get_template_directory_uri();?>/js/toggleSidebar.js"></script>

<?php get_footer(); ?>