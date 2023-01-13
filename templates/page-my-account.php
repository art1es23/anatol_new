<?php
/* Template Name: My Account NEW*/
get_header(); ?>

<style>
<?php // include locate_template('css/components/hero-templates/hero-template.css');
include locate_template('css/page-templates/page-account/page-account.css');
include locate_template('css/components/another-equipments.css');
include locate_template('css/page-templates/store/woo.css');
?>
</style>

<?php get_template_part('templates/components/hero-templates/template-part-head-press'); ?>

<h1><?php 

	$term = get_queried_object();
	$post_slug = $term->slug;

    print_r($post_slug);

?></h1>

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