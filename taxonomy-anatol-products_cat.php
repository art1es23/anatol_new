<?php
get_header();
global $anatol_cat_title;
$anatol_cat_title = single_term_title("", false);
?>

<?php get_template_part('template-parts/template-part-head-pr'); ?>

<div class="container-fluid">
    <div class="row">
        <section class="cat_content" id="cat_content">
            <div class="cat_content--wrapper container">
                <div class="equipments_list presses_content_row">
                    <?php
                        if (have_posts()) {
                            while (have_posts()) {
                                the_post();
                                get_template_part('template-parts/loop/product');
                            }
                        }
                    ?>
                </div>

                <!-- <div class="col-xs-12"> -->
                    <?php
						$description = term_description();
						if (!empty($description)) {
							echo '<div class="page_title_text">' . $description . '</div>';
						} 
                    ?>
                <!-- </div> -->
            </div>
        </section>
    </div>
</div>



<?php get_template_part('templates/equipment/another-equipments'); ?>
<?php get_footer();