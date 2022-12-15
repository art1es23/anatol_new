<?PHP
/* Template Name: Home Page NEW*/

get_header(); ?>
<style>
<?php include 'css/page-templates/frontpage/header-hero-slider.css';
include 'css/page-templates/frontpage/section-choose-us.css';
include 'css/page-templates/frontpage/regional-offices.css';
include 'css/components/another-equipments.css';
include 'css/page-templates/frontpage/testimonials.css';
include 'css/page-templates/frontpage/section-video.css';
?>
</style>

<div class="swiper main-hero-slider">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper main-hero-slider--wrapper">
        <!-- Slides -->
        <?php if( have_rows('home_header_slider') ):
		while ( have_rows('home_header_slider') ) : the_row();
			if(get_sub_field('hide_slide')) continue; 
			$slide_image = get_sub_field('slide_image');
			$slide_image_mobil = get_sub_field('slide_image_mobil');

            $alt_text = get_sub_field('alt_text_image_banner');

			$btn_baner = get_sub_field('btn_baner');	
			$url_btn_baner = get_sub_field('url_btn_baner');
			$btn_position = get_sub_field('btn_position');
			$btn_name_class = get_sub_field('btn_name_class');
			?>

        <div class="swiper-slide main-hero-slider__item">
            <?php if (!empty($url_btn_baner))  { ?>

            <picture class="image--wrapper">
                <!-- <source type="image/webp" srcset="<?php echo $slide_image ?>"> -->
                <source media="(max-width: 900px)" srcset="<?php echo $slide_image_mobil?>">
                <source type="image/webp" data-srcset="<?php echo $slide_image ?>">
                <img class="swiper-lazy" data-src="<?php echo $slide_image ?>" alt="<?php echo $alt_text?>" width="1920"
                    height="1080">
            </picture>

            <!-- <div class="container">
                <?php
                    $slide_title = get_sub_field('slide_title');		
                    if (!empty($slide_title ))  { ?>
                <div class="slide_title"><?php echo $slide_title; ?></div>
                <?php }	?>
                <?php
                    $slide_title_description = get_sub_field('slide_title_description');	
                    if (!empty($slide_title ))  { ?>
                <div class="slide_title_description"><?php echo $slide_title_description; ?></div>
                <?php }	?>
            </div> -->

            <div class="main-hero-slider__btn main-hero-slider__btn--<?php echo $btn_position; ?>">
                <a href="<?php echo $url_btn_baner; ?>" class="button red-button draw-red"><?php echo $btn_baner; ?></a>
            </div>
            <?php }	?>

        </div>
        <?php
	 endwhile;
	 endif;
	 ?>
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>

    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>

