<?php 
/* 
    Template Name: Ebooks Archive
    Template Post Type: archive
*/

get_header(); ?>

<style>
<?php // include locate_template('css/components/hero-templates/hero-template.css');
include locate_template('css/page-templates/page-ebooks/ebooks.css');
?>
</style>

<?php get_template_part('templates/components/hero-templates/template-part-head-press'); ?>

<div class="container ebooks">
    <!-- <div class="row eb-content"> -->

    <?php // theloop
      if ( have_posts() ) { ?>
    <div class="ebooks-list">
        <?php while ( have_posts() ) : the_post(); ?>
        <div class="ebooks-list__item ebook-post">
            <a class="ebook-post__img" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('ebook_img'); ?></a>
            <div class="ebook-post__description">
                <a class="ebook-post__title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <?php if( get_field( "short_description" )) {?>
                <p class="ebook-post__excerpt"><?php the_field( "short_description" );?></p>
                <?php }	?>

                <a class="ebook-post__btn button" href="<?php the_permalink(); ?>">Learn More</a>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    <?php } else { ?>
    <p>Sorry.. Posts not found.</p>
    <?php } ?>
    <!-- </div> -->
</div>

<?php get_footer(); ?>