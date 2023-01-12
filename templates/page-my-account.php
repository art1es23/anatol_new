<?php
/* Template Name: My Account NEW*/
get_header(); ?>

<style>
<?php include __DIR__ . '/../css/components/hero-templates/hero-template.css';
include __DIR__ . '/../css/page-templates/page-account/page-account.css';
include __DIR__ . '/../css/components/another-equipments.css';
include __DIR__ . '/../css/page-templates/store/woo.css';
// include 'css/woocommerce.css';
?>
</style>

<?php get_template_part('templates/components/hero-section/template-part-head-press'); ?>

<div class="container account_container">
    <?php // theloop
      if ( have_posts() ) : 
        while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
    <?php wp_link_pages(); ?>
    <?php comments_template(); ?>
    <?php endwhile; ?>

    <?php else: ?>
    <?php get_404_template(); ?>
    <?php endif; ?>
</div>

<?php get_template_part('templates/components/section-templates/another-equipments'); ?>
<?php get_template_part('templates/components/forms/register-vacancy-form') ; ?>
<?php get_footer(); ?>