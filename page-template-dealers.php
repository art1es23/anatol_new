<?php
/* Template Name: Dealers Template */

function anatol_dequeue_script() {
  wp_dequeue_script( 'nice-select-js' );
}
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
<div class="warpper">
  <input class="radio" id="one" name="group" type="radio" checked>
  <input class="radio" id="two" name="group" type="radio">
  <div class="tabs">
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
              <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/jvectormap/jquery-jvectormap-2.0.3.css" type="text/css"/>
              <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
              <!-- maps  -->
              <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jvectormap/maps/jquery-jvectormap-all.js"></script>

              <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/sales-dealers.js" ></script>

            </div>

        </div>
	</div>





<?php get_footer(); ?>
