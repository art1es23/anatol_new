<?php
/* Template Name: Page Equipment */

get_header(); 

 ?>
<?php get_template_part('template-parts/template-part-head-bg-black'); ?>



	<div class="section_equipments fix-bg">
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
					<div class="equipments_item anim_fade">
						
							<div class="equipments_image" style="background-image:url('<?php echo $image_info['url']; ?>');">
							</div>
							<div class="equipments_info">
								<div class="title_part"><h2><?php echo get_sub_field('title'); ?></h2></div>
								<div class="equipments_parameters"><?php echo get_sub_field('content'); ?></div>
								<div class="see_all_equipments">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?><?php echo $url; ?>" class="button draw-red"><?php _e('Learn More', 'anatol'); ?></a>
								</div>
							</div>
						<!--<a href="<?php echo esc_url( home_url( '/' ) ); ?><?php echo $url; ?>"></a>-->
					</div>
					<?php 
					}							
			}
			?>		
	</div>
	
	

<section class="section service_full fix-bg" id=" ">
		<div class="bg_helper">
			<div class="container anim_fade">
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
							<div class="section_content anim_fade"><?php echo $anatol_equipment_content; ?></div>
					<?php }	?>
					<?php
					$anatol_equipment_button_text = get_field('anatol_equipment_button_text');	
					$anatol_equipment_button_url = get_field('anatol_equipment_button_url');	
					if (!empty($anatol_equipment_button_url ))  { ?>
					<div class="section_button anim_fade"><a href="<?php echo $anatol_equipment_button_url; ?>" class="button draw-white"><?php echo $anatol_equipment_button_text; ?></a></div>
					<?php }	?>		
						<!--<div class="section_head">
						<div class="section_title">Anatol Support</div>
						<div class="section_pretitle">Real Help from Real People</div>
						</div>
						<div class="section_content"><p>Give us a call and let’s connect the good old fashioned way, the way that exists between you and a real person. We know that you want to be greeted by someone that listens, understands your issue and responds quickly. And that’s something we’re really good at.</p>

						<p>Contact us during business hours, we’re here to help. We’re great at problem solving and work hard to save you money any way we can, starting with free Skype and FaceTime calls.</p>

						<p>On the rare occasions when a technician is needed onsite, Anatol team engineers are in close communication to assist when issues arise, ensuring you’re up and running as quickly as possible.</p>
						</div>
						<div class="section_button"><a href="#">Contact Us</a></div>-->
			</div>
		</div>
</section>

<script src="<?php bloginfo('template_directory'); ?>/js/element-in-view.js"></script>
<?php get_footer(); ?>
