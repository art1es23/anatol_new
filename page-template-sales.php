<?php
/* Template Name: Direct Sales Template */

// function anatol_dequeue_script() {
//   wp_dequeue_script( 'nice-select-js' );
// }
add_action( 'wp_print_scripts', 'anatol_dequeue_script', 100 );
get_header(); ?>



<?php get_template_part('template-parts/template-part-head-bg'); ?>


<div class="container dmbs-container">
    <!-- start content container -->
    <div class="row dmbs-content">


        <div class="col-md-12 dmbs-main">

            <?php get_template_part('template-parts/widgets/map-navigation'); ?>
            <div class="gv-container">
                <div class="gv-map wide">
                    <div id="map" class="sales-map"></div>
                </div>
                <div class="profiles-wrap">
                    <?php get_template_part('template-parts/widgets/profiles-sales'); ?>
                </div>
            </div>
            <link rel="stylesheet"
                href="<?php echo get_template_directory_uri(); ?>/js/jvectormap/jquery-jvectormap-2.0.3.css"
                type="text/css" />
            <script type="text/javascript"
                src="<?php echo get_template_directory_uri(); ?>/js/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
            <!-- maps  -->
            <script type="text/javascript"
                src="<?php echo get_template_directory_uri(); ?>/js/jvectormap/maps/jquery-jvectormap-all.js"></script>

            <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/sales-dealers.js">
            </script>

        </div>

    </div>
</div>






<?php get_footer(); ?>