<?php
/* Template Name: Events NEW*/

get_header(); ?>
<style>
<?php // include locate_template('css/libs/swiper-bundle.css');
include locate_template('css/components/get-in-touch.css');
include locate_template('css/page-templates/page-events/events.css');
?>
</style>

<?php get_template_part('templates/components/hero-templates/template-part-head-big'); ?>

<div class="events-content">

    <?php
    $sort_array = [];
    if(!function_exists('anatol_get_free_index')){
      function anatol_get_free_index($array, $index) {
        if(!isset($array[$index])) {
          return $index;
        } else {
          return anatol_get_free_index($array, ($index + 1));
        }
      }
    }

    $args = array(
      'numberposts' => -1,
      'post_type'   => 'events'
    );

    $res = get_posts($args);

    $new_array = array();
    foreach($res as $value) {
      $starttime = get_field("starttime", $value->ID);
      
      if(!empty($starttime)) {
        $starttime = strtotime($starttime);
      }
      
      if(empty($starttime)) {
        $starttime = 0;
      }
      
      $sort_array[anatol_get_free_index($sort_array, $starttime)] = $value;
    }
    ksort($sort_array);
    $res = $sort_array;
    $sort_array = NULL;
    unset($sort_array);
  ?>

    <div class="events_list" id="events_list">
        <?php
      //VIEW CURRENT EVENT
      $cntgoing = 0;
      foreach($res as $uv):?>
        <?php if(goingOn(get_field("starttime", $uv->ID), get_field("endtime", $uv->ID))) : ?>
        <?php $cntgoing++;  ?>
        <div class="event_block event event_current">

            <?php	$attachment_id = get_field('cover', $uv->ID);
            $size = "large";
            $cover = wp_get_attachment_image_src( $attachment_id, $size );
            $image2 = wp_get_attachment_image_src( $attachment_id, $size2 );
          ?>

            <div class="event_image" style="background-image:url('<?php echo $cover[0]; ?>')">
                <span class="coming_soon_text_top">
                    <?PHP _e('Coming soon'); ?>
                </span>
            </div>

            <div class="event_info card_info">
                <div class="event_info_cont">
                    <span class="coming_soon_text">
                        <?PHP _e('Coming soon'); ?>
                    </span>
                    <h3 class="event_title"><?php echo get_the_title($uv->ID); ?></h3>

                    <div class="event_separator"></div>

                    <?PHP if(!empty(get_field("website", $uv->ID)) || !empty(strip_tags($uv->post_content))) { ?>

                    <div class="events_date_desc">
                        <?PHP if(!empty(get_field("website", $uv->ID))) { ?>
                        <p class="event_dates">
                            <span class="svg-wrapper svg-event"></span>

                            <?php echo get_field("label", $uv->ID); ?>
                        </p>
                        <?PHP } ?>

                        <?PHP if(!empty(strip_tags($uv->post_content))) { ?>
                        <div class="event_description--wrapper">
                            <span class="svg-wrapper svg-location"></span>

                            <div class="event_description">
                                <?php echo apply_filters('the_content', $uv->post_content); ?>
                            </div>
                        </div>
                        <?PHP } ?>

                        <?PHP if(!empty(get_field("machines_for_exhibition", $uv->ID))) { ?>
                        <div class="machines_for_exhibition">
                            <?php echo get_field("machines_for_exhibition", $uv->ID); ?></div>
                        <?PHP } ?>

                    </div>
                    <?PHP } ?>

                    <?PHP if(!empty(get_field("website", $uv->ID)) || !empty(get_field("logo", $uv->ID))) {?>
                    <div class="card_subinfo">

                        <?PHP if(!empty(get_field("logo", $uv->ID))) {?>

                        <div class="cs_logo">
                            <?PHP echo wp_get_attachment_image(get_field("logo", $uv->ID), 'full', false, array());?>
                        </div>
                        <?PHP } ?>

                        <?PHP if(!empty(get_field("website", $uv->ID))) {
                             echo '<a href="'.get_field("website", $uv->ID).'" target="_blank" class="cs_website">'.__('Visit website').'</a>'; ?>
                        <?PHP } ?>
                    </div>

                    <?PHP } ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php endforeach; ?>

        <?php
        //EVENTS FROM FUTURE
        $rowcount = 0;
        $rowfcount = 0;
        //asort($res);
        foreach($res as $uv) : ?>
        <?php if(goingFuture(get_field("starttime", $uv->ID), get_field("endtime", $uv->ID))) : ?>
        <?php $rowfcount++; ?>
        <div class="event_block event event_future">

            <?php	$attachment_id = get_field('cover', $uv->ID);
              $size = "large";
              $cover = wp_get_attachment_image_src( $attachment_id, $size );
              $image2 = wp_get_attachment_image_src( $attachment_id, $size2 );
            ?>
            <div class="event_image" style="background-image:url('<?php echo $cover[0]; ?>')">
                <span class="coming_soon_text_top">
                    <?PHP _e('Coming soon'); ?>
                </span>
            </div>

            <div class="event_info card_info">
                <div class="event_info_cont">
                    <span class="coming_soon_text">
                        <?PHP _e('Coming soon'); ?>
                    </span>
                    <h3 class="event_title"><?php echo get_the_title($uv->ID); ?></h3>
                    <div class="event_separator"></div>

                    <?PHP if(!empty(get_field("website", $uv->ID)) || !empty(strip_tags($uv->post_content))) { ?>
                    <div class="events_date_desc">

                        <?PHP if(!empty(get_field("website", $uv->ID))) { ?>
                        <div class="event_dates">
                            <span class="svg-wrapper svg-event"></span>

                            <?php echo get_field("label", $uv->ID); ?>
                        </div>
                        <?PHP } ?>

                        <?PHP if(!empty(strip_tags($uv->post_content))) { ?>
                        <div class="event_description--wrapper">
                            <span class="svg-wrapper svg-location"></span>
                            <div class="event_description">
                                <?php echo apply_filters('the_content', $uv->post_content); ?>
                            </div>
                        </div>
                        <?PHP } ?>

                        <?PHP if(!empty(get_field("machines_for_exhibition", $uv->ID))) { ?>
                        <div class="machines_for_exhibition">
                            <?php echo get_field("machines_for_exhibition", $uv->ID); ?></div>
                        <?PHP } ?>
                    </div>
                    <?PHP } ?>

                    <?PHP if(!empty(get_field("website", $uv->ID)) || !empty(get_field("logo", $uv->ID))) {?>
                    <div class="card_subinfo">

                        <?PHP if(!empty(get_field("logo", $uv->ID))) {?>
                        <div class="cs_logo">
                            <?PHP echo wp_get_attachment_image(get_field("logo", $uv->ID), 'full', false, array());?>
                        </div>
                        <?PHP } ?>

                        <?PHP if(!empty(get_field("gallery", $uv->ID)) && !empty(get_field("logo", $uv->ID))) {?>
                        <?PHP } ?>

                        <?PHP if(!empty(get_field("gallery", $uv->ID))) {?>

                        <div class="gallery-link">
                            <a href="javascript:;" class="fancyLaunch" data-open-id="gallery-<?php echo $uv->ID ?>"
                                data-fancybox-trigger="preview-<?php echo $uv->ID ?>">Open Gallery</a>
                        </div>


                        <div id="images" class="cs_photos">
                            <?php $images = get_field("gallery", $uv->ID); $size = 'full'; 
                        if( $images ): ?>
                            <?php foreach( $images as $image ): ?>
                            <a data-fancybox="preview-<?php echo $uv->ID ?>" class="image-show"
                                href="<?php echo $image['url']; ?>">
                                <img loading="lazy" width="857" height="323" class="lozad"
                                    src="<?php echo $image['sizes']['thumbnail']; ?>"
                                    alt="<?php echo $image['alt']; ?>" />
                            </a>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>

                        <?PHP echo '';
                    } ?>

                        <?PHP if(!empty(get_field("website", $uv->ID))) {?>
                        <?PHP echo '<a href="'.get_field("website", $uv->ID).'" target="_blank" class="cs_website">'.__('Visit website').'</a>'; ?>
                        <?PHP } ?>
                    </div>
                    <?PHP } ?>

                </div>
            </div>
        </div>
        <?php //endif; ?>
        <?php endif; ?>
        <?php endforeach; ?>

        <?php
          //EVENTS FROM PAST
          rsort($res);
          foreach($res as $uv)  : ?>
        <?php if(goingOff(get_field("starttime", $uv->ID), get_field("endtime", $uv->ID))) : ?>
        <?php $rowcount++; ?>
        <div class="event_block event event_past">

            <?php $attachment_id = get_field('cover', $uv->ID);
              $size = "large";
              $cover = wp_get_attachment_image_src( $attachment_id, $size );
            ?>

            <div class="event_image" style="background-image:url('<?php echo $cover[0]; ?>')"></div>
            <div class="event_info card_info">
                <div class="event_info_cont">
                    <span class="coming_soon_text">
                        <?PHP _e('Coming soon'); ?>
                    </span>
                    <h3 class="event_title"><?php echo get_the_title($uv->ID); ?></h3>
                    <div class="event_separator"></div>

                    <?PHP if(!empty(get_field("website", $uv->ID)) || !empty(strip_tags($uv->post_content))) { ?>
                    <div class="events_date_desc">
                        <?PHP if(!empty(get_field("website", $uv->ID))) { ?>
                        <div class="event_dates">
                            <span class="svg-wrapper svg-event"></span>
                            <?php echo get_field("label", $uv->ID); ?>
                        </div>
                        <?PHP } ?>

                        <?PHP if(!empty(strip_tags($uv->post_content))) { ?>
                        <div class="event_description--wrapper">
                            <span class="svg-wrapper svg-location"></span>

                            <div class="event_description">
                                <?php echo apply_filters('the_content', $uv->post_content); ?>
                            </div>
                        </div>
                        <?PHP } ?>

                        <?PHP if(!empty(get_field("machines_for_exhibition", $uv->ID))) { ?>
                        <div class="machines_for_exhibition">
                            <?php echo get_field("machines_for_exhibition", $uv->ID); ?></div>
                        <?PHP } ?>
                    </div>
                    <?PHP } ?>

                    <?PHP if(!empty(get_field("gallery", $uv->ID)) || !empty(get_field("logo", $uv->ID))) {?>
                    <div class="card_subinfo">
                        <?PHP if(!empty(get_field("logo", $uv->ID))) {?>
                        <div class="cs_logo">
                            <?PHP echo wp_get_attachment_image(get_field("logo", $uv->ID), 'full', false, array());?>
                        </div>
                        <?PHP } ?>

                        <?PHP if(!empty(get_field("gallery", $uv->ID)) && !empty(get_field("logo", $uv->ID))) {?>
                        <?PHP } ?>

                        <?PHP if(!empty(get_field("gallery", $uv->ID))) {?>
                        <div class="gallery-link">
                            <a href="javascript:;" class="fancyLaunch" data-open-id="gallery-<?php echo $uv->ID ?>"
                                data-fancybox-trigger="preview-<?php echo $uv->ID ?>">Open Gallery</a>
                        </div>

                        <div id="images" class="cs_photos">

                            <?php $images = get_field("gallery", $uv->ID); $size = 'full'; 
                          if( $images ): ?>
                            <?php foreach( $images as $image ): ?>
                            <a data-fancybox="preview-<?php echo $uv->ID ?>" class="image-show"
                                href="<?php echo $image['url']; ?>">
                                <img loading="lazy" width="857" height="323" class="lozad"
                                    src="<?php echo $image['sizes']['thumbnail']; ?>"
                                    alt="<?php echo $image['alt']; ?>" />
                            </a>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <?PHP echo '';
                      } ?>

                        <?PHP if(!empty(get_field("website", $uv->ID))) {?>
                        <?PHP echo '<a href="'.get_field("website", $uv->ID).'" target="_blank" class="cs_website">'.__('Visit website').'</a>'; ?>
                        <?PHP } ?>
                    </div>
                    <?PHP } ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

<?php get_template_part('templates/components/section-templates/get-in-touch'); ?>

<?php get_footer(); ?>