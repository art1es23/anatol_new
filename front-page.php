<?PHP
/* Template Name: Home Page NEW*/

get_header(); ?>
<style>
<?php include 'css/page-templates/frontpage/header-hero-slider.css';
include 'css/page-templates/frontpage/section-choose-us.css';
include 'css/page-templates/frontpage/regional-offices.css';
include 'css/page-templates/frontpage/another-equipments.css';
include 'css/page-templates/frontpage/testimonials.css';
include 'css/page-templates/frontpage/section-video.css';
?>
</style>

<div class="home_header_slider_wrapper">
    <div class="home_header_slider sldots">
        <?php if( have_rows('home_header_slider') ):
		while ( have_rows('home_header_slider') ) : the_row();
			if(get_sub_field('hide_slide')) continue; 
			$slide_image = get_sub_field('slide_image');
			$slide_image_mobil = get_sub_field('slide_image_mobil');
			$btn_baner = get_sub_field('btn_baner');	
			$url_btn_baner = get_sub_field('url_btn_baner');
			$btn_position = get_sub_field('btn_position');
			$btn_name_class = get_sub_field('btn_name_class');
			?>
        <div class="home_header_slide_item">
            <?php if (!empty($url_btn_baner))  { ?>
            <div class="banner_btn banner_btn_<?php echo $btn_position; ?> banner_btn_<?php echo $btn_name_class; ?>"><a
                    href="<?php echo $url_btn_baner; ?>"
                    class="button red-button draw-red"><?php echo $btn_baner; ?></a></div>
            <?php }	?>
            <div class="home_header_slide_img" style="background-image: url(<?php echo $slide_image ?>);"></div>
            <?php if(get_sub_field('slide_image_mobil')):?>
            <div class="home_header_slide_item_mob" style="background-image: url(<?php echo $slide_image_mobil ?>);">
            </div>
            <?php endif; ?>
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
        </div>
        <?php
	 endwhile;
	 endif;
	 ?>
    </div>
</div>

