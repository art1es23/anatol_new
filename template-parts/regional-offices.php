<section class="section_offices" id="section_offices">
    <div class="section_offices--wrapper container">
        <h2 class="section_title regional-offices-title">
            <?PHP echo get_field('regional_offices_title', 'option'); ?>
        </h2>
        <?PHP
		if(have_rows('regional_offices_repeater', 'option')) {
			echo '<div class="regional_offices sldots">';

			while (have_rows('regional_offices_repeater', 'option')){
				the_row();
				
				?>
        <div class="regional_office_item">
            <!--<div class="image_part"><img src="<?PHP echo get_sub_field('image'); ?>" alt=""></div>-->

            <div class="title_part">
                <h3 class="item_title">
                    <?PHP echo do_shortcode(get_sub_field('name')); ?>
                </h3>
                <?PHP if(!empty(get_sub_field('short_description'))) { ?>
                <h4 class="item_subtitle">
                    <?PHP echo do_shortcode(get_sub_field('short_description')); ?>
                </h4>
                <?PHP } ?>
            </div>

            <div class="parts_separator"></div>

            <div class="contacts_part">
                <?PHP if(!empty(get_sub_field('address'))) { ?>

                <div class="contacts_part__item item_address">
                    <div class="icon"></div>
                    <p class="contacts_part__description">
                        <?PHP echo do_shortcode(get_sub_field('address')); ?>
                    </p>
                </div>
                <?PHP } ?>

                <?PHP if(!empty(get_sub_field('phone'))) { ?>
                <div class="contacts_part__item item_phone">
                    <div class="icon"></div>
                    <p class="contacts_part__description">
                        <?PHP echo do_shortcode(get_sub_field('phone')); ?>
                    </p>
                </div>
                <?PHP } ?>

                <?PHP if(!empty(get_sub_field('phone_2'))) { ?>
                <div class="contacts_part__item item_phone">
                    <div class="icon"></div>
                    <p class="contacts_part__description">
                        <?PHP echo do_shortcode(get_sub_field('phone_2')); ?>
                    </p>
                </div>
                <?PHP } ?>

                <?PHP if(!empty(get_sub_field('fax'))) { ?>
                <div class="contacts_part__item item_fax">
                    <div class="icon"></div>
                    <p class="contacts_part__description">
                        <?PHP echo do_shortcode(get_sub_field('fax')); ?>
                    </p>
                </div>
                <?PHP } ?>
            </div>
        </div>
        <?PHP
			}
			echo '</div>';
		}
		?>
    </div>
</section>