<?php
/* Template Name: Tv Template New */
get_header(); ?>

<style>
<?php include 'css/page-templates/page-anatol-tv/page-anatol-tv.css';
?>
</style>

<?php get_template_part('template-parts/template-part-head-bg-black'); ?>
<!-- <div class="clear clearfix"></div> -->
</div>
<div class="container dmbs-container">
    <!-- start content container -->
    <div class="row dmbs-content">
        <div class="col-md-12 dmbs-main">
            <div class="customer_st_cw">
                <div class="cstcw_top_part row">
                    <div class="cstcw_tp_left col-md-6" data-aos="fade-right">
                        <?php
            $video = get_field('video');

            if(!empty($video)) {
              echo $video;
            } ?>


                    </div>
                    <div class="cstcw_tp_right col-md-6" data-aos="fade-left">
                        <div class="cstcw_tp_right_white">
                            <?php echo get_field('content'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
      $theexperience = get_field('wpcf-theexperience');
      if(!empty($theexperience)) {
        $companyname = get_field('wpcf-companyname');
        ?>
            <div class="theexperience">
                <div class="box_title"><?php _e('The experience'); ?></div>
                <div class="theexperience_content"><?php echo $theexperience; ?></div>
                <div class="theexperience_author"><?php echo get_the_title(); ?></div>
                <?php if(!empty($companyname)) {?><div class="theexperience_companyname"><?php echo $companyname; ?>
                </div><?php } ?>
                <div class="share_post_part">
                    <div class="spp_line_part"></div>
                    <div class="spp_content_part"><span class="spp_text"><?php _e('Share') ?></span>
                        <?php echo do_shortcode('[addtoany]'); ?></div>
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

<div class="container-fluid full_bottom_container">
    <div class="row videos_row">
        <section class="anatol_videos" id="anatol_videos">
            <div class="section_top_bg">

                <div class="container section_top_container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section_title"><?php _e('Our Video Channels'); ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section2_bg">
                <div class="container section2_container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tabs_nav">
                                <ul class="nav nav-tabs">
                                    <?php
                  $terms = get_terms( 'video-category', array(
                    'hide_empty' => true,
                  ) );
                  if(!empty($terms)){
                    foreach ($terms as $key => $term) {
                      $active_class = ($key == 0)? 'active': '';
                      echo '<li class="list_tbs '. $active_class .'">' . $term->name . '<a data-toggle="tab" href="#video_category_' . $term->term_id . '">' . $term->name . '</a></li>';
                    }
                  }
                  ?>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <?php
                if(!empty($terms)){
                  foreach ($terms as $key => $term) {
                    $active_class = ($key == 0)? 'active': '';
                    $videos = new WP_Query(
                        array(
                          'post_type' => 'anatoltv',
                          'orderby' => 'date title',
                          'showposts' => -1,
                          'tax_query' => array(
                            array(
                              'taxonomy' => 'video-category',
                              'field'    => 'term_id',
                              'terms'    => array( $term->term_id ),
                            ),
                          )
                      )
                    );
                    if( $videos->have_posts() ){
                      echo '<div id="video_category_' . $term->term_id . '" class="tab-pane ' . $active_class . '"><div class="video_tag_wrap">';
                      while( $videos->have_posts() ){
                        $videos->the_post(); ?>
                                <div class="video_item col-md-4">
                                    <?php
                          $vimeo_url = get_field('vimeo_url');
                          ?>
                                    <a target="_blank" data-fancybox="video-gallery_<?php echo $term->term_id; ?>"
                                        href="<?php echo $vimeo_url; ?>">
                                        <div class="thumbnail-wrap">
                                            <?php the_post_thumbnail('full'); ?>
                                        </div>
                                        <div class="video_title"><?php the_title(); ?></div>
                                    </a>
                                </div>

                                <?php
                      }
                      echo '</div></div>';
                    }

                  }
                }
              ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<div class="container-fluid full_bottom_container">
    <div class="row ofices_row">
        <?php get_template_part('template-parts/widgets/offices'); ?>
    </div>
    <script>
    let list_tbs = document.querySelectorAll('.list_tbs');
    let tab_pane = document.querySelectorAll('.tab-pane');
    list_tbs[0].classList.add('active');
    tab_pane[0].classList.add('active');
    tab_pane[0].classList.add('active_active');
    for (let i = 0; i < list_tbs.length; i++) {
        list_tbs[i].onclick = function() {
            for (let i = 0; i < list_tbs.length; i++) {
                list_tbs[i].classList.remove('active')
            }
            this.classList.add('active');
            let element_class = document.querySelector(
                `${this.innerHTML.slice(this.innerHTML.indexOf('"#')+1,this.innerHTML.indexOf('">'))}`);
            for (let i = 0; i < tab_pane.length; i++) {
                tab_pane[i].classList.remove('active');
                tab_pane[i].classList.remove('active_active');
            }
            element_class.classList.add('active');
            setTimeout(() => {
                element_class.classList.add('active_active');
            }, 50);
        }
    }
    </script>
    <!-- end content container -->
    <!--</div>
  <div class="container-fluid">-->
    <?php get_footer(); ?>