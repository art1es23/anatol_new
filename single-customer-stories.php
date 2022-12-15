<?php get_header(); ?>

<style>
<?php include 'css/components/hero-templates/hero-template.css';
include 'css/page-templates/single-pages/page-customer-stories-single/page-cs-single.css';
?>
</style>

<?php get_template_part('template-parts/template-part-head-press'); ?>


<div class="cs-page">
    <div class="cs-page--wrapper container">
        <div class="customer">

            <div class="customer__item customer-video--wrapper">
                <?php
            $location = get_field('location');
            $video = get_field('wpcf-video');

            if (!empty($location)) {
              ?>
                <div class="acf-map">
                    <div class="marker" data-lat="<?php echo $location['lat']; ?>"
                        data-lng="<?php echo $location['lng']; ?>"></div>
                </div>
                <?php } elseif (!empty($video)) {
            echo $video;
          } else if (!get_the_post_thumbnail()) {
            echo '<div class="empty"></div>';

            // echo get_the_post_thumbnail(get_the_ID(), array(800, 600));
          } else {
                        echo get_the_post_thumbnail(get_the_ID(), array(800, 600));

            // echo '<div class="empty"></div>';
          }?>
            </div>

            <div class="customer__item customer-info" data-aos="fade-left">
                <h2 class="customer-info__title"><?php _e('About сompany'); ?></h2>
                <ul class="customer-info__list list-info">
                    <?php
                      $companyname = get_field('wpcf-companyname');
                      if (!empty($companyname)) {
                        echo '<li class="list-info__item cs_companyname"><span class="cs_row_icon"></span>' . $companyname . '</li>';
                      }

                      $locationtext = get_field('wpcf-locationtext');
                      if (!empty($locationtext)) {
                        echo '<li class="list-info__item cs_locationtext"><span class="cs_row_icon"></span>' . $locationtext . '</li>';
                      }

                      $phone = get_field('wpcf-phone');
                      if (!empty($phone)) {
                        echo '<li class="list-info__item cs_phone"><span class="cs_row_icon"></span>' . $phone . '</li>';
                      }

                      $companyemail = get_field('wpcf-companyemail');
                      if (!empty($companyemail)) {
                        echo '<li class="list-info__item cs_companyemail"><span class="cs_row_icon"></span><a href="mailto:' . $companyemail . '">' . $companyemail . '</a></li>';
                      }

                      $website = get_field('wpcf-website');
                      if (!empty($website)) {
                        echo '<li class="list-info__item cs_website"><span class="cs_row_icon"></span><a target="_blank" href="' . $website . '" rel="nofollow noreferrer">' . $website . '</a></li>';
                      }
                    ?>
                </ul>
            </div>
        </div>

        <?php
          $theexperience = get_field('wpcf-theexperience');
          if (!empty($theexperience)) {
            $companyname = get_field('wpcf-companyname');
            ?>

        <div class="customer-experience">
            <h3 class="customer-experience__title"><?php _e('The experience');?></h3>
            <div class="customer-experience__content"><?php echo $theexperience;?></div>
            <div class="customer-experience__legend">
                <span class="customer-experience__author"><?php echo get_the_title();?></span>

                <?php if (!empty($companyname)) { ?>
                <span class="customer-experience__company"><?php echo $companyname;?></span>
                <?php } ?>
            </div>
            <!-- ????? -->
            <div class="share_post_part">
                <div class="spp_line_part"></div>
            </div>
        </div>
        <!-- ????/ -->
        <?php } ?>
    </div>
    <!-- end content container -->
</div>

</div>

<?php
  $custom_taxterms = wp_get_object_terms( $post->ID, 'category', array('fields' => 'ids') );

  $args = array(
      'post_type' => 'customer-stories',
      'post_status' => 'publish',
      'posts_per_page' => 5, 
      'orderby' => 'rand',
      'post__not_in' => array ( $post->ID )
  );
  $related_items = new WP_Query( $args );
  if ( $related_items->have_posts() ) : ?>

<div class="related-stories container swiper">
    <div class="section_title no_bottom_line"><?php _e('Other stories'); ?></div>
    <div class="swiper-wrapper product_review_slider7 sldots">

        <?php while ( $related_items->have_posts() ) : $related_items->the_post(); ?>
        <?php
            $review   = get_field('wpcf-quote');
            $company   = get_field('wpcf-companyname');
            $video     = get_field('wpcf-video');
            $url     = 'javascript:void(0);';
            if (!empty($video)) {
              $url = $video;
            }
          ?>

        <div class="swiper-slide prs_item_wrap">
            <div class="prs_item it-box">

                <div class="it-content">
                    <div class="it_header_part <?php if (!empty($video)) echo 'has_video'; ?>"><a
                            href="<?= get_the_permalink() ?>"><?= get_the_title() ?></a>
                        <?php if (!empty($company)) {
                            echo ', ' . $company;
                          } ?>
                        <div class="header_thumb">
                            <?php if (has_post_thumbnail()) {
                              the_post_thumbnail();
                            } ?>
                        </div>
                    </div>
                    <div class="it_content_part">
                        <blockquote class="uk-text-left ocm-tstuff">
                            <?php echo $review; ?>
                            <!-- <div style="clear:both;">
                            </div> -->
                        </blockquote>
                        <a class="details_link" href="<?php get_the_permalink() ?>">
                            <?php _e('DETAILS'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination cs-pagination"></div>

</div>

<?php endif;
        wp_reset_postdata();
        ?>


<!-- INIT YOUTUBE VIDEOS -->
<script defer src="<?php echo get_template_directory_uri();?>/js/initVideo.js"></script>
<!-- Slider Init -->
<script defer src="<?php echo get_template_directory_uri();?>/js/libs/swiper/swiper-bundle.min.js"></script>
<script defer src="<?php echo get_template_directory_uri();?>/js/sliders-swiper.js"></script>

<?php get_footer(); ?>