<section class="another_equipment fix-bg">
    <?php if ( is_front_page() && is_home() ) { ?>
    <div class="container fadein">
        <div class="section_title regional-offices-title anim_fade">Anatol Equipment</div>
    </div>
    <?php } else { ?>
    <div class="another_equipment--wrapper container">
        <div class="section_title regional-offices-title anim_fade"><?php _e('View our full product line', 'anatol'); ?>
        </div>
    </div>
    <?php } ?>

    <div id="advantages" class="sectionmov section-wrap anim_fade">
        <div class="caterpillar">
            <div class="caterpillar__item parallax-parent caterpillar__item--press">
                <div class="back">
                    <div class="mouse-parallax"></div>
                </div>
                <div class="front">
                    <div class="image">
                        <a href="/screen-printing-presses/"
                            class="draw-border"><?php get_template_part('templates/equipment/svg/svg-press'); ?><?php $lang = ICL_LANGUAGE_CODE;?></a>
                    </div>
                    <h4 class="caterpillar__title"><?php _e('Screen Printing Presses', 'anatol'); ?></h4>
                    <div class="caterpillar__description">
                        <ul>
                            <li><?php _e('Automatic Presses', 'anatol'); ?></li>
                            <li><?php _e('Manual Presses', 'anatol'); ?></li>
                            <li><?php _e('Specialty Automatic Presses', 'anatol'); ?></li>
                        </ul>
                    </div>
                    <div class="link_to_item"><a
                            href="<?php if($lang == 'es') {echo '/es/screen-printing-presses';} elseif($lang == 'ru') {echo '/ru/screen-printing-presses';}else {echo __('/screen-printing-presses');} ?>"
                            class="btn button_go button red-button draw-red"><?php _e('Learn More', 'anatol'); ?></a>
                    </div>
                </div>
            </div>

            <div class="caterpillar__item parallax-parent caterpillar__item--dryers">
                <div class="back">
                    <div class="mouse-parallax"></div>
                </div>
                <div class="front">
                    <div class="image">
                        <a
                            href="/products-category/screen-printing-conveyor-dryers/"><?php get_template_part('templates/equipment/svg/svg-dryers'); ?></a>
                    </div>
                    <h4 class="caterpillar__title"><?php _e('Conveyor Dryers', 'anatol'); ?></h4>
                    <div class="caterpillar__description">
                        <ul>
                            <li><?php _e('Ultra Electric Dryer', 'anatol'); ?></li>
                            <li><?php _e('Solutions Electric Dryer', 'anatol'); ?></li>
                            <li><?php _e('Vulcan Gas Conveyor Dryers', 'anatol'); ?></li>
                        </ul>
                    </div>
                    <div class="link_to_item"><a
                            href="<?php if($lang == 'es') {echo '/es/products-category/screen-printing-conveyor-dryers/';} elseif($lang == 'ru') {echo '/ru/products-category/screen-printing-conveyor-dryers/';}else {echo __('/products-category/screen-printing-conveyor-dryers/');} ?>"
                            class="btn button_go button red-button draw-red"><?php _e('Learn More', 'anatol'); ?></a>
                    </div>
                </div>
            </div>
            <div class="caterpillar__item parallax-parent caterpillar__item--flash">
                <div class="back">
                    <div class="mouse-parallax">
                    </div>
                </div>
                <div class="front">
                    <div class="image">
                        <a
                            href="/products-category/flash-cure-units/"><?php get_template_part('templates/equipment/svg/svg-flash'); ?></a>
                    </div>
                    <h4 class="caterpillar__title"><?php _e('Flash Cure Units', 'anatol'); ?></h4>
                    <div class="caterpillar__description">
                        <ul>
                            <li><?php _e('Comet Light Flash Cure Unit', 'anatol'); ?></li>
                            <li><?php _e('Pilot Flash Cure Unit', 'anatol'); ?></li>
                            <li><?php _e('Rapid Wave Flash Cure Unit', 'anatol'); ?></li>
                        </ul>
                    </div>
                    <div class="link_to_item"><a
                            href="<?php if($lang == 'es') {echo '/es/products-category/flash-cure-units/';} elseif($lang == 'ru') {echo '/ru/products-category/flash-cure-units/';}else {echo __('/products-category/flash-cure-units/');} ?>"
                            class="btn button_go button red-button draw-red"><?php _e('Learn More', 'anatol'); ?></a>
                    </div>
                </div>
            </div>
            <div class="caterpillar__item parallax-parent caterpillar__item--pre-press">
                <div class="back">
                    <div class="mouse-parallax">
                    </div>
                </div>
                <div class="front">
                    <div class="image">
                        <a
                            href="/products-category/flash-cure-units/"><?php get_template_part('templates/equipment/svg/svg-pre-press'); ?></a>
                    </div>
                    <h4 class="caterpillar__title"><?php _e('Pre-Press Equipment', 'anatol'); ?></h4>
                    <div class="caterpillar__description">
                        <ul>
                            <li><?php _e('Aurora UV LED Exposure Unit', 'anatol'); ?></li>
                            <li><?php _e('Cube – Screen Drying Cabinet', 'anatol'); ?></li>
                            <li><?php _e('Formulator Screen Printing Ink Mixer', 'anatol'); ?></li>
                        </ul>
                    </div>
                    <div class="link_to_item"><a
                            href="<?php if($lang == 'es') {echo '/es/products-category/pre-press-equipment/';} elseif($lang == 'ru') {echo '/ru/products-category/pre-press-equipment/';}else {echo __('/products-category/pre-press-equipment/');} ?>"
                            class="btn button_go button red-button draw-red"><?php _e('Learn More', 'anatol'); ?></a>
                    </div>
                </div>
            </div>
            <div class="caterpillar__item parallax-parent caterpillar__item--accessories">
                <div class="back">
                    <div class="mouse-parallax">
                    </div>
                </div>
                <div class="front">
                    <div class="image">
                        <a
                            href="/products-category/flash-cure-units/"><?php get_template_part('templates/equipment/svg/svg-accessories'); ?></a>
                    </div>
                    <h4 class="caterpillar__title"><?php _e('Printing Accessories', 'anatol'); ?></h4>
                    <div class="caterpillar__description">
                        <ul>
                            <li><?php _e('Screen Printing Press Pallets', 'anatol'); ?></li>
                            <li><?php _e('Big Forge – In-line Heat Press', 'anatol'); ?></li>
                            <li><?php _e('Cooling Fan module', 'anatol'); ?></li>
                            <li><?php _e('Screen Rack', 'anatol'); ?></li>
                        </ul>
                    </div>
                    <div class="link_to_item"><a
                            href="<?php if($lang == 'es') {echo '/es/products-category/screen-printing-accessories/';} elseif($lang == 'ru') {echo '/ru/products-category/screen-printing-accessories/';}else {echo __('/products-category/screen-printing-accessories/');} ?>"
                            class="btn button_go button red-button draw-red"><?php _e('Learn More', 'anatol'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>