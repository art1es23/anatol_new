<?php
/* Template Name: Page Equipment */

get_header();?>

<style>
<?php include 'css/components/hero-templates/hero-template.css';
include 'css/page-templates/page-equipments/equipments.css';
include 'css/components/contact-support.css';
?>
</style>
<?php get_template_part('template-parts/template-part-head-bg-black'); ?>



<div class="equipments-list">
    <?php
        if(have_rows('presses_repeater')) { ?>
    <?php
        while ( have_rows('presses_repeater') ){ the_row();
            $url = !empty(get_sub_field('url')) ? get_sub_field('url') : 'javascript:void(0)';
					
			if(!empty(get_sub_field('image'))) {
				$image_info = get_sub_field('image');
				
				$image_attributes = wp_get_attachment_image_src($image_info['url'], 'full');
				//echo '<div class="header_image" style="background-image:url('.$image_attributes[0].');"></div>';
			}
    ?>
    <div class="equipments-list__item equipment">

        <div class="equipment__item equipment__img">
            <img src="<?php echo $image_info['url']; ?>" alt="Presses">
        </div>

        <div class="equipment__item equipment__info">
            <h2 class="title_part">
                <?php echo get_sub_field('title'); ?>
            </h2>

            <div class="equipment__description"><?php echo get_sub_field('content'); ?></div>

            <!-- <div class="equipment__btn"> -->
            <a href="<?php echo esc_url( home_url( '/' ) ); ?><?php echo $url; ?>"
                class="equipment__btn button draw-red"><?php _e('Learn More', 'anatol'); ?></a>
            <!-- </div> -->
        </div>
        <!--<a href="<?php echo esc_url( home_url( '/' ) ); ?><?php echo $url; ?>"></a>-->
    </div>
    <?php  }} ?>
</div>

<section class="support-section fix-bg" id="">
    <div class="support-section--wrapper container">
        <?php
            $anatol_equipment_title = get_field('anatol_equipment_title');	
            if (!empty($anatol_equipment_title ))  { ?>

        <div class="section_title"><?php echo $anatol_equipment_title; ?></div>
        <?php }	?>

        <?php
            $anatol_equipment_pretitle = get_field('anatol_equipment_pretitle');	
            if (!empty($anatol_equipment_pretitle ))  { ?>

        <div class="section_pretitle"><?php echo $anatol_equipment_pretitle; ?></div>
        <?php }	?>

        <?php
            $anatol_equipment_content = get_field('anatol_equipment_content');	
            if (!empty($anatol_equipment_content ))  { ?>

        <div class="section_content"><?php echo $anatol_equipment_content; ?></div>
        <?php }	?>

        <?php
            $anatol_equipment_button_text = get_field('anatol_equipment_button_text');	
            $anatol_equipment_button_url = get_field('anatol_equipment_button_url');	
            if (!empty($anatol_equipment_button_url ))  { ?>

        <a href="<?php echo $anatol_equipment_button_url; ?>"
            class="section_button button draw-white"><?php echo $anatol_equipment_button_text; ?></a>
        <?php }	?>

    </div>
</section>

<script src="<?php bloginfo('template_directory'); ?>/js/element-in-view.js"></script>
<?php get_footer(); ?>