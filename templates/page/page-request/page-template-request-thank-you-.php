<?php
/* Template Name: Page Thank You NEW*/

get_header(); ?>

<?php get_template_part('template-parts/template-part-head-part1'); ?>
<div class="simple_bg_head">
    <?php get_template_part('template-parts/template-part-head-part2'); ?>
    <div class="clear clearfix"></div>
</div>
<div class="container">
    <div class="row">
        <div class="section_presses section_equipment_presses">
            <?php
					$postId = 32;
					$post = get_post($postId);
						if(have_rows('presses_repeater')) {
							while ( have_rows('presses_repeater') ){ the_row();
							$url = !empty(get_sub_field('url')) ? get_sub_field('url') : 'javascript:void(0)';
							
						echo '<div class="col-md-4 equipment_item">';
							echo '<a href="' . $url . '">';
								echo '<div class="image_part">' . wp_get_attachment_image(get_sub_field('image'), array(370, 370)) . '</div>';
								echo '<div class="equipment_info">';					
									echo '<div class="title_part">' . get_sub_field('title') . '</div>';					
									echo '<div class="main-parameters">' . get_sub_field('content') . '</div>';
								echo '</div>';
							echo '</a>';
						echo '</div>';					
							}							
						}
				?>
        </div>
    </div>
</div>
</div>
<div class="container-fluid full_bottom_container">
    <div class="row ofices_row">
        <?php get_template_part('template-parts/widgets/offices'); ?>
    </div>
    <?php get_footer(); ?>