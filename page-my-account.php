<?php
/* Template Name: My Account */
get_header(); ?>

<style>
<?php include 'css/components/hero-templates/hero-template.css';
include 'css/page-templates/page-account/page-account.css';
include 'css/components/another-equipments.css';
include 'css/woocommerce.css';
?>
</style>

<?php get_template_part('template-parts/template-part-head-press'); ?>

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

<?php get_template_part('templates/equipment/another-equipments'); ?>
<?php include 'templates/forms/register-warranty.php' ; ?>
<?php get_footer(); ?>