<div class="main">

    <section class="choose-us" id="section1">
        <div class="choose-us--wrapper container">
            <div class="choose-us__item choose-us__item--left">
                <?php
                    $about_us_title = get_field('about_us_title');	
                    if (!empty($about_us_title ))  { ?>
                <h2 class="section_title choose-us__title"><?php echo $about_us_title;?></h2>
                <?php }?>
                <?php
                    $about_us_content= get_field('about_us_content');	
                    if (!empty($about_us_content ))  { ?>
                <div class="choose-us__description"><?php echo $about_us_content; ?></div>
                <?php }	?>
                <?php
                    $about_us_link_title = get_field('about_us_link_title');	
                    $about_us_link_url = get_field('about_us_link_url');	
                    if (!empty($about_us_link_url ))  { ?>
                <a href="<?php echo $about_us_link_url; ?>"
                    class="learn_more_button button red-button draw-red"><?php echo $about_us_link_title; ?></a>
                <?php }	?>
            </div>
            <div class="choose-us__item choose-us__item--right choose-us__img">
                <img loading="lazy" class="lozad logo-img site-logo-img"
                    src="<?php bloginfo('template_directory'); ?>/images/anatol-flag.png" alt="Anatol official flag"
                    width="583" height="auto">
            </div>
        </div>
    </section>

    <?php get_template_part('templates/equipment/another-equipments'); ?>

    <section class="dashboard-section">
        <!-- <div class="section_two_cont"> -->
        <div class="dashboard__item latest-blogs">
            <div class="dashboard__head">
                <?php
                        $blog_section_title = get_field('blog_section_title');	
                        if (!empty($blog_section_title ))  { ?>
                <h2 class="dashboard__title"><?php echo $blog_section_title; ?></h2>
                <?php }	?>
                <?php
                        $blog_section_description = get_field('blog_section_description');	
                        if (!empty($blog_section_description ))  { ?>
                <div class="dashboard__pretitle"><?php echo $blog_section_description; ?></div>
                <?php }	?>
            </div>

            <div class="dashboard__item--container swiper">
                <?php
                        $args = array(
                            'posts_per_page' => 5,
                            'offset' => 0,
                            'orderby' => 'post_date',
                            'order' => 'DESC',
                            'post_type' => 'post',
                            'post_status' => 'publish'
                        );
                        $query = new WP_Query($args);
                        if ($query->have_posts()) :  ?>

                <div class="swiper-wrapper latest-blogs--wrapper">
                    <?php  while ($query->have_posts()) : 
                        $query->the_post(); ?>
                    <div class="swiper-slide latest-blogs__item blog-post">
                        <div class="blog-post__img">
                            <!-- <div class="blog-post__img"><?php the_post_thumbnail('blog_thumb'); ?></div> -->
                            <picture>
                                <source data-srcset="<?php the_field('thumb_for_post'); ?>" type="image/webp">
                                <img class="swiper-lazy lozad" loading="lazy"
                                    data-src="<?php the_field('thumb_for_post'); ?>"
                                    alt="<?php the_field('title_blog_post')?>" width="1024" height="427">
                            </picture>
                        </div>
                        <div class="blog-post__description">
                            <a class="blog-post__caption" href="<?php the_permalink();?>"><?php the_title(); ?></a>
                            <a href="<?php the_permalink();?>"
                                class="read_article button rmc_button"><?php _e('Read more', 'anatol'); ?></a>
                        </div>
                    </div>
                    <?php endwhile;?>
                </div>

                <?php endif;
                    wp_reset_query(); ?>

                <div class="blog-swiper-pagination swiper-pagination"></div>
            </div>

            <a href="/blog" class="visit_blog button red-button draw-red"><?php _e('Visit our blog', 'anatol'); ?></a>
        </div>
        <div class="dashboard__item testimonials">
            <div class="dashboard__head">
                <?php
                $block_title = get_field('block_title');	
                if (!empty($block_title ))  { ?>
                <h2 class="dashboard__title"><?php echo $block_title; ?></h2>
                <?php }	?>

                <?php
                $block_pretitle = get_field('block_pretitle');	
                if (!empty($block_pretitle ))  { ?>
                <div class="dashboard__pretitle"><?php echo $block_pretitle; ?></div>
                <?php }	?>
            </div>

            <?php
                $args = array(
                    'posts_per_page' => 5, 
                    'offset' => 0,
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                    'post_type' => 'feedbacks',  
                    'post_status' => 'publish'
                );
                $query = new WP_Query($args);
                
                if ($query->have_posts()) :  ?>
            <div class="feedbacks-list">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="feedbacks-list__item feedback-post">
                    <div class="feedback-post__caption"><?php the_title(); ?></div>
                    <div class="feedback-post__excerpt"><?php the_content(); ?></div>
                </div>
                <?php endwhile;?>
            </div>
            <?php endif; wp_reset_query(); ?>
            <a href="/customer-stories"
                class="visit_blog button red-button draw-red"><?php _e('Customer Stories', 'anatol'); ?></a>
        </div>
    </section>

    <section id="video_bg" class="home-footer-video">
        <video loading="lazy" id="videobcg" preload="auto" autoplay="true" loop="loop" muted="muted" volume="0">
            <source src="<?php bloginfo('template_directory'); ?>/images/video/volt_intro.mp4" type="video/mp4">
        </video>

        <div class="home-footer-video--wrapper">
            <div class="home-footer-video__item video-description">
                <div class="section-title">
                    <?php
                        $video_section_title = get_field('video_section_title');	
                        if (!empty($video_section_title )) { ?>
                    <?php echo $video_section_title; ?>
                    <?php }	?>
                </div>
            </div>

            <div class="home-footer-video__item buttons--wrapper">
                <?php
                    $video_link_learn_more_title = get_field('video_link_learn_more_title');	
                    $video_link_learn_more_url = get_field('video_link_learn_more_url');	
                    
                    if (!empty($video_link_learn_more_url )) { ?>
                <a href="<?php echo $video_link_learn_more_url;?>" class="learn-more button red-button draw-red"
                    target="_blank"><?php echo $video_link_learn_more_title;?></a>
                <?php }	?>

                <?php
                    $video_link_where_to_buy_title = get_field('video_link_where_to_buy_title');	
                    $video_link_where_to_buy_url = get_field('video_link_where_to_buy_url');

                    if (!empty($video_link_where_to_buy_url )) { ?>
                <a href="<?php echo $video_link_where_to_buy_url;?>" class="learn-more button red-button draw-red"
                    target="_blank"><?php echo $video_link_where_to_buy_title;?></a>
                <?php }	?>
            </div>
        </div>
    </section>

</div>

<!-- INIT YOUTUBE VIDEOS -->
<script defer src="<?php echo get_template_directory_uri();?>/js/initVideo.js"></script>
<!-- Slider Init -->
<script defer src="<?php echo get_template_directory_uri();?>/js/libs/swiper/swiper-bundle.min.js"></script>
<script defer src="<?php echo get_template_directory_uri();?>/js/sliders-swiper.js"></script>


<?php get_footer(); ?>