<?php
/* Template Name: About */
get_header(); ?>
<style>
<?php include 'css/page-templates/page-about/section-about.css';
include 'css/page-templates/page-about/business-opportunities.css';
include 'css/page-templates/page-about/anatol-map.css';
include 'css/page-templates/page-about/service-support.css';
?>
</style>
<?php get_template_part('template-parts/template-part-head-bg-black'); ?>

<section class="about_content" id="about_content">
    <div class="about_us_content">
        <div class="about_us_text anim_fade">
            <div class="section_title">
                <h2><?php the_field('about_first_section_title'); ?></h2>
            </div>
            <div class="about_content">
                <?php the_field('about_first_section_content'); ?>
            </div>
        </div>
        <div class="about_us_img anim_fade">
            <div class="about_img"><img loading="lazy" class="lozad"
                    src="<?php bloginfo('template_directory'); ?>/images/image/about_us.jpg" alt=""></div>
        </div>
    </div>
</section>

<section class="business_opportunities anim_fade">
    <div class="business_img"><img loading="lazy" class="lozad"
            src="<?php bloginfo('template_directory'); ?>/images/image/business.jpg" alt=""></div>
    <!-- <div class="business_img" style="background-image:url('<?php bloginfo('template_directory'); ?>/images/image/business.jpg');"></div> -->
    <div class="business_content">
        <div class="business_cont">
            <div class="section_title"><?php the_field('about_2_section_title'); ?></div>
            <div class=""><?php the_field('about_2_section_content'); ?></div>
        </div>
    </div>
</section>

<section class="anatol_map numbers fix-bg">
    <div class="container">
        <div class="section_title anim_fade">
            <h2><?php the_field('about_3_section_title'); ?><h2>
        </div>
        <div class="map_cont anim_fade">
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

<section class="service_full fix-bg" id=" ">
    <div class="bg_helper">
        <div class="container">
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
            <div class="section_content anim_fade"><?php echo $about_4_section_content; ?></div>
            <?php }	?>
            <?php
					$about_4_button_text = get_field('about_4_button_text');	
					$about_4_button_url = get_field('about_4_button_url');	
					if (!empty($about_4_button_url ))  { ?>
            <div class="section_button anim_fade"><a href="<?php echo $about_4_button_url; ?>"
                    class="button draw-white"><?php echo $about_4_button_text; ?></a></div>
            <?php }	?>
        </div>
    </div>
</section>

<!--<section class="available_opportunities" id="available_opportunities">
			<div class="bg_helper">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="section_title"><?php echo get_field("title_2"); ?></div>
							<div class="section_content"><?php echo get_field("content_2"); ?></div>
							<div class="section_button"><a href="<?php echo get_field("button_url_2"); ?>"><?php echo get_field("button_text_2"); ?></a></div>
						</div>
					</div>
				</div>
			</div>
		</section>-->


<?php get_footer(); ?>