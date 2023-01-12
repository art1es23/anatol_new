<?PHP
/* Template Name: FAQ NEW*/
get_header(); ?>

<style>
<?php include __DIR__ . '/../css/components/hero-templates/hero-template.css';
include __DIR__ . '/../css/page-templates/page-faq/faq.css';
include __DIR__ . '/../css/page-templates/page.css';
include __DIR__ . '/../css/components/another-equipments.css';
?>
</style>

<?php get_template_part('templates/components/hero-section/template-part-head-bg-black'); ?>

<div class="page--wrapper container">
    <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                get_template_part('templates/page/page-faq/components/faq');
            }
        } else {
    } ?>
    <div class="sidebar"></div>
</div>

<?php get_template_part('templates/components/section-templates/another-equipments'); ?>
<?php get_footer(); ?>