<?PHP
/* Template Name: FAQ */
get_header(); ?>

<style>
<?php include 'css/components/hero-templates/hero-template.css';
include 'css/page-templates/page-faq/faq.css';
include 'css/page-templates/page.css';
include 'css/components/another-equipments.css';
?>
</style>

<?php get_template_part('template-parts/template-part-head-bg-black'); ?>

<div class="page--wrapper container">
    <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                get_template_part('templates/faq');
            }
        } else {
    } ?>
    <div class="sidebar"></div>
</div>

<?php get_template_part('templates/equipment/another-equipments'); ?>
<?php get_footer(); ?>