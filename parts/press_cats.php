<div class="presses_cats">
	<h2><?PHP echo get_field('category_title'); ?></h2>
    <div class="equipments_list">
    <?PHP
		if(have_rows('subcategories')){
			while(have_rows('subcategories')) {
				the_row();
				$url = '#';
				if(!empty(get_sub_field('category'))) {
					$url = get_term_link(get_sub_field('category'), 'anatol-products_cat');
				}
				?>
                <a href="<?=$url?>" class="equipment_item" data-aos="zoom-in-down">                
                    <div class="image_part">
                        <?PHP echo wp_get_attachment_image(get_sub_field('image'), array(300, 210)); ?>                    
                    </div>               
                    <div class="content_part">
                        <div class="c_icon">
                            <div class="c_default"></div>
                        </div>
                        <div class="equipment_box_title"><?PHP echo get_sub_field('title'); ?></div>
                        <?PHP if(!empty(get_sub_field('description'))) { ?><blockquote><?PHP echo get_sub_field('description'); ?></blockquote><?PHP } ?>                
                    </div>
                </a>
                <?PHP		
			}
		}
	?>
    </div>
</div>