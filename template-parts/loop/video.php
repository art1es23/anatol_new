<?php
$vimeo_url = get_field('vimeo_url');
?>
<a target="_blank" data-fancybox="video-gallery" href="<?php echo $vimeo_url; ?>">
  <div class="thumbnail-wrap">
    <?php the_post_thumbnail('full'); ?>
  </div>
  <div class="video_title"><?php the_title(); ?></div>
</a>
