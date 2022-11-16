<?php get_header(); ?>
<?php get_template_part('template-parts/template-part-head-press'); ?>

<div class="single_ebook_container">

    <div class="container">
        <!-- start content container -->
        <div class="single_ebook_content">
            <div class="single_ebook_img ebook_hulf">

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
                                echo '</div></div>';
								?>
                <script>
                var equipment_gallery_data = <?php echo json_encode($slider_data); ?>;
                </script>
                <?php
                            } else {
                                ?>
                <?php
					 if ( has_post_thumbnail()) {
					   $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
					   echo '<a href="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" >';
					   the_post_thumbnail('');
					   echo '</a>';
					 }
					 ?>
                <?php
                    }
                ?>



            </div>
            <div class="single_ebook_cont ebook_hulf">
                <h1 class="page-header"><?php the_title(); ?></h1>
                <?php the_content(); ?>

                <?php if( get_field( "ebook_pages" )) {?>

                <div class="ebook_info">
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
            'post_type' => 'ebooks',
            'post_status' => 'publish',
            'posts_per_page' => 5, 
            'orderby' => 'rand',
            'post__not_in' => array ( $post->ID )
        );
        $related_items = new WP_Query( $args );
        if ( $related_items->have_posts() ) : ?>

        <div class="similar_ebooks">
            <div class="section_title">Other eBooks</div>
            <div class="similar_ebooks_slider sldots">

                <?php while ( $related_items->have_posts() ) : $related_items->the_post(); ?>

                <div class="similar_ebook_item">
                    <div class="ebook_item">
                        <div class="ebook_img"><a
                                href="<?php the_permalink(); ?>"><?php the_post_thumbnail('ebook_img'); ?></a></div>
                        <div class="ebook_desc">
                            <div class="ebook_descr_top">
                                <div class="ebook_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>
                                <?php if( get_field( "short_description" )) {?>
                                <div class="ebook_excerpt"><?php the_field( "short_description" );?></div>
                                <?php }	?>

                            </div>
                            <div class="ebook_learn_more"><a href="<?php the_permalink(); ?>">Learn More</a></div>
                        </div>
                    </div>
                </div>

                <?php endwhile; ?>

                </ul>
            </div>

            <?php endif;
        wp_reset_postdata();
        ?>


        </div>
    </div>
</div>


<?php get_template_part('templates/equipment/another-equipments'); ?>





<div class="download_ebook_b innerr">


    <a class="close_pop" style="float: right;"><img loading="lazy" class="lozad"
            src="<?php bloginfo('template_directory'); ?>/images/close.svg" style="width: 20px" alt=""></a>
    <div class="form-title">Download eBook</div>
    <div id="contact_form_pop" class="form_pop">

        <?php get_template_part('templates/forms/ebook-form'); ?>




    </div>
</div>






<?php get_footer(); ?>