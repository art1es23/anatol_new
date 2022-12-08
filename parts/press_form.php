<?PHP global $press_form_hidden;?>
<div class="press_filter_search" <?PHP if(isset($press_form_hidden) && $press_form_hidden === true) { ?>style="display:none"<?PHP } ?>>
	<div class="pfs_toggle_header"><?PHP echo get_field('hepl_box_header'); ?> <span class="pfs_arrow"></span></div>
	<div class="pfs_toggle_content" style="display:none">
        <?PHP if(!empty(get_field('help_box_text'))) { echo '<div class="text_box">'.get_field('help_box_text').'</div>'; }?>
    	<div class="pfs_inner_content">
        	<?PHP
			$page_id = 1897;
			$page_id = icl_object_id($page_id, 'page', false, ICL_LANGUAGE_CODE);
			?>
        	<form action="<?PHP echo get_permalink($page_id); ?>" method="post" autocomplete="off" id="presses_filter_form">
    			<input type="hidden" name="show_results" value="1">
            	<?php
                $all_colors = [
					2 => __('2 colors'),
					3 => __('3 colors'),
					4 => __('4 colors'),
					5 => '5 '.__('colors'),
					6 => '6 '.__('colors'),
					7 => '7 '.__('colors'),
					8 => '8 '.__('colors'),
					9 => '9 '.__('colors'),
					10 => '10 '.__('colors'),
					11 => '11 '.__('colors'),
					12 => '12 '.__('colors'),
					14 => '14 '.__('colors'),
					16 => '16 '.__('colors'),
					18 => '18 '.__('colors')
				];
				$active_colors = [];
				?>
                <div class="row_dropdown">
                    <div class="cell cell_text"><?PHP _e('Select the maximum print area'); ?></div>
                    <div class="cell cell_dropdown">
                        <select class="press_filter_cat" name="press_filter_cat" autocomplete="off">
                            <option value=""><?PHP _e('Select the maximum print area'); ?></option>
                            <?PHP
                            $args = array(
                                'post_type'	=> 'press-filter',
                                'showposts' => -1,
                                'orderby' 	=> 'menu_order',
                                'order' 	=> 'ASC'
                            );

                            $the_query = new WP_Query($args);
                            if($the_query->have_posts()) {
                                while( $the_query->have_posts()) {
                                    $the_query->the_post();
									$filter_area_id = get_the_ID();
									$selected = '';
									if(isset($_POST['press_filter_cat']) && $_POST['press_filter_cat'] == $filter_area_id) {
										$selected = 'selected';
									}
                                    ?><option value="<?=$filter_area_id;?>" <?PHP echo $selected; ?>><?PHP _e('Max Print Area:'); ?> <?PHP the_title(); ?></option><?PHP
									$active_colors[$filter_area_id] = get_field('active_colors');

									$tmp = array();
									foreach($active_colors[$filter_area_id] as $color) {
										$tmp[$color] = $color;
									}
									$active_colors[$filter_area_id] = $tmp;
									unset($tmp);
									/*if(!empty($active_colors['colors'])) {
										foreach($active_colors['colors'] as $active_color) {
											$active_colors[$active_color] = get_field('color_'.$active_color);
										}
									}*/
                                }
                                wp_reset_postdata();
                            }

                            ?>
                        </select>
                    </div>
                </div>
                <div class="row_colorfilters" style=" <?PHP if(!isset($_POST['press_filter_cat']) || empty($_POST['press_filter_cat'])) { echo 'display:none;'; } ?>">
                	<div class="colorfilters_title"><?PHP _e('Select the number of colors you want to print'); ?></div>
                	<?PHP foreach($active_colors as $filter_area_id => $colors) {
						$display = 'display:none;';
						if(isset($_POST['press_filter_cat']) && $_POST['press_filter_cat'] == $filter_area_id) {
							$display = '';
						}
						?>
                        <div class="filter_row filter_row_<?= $filter_area_id; ?>" data-filter_area_id="<?PHP $filter_area_id; ?>"  style=" <?PHP echo $display; ?>">
                        	<div class="filter_flex">
								<?PHP
                                foreach($all_colors as $color_id => $color_name) {
                                    $disabled = 'disabled';
                                    if(!empty($active_colors[$filter_area_id][$color_id])) {
                                        $disabled = '';
                                    }

									$active = '';

									if(isset($_POST['color'][$filter_area_id][$color_id]) && !empty($_POST['color'][$filter_area_id][$color_id])) {
										$active = 'active';
									}

                                    ?><div class="filter_item filter_item_<?=$color_id;?> <?=$disabled;?> <?=$active;?>" data-colors="<?=$color_id;?>"><input type="hidden" name="color[<?=$filter_area_id;?>][<?=$color_id;?>]" class="color_id color_id_<?=$filter_area_id;?>_<?=$color_id;?>" value="0"><?=$color_name;?></div><?PHP
                                }
                                 ?>
                            </div>
                        </div>
                    <?PHP } ?>
                    <div class="colorfilters_button" style="display:none;"><div class="colorfilters_button_flex"><div class="button"><?PHP _e('SHOW PRESSES'); ?></div></div></div>
                </div>
          	</form>
        </div>
    </div>
</div>
