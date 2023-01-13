<?php
get_header();
global $anatol_cat_title;
$anatol_cat_title = single_term_title("", false);
?>

<style>
<?php // include locate_template('css/components/hero-templates/hero-template.css');
include locate_template('css/components/presses-item.css');
include locate_template('css/components/equipments-list.css');
include locate_template('css/page-templates/page-conveyers/conveyers.css');
include locate_template('css/components/another-equipments.css');
?>
</style>

<?php get_template_part('templates/components/hero-templates/template-part-head-pr'); ?>

<section class="cat_content" id="cat_content">
    <div class="cat_content--wrapper container">
        <div class="equipments-list">
            <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        get_template_part('templates/components/product-templates/product');
                    }
                } ?>
        </div>

        <?php
            $description = term_description();

            if (!empty($description)) {
                echo '<div class="page_title_text">' . $description . '</div>';
            } ?>
    </div>
</section>

<?php get_template_part('templates/components/section-templates/another-equipments'); ?>


<!-- <script src="<?php echo get_template_directory_uri();?>/js/libs/fancybox/jquery.fancybox.min.js"></script> -->
<?php get_footer();