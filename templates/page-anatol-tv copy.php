<?php
/* Template Name: Tv Template New New */
get_header(); ?>

<style>
<?php include locate_template('css/page-templates/page-anatol-tv/page-anatol-tv.css');
?>
</style>

<?php get_template_part('templates/components/hero-templates/template-part-head-bg-black'); ?>
</div>

<div class="anatol-tv">
    <div class="anatol-tv--wrapper container">
        <div class="anatol-tv__item anatol-tv__item--left" data-aos="fade-right">
            <?php $video_id = get_field('video_id');
                    if(!empty($video_id)) {
                    ?>
            <div class="video">
                <a href="https://www.youtube.com/embed/<?php echo $video_id;?>" class="video__link">
                    <picture>
                        <source type="image/webp"
                            srcset="https://i.ytimg.com/vi_webp/<?php echo $video_id;?>/hqdefault.webp">
                        <img width="1280" height="720" loading="lazy" class="lozad video__media"
                            src="https://i.ytimg.com/vi/<?php echo $video_id;?>/hqdefault.jpg">
                    </picture>
                </a>
                <button class="video__button" aria-label="Play video">
                    <svg height="48" version="1.1" viewBox="0 0 68 48" width="68">
                        <path class="video__button-shape"
                            d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z">
                        </path>
                        <path d="M 45,24 27,14 27,34" class="video__button-icon"></path>
                    </svg>
                </button>
            </div>

            <?php } ?>

        </div>
        <div class="anatol-tv__item anatol-tv__item--right" data-aos="fade-left">
            <h2 class="anatol-tv__title"><?php echo get_field('title_section');?></h2>
            <p class="anatol-tv__description"><?php echo get_field('content'); ?></p>
            <a class="anatol-tv__link"
                href="https://test22.anatol.space/presses/infinity/"><?php echo get_field('link_to_check_more'); ?></a>
        </div>
    </div>

    <!-- <?php
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
      ?> -->
</div>
</div>

<section class="anatol-videos" id="anatol_videos">
    <div class="anatol-videos--wrapper container">
        <div class="section_title"><?php _e('Our Video Channels'); ?></div>

        <div class="anatol-videos-list--wrapper">
            <ul class="anatol-videos-navigation nav-tabs">
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
            <div class="anatol-videos-list tab-content">
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
                      echo '<div id="video_category_' . $term->term_id . '" class="anatol-videos-list__inner tab-pane ' . $active_class . '"><div class="video_tag_wrap">';
                      while( $videos->have_posts() ){
                        $videos->the_post(); ?>

                <div class="anatol-videos-list__item">
                    <?php 
                        $vimeo_url = get_field('vimeo_url'); 
                        $video_youtube_id = get_field('video_id_from_youtube');
                        ?>

                    <!-- <a target="_blank" data-fancybox="video-gallery_<?php echo $term->term_id; ?>"
                        href="<?php echo $vimeo_url; ?>">
                        
                        <div class="thumbnail-wrap">
                            <?php the_post_thumbnail('full'); ?>
                        </div>
                        
                        <div class="video_title"><?php the_title(); ?></div>
                    </a> -->

                    <!-- ///////////////// -->
                    <div class="video">
                        <a href="https://www.youtube.com/embed/<?php echo $video_youtube_id;?>" class="video__link">
                            <picture>
                                <source type="image/webp"
                                    srcset="https://i.ytimg.com/vi_webp/<?php echo $video_youtube_id;?>/hqdefault.webp">
                                <img width="1280" height="720" loading="lazy" class="lozad video__media"
                                    src="https://i.ytimg.com/vi/<?php echo $video_youtube_id;?>/hqdefault.jpg">
                            </picture>
                        </a>
                        <button class="video__button" aria-label="Play video">
                            <svg height="48" version="1.1" viewBox="0 0 68 48" width="68">
                                <path class="video__button-shape"
                                    d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z">
                                </path>
                                <path d="M 45,24 27,14 27,34" class="video__button-icon"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="video_title"><?php the_title(); ?></div>
                </div>

                <?php }
                    echo '</div></div>';
                }}} ?>
            </div>
        </div>

    </div>
</section>

<script>
let list_tbs = document.querySelectorAll('.list_tbs');
let tab_pane = document.querySelectorAll('.tab-pane');

list_tbs[0].classList.add('active');
tab_pane[0].classList.add('active');
tab_pane[0].classList.add('active_active');

list_tbs.forEach(tab => tab.addEventListener('click', e => {

}));

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

<!-- INIT YOUTUBE VIDEOS -->
<script defer src="<?php echo get_template_directory_uri();?>/js/initVideo.js"></script>

<?php get_footer(); ?>