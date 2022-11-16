<?php get_header(); ?>

<?php get_template_part('template-parts/template-part-head-press'); ?>


<div class="container dmbs-container">
  <!-- start content container -->
  <div class="dmbs-content">
    <div class="dmbs-main">
      <div class="customer_st_cw">
        <div class="cstcw_top_part row">
          <div class="cstcw_tp_left customer_image col-md-6">
            <?php
            $location = get_field('location');
            $video = get_field('wpcf-video');

            if (!empty($location)) {
              ?>
              <div class="acf-map">
                <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
              </div>
            <?php } elseif (!empty($video)) {
            echo $video;
          } else {
            echo get_the_post_thumbnail(get_the_ID(), array(800, 600));
          } ?>
          </div>
          <div class="cstcw_tp_right col-md-6" data-aos="fade-left">
            <div class="cstcw_tp_right_white">
              <div class="box_title"><?php _e('About сompany'); ?></div>
              <ul>
                <?php
                $companyname = get_field('wpcf-companyname');
                if (!empty($companyname)) {
                  echo '<li class="cs_companyname"><span class="cs_row_icon"></span>' . $companyname . '</li>';
                }

                $locationtext = get_field('wpcf-locationtext');
                if (!empty($locationtext)) {
                  echo '<li class="cs_locationtext"><span class="cs_row_icon"></span>' . $locationtext . '</li>';
                }

                $phone = get_field('wpcf-phone');
                if (!empty($phone)) {
                  echo '<li class="cs_phone"><span class="cs_row_icon"></span>' . $phone . '</li>';
                }

                $companyemail = get_field('wpcf-companyemail');
                if (!empty($companyemail)) {
                  echo '<li class="cs_companyemail"><span class="cs_row_icon"></span><a href="mailto:' . $companyemail . '">' . $companyemail . '</a></li>';
                }

                $website = get_field('wpcf-website');
                if (!empty($website)) {
                  echo '<li class="cs_website"><span class="cs_row_icon"></span><a target="_blank" href="' . $website . '" rel="nofollow noreferrer">' . $website . '</a></li>';
                }
                ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <?php
      $theexperience = get_field('wpcf-theexperience');
      if (!empty($theexperience)) {
        $companyname = get_field('wpcf-companyname');
        ?>
        <div class="theexperience">
          <div class="box_title"><?php _e('The experience'); ?></div>
          <div class="theexperience_content"><?php echo $theexperience; ?></div>
          <div class="theexperience_author"><?php echo get_the_title(); ?></div>
          <?php if (!empty($companyname)) { ?><div class="theexperience_companyname"><?php echo $companyname; ?></div><?php } ?>
          <div class="share_post_part">
            <div class="spp_line_part"></div>
          </div>
        </div>
      <?php
    }
    ?>
    </div>
  </div>
</div>
<!-- end content container -->
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
    
    <div class="container-fluid full_bottom_container single_equipment related_stories">
      <section class="product_reviews">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section_title no_bottom_line"><?php _e('Other stories'); ?></div>
              <div class="product_review_slider7 sldots">
			  
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
                  <div class="prs_item_wrap">
                    <div class="prs_item it-box">

                      <div class="it-content">
                        <div class="it_header_part <?php if (!empty($video)) echo 'has_video'; ?>"><a href="<?= get_the_permalink() ?>"><?= get_the_title() ?></a>
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
                            <div style="clear:both;">
                            </div>
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
            </div>
          </div>
        </div>
      </section>
    </div>

        <?php endif;
        wp_reset_postdata();
        ?> 

       
	   
  <?php get_footer(); ?>