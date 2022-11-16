<?php

$videos = new WP_Query(
    array(
      'post_type' => 'anatoltv',
      'orderby' => 'date title',
      'showposts' => 6
  )
);

?>

<div class="container-fluid full_bottom_container anatol_tv_box">
  <?php
  if($videos->have_posts()) {
    ?>
    <div class="row anatol_tv_row">
    <div class="container">
      <div class=" col-md-12">	  
        <div class="section_title"><?php _e('Anatol TV'); ?></div>
        <div class="video_wrapper">
          <?php
            while($videos->have_posts()) {
              $videos->the_post();
              $vimeo_url = get_field('vimeo_url');
              // $video_id = (int) substr(parse_url( $vimeo_url, PHP_URL_PATH), 1 );?>
              <div class="video_item">
                <div class="video_content">
                  <a target="_blank" href="<?php echo $vimeo_url; ?>" data-fancybox="video-gallery" class="">
                    <?php the_post_thumbnail('full'); ?>
                  </a>
                  <?php the_title(); ?>
                </div>
              </div>
            <?php }
          ?>
        </div>
      </div>
    </div>
    </div>
    <?php
  }
  ?>
</div>
