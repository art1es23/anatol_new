<?php
    $equipment_gallery = get_field('equipment_gallery');
    
    if($equipment_gallery) {
        $slider_data = array();
        $slider_data['desrctiption'] = get_the_title();
        $slider_data['slides'] = array();
        
        echo '<div id="image-carousel-container" class="image-carousel-container swiper" data-lazy-load="true"><div class="equipment_gallery swiper-wrapper" data-lazy-load="true">';
        foreach($equipment_gallery as $gallery_image) {
            $g_image = wp_get_attachment_image_src($gallery_image['ID'], array(1362, 969));
    ?>

<a class="gallery-item swiper-slide" href="<?php echo $g_image[0]; ?>" data-fancybox="product-images"
    title="<?php echo esc_attr($gallery_image['caption']); ?>">
    <picture class="main_gallery_image">
        <source data-srcset="<?php echo $g_image[0]; ?>" type="image/webp">
        <img class="swiper-lazy" data-src="<?php echo $g_image[0]; ?>"
            alt="<?php echo esc_attr($gallery_image['alt']); ?>" width="<?php echo $g_image[1]; ?>"
            height="<?php echo $g_image[2]; ?>">
    </picture>
</a>

<?php
    $slider_data['slides'][] = array(
        'image' 	=> $g_image[0],
        'alt' 		=> $gallery_image['alt'],
        'caption' 	=> $gallery_image['caption']
    );
}
echo '</div>';
?>

<!-- If we need navigation buttons -->
<div class="swiper-button-prev"></div>
<div class="swiper-button-next"></div>
<?php echo '</div>'; ?>
<?php } else { ?>

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
<?php } ?>