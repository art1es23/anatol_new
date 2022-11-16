<?php
/* Template Name: Full Width */
get_header(); ?>

<?php get_template_part('template-parts/template-part-head-press'); ?>


<div class="container dmbs-container">
  <!-- start content container -->
  <div class="row dmbs-content">
    <div class="col-md-12 dmbs-main page_background">
      <?php // theloop
      if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
      <?php wp_link_pages(); ?>
      <?php comments_template(); ?>
    <?php endwhile; ?>
  <?php else: ?>

    <?php get_404_template(); ?>

  <?php endif; ?>
</div>
</div>
</div>
<!-- end content container -->
</div>
</div>



  <?php get_footer(); ?>
