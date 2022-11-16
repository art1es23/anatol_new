<?php get_header(); ?>
<?php get_template_part('template-parts/template-part-head-press'); ?>

<div class="single_ebook_container">

    <div class="container">
        <!-- start content container -->
        <div class="single_ebook_content">
            <div class="single_ebook_img single_sales_img ebook_hulf">
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
            <div class="single_ebook_cont single_sales_cont ebook_hulf">
                <h1 class="page-header"><?php the_title(); ?></h1>
                <?php the_content(); ?>

                <?php if( get_field( "ebook_pages" )) {?>

                <div class="ebook_info">
                    <div class="ebook_inf"><span>Format:</span><?php the_field( "ebook_format" );?></div>
                    <div class="ebook_inf"><span>Pages:</span><?php the_field( "ebook_pages" );?></div>
                </div>
                <?php }	?>
                <a href="https://anatol.com/where-to-buy/">
                    <div class=" button red-button draw-red">where to buy</div>
                </a>
            </div>
        </div>



        <?php endwhile; ?>
        <?php else : ?>

        <?php get_404_template(); ?>

        <?php endif; ?>

        <?php 
    ?>




    </div>
</div>
</div>

<?php get_template_part('templates/equipment/another-equipments'); ?>








<?php get_footer(); ?>