<?php get_header(); ?>

<style>
<?php include __DIR__ . '/../css/components/hero-templates/hero-template.css';
include __DIR__ . '/../css/page-templates/page.css';
?>
</style>

<?php //get_template_part('template-parts/template-part-head-bg'); ?>
<?php get_template_part('template-parts/template-part-head-bg-black'); ?>

<div class="page-content">
    <!-- start content container -->
    <div class="page-content--wrapper container">
        <!-- <div class="dmbs-main"> -->
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h2 class="page-header">
            <?php the_title(); ?></h2>
        <?php the_content(); ?>
        <?php comments_template(); ?>
        <?php endwhile; ?>
        <?php else : ?>
        <?php get_404_template(); ?>
        <?php endif; ?>
    </div>
    <!-- </div> -->
</div>

<?php get_footer(); ?>