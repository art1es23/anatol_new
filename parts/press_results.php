<?PHP global $wp; ?>
<div class="press_filter_results">
	<h2><?PHP _e('Press Search Results'); ?></h2>
    
    <div class="equipments_list">
    <?PHP
		if(!empty($_POST['press_filter_cat'])) {
			$filter_cat = $_POST['press_filter_cat'];
			$colors = array();
			if(!empty($_POST['color'][$filter_cat])) {
				foreach($_POST['color'][$filter_cat] as $color_id => $is_selected) {
					if(!empty($is_selected) ) {
						$colors[$color_id] = $color_id;
					}
				}
			}
			
			$items = array();
			
			if(!empty($colors)) {
				foreach($colors as $color) {
					$color = intval($color);
					if(!empty($color)) {
						$color_items = get_field('color_'.$color, $filter_cat);
						if(!empty($color_items)) {
							foreach($color_items as $color_item) {
								$items[$color_item] = $color_item;
							}
						}
					}
				}
			}
			if(!empty($items)) {
				foreach($items as $item) {
					$item = icl_object_id($item, 'anatol-products-pres', false, ICL_LANGUAGE_CODE);
										
					$url = get_permalink($item);
					?>
                    <a href="<?=$url?>" class="equipment_item press_search_item">                
                        <div class="image_part">
                            <?PHP echo get_the_post_thumbnail($item, array(300, 210)); ?>                    
                        </div>               
                        <div class="content_part">
                            <div class="c_icon">
                                <div class="c_default"></div>
                            </div>
                            <div class="equipment_box_title"><?PHP echo get_the_title($item); ?></div>
                            <div class="equipment_box_cat">
                            	<span class="title"><?PHP _e('Category:'); ?></span> 
								<?PHP 
                                    $terms = wp_get_post_terms($item, array('anatol-products_cat'));
									if(!empty($terms)) {
										foreach($terms as $term) {
											if($term->parent > 0) {
												echo '<span class="cat_item" data-url="'.get_term_link($term->term_id, 'anatol-products_cat').'">'.$term->name.'</span>';
												break;
											}
										}
									}
                                ?>
                            </div>               
                        </div>
                    </a>
                    <?PHP	
				}
			}
		}
	?>
    </div>
    <div class="new_press_search">
    	<a href="<?PHP echo home_url(add_query_arg(array(),$wp->request));?>" class="button"><span><?PHP _e('NEW SEARCH'); ?></span></a>
    </div>
</div>



