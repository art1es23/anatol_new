
<div class="compare_menu">
	<div class="cm_row1">
    	<div class="cm_item cm_item_title"><?PHP _e('Select the maximum print area'); ?></div>
    	<div class="cm_item"><div class="cm_button ocm-00 active" data-filter="all"><?PHP _e('All'); ?></div></div>
    	<div class="cm_item"><div class="cm_button ocm-1516" data-filter="ocm663">15x16</div></div>
    	<div class="cm_item"><div class="cm_button ocm-1618" data-filter="ocm661">16x18</div></div>
    	<div class="cm_item"><div class="cm_button ocm-2020" data-filter="ocm662">20x20 <?PHP _e('and up'); ?></div></div>
    </div>
	<div class="cm_row2" style="display:none;"><div class="cm_row2_helper">
    	<a href="javascript:document.getElementById('comparepresses').submit();" class="button ocm-submit"><?php _e('Compare selected'); ?></a>
    </div></div>
</div>
<div class="compare_items">

	<form action="" id="comparepresses" method="post">
    	<input type="hidden" name="show_results" value="1">
        <?PHP 
		query_posts(array( 
        	'post_type' => 'press-compare',
			'showposts' => -1 
		));
		
		while(have_posts()) { 
			the_post(); 
			$meta = get_post_meta(get_the_ID());
			
			if($meta['thetype'][0] == 1) { $thetype = 'ocm661'; }
			elseif($meta['thetype'][0] == 3) { $thetype = 'ocm663'; }
			else { $thetype = 'ocm662'; }
			
			$zooid = get_field('zooid', get_the_ID());
			$zooid = $zooid[0];
			$zooid = icl_object_id($zooid, 'anatol-products-pres', false, ICL_LANGUAGE_CODE);
			
			
			?>
            <div class="compare_item ocm-compare-item ocm-<?php 
			echo mb_strtolower(str_replace(' ', '', get_the_title($zooid))).
			mb_strtolower(str_replace(' ', '', $meta['version'][0])).' '.
			$thetype; ?>">
            	<div class="compare_item_wrapper">
                    <div class="image_part">
                        <?PHP echo get_the_post_thumbnail($zooid, array(250, 190)); ?>
                    </div>
                    <input type="hidden" name="press[<?php echo $zooid; ?>][item]" value="<?php echo $zooid; ?>" />
                    <input class="isSelected" type="hidden" name="press[<?php echo $zooid; ?>][selected]" value="0" />                    
                    <div class="title_part">
					<div class="c_icon">
                    	<div class="c_default"></div>
                    	<div class="c_active"></div>
                    </div>
					<?PHP echo get_the_title($zooid); ?></div>
            	</div>
            </div>
            <?PHP
		}
		?>
        
   		<input type="hidden" name="noselected" class="noselected" value="0" />
	</form>
</div>
<div class="compare_menu compare_menu_bottom">
	<div class="cm_row2" style="display:none;"><div class="cm_row2_helper">
    	<a href="javascript:document.getElementById('comparepresses').submit();" class="button ocm-submit"><?php _e('Compare selected'); ?></a>
    </div></div>
</div>

