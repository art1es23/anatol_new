<?php
/* Template Name: Where to buy Template */

function anatol_dequeue_script() {
  wp_dequeue_script( 'nice-select-js' );
}
add_action( 'wp_print_scripts', 'anatol_dequeue_script', 100 );
get_header(); ?>

<style>
<?php include 'css/components/hero-templates/hero-template.css';
include 'css/components/template-benefits.css';
include 'css/components/financing-options.css';
include 'css/page-templates/page-where-to-buy/sales.css';
?>
</style>

<?php get_template_part('template-parts/template-part-head-bg-black'); ?>

<div class="map-container">
    <div class="container">
        <div class="main">
            <?php get_template_part('template-parts/widgets/map-navigation'); ?>
            <div class="gv-container">
                <div class="gv-map wide">
                    <div id="map" class="sales-map"></div>
                </div>
                <div class="profiles-wrap">
                    <div class="warpper">
                        <input class="radio" id="one" name="group" type="radio" checked>
                        <input class="radio" id="two" name="group" type="radio">
                        <div class="tab_sales">
                            <label class="tab" id="one-tab" for="one">Direct Sales</label>
                            <label class="tab" id="two-tab" for="two">Dealers</label>
                        </div>
                        <div class="panels">
                            <div class="panel" id="one-panel">
                                <div class="panel-title">Direct Sales</div>
                                <?php get_template_part('template-parts/widgets/profiles-sales'); ?>
                            </div>
                            <div class="panel" id="two-panel">
                                <div class="panel-title">Dealers</div>
                                <?php get_template_part('template-parts/widgets/profiles-dealers'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <link rel="stylesheet"
                href="<?php echo get_template_directory_uri(); ?>/js/jvectormap/jquery-jvectormap-2.0.3.css"
                type="text/css" />
            <script type="text/javascript"
                src="<?php echo get_template_directory_uri(); ?>/js/libs/jquery/jquery-1.12.4.min.js"></script>
            <script type="text/javascript"
                src="<?php echo get_template_directory_uri(); ?>/js/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
            <script type="text/javascript"
                src="<?php echo get_template_directory_uri(); ?>/js/jvectormap/maps/jquery-jvectormap-all.js"></script>
            <script type="text/javascript"
                src="<?php echo get_template_directory_uri(); ?>/js/modules/sales-dealers.js">
            </script>

        </div>
    </div>
</div>

<?php get_template_part('template-parts/join-us-dealer'); ?>

<div class="financing_info_text">
    <div class="financing_info--wrapper container">
        <?php the_field('the_benefits_of'); ?>
        <a class="where_financing draw-red"
            href="><?php the_field('financing_btn_url'); ?>"><?php the_field('financing_btn_text'); ?></a>
    </div>

</div>
<?php get_template_part('templates/forms/join-us-forms'); ?>

<?php get_footer(); ?>