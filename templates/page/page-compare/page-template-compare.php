<?PHP
/* Template Name: Compare NEW */

get_header(); ?>

<style>
<?php include __DIR__ . '/../css/components/hero-templates/hero-template.css';
include __DIR__ . '/../css/components/get-in-touch.css';
include __DIR__ . '/../css/components/another-equipments.css';

include __DIR__ . '/../css/page-templates/page-compare/compare-filter.css';
include __DIR__ . '/../css/page-templates/page-compare/compare-items.css';
include __DIR__ . '/../css/page-templates/page-compare/compare-results.css';

include __DIR__ . '/../css/page-templates/page-compare/compare.css';
?>
</style>

<?php get_template_part('template-parts/template-part-head-big'); ?>

<section class="compare-page" id="compare_content">
    <div class="compare-page--wrapper container compare_content_row">
        <?PHP
        if(isset($_POST['show_results'])) {
            get_template_part('template-parts/compare_step_2');
        } else {
            get_template_part('template-parts/compare_step_1');
        }?>
    </div>
</section>

<?php get_template_part('template-parts/get-in-touch'); ?>
<?php get_template_part('templates/components/section-templates/another-equipments'); ?>
<?php get_footer(); ?>