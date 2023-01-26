<?php
/*
    Template Name: Ebooks
    Template Post Type: post
*/
get_header(); ?>

<style>
<?php // include locate_template('css/components/hero-templates/hero-template.css');
include locate_template('css/libs/swiper-bundle.css');
include locate_template('css/components/sliders/slider-similar-items.css');
include locate_template('css/components/another-equipments.css');
include locate_template('css/page-templates/page-ebooks/ebooks.css');
include locate_template('css/page-templates/single-pages/page-ebook-post/page-ebook-single.css');
?>
</style>
<?php get_template_part('templates/components/hero-templates/template-part-head-press'); ?>

<div class="ebook-post-single">
    <div class="ebook-post-single--wrapper container">
        <div class="ebook-post-single__item">
            <?php // theloop
                if (have_posts()) : while (have_posts()) : the_post(); ?>

            <?php
                $e_equipment_gallery = get_field('e_equipment_gallery');
                if(get_field('e_enable_equipment_gallery') === true && !empty($e_equipment_gallery)) {
                    $slider_data = array();
                    $slider_data['desrctiption'] = get_the_title();
                    $slider_data['slides'] = array();
                    echo '<div id="image-carousel-container"><div class="ebook_page-carousel sldots">';
                    foreach($e_equipment_gallery as $gallery_image) {
                        $g_image = wp_get_attachment_image_src($gallery_image['ID'], array());
            ?>
            <div class="overlay-container">
                <div class="item">
                    <a href="<?php echo $g_image[0]; ?>" data-fancybox="product-images"
                        title="<?php echo esc_attr($gallery_image['caption']); ?>">
                        <img src="<?php echo $g_image[0]; ?>" loading="lazy" class="lozad main_gallery_image"
                            alt="<?php echo esc_attr($gallery_image['alt']); ?>">
                    </a>
                </div>
            </div>
            <?php
                $slider_data['slides'][] = array(
                    'image' 	=> $g_image[0],
                    'alt' 		=> $gallery_image['alt'],
                    'caption' 	=> $gallery_image['caption']
                );
            }
            echo '</div></div>';?>

            <script>
            var equipment_gallery_data = <?php echo json_encode($slider_data); ?>;
            </script>

            <?php } else { ?>

            <?php if ( has_post_thumbnail()) {
                    $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
                    echo '<div class="ebook-post-single__img" href="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" >';
                    the_post_thumbnail('');
                    echo '</div>';
                }
            } ?>
        </div>

        <div class="ebook-post-single__item">
            <h2 class="ebook-post-single__title section_title"><?php the_title(); ?></h2>
            <?php the_content(); ?>

            <?php if( get_field( "ebook_pages" )) {?>

            <div class="ebook-post-single-info">
                <div class="ebook-post-single-info__item">
                    <span class="legend">Format:</span>
                    <?php the_field( "ebook_format" );?>
                </div>
                <div class="ebook-post-single-info__item">
                    <span class="legend">Pages:</span>
                    <?php the_field( "ebook_pages" );?>
                </div>
            </div>
            <?php }	?>

            <?php if( get_field( "file_to_download" )) {?>

            <button href="<?php the_field( "file_to_download" );?>"
                class="download-ebook-button button link_to_item download_click" target="_blank">Download eBook</button>
            <?php }	?>
        </div>

        <?php endwhile; ?>
        <?php else : 
            get_404_template(); 
        endif; ?>
    </div>
</div>

<?php
    $custom_taxterms = wp_get_object_terms( $post->ID, 'category', array('fields' => 'ids') );

    $args = array(
        'post_type' => 'ebooks',
        'post_status' => 'publish',
        'posts_per_page' => 5, 
        'orderby' => 'rand',
        'post__not_in' => array ( $post->ID )
    );
    $related_items = new WP_Query( $args );
    if ( $related_items->have_posts() ) : ?>

<div class="swiper similar-items">
    <div class="swiper similar-items--wrapper container">
        <h3 class="section_title">Other eBooks</h3>
        <div class="similar-items-list swiper-wrapper">

            <?php while ( $related_items->have_posts() ) : $related_items->the_post(); ?>

            <!-- <div class="swiper-slide similar_ebook_item"> -->
            <div class="swiper-slide similar-items-list__item ebook-post">
                <a class="ebook-post__img"
                    href="<?php the_permalink(); ?>"><?php the_post_thumbnail('ebook_img'); ?></a>

                <div class="ebook-post__description">

                    <a class="ebook-post__title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

                    <?php if( get_field( "short_description" )) {?>
                    <div class="ebook-post__excerpt"><?php the_field( "short_description" );?></div>
                    <?php }	?>

                    <a class="ebook-post__btn button" href="<?php the_permalink(); ?>">Learn More</a>
                </div>
            </div>
            <?php endwhile; ?>
        </div>

        <div class="swiper-pagination similar-items-pagination"></div>
        <?php endif;
            wp_reset_postdata(); ?>
    </div>
</div>

<?php get_template_part('templates/components/section-templates/another-equipments'); ?>


<!-- Slider Init -->
<script defer src="<?php echo get_template_directory_uri();?>/js/libs/swiper/swiper-bundle.min.js"></script>
<script defer src="<?php echo get_template_directory_uri();?>/js/sliders-swiper.js"></script>

<?php get_footer(); ?>