<?PHP
/* Template Name: Compare */

get_header(); ?>

<style>
<?php include 'css/components/hero-templates/hero-template.css';
include 'css/page-templates/page-compare/compare.css';
include 'css/components/get-in-touch.css';
include 'css/components/another-equipments.css';
?>
</style>

<?php get_template_part('template-parts/template-part-head-big'); ?>

<div class="container-fluid">
    <section class="compare_content" id="compare_content">
        <div class="container">
            <div class="row compare_content_row">
                <?PHP
						if(isset($_POST['show_results'])) {
							get_template_part('template-parts/compare_step_2');
						} else {
							get_template_part('template-parts/compare_step_1');
						}?>
            </div>
        </div>
    </section>
</div>



<?php get_template_part('template-parts/get-in-touch'); ?>
<?php get_template_part('templates/equipment/another-equipments'); ?>
<?php get_footer(); ?>