<?PHP
/* 
Template Name: Financing
*/
get_header(); ?>

<style>
<?php include 'css/components/hero-templates/hero-template.css';
include 'css/components/another-equipments.css';
include 'css/components/template-benefits.css';
include 'css/components/financing-options.css';
include 'css/components/get-in-touch.css';
include 'css/page-templates/page-financing/financing.css';
?>
</style>

<!-- <?php get_template_part('template-parts/template-part-head-big'); ?> -->
<?php get_template_part('template-parts/template-part-head-bg-black'); ?>

<section id="available_opportunities" class="available_opportunities">
    <div class="available_opportunities--wrapper container">
        <h2 class="section_title">
            <?PHP echo get_field("f_experience_title"); ?>
        </h2>
        <div class="section_content">
            <?PHP echo get_field("f_experience_content"); ?>
        </div>
    </div>
</section>

<div class="financing_info_text">
    <div class="financing_info--wrapper container"><?php the_field('the_benefits_of_financing'); ?></div>
</div>

<?php get_template_part('templates/equipment/another-equipments'); ?>
<?php get_template_part('template-parts/get-in-touch'); ?>

<!-- Slider Init -->
<script defer src="<?php echo get_template_directory_uri();?>/js/libs/swiper/swiper-bundle.min.js"></script>
<script defer src="<?php echo get_template_directory_uri();?>/js/sliders-swiper.js"></script>

<?php get_footer(); ?>