<section class="section_offices" id="section_offices">
    <div class="section_offices--wrapper container">
        <div class="section_title regional-offices-title">
            <?PHP echo get_field('regional_offices_title', 'option'); ?>
        </div>
        <?PHP
		if(have_rows('regional_offices_repeater', 'option')) {
			echo '<div class="regional_offices sldots">';

			while (have_rows('regional_offices_repeater', 'option')){
				the_row();
				
				?>
        <div class="regional_office_item">
            <!--<div class="image_part"><img src="<?PHP echo get_sub_field('image'); ?>" alt=""></div>-->
            <div class="bg_content_part">
                <div class="title_part">
                    <div class="item_title">
                        <?PHP echo do_shortcode(get_sub_field('name')); ?>
                    </div>
                    <?PHP if(!empty(get_sub_field('short_description'))) { ?>
                    <div class="item_subtitle">
                        <?PHP echo do_shortcode(get_sub_field('short_description')); ?>
                    </div>
                    <?PHP } ?>
                </div>
                <div class="parts_separator"></div>
                <div class="height_control">
                    <div class="contacts_part">
                        <?PHP if(!empty(get_sub_field('address'))) { ?>
                        <div class="item_address">
                            <div class="icon"></div>
                            <div>
                                <?PHP echo do_shortcode(get_sub_field('address')); ?>
                            </div>
                        </div>
                        <?PHP } ?>
                        <?PHP if(!empty(get_sub_field('phone'))) { ?>
                        <div class="item_phone">
                            <div class="icon"></div>
                            <div>
                                <?PHP echo do_shortcode(get_sub_field('phone')); ?>
                            </div>
                        </div>
                        <?PHP } ?>
                        <?PHP if(!empty(get_sub_field('phone_2'))) { ?>
                        <div class="item_phone">
                            <div class="icon"></div>
                            <div>
                                <?PHP echo do_shortcode(get_sub_field('phone_2')); ?>
                            </div>
                        </div>
                        <?PHP } ?>
                        <?PHP if(!empty(get_sub_field('fax'))) { ?>
                        <div class="item_fax">
                            <div class="icon"></div>
                            <div>
                                <?PHP echo do_shortcode(get_sub_field('fax')); ?>
                            </div>
                        </div>
                        <?PHP } ?>
                    </div>
                </div>
            </div>
        </div>
        <?PHP
			}
			echo '</div>';
		}
		?>
    </div>
</section>