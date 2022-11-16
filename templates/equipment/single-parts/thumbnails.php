<?php
                            $equipment_gallery = get_field('equipment_gallery');
                           

						   if($equipment_gallery) {
								$slider_data = array();
								$slider_data['desrctiption'] = get_the_title();
								$slider_data['slides'] = array();
                                echo '<div id="image-carousel-container" class="image-carousel-container" data-lazy-load="true"><div class="equipment_gallery" data-lazy-load="true">';
                                foreach($equipment_gallery as $gallery_image) {
                                    $g_image = wp_get_attachment_image_src($gallery_image['ID'], array(800, 600));
                                    ?>

<div class="gallery-item">
    <a href="<?php echo $g_image[0]; ?>" data-fancybox="product-images"
        title="<?php echo esc_attr($gallery_image['caption']); ?>">
        <img src="<?php echo $g_image[0]; ?>" loading="lazy" class="lozad main_gallery_image"
            alt="<?php echo esc_attr($gallery_image['alt']); ?>">
    </a>
</div>

<?php
									$slider_data['slides'][] = array(
										'image' 	=> $g_image[0],
										'alt' 		=> $gallery_image['alt'],
										'caption' 	=> $gallery_image['caption']
									);
                                }
                                echo '</div>';
                                echo '<div class="gallery-thumbnails">';
                                foreach($equipment_gallery as $gallery_image) {
                                    //$th_image = wp_get_attachment_image_src('full' );
                                    $th_image = wp_get_attachment_image_src($gallery_image['ID'], 'thumbnail' );
                                    ?>
<div class="item-thumbnail">
    <div class="ico-thumbnail">
        <img src="<?php echo $th_image[0]; ?>" loading="lazy" class="main_gallery_image"
            alt="<?php echo esc_attr($gallery_image['alt']); ?>">
    </div>
</div>
<?php
									$slider_data['slides'][] = array(
										'image' 	=> $th_image[0],
										'alt' 		=> $gallery_image['alt'],
										'caption' 	=> $gallery_image['caption']
									);
                                }
                                echo '</div></div>';
								?>





<?php
                            } else {
                                ?>

<div class="equipment_thumbnail ">
    <?php
										$video = get_field('wpcf-productvideo');
										if(!empty($video)) {
											$media = new ElementMedia();
											echo $media->render(array('url' => $video));
										} else {
											echo get_the_post_thumbnail(get_the_ID(), 'large');
										} 
									?>
</div>
<?php }
								?>