<?php get_header(); ?>

<style>
<?php include 'css/page-templates/page-ebooks/ebooks.css';
?>
</style>

<?php get_template_part('template-parts/template-part-head-press'); ?>

<div class="container ebook_content">
    <!-- start content container -->
    <div class="row eb-content">

        <?php // theloop
      if( have_posts() ) { ?>
        <div class="ebooks_list">
            <?php while ( have_posts() ) : the_post(); ?>
            <div class="ebook_item">
                <div class="ebook_img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('ebook_img'); ?></a>
                </div>
                <div class="ebook_desc">
                    <div class="ebook_descr_top">
                        <div class="ebook_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                        <?php if( get_field( "short_description" )) {?>
                        <div class="ebook_excerpt"><?php the_field( "short_description" );?></div>
                        <?php }	?>

                    </div>
                    <div class="ebook_learn_more"><a href="<?php the_permalink(); ?>">Learn More</a></div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php } else { ?>

        <?php } ?>
    </div>
</div>



<?php get_footer(); ?>