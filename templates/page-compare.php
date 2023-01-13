<?PHP
/* Template Name: Compare NEW */

get_header(); ?>

<style>
<?php include locate_template('css/components/get-in-touch.css');
include locate_template('css/components/another-equipments.css');

include locate_template('css/page-templates/page-compare/compare-filter.css');
include locate_template('css/page-templates/page-compare/compare-items.css');
include locate_template('css/page-templates/page-compare/compare-results.css');

include locate_template('css/page-templates/page-compare/compare.css');
?>
</style>

<?php get_template_part('templates/components/hero-templates/template-part-head-big'); ?>

<section class="compare-page" id="compare_content">
    <div class="compare-page--wrapper container compare_content_row">
        <?PHP
        if(isset($_POST['show_results'])) {
            get_template_part('templates/page/page-compare/components/compare_step_2');
        } else {
            get_template_part('templates/page/page-compare/components/compare_step_1');
        }?>
    </div>
</section>

<?php get_template_part('templates/components/section-templates/get-in-touch'); ?>
<?php get_template_part('templates/components/section-templates/another-equipments'); ?>
<?php get_footer(); ?>