<section class="section_offices" id="section_offices">
    <div class="section_offices--wrapper container">
        <h2 class="section_title regional-offices-title">
            <?PHP echo get_field('regional_offices_title', 'option'); ?>
        </h2>
        <?PHP
		if(have_rows('regional_offices_repeater', 'option')) {
			echo '<div class="regional-offices sldots">';

			while (have_rows('regional_offices_repeater', 'option')){
				the_row();
				
				?>
        <div class="regional-offices__item location-office">
            <div class="location-office--header">
                <h3 class="location-office__title">
                    <?PHP echo do_shortcode(get_sub_field('name')); ?>
                </h3>
                <?PHP if(!empty(get_sub_field('short_description'))) { ?>
                <h4 class="location-office__subtitle">
                    <?PHP echo do_shortcode(get_sub_field('short_description')); ?>
                </h4>
                <?PHP } ?>
            </div>

            <div class="location-office__description location-office-info">

                <?PHP if(!empty(get_sub_field('address'))) { ?>
                <p class="location-office-info__item location-address">
                    <?PHP echo do_shortcode(get_sub_field('address')); ?>
                </p>
                <?PHP } ?>

                <?PHP if(!empty(get_sub_field('phone'))) { ?>
                <p class="location-office-info__item location-phone">
                    <?PHP echo do_shortcode(get_sub_field('phone')); ?>
                </p>
                <?PHP } ?>

                <?PHP if(!empty(get_sub_field('phone_2'))) { ?>
                <p class="location-office-info__item location-phone">
                    <?PHP echo do_shortcode(get_sub_field('phone_2')); ?>
                </p>
                <?PHP } ?>

                <?PHP if(!empty(get_sub_field('fax'))) { ?>
                <p class="location-office-info__item location-fax">
                    <?PHP echo do_shortcode(get_sub_field('fax')); ?>
                </p>
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