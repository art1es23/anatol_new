<?PHP
/* 
Template Name: Financing
*/
get_header(); ?>

<style>
<?php include 'css/page-templates/page-financing/financing.css';
include 'css/components/another-equipments.css';
include 'css/components/get-in-touch.css';
?>
</style>

<?php get_template_part('template-parts/template-part-head-big'); ?>

<section id="available_opportunities" class="available_opportunities fix-bg">
    <div class="available_opportunities--wrapper container">
        <h2 class="section_title fadein">
            <?PHP echo get_field("f_experience_title"); ?>
        </h2>
        <div class="section_content fadein">
            <?PHP echo get_field("f_experience_content"); ?>
        </div>
    </div>
</section>

<div class="financing_info_text">
    <div class="financing_info--wrapper container"><?php the_field('the_benefits_of_financing'); ?></div>
</div>

<?php get_template_part('templates/equipment/another-equipments'); ?>
<?php get_template_part('template-parts/get-in-touch'); ?>
<?php get_footer(); ?>