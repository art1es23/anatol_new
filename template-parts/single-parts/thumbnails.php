<div class="equipment_thumbnail">
    <div class="row">
        <div class="col-md-2">
            <?php
      if (get_field('gallery')) { ?>
            <div class="gallery-thumbnails">
                <?php
          $gallery = get_field('gallery');
          foreach ($gallery as $key => $value) {
            $class = ($key > 1) ? 'hide' : '';
            $big_image_url = wp_get_attachment_image_src($value, 'large');
            ?>
                <a class="fancybox" data-fancybox="prodcut-gallery" href="<?php echo $big_image_url[0]; ?>">
                    <?php echo wp_get_attachment_image($value, array(300, 200), false, array('class' => $class . ' mw-100  h-auto')); ?>
                </a>
                <?php
          }  ?>
            </div>
            <?php } ?>
            <?php
      if (get_field('video')) { ?>
            <a class="fancybox video-thumb bg-light" data-fancybox="prodcut-gallery"
                href="<?php the_field('video'); ?>">
                <i class="fas fa-play"></i>
            </a>
            <?php
      }
      ?>
        </div>
        <div class="col-md-10">
            <?php
      $big_image = wp_get_attachment_image_src(get_field('image'), 'large');
      ?>
            <a class="fancybox" data-fancybox="prodcut-gallery" href="<?php echo $big_image[0]; ?>">
                <?php
        echo wp_get_attachment_image(get_field('image'), array(1200, 800), false, array('class' => 'ml-3 mw-100 h-auto'));
        ?>
            </a>
        </div>
    </div>
</div>

<?php
                            $equipment_gallery = get_field('equipment_gallery');
                           

						   if(get_field('enable_equipment_gallery') === true && !empty($equipment_gallery)) {
								$slider_data = array();
								$slider_data['desrctiption'] = get_the_title();
								$slider_data['slides'] = array();
								
                                echo '<div class="slider-nav-thumbnails">';
                                foreach($equipment_gallery as $gallery_image) {
                                    $th_image = wp_get_attachment_image_src($gallery_image['ID'], 'thumbnail' );
                                    ?>
<div class="thumbnail">
    <img src="<?php echo $th_image[0]; ?>" loading="lazy" class="lozad main_gallery_image"
        alt="<?php echo esc_attr($gallery_image['alt']); ?>">
</div>
<?php
									$slider_data['slides'][] = array(
										'image' 	=> $th_image[0],
										'alt' 		=> $gallery_image['alt'],
										'caption' 	=> $gallery_image['caption']
									);
                                }
                                echo '</div>';
                                echo '<div id="image-carousel-container" class="image-carousel-container" data-lazy-load="true">';
                                foreach($equipment_gallery as $gallery_image) {
                                    $g_image = wp_get_attachment_image_src($gallery_image['ID'], array(800, 600));
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
                                echo '</div>';
								?>





<?php
                            } else {
                                ?>

<div class="equipment_thumbnail">
    <?php
										$video = get_field('wpcf-productvideo');
										if(!empty($video)) {
											$media = new ElementMedia();
											echo $media->render(array('url' => $video));
										} else {
											echo get_the_post_thumbnail(get_the_ID(), array(800, 600));
										} 
									?>
</div>
<?php } ?>