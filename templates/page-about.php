<?php
/* Template Name: About NEW*/
get_header(); ?>
<style>
<?php include locate_template('css/components/contact-support.css');
include locate_template('css/components/about-description.css');
include locate_template('css/page-templates/page-about/business-opportunities.css');
include locate_template('css/page-templates/page-about/anatol-map.css');
?>
</style>
<?php get_template_part('templates/components/hero-templates/template-part-head-bg-black'); ?>

<section class="about-us" id="about_content">
    <div class="about-us-description">
        <h2 class="section_title"><?php the_field('about_first_section_title'); ?></h2>

        <div class="about-us-description__content">
            <?php the_field('about_first_section_content'); ?>
        </div>
    </div>
    <div class="about-us-img--wrapper">
        <img loading="lazy" class="lozad" width="435" height="435"
            src="<?php bloginfo('template_directory'); ?>/images/image/about_us.jpg"
            alt="the one of the main warehouse of the Anatol Equipment">
    </div>
</section>

<section class="business-opportunities">
    <div class="business-opportunities__item business-img">
        <img loading="lazy" class="lozad" width="744" height="496"
            src="<?php bloginfo('template_directory'); ?>/images/image/business.jpg"
            alt="our professional sales managers. Who could get you the best practice of the purchasing.">
    </div>
    <!-- <div class="business-img" style="background-image:url('<?php bloginfo('template_directory'); ?>/images/image/business.jpg');"></div> -->
    <div class="business-opportunities__item business-info">
        <div class="business-info--wrapper">
            <h2 class="section_title"><?php the_field('about_2_section_title'); ?></h2>
            <div class="business-info__description"><?php the_field('about_2_section_content'); ?></div>
        </div>
    </div>
</section>

<section class="anatol_map numbers">
    <div class="container">
        <h2 class="section_title"><?php the_field('about_3_section_title'); ?></h2>
        <div class="map_cont">
            <div class="map_block map_continent counter">
                <div class="map_number"><span class="value"><?php the_field('continents_number'); ?></span></div>
                <div class="map_text"><?php the_field('continents_title'); ?></div>
            </div>

            <div class="map_block map_countries counter">
                <div class="map_number">
                    <?php if( get_field( "countries_number" )) {?>
                    <span class="value"><?php the_field('countries_number'); ?></span>+
                    <?php }	?>
                </div>
                <div class="map_text"><?php the_field('countries_title'); ?></div>
            </div>

            <div class="map_block map_customers counter">
                <div class="map_number">
                    <?php if( get_field( "ccustomers_number" )) {?>
                    <span class="value"><?php the_field('ccustomers_number'); ?></span>s
                    <?php }	?>
                </div>
                <div class="map_text"><?php the_field('ccustomers_title'); ?></div>
            </div>
        </div>
    </div>
</section>

<section class="support-section" id="">
    <div class="support-section--wrapper container">
        <?php
            $about_4_section_title = get_field('about_4_section_title');	
            if (!empty($about_4_section_title ))  { ?>
        <div class="section_title"><?php echo $about_4_section_title; ?></div>
        <?php }	?>

        <?php
            $about_4_section_pretitle = get_field('about_4_section_pretitle');	
            if (!empty($about_4_section_pretitle ))  { ?>
        <div class="section_pretitle"><?php echo $about_4_section_pretitle; ?></div>
        <?php }	?>

        <?php
            $about_4_section_content = get_field('about_4_section_content');	
            if (!empty($about_4_section_content ))  { ?>
        <div class="section_content"><?php echo $about_4_section_content; ?></div>
        <?php }	?>
        <?php
            $about_4_button_text = get_field('about_4_button_text');	
            $about_4_button_url = get_field('about_4_button_url');	
            if (!empty($about_4_button_url ))  { ?>
        <a href="<?php echo $about_4_button_url; ?>"
            class="section_button button draw-white"><?php echo $about_4_button_text; ?></a>
        <?php }	?>
    </div>
</section>

<!-- <script defer src="<?php echo get_template_directory_uri();?>/js/modules/counters.js"></script> -->

<?php get_footer(); ?>