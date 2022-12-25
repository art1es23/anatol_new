<?php get_header(); ?>

<style>
<?php include 'css/components/hero-templates/hero-template.css';
include 'css/components/sliders/slider-similar-items.css';

include 'css/components/another-equipments.css';
include 'css/page-templates/single-pages/page-anatoltv/page-anatoltv-single.css';
?>
</style>

<?php get_template_part('template-parts/template-part-head-press'); ?>

<section class="anatol-tv-single">
    <div class="anatol-tv-single--wrapper container">
        <!-- start content container -->
        <div class="anatol-tv-single-post single-post">
            <div class="single-post__item single-post-img">
                <?php 
						if (have_posts()) : while (have_posts()) : the_post(); ?>

                <?php 
                        $vimeo_url = get_field('vimeo_url'); 
                        $video_youtube_id = get_field('video_id_from_youtube');
                        ?>
                <!-- <iframe title="INFINITY All-Servo Oval Automatic Screen Printing Press" width="640" height="360"
                    src="<?php echo get_field('vimeo_url');?>" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen=""></iframe> -->

                <div class="video">
                    <a href="https://www.youtube.com/embed/<?php echo $video_youtube_id;?>" class="video__link">
                        <picture>
                            <source type="image/webp"
                                srcset="https://i.ytimg.com/vi_webp/<?php echo $video_youtube_id;?>/hqdefault.webp">
                            <img width="1280" height="720" loading="lazy" class="lozad video__media"
                                src="https://i.ytimg.com/vi/<?php echo $video_youtube_id;?>/hqdefault.jpg">
                        </picture>
                    </a>
                    <button class="video__button" aria-label="Play video">
                        <svg height="48" version="1.1" viewBox="0 0 68 48" width="68">
                            <path class="video__button-shape"
                                d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z">
                            </path>
                            <path d="M 45,24 27,14 27,34" class="video__button-icon"></path>
                        </svg>
                    </button>
                </div>


            </div>
            <div class="single-post__item single-post-info">
                <h1 class="single-post-info__title section_title"><?php the_title(); ?></h1>
                <?php the_content(); ?>
                <?php if( get_field( "ebook_pages" )) {?>
                <div class="single-post-info__description">
                    <div class="ebook_inf"><span>Format:</span><?php the_field( "ebook_format" );?></div>
                    <div class="ebook_inf"><span>Pages:</span><?php the_field( "ebook_pages" );?></div>
                </div>
                <?php }	?>
                <?php if( get_field( "file_to_download" )) {?>
                <div class="download_click_btn text-center">
                    <a href="<?php the_field( "file_to_download" );?>" class="button download_click"
                        target="_blank">Download eBook</a>
                    <div class="download_ebook_btn button">Download eBook</div>
                </div>
                <?php }	?>
            </div>
        </div>
        <?php endwhile; ?>
        <?php else : ?>
        <?php get_404_template(); ?>
        <?php endif; ?>
        <?php 
    ?>
        <?php
        $custom_taxterms = wp_get_object_terms( $post->ID, 'category', array('fields' => 'ids') );
        $args = array(
            'post_type' => 'anatoltv',
            'post_status' => 'publish',
            'posts_per_page' => 5, 
            'orderby' => 'rand',
            'post__not_in' => array ( $post->ID )
        );
        $related_items = new WP_Query( $args );
        if ( $related_items->have_posts() ) : ?>
        <div class="swiper similar-items">
            <div class="swiper similar-items--wrapper container">

                <h3 class="section_title">Other Anatol TV video</h3>
                <div class="similar-items-list swiper-wrapper">

                    <?php while ( $related_items->have_posts() ) : $related_items->the_post(); ?>

                    <div class="swiper-slide similar-items-list__item ebook-post">
                        <a class="ebook-post__img"
                            href="<?php the_permalink(); ?>"><?php the_post_thumbnail('ebook_img'); ?></a>
                        <div class="ebook-post__description">
                            <a class="single-post-info__title"
                                href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            <?php if( get_field( "short_description" )) {?>
                            <div class="ebook-post__excerpt"><?php the_field( "short_description" );?></div>
                            <?php }	?>
                            <a class="button ebook_learn_more" href="<?php the_permalink(); ?>">Learn More</a>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <div class="swiper-pagination similar-items-pagination"></div>

            </div>
            <?php endif;
        wp_reset_postdata();
        ?>
        </div>
    </div>
    </div>
</section>

<?php get_template_part('templates/equipment/another-equipments'); ?>

<div class="download_ebook_b innerr">
    <a class="close_pop" style="float: right;"><img loading="lazy" class="lozad"
            src="<?php bloginfo('template_directory'); ?>/images/close.svg" style="width: 20px" alt=""></a>
    <div class="form-title">Download eBook</div>
    <div id="contact_form_pop" class="form_pop">
        <?php get_template_part('templates/forms/ebook-form'); ?>
    </div>
</div>

<!-- INIT YOUTUBE VIDEOS -->
<script defer src="<?php echo get_template_directory_uri();?>/js/initVideo.js"></script>

<!-- Slider Init -->
<script defer src="<?php echo get_template_directory_uri();?>/js/libs/swiper/swiper-bundle.min.js"></script>
<script defer src="<?php echo get_template_directory_uri();?>/js/sliders-swiper.js"></script>


<?php get_footer(); ?>