<?php get_header(); ?>

<?php get_template_part('templates/components/hero-templates/template-part-head-bg'); ?>

<div class="container ebook_content">
    <!-- start content container -->
    <div class="row eb-content">

        <?php // theloop
      if( have_posts() ) { ?>
        <div class="ebooks_list">
            <?php while ( have_posts() ) : the_post(); ?>
            <div class="ebook_item">

                <div class="ebook_desc">
                    <div class="ebook_descr_top">
                        <div class="ebook_title"> <?php the_title(); ?> </div>
                        <?php if( get_field( "short_description" )) {?>
                        <div class="ebook_excerpt"><?php the_field( "short_description" );?></div>
                        <?php }	?>

                    </div>

                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php } else { ?>

        <?php } ?>
    </div>
</div>



<?php get_footer(); ?>