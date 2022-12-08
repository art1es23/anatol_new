<?PHP

// function anatol_dequeue_admin_script() {
//    wp_dequeue_script( 'nice-select-js' );
//    wp_enqueue_script('chosen.js');
//    wp_enqueue_style('chosen.css');
// }
// add_action( 'wp_print_scripts', 'anatol_dequeue_admin_script', 100 );

// $page_content = WPSavings::displayPage('admin');
get_header(); ?>

<?php get_template_part('template-parts/template-part-head-part1'); ?>
<div class="simple_bg_head calculator_template admin_template">
    <?php
		global $title_icon_class;
		global $anatol_cat_title;
		$title_icon_class = 'default';

		get_template_part('template-parts/template-part-head-part2'); ?>
    <div class="clear clearfix"></div>
</div>
<div class="container dmbs-container">
    <!-- start content container -->
    <div class="row dmbs-content">


        <div class="col-md-12 dmbs-main">
            <?PHP
           	// echo $page_content;
            ?>
        </div>

    </div>
</div>
<!-- end content container -->
</div>
<!-- video here -->
</div>

<div class="container-fluid full_bottom_container">
    <div class="row ofices_row">
        <?php get_template_part('template-parts/widgets/offices'); ?>
    </div>

    <!-- end content container -->
    <!--</div>
<div class="container-fluid">-->
    <?php get_footer(); ?>