<div class="main home-main">

    <section class="section-about" id="section1">
        <div class="section-about--wrapper container">
            <!-- <div class="about_anatol"> -->
            <div class="section-about__item section-about--left">
                <!-- <div class="section_head"> -->
                <?php
                    $about_us_title = get_field('about_us_title');	
                    if (!empty($about_us_title ))  { ?>
                <!-- <div class="section_title about_title"> -->
                <h2 class="section_title about_title"><?php echo $about_us_title;?></h2>
                <!-- </div> -->
                <?php }?>
                <!-- </div> -->
                <!-- <div class="banner_description_txt"> -->
                <?php
                    $about_us_content= get_field('about_us_content');	
                    if (!empty($about_us_content ))  { ?>
                <div class="description_txt"><?php echo $about_us_content; ?></div>
                <?php }	?>
                <?php
                    $about_us_link_title = get_field('about_us_link_title');	
                    $about_us_link_url = get_field('about_us_link_url');	
                    if (!empty($about_us_link_url ))  { ?>
                <!-- <div class="learn_more_button"> -->
                <a href="<?php echo $about_us_link_url; ?>"
                    class="learn_more_button button red-button draw-red"><?php echo $about_us_link_title; ?></a>
                <!-- </div> -->
                <?php }	?>
                <!-- </div> -->
            </div>
            <div class="section-about__item section-about----right anatol_flag">
                <img loading="lazy" class="lozad logo-img site-logo-img"
                    src="<?php bloginfo('template_directory'); ?>/images/anatol-flag.png" alt="">
            </div>
            <!-- </div> -->
        </div>
    </section>


    <?php get_template_part('templates/equipment/another-equipments'); ?>


    <section class="section_two_blocks latest_from_blog">
        <div class="section_two_cont">
            <div class="two_block latest_blogs">
                <div class="two_block_head">
                    <?php
                        $blog_section_title = get_field('blog_section_title');	
                        if (!empty($blog_section_title ))  { ?>
                    <!-- <div class="two_block_title fadein"> -->
                    <h2 class="two_block_title fadein"><?php echo $blog_section_title; ?></h2>
                    <!-- </div> -->
                    <?php }	?>
                    <?php
                        $blog_section_description = get_field('blog_section_description');	
                        if (!empty($blog_section_description ))  { ?>
                    <div class="two_block_pretitle fadein"><?php echo $blog_section_description; ?></div>
                    <?php }	?>
                </div>

                <div class="two_block-container fadein">
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

                    <div class="article-slide sldots">
                        <?php  while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="article-item">
                            <!-- <div class="article_post"> -->
                            <div class="image_item"><?php the_post_thumbnail(''); ?></div>
                            <div class="article_desc">
                                <!-- <div class="blog-title"> -->
                                <a class="blog-title" href="<?php the_permalink();?>"><?php the_title(); ?></a>
                                <!-- </div> -->
                                <!-- <div class="read_article"> -->
                                <a href="<?php the_permalink();?>"
                                    class="read_article button rmc_button"><?php _e('Read more', 'anatol'); ?></a>
                                <!-- </div> -->
                            </div>
                            <!-- </div> -->
                        </div>
                        <?php endwhile;?>
                    </div>

                    <?php endif;
                        wp_reset_query(); ?>
                    <!-- <div class="visit_blog"> -->
                    <a href="/blog"
                        class="visit_blog button red-button draw-red"><?php _e('Visit our blog', 'anatol'); ?></a>
                    <!-- </div> -->
                </div>

            </div>
            <div class="two_block testimonials">

                <!-- <div class="two_block_head fadein"> -->
                <?php
                        $block_title = get_field('block_title');	
                        if (!empty($block_title ))  { ?>
                <!-- <div class="two_block_title"> -->
                <h2 class="two_block_title"><?php echo $block_title; ?></h2>
                <!-- </div> -->
                <?php }	?>
                <?php
                        $block_pretitle = get_field('block_pretitle');	
                        if (!empty($block_pretitle ))  { ?>
                <div class="two_block_pretitle"><?php echo $block_pretitle; ?></div>
                <?php }	?>
                <!-- </div> -->

                <!-- <div class="two_block-container fadein"> -->
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
                <div class="feedbacks-slide">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="feedbacks-item">
                        <!-- <div class="image_item"></div>
                        <div class="feedbacks_desc"> -->
                        <div class="blog-title"><?php the_title(); ?></div>
                        <div class="blog-the_excerpt"><?php the_content(); ?></div>
                        <!-- </div> -->
                    </div>
                    <?php endwhile;?>
                </div>
                <?php endif; wp_reset_query(); ?>
                <!-- <div class="visit_blog"> -->
                <a href="/customer-stories"
                    class="visit_blog button red-button draw-red"><?php _e('Customer Stories', 'anatol'); ?></a>
                <!-- </div> -->
                <!-- </div> -->
            </div>
        </div>

    </section>
    <section id="video_bg" class="video_bg num3">
        <video id="videobcg" preload="auto" autoplay="true" loop="loop" muted="muted" volume="0">
            <source src="<?php bloginfo('template_directory'); ?>/images/video/volt_intro.mp4" type="video/mp4">
        </video>

        <div class="video_description">
            <div class="video_description_cont">
                <div class="section-title fadein">
                    <?php
                        $video_section_title = get_field('video_section_title');	
                        if (!empty($video_section_title )) { ?>
                    <?php echo $video_section_title; ?>
                    <?php }	?>
                </div>
            </div>

            <div class="block_learn_more fadein">
                <div class="learn-more">
                    <?php
                        $video_link_learn_more_title = get_field('video_link_learn_more_title');	
                        $video_link_learn_more_url = get_field('video_link_learn_more_url');	
                        
                        if (!empty($video_link_learn_more_url )) { ?>
                    <a href="<?php echo $video_link_learn_more_url;?>" class="button red-button draw-red"
                        target="_blank"><?php echo $video_link_learn_more_title;?></a>
                    <?php }	?>
                </div>
                <div class="learn-more">
                    <?php
                        $video_link_where_to_buy_title = get_field('video_link_where_to_buy_title');	
                        $video_link_where_to_buy_url = get_field('video_link_where_to_buy_url');

                        if (!empty($video_link_where_to_buy_url )) { ?>
                    <a href="<?php echo $video_link_where_to_buy_url;?>" class="button red-button draw-red"
                        target="_blank"><?php echo $video_link_where_to_buy_title;?></a>
                    <?php }	?>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>