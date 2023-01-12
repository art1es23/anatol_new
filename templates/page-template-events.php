<?php
/* Template Name: Events NEW*/

get_header(); ?>
<style>
<?php // include 'css/components/template-form.css';
include __DIR__ . '/../css/components/hero-templates/hero-template.css';
include __DIR__ . '/../css/components/get-in-touch.css';
include __DIR__ . '/../css/page-templates/page-events/events.css';
?>
</style>

<?php get_template_part('templates/components/hero-section/template-part-head-big'); ?>

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
                            <span class="svg-wrapper">
                                <svg enable-background="new 0 0 500 500" height="50px" id="Layer_1" version="1.1"
                                    viewBox="0 0 500 500" width="50px" xml:space="preserve"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g>
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="44.131" x2="455.868" y1="90.968" y2="90.968" />
                                        <path d="   M455.868,90.968c10.515,0,19.132,8.617,19.132,19.139"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="475" x2="475" y1="110.107" y2="434.041" />
                                        <path d="   M475,434.041c0,10.565-8.617,19.183-19.132,19.183"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="455.868" x2="44.131" y1="453.224" y2="453.224" />
                                        <path d="   M44.131,453.224c-10.522,0-19.131-8.616-19.131-19.183"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="25" x2="25" y1="434.041" y2="110.107" />
                                        <path d="   M25,110.107c0-10.522,8.609-19.139,19.131-19.139"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <g>
                                            <g>
                                                <line stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-miterlimit="2.6131" stroke-width="10" x1="114.718"
                                                    x2="114.718" y1="46.777" y2="124.947" />
                                                <path
                                                    d="     M114.718,165.753c10.531,0,19.13-8.633,19.13-19.139c0-10.532-8.599-19.148-19.13-19.148c-10.532,0-19.123,8.617-19.123,19.148     C95.595,157.121,104.187,165.753,114.718,165.753"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-miterlimit="2.6131" stroke-width="10" />
                                            </g>
                                            <g>
                                                <line stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-miterlimit="2.6131" stroke-width="10" x1="385.291"
                                                    x2="385.291" y1="46.777" y2="127.466" />
                                                <path
                                                    d="     M385.291,165.753c10.514,0,19.097-8.633,19.097-19.139c0-10.532-8.583-19.148-19.097-19.148     c-10.549,0-19.132,8.617-19.132,19.148C366.159,157.121,374.742,165.753,385.291,165.753"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-miterlimit="2.6131" stroke-width="10" />
                                            </g>
                                        </g>
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="75.23" x2="424.779" y1="212.75" y2="212.75" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="85.853" x2="102.826" y1="261.477" y2="261.477" />
                                        <path d="   M102.826,261.477c5.862,0,10.649,4.771,10.649,10.614"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="113.475" x2="113.475" y1="272.091" y2="289.089" />
                                        <path d="   M113.475,289.089c0,5.828-4.787,10.632-10.649,10.632"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="102.826" x2="85.853" y1="299.721" y2="299.721" />
                                        <path d="   M85.853,299.721c-5.844,0-10.623-4.804-10.623-10.632"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="75.23" x2="75.23" y1="289.089" y2="272.091" />
                                        <path d="   M75.23,272.091c0-5.845,4.779-10.614,10.623-10.614"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="287.268" x2="304.248" y1="261.477" y2="261.477" />
                                        <path d="   M304.248,261.477c5.846,0,10.633,4.771,10.633,10.614"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="314.881" x2="314.881" y1="272.091" y2="289.089" />
                                        <path d="   M314.881,289.089c0,5.828-4.787,10.632-10.633,10.632"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="304.248" x2="287.268" y1="299.721" y2="299.721" />
                                        <path d="   M287.268,299.721c-5.846,0-10.633-4.804-10.633-10.632"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="276.635" x2="276.635" y1="289.089" y2="272.091" />
                                        <path d="   M276.635,272.091c0-5.845,4.787-10.614,10.633-10.614"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="387.979" x2="404.977" y1="261.477" y2="261.477" />
                                        <path d="   M404.977,261.477c5.845,0,10.615,4.771,10.615,10.614"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="415.592" x2="415.592" y1="272.091" y2="289.089" />
                                        <path d="   M415.592,289.089c0,5.828-4.771,10.632-10.615,10.632"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="404.977" x2="387.979" y1="299.721" y2="299.721" />
                                        <path d="   M387.979,299.721c-5.846,0-10.614-4.804-10.614-10.632"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="377.363" x2="377.363" y1="289.089" y2="272.091" />
                                        <path d="   M377.363,272.091c0-5.845,4.77-10.614,10.615-10.614"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="85.853" x2="102.826" y1="359.802" y2="359.802" />
                                        <path d="   M102.826,359.802c5.862,0,10.649,4.786,10.649,10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="113.475" x2="113.475" y1="370.417" y2="387.432" />
                                        <path d="   M113.475,387.432c0,5.828-4.787,10.615-10.649,10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="102.826" x2="85.853" y1="398.047" y2="398.047" />
                                        <path d="   M85.853,398.047c-5.844,0-10.623-4.787-10.623-10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="75.23" x2="75.23" y1="387.432" y2="370.417" />
                                        <path d="   M75.23,370.417c0-5.829,4.779-10.615,10.623-10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="186.556" x2="203.545" y1="359.802" y2="359.802" />
                                        <path d="   M203.545,359.802c5.854,0,10.632,4.786,10.632,10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="214.178" x2="214.178" y1="370.417" y2="387.432" />
                                        <path d="   M214.178,387.432c0,5.828-4.778,10.615-10.632,10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="203.545" x2="186.556" y1="398.047" y2="398.047" />
                                        <path d="   M186.556,398.047c-5.836,0-10.632-4.787-10.632-10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="175.924" x2="175.924" y1="387.432" y2="370.417" />
                                        <path d="   M175.924,370.417c0-5.829,4.795-10.615,10.632-10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="287.268" x2="304.248" y1="359.802" y2="359.802" />
                                        <path d="   M304.248,359.802c5.846,0,10.633,4.786,10.633,10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="314.881" x2="314.881" y1="370.417" y2="387.432" />
                                        <path d="   M314.881,387.432c0,5.828-4.787,10.615-10.633,10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="304.248" x2="287.268" y1="398.047" y2="398.047" />
                                        <path d="   M287.268,398.047c-5.846,0-10.633-4.787-10.633-10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="276.635" x2="276.635" y1="387.432" y2="370.417" />
                                        <path d="   M276.635,370.417c0-5.829,4.787-10.615,10.633-10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <g>
                                            <line stroke-linecap="round" stroke-linejoin="round"
                                                stroke-miterlimit="2.6131" stroke-width="10" x1="179.955" x2="194.114"
                                                y1="277.802" y2="290.803" />
                                            <line stroke-linecap="round" stroke-linejoin="round"
                                                stroke-miterlimit="2.6131" stroke-width="10" x1="220.082" x2="194.114"
                                                y1="262.45" y2="290.803" />
                                        </g>
                                        <g>
                                            <line stroke-linecap="round" stroke-linejoin="round"
                                                stroke-miterlimit="2.6131" stroke-width="10" x1="384.232" x2="398.392"
                                                y1="376.145" y2="389.128" />
                                            <line stroke-linecap="round" stroke-linejoin="round"
                                                stroke-miterlimit="2.6131" stroke-width="10" x1="424.359" x2="398.392"
                                                y1="360.776" y2="389.128" />
                                        </g>
                                    </g>
                                </svg>
                            </span>
                            <?php echo get_field("label", $uv->ID); ?>
                        </p>
                        <?PHP } ?>

                        <?PHP if(!empty(strip_tags($uv->post_content))) { ?>
                        <div class="event_description--wrapper">
                            <span class="svg-wrapper">
                                <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                    <g data-name="10-location" id="_10-location">
                                        <path d="M27,12A11,11,0,0,0,5,12C5,22,16,31,16,31S27,22,27,12Z" />
                                        <circle cx="16" cy="12" r="5" />
                                    </g>
                                </svg>
                            </span>
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

                        <!-- <?PHP if(!empty(get_field("gallery", $uv->ID)) && !empty(get_field("logo", $uv->ID))) {?>
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
                        </div> -->

                        <?PHP echo '';} ?>

                        <?PHP if(!empty(get_field("website", $uv->ID))) {?>
                        <!-- <?PHP echo '<a class="cs_website href="'.get_field("website", $uv->ID).'" target="_blank">'.__('Visit website').'</a>'; ?> -->
                        <?PHP echo '<a class="cs_website href="get_field("website", $uv->ID)" target="_blank">'.__('Visit website').'</a>'; ?>
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
                            <span class="svg-wrapper">
                                <svg enable-background="new 0 0 500 500" height="50px" id="Layer_1" version="1.1"
                                    viewBox="0 0 500 500" width="50px" xml:space="preserve"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g>
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="44.131" x2="455.868" y1="90.968" y2="90.968" />
                                        <path d="   M455.868,90.968c10.515,0,19.132,8.617,19.132,19.139"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="475" x2="475" y1="110.107" y2="434.041" />
                                        <path d="   M475,434.041c0,10.565-8.617,19.183-19.132,19.183"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="455.868" x2="44.131" y1="453.224" y2="453.224" />
                                        <path d="   M44.131,453.224c-10.522,0-19.131-8.616-19.131-19.183"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="25" x2="25" y1="434.041" y2="110.107" />
                                        <path d="   M25,110.107c0-10.522,8.609-19.139,19.131-19.139"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <g>
                                            <g>
                                                <line stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-miterlimit="2.6131" stroke-width="10" x1="114.718"
                                                    x2="114.718" y1="46.777" y2="124.947" />
                                                <path
                                                    d="     M114.718,165.753c10.531,0,19.13-8.633,19.13-19.139c0-10.532-8.599-19.148-19.13-19.148c-10.532,0-19.123,8.617-19.123,19.148     C95.595,157.121,104.187,165.753,114.718,165.753"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-miterlimit="2.6131" stroke-width="10" />
                                            </g>
                                            <g>
                                                <line stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-miterlimit="2.6131" stroke-width="10" x1="385.291"
                                                    x2="385.291" y1="46.777" y2="127.466" />
                                                <path
                                                    d="     M385.291,165.753c10.514,0,19.097-8.633,19.097-19.139c0-10.532-8.583-19.148-19.097-19.148     c-10.549,0-19.132,8.617-19.132,19.148C366.159,157.121,374.742,165.753,385.291,165.753"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-miterlimit="2.6131" stroke-width="10" />
                                            </g>
                                        </g>
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="75.23" x2="424.779" y1="212.75" y2="212.75" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="85.853" x2="102.826" y1="261.477" y2="261.477" />
                                        <path d="   M102.826,261.477c5.862,0,10.649,4.771,10.649,10.614"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="113.475" x2="113.475" y1="272.091" y2="289.089" />
                                        <path d="   M113.475,289.089c0,5.828-4.787,10.632-10.649,10.632"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="102.826" x2="85.853" y1="299.721" y2="299.721" />
                                        <path d="   M85.853,299.721c-5.844,0-10.623-4.804-10.623-10.632"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="75.23" x2="75.23" y1="289.089" y2="272.091" />
                                        <path d="   M75.23,272.091c0-5.845,4.779-10.614,10.623-10.614"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="287.268" x2="304.248" y1="261.477" y2="261.477" />
                                        <path d="   M304.248,261.477c5.846,0,10.633,4.771,10.633,10.614"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="314.881" x2="314.881" y1="272.091" y2="289.089" />
                                        <path d="   M314.881,289.089c0,5.828-4.787,10.632-10.633,10.632"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="304.248" x2="287.268" y1="299.721" y2="299.721" />
                                        <path d="   M287.268,299.721c-5.846,0-10.633-4.804-10.633-10.632"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="276.635" x2="276.635" y1="289.089" y2="272.091" />
                                        <path d="   M276.635,272.091c0-5.845,4.787-10.614,10.633-10.614"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="387.979" x2="404.977" y1="261.477" y2="261.477" />
                                        <path d="   M404.977,261.477c5.845,0,10.615,4.771,10.615,10.614"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="415.592" x2="415.592" y1="272.091" y2="289.089" />
                                        <path d="   M415.592,289.089c0,5.828-4.771,10.632-10.615,10.632"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="404.977" x2="387.979" y1="299.721" y2="299.721" />
                                        <path d="   M387.979,299.721c-5.846,0-10.614-4.804-10.614-10.632"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="377.363" x2="377.363" y1="289.089" y2="272.091" />
                                        <path d="   M377.363,272.091c0-5.845,4.77-10.614,10.615-10.614"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="85.853" x2="102.826" y1="359.802" y2="359.802" />
                                        <path d="   M102.826,359.802c5.862,0,10.649,4.786,10.649,10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="113.475" x2="113.475" y1="370.417" y2="387.432" />
                                        <path d="   M113.475,387.432c0,5.828-4.787,10.615-10.649,10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="102.826" x2="85.853" y1="398.047" y2="398.047" />
                                        <path d="   M85.853,398.047c-5.844,0-10.623-4.787-10.623-10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="75.23" x2="75.23" y1="387.432" y2="370.417" />
                                        <path d="   M75.23,370.417c0-5.829,4.779-10.615,10.623-10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="186.556" x2="203.545" y1="359.802" y2="359.802" />
                                        <path d="   M203.545,359.802c5.854,0,10.632,4.786,10.632,10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="214.178" x2="214.178" y1="370.417" y2="387.432" />
                                        <path d="   M214.178,387.432c0,5.828-4.778,10.615-10.632,10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="203.545" x2="186.556" y1="398.047" y2="398.047" />
                                        <path d="   M186.556,398.047c-5.836,0-10.632-4.787-10.632-10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="175.924" x2="175.924" y1="387.432" y2="370.417" />
                                        <path d="   M175.924,370.417c0-5.829,4.795-10.615,10.632-10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="287.268" x2="304.248" y1="359.802" y2="359.802" />
                                        <path d="   M304.248,359.802c5.846,0,10.633,4.786,10.633,10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="314.881" x2="314.881" y1="370.417" y2="387.432" />
                                        <path d="   M314.881,387.432c0,5.828-4.787,10.615-10.633,10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="304.248" x2="287.268" y1="398.047" y2="398.047" />
                                        <path d="   M287.268,398.047c-5.846,0-10.633-4.787-10.633-10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="276.635" x2="276.635" y1="387.432" y2="370.417" />
                                        <path d="   M276.635,370.417c0-5.829,4.787-10.615,10.633-10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <g>
                                            <line stroke-linecap="round" stroke-linejoin="round"
                                                stroke-miterlimit="2.6131" stroke-width="10" x1="179.955" x2="194.114"
                                                y1="277.802" y2="290.803" />
                                            <line stroke-linecap="round" stroke-linejoin="round"
                                                stroke-miterlimit="2.6131" stroke-width="10" x1="220.082" x2="194.114"
                                                y1="262.45" y2="290.803" />
                                        </g>
                                        <g>
                                            <line stroke-linecap="round" stroke-linejoin="round"
                                                stroke-miterlimit="2.6131" stroke-width="10" x1="384.232" x2="398.392"
                                                y1="376.145" y2="389.128" />
                                            <line stroke-linecap="round" stroke-linejoin="round"
                                                stroke-miterlimit="2.6131" stroke-width="10" x1="424.359" x2="398.392"
                                                y1="360.776" y2="389.128" />
                                        </g>
                                    </g>
                                </svg>
                            </span>
                            <?php echo get_field("label", $uv->ID); ?>
                        </div>
                        <?PHP } ?>

                        <?PHP if(!empty(strip_tags($uv->post_content))) { ?>
                        <div class="event_description--wrapper">
                            <span class="svg-wrapper">
                                <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                    <g data-name="10-location" id="_10-location">
                                        <path d="M27,12A11,11,0,0,0,5,12C5,22,16,31,16,31S27,22,27,12Z" />
                                        <circle cx="16" cy="12" r="5" />
                                    </g>
                                </svg>
                            </span>
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
                        <?PHP echo '<a class="cs_website href="'.get_field("website", $uv->ID).'" target="_blank">'.__('Visit website').'</a>'; ?>
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
                            <span class="svg-wrapper">
                                <svg enable-background="new 0 0 500 500" height="50px" id="Layer_1" version="1.1"
                                    viewBox="0 0 500 500" width="50px" xml:space="preserve"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g>
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="44.131" x2="455.868" y1="90.968" y2="90.968" />
                                        <path d="   M455.868,90.968c10.515,0,19.132,8.617,19.132,19.139"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="475" x2="475" y1="110.107" y2="434.041" />
                                        <path d="   M475,434.041c0,10.565-8.617,19.183-19.132,19.183"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="455.868" x2="44.131" y1="453.224" y2="453.224" />
                                        <path d="   M44.131,453.224c-10.522,0-19.131-8.616-19.131-19.183"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="25" x2="25" y1="434.041" y2="110.107" />
                                        <path d="   M25,110.107c0-10.522,8.609-19.139,19.131-19.139"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <g>
                                            <g>
                                                <line stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-miterlimit="2.6131" stroke-width="10" x1="114.718"
                                                    x2="114.718" y1="46.777" y2="124.947" />
                                                <path
                                                    d="     M114.718,165.753c10.531,0,19.13-8.633,19.13-19.139c0-10.532-8.599-19.148-19.13-19.148c-10.532,0-19.123,8.617-19.123,19.148     C95.595,157.121,104.187,165.753,114.718,165.753"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-miterlimit="2.6131" stroke-width="10" />
                                            </g>
                                            <g>
                                                <line stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-miterlimit="2.6131" stroke-width="10" x1="385.291"
                                                    x2="385.291" y1="46.777" y2="127.466" />
                                                <path
                                                    d="     M385.291,165.753c10.514,0,19.097-8.633,19.097-19.139c0-10.532-8.583-19.148-19.097-19.148     c-10.549,0-19.132,8.617-19.132,19.148C366.159,157.121,374.742,165.753,385.291,165.753"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-miterlimit="2.6131" stroke-width="10" />
                                            </g>
                                        </g>
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="75.23" x2="424.779" y1="212.75" y2="212.75" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="85.853" x2="102.826" y1="261.477" y2="261.477" />
                                        <path d="   M102.826,261.477c5.862,0,10.649,4.771,10.649,10.614"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="113.475" x2="113.475" y1="272.091" y2="289.089" />
                                        <path d="   M113.475,289.089c0,5.828-4.787,10.632-10.649,10.632"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="102.826" x2="85.853" y1="299.721" y2="299.721" />
                                        <path d="   M85.853,299.721c-5.844,0-10.623-4.804-10.623-10.632"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="75.23" x2="75.23" y1="289.089" y2="272.091" />
                                        <path d="   M75.23,272.091c0-5.845,4.779-10.614,10.623-10.614"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="287.268" x2="304.248" y1="261.477" y2="261.477" />
                                        <path d="   M304.248,261.477c5.846,0,10.633,4.771,10.633,10.614"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="314.881" x2="314.881" y1="272.091" y2="289.089" />
                                        <path d="   M314.881,289.089c0,5.828-4.787,10.632-10.633,10.632"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="304.248" x2="287.268" y1="299.721" y2="299.721" />
                                        <path d="   M287.268,299.721c-5.846,0-10.633-4.804-10.633-10.632"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="276.635" x2="276.635" y1="289.089" y2="272.091" />
                                        <path d="   M276.635,272.091c0-5.845,4.787-10.614,10.633-10.614"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="387.979" x2="404.977" y1="261.477" y2="261.477" />
                                        <path d="   M404.977,261.477c5.845,0,10.615,4.771,10.615,10.614"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="415.592" x2="415.592" y1="272.091" y2="289.089" />
                                        <path d="   M415.592,289.089c0,5.828-4.771,10.632-10.615,10.632"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="404.977" x2="387.979" y1="299.721" y2="299.721" />
                                        <path d="   M387.979,299.721c-5.846,0-10.614-4.804-10.614-10.632"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="377.363" x2="377.363" y1="289.089" y2="272.091" />
                                        <path d="   M377.363,272.091c0-5.845,4.77-10.614,10.615-10.614"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="85.853" x2="102.826" y1="359.802" y2="359.802" />
                                        <path d="   M102.826,359.802c5.862,0,10.649,4.786,10.649,10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="113.475" x2="113.475" y1="370.417" y2="387.432" />
                                        <path d="   M113.475,387.432c0,5.828-4.787,10.615-10.649,10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="102.826" x2="85.853" y1="398.047" y2="398.047" />
                                        <path d="   M85.853,398.047c-5.844,0-10.623-4.787-10.623-10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="75.23" x2="75.23" y1="387.432" y2="370.417" />
                                        <path d="   M75.23,370.417c0-5.829,4.779-10.615,10.623-10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="186.556" x2="203.545" y1="359.802" y2="359.802" />
                                        <path d="   M203.545,359.802c5.854,0,10.632,4.786,10.632,10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="214.178" x2="214.178" y1="370.417" y2="387.432" />
                                        <path d="   M214.178,387.432c0,5.828-4.778,10.615-10.632,10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="203.545" x2="186.556" y1="398.047" y2="398.047" />
                                        <path d="   M186.556,398.047c-5.836,0-10.632-4.787-10.632-10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="175.924" x2="175.924" y1="387.432" y2="370.417" />
                                        <path d="   M175.924,370.417c0-5.829,4.795-10.615,10.632-10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="287.268" x2="304.248" y1="359.802" y2="359.802" />
                                        <path d="   M304.248,359.802c5.846,0,10.633,4.786,10.633,10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="314.881" x2="314.881" y1="370.417" y2="387.432" />
                                        <path d="   M314.881,387.432c0,5.828-4.787,10.615-10.633,10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="304.248" x2="287.268" y1="398.047" y2="398.047" />
                                        <path d="   M287.268,398.047c-5.846,0-10.633-4.787-10.633-10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <line stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" x1="276.635" x2="276.635" y1="387.432" y2="370.417" />
                                        <path d="   M276.635,370.417c0-5.829,4.787-10.615,10.633-10.615"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="2.6131"
                                            stroke-width="10" />
                                        <g>
                                            <line stroke-linecap="round" stroke-linejoin="round"
                                                stroke-miterlimit="2.6131" stroke-width="10" x1="179.955" x2="194.114"
                                                y1="277.802" y2="290.803" />
                                            <line stroke-linecap="round" stroke-linejoin="round"
                                                stroke-miterlimit="2.6131" stroke-width="10" x1="220.082" x2="194.114"
                                                y1="262.45" y2="290.803" />
                                        </g>
                                        <g>
                                            <line stroke-linecap="round" stroke-linejoin="round"
                                                stroke-miterlimit="2.6131" stroke-width="10" x1="384.232" x2="398.392"
                                                y1="376.145" y2="389.128" />
                                            <line stroke-linecap="round" stroke-linejoin="round"
                                                stroke-miterlimit="2.6131" stroke-width="10" x1="424.359" x2="398.392"
                                                y1="360.776" y2="389.128" />
                                        </g>
                                    </g>
                                </svg>
                            </span>
                            <?php echo get_field("label", $uv->ID); ?>
                        </div>
                        <?PHP } ?>

                        <?PHP if(!empty(strip_tags($uv->post_content))) { ?>
                        <div class="event_description--wrapper">
                            <span class="svg-wrapper">
                                <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                    <g data-name="10-location" id="_10-location">
                                        <path d="M27,12A11,11,0,0,0,5,12C5,22,16,31,16,31S27,22,27,12Z" />
                                        <circle cx="16" cy="12" r="5" />
                                    </g>
                                </svg>
                            </span>
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
                        <?PHP echo '<a class="cs_website href="'.get_field("website", $uv->ID).'" target="_blank">'.__('Visit website').'</a>'; ?>
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

<!-- Slider Init -->
<!-- <script defer src="<?php echo get_template_directory_uri();?>/js/libs/swiper/swiper-bundle.min.js"></script>
<script defer src="<?php echo get_template_directory_uri();?>/js/sliders-swiper.js"></script> -->

<?php get_footer(); ?>