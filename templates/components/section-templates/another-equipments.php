<!-- style="--bg-image: url(<?php echo bloginfo('url');?>/wp-content/themes/anatol/assets/images/fon6.webp);" -->

<style>
<?php locate_template('css/components/another-equipments.css');

// echo locate_template();
?>
</style>

<div class="another-equipment">
    <div class="another-equipment--wrapper">
        <div class="another-equipment__title">View our full product line</div>
        <div class="list-equipment">
            <div class="list-equipment__item list-equipment__item--press">
                <div class="list-equipment__item--back">
                    <div class="mouse-parallax"
                        style="background-image: url(<?php echo bloginfo('url');?>/wp-content/themes/anatol/assets/images/mouse-parallax/001.jpg);">
                    </div>
                </div>
                <div class="list-equipment__item--front">
                    <a class="list-equipment__link" href="/screen-printing-presses/">
                        <!-- svg -->
                        <?php get_template_part('templates/components/section-templates/equipment/svg/svg-press'); ?>
                        <?php $lang = ICL_LANGUAGE_CODE;?>
                    </a>
                    <h4 class="list-equipment__title"><?php _e('Screen Printing Presses', 'anatol'); ?></h4>
                    <ul class="list-equipment__info">
                        <li><?php _e('Automatic Presses', 'anatol'); ?></li>
                        <li><?php _e('Manual Presses', 'anatol'); ?></li>
                        <li><?php _e('Specialty Automatic Presses', 'anatol'); ?></li>
                    </ul>
                    <a href="<?php if($lang == 'es') {echo '/es/screen-printing-presses';} elseif($lang == 'ru') {echo '/ru/screen-printing-presses';}else {echo __('/screen-printing-presses');} ?>"
                        class="btn link_to_item button_go button red-button draw-red"><?php _e('Learn More', 'anatol'); ?></a>
                </div>
            </div>
            <div class="list-equipment__item list-equipment__item--dryers">
                <div class="list-equipment__item--back">
                    <div class="mouse-parallax"
                        style="background-image: url(<?php echo bloginfo('url');?>/wp-content/themes/anatol/assets/images/mouse-parallax/003.jpg);">
                    </div>
                </div>
                <div class="list-equipment__item--front">
                    <a class="list-equipment__link" href="/products-category/screen-printing-conveyor-dryers/">
                        <?php get_template_part('templates/components/section-templates/equipment/svg/svg-dryers'); ?>
                        <!-- svg -->
                    </a>
                    <h4 class="list-equipment__title"><?php _e('Conveyor Dryers', 'anatol'); ?></h4>
                    <ul class="list-equipment__info ">
                        <li><?php _e('Ultra Electric Dryer', 'anatol'); ?></li>
                        <li><?php _e('Solutions Electric Dryer', 'anatol'); ?></li>
                        <li><?php _e('Vulcan Gas Conveyor Dryers', 'anatol'); ?></li>
                    </ul>
                    <a href="<?php if($lang == 'es') {echo '/es/products-category/screen-printing-conveyor-dryers/';} elseif($lang == 'ru') {echo '/ru/products-category/screen-printing-conveyor-dryers/';}else {echo __('/products-category/screen-printing-conveyor-dryers/');} ?>"
                        class="btn link_to_item button_go button red-button draw-red"><?php _e('Learn More', 'anatol'); ?></a>
                </div>
            </div>
            <div class="list-equipment__item list-equipment__item--flash">
                <div class="list-equipment__item--back">
                    <div class="mouse-parallax"
                        style="background-image: url(<?php echo bloginfo('url');?>/wp-content/themes/anatol/assets/images/mouse-parallax/004.jpg);">
                    </div>
                </div>
                <div class="list-equipment__item--front">
                    <a class="list-equipment__link"
                        href="/products-category/flash-cure-units/"><?php get_template_part('templates/components/section-templates/equipment/svg/svg-flash'); ?>
                        <!-- svg -->
                    </a>
                    <h4 class="list-equipment__title"><?php _e('Flash Cure Units', 'anatol'); ?></h4>
                    <ul class="list-equipment__info">
                        <li><?php _e('Comet Light Flash Cure Unit', 'anatol'); ?></li>
                        <li><?php _e('Pilot Flash Cure Unit', 'anatol'); ?></li>
                        <li><?php _e('Rapid Wave Flash Cure Unit', 'anatol'); ?></li>
                    </ul>
                    <a href="<?php if($lang == 'es') {echo '/es/products-category/flash-cure-units/';} elseif($lang == 'ru') {echo '/ru/products-category/flash-cure-units/';}else {echo __('/products-category/flash-cure-units/');} ?>"
                        class="btn link_to_item button_go button red-button draw-red"><?php _e('Learn More', 'anatol'); ?></a>
                </div>
            </div>
            <div class="list-equipment__item list-equipment__item--pre-press">
                <div class="list-equipment__item--back">
                    <div class="mouse-parallax"
                        style="background-image: url(<?php echo bloginfo('url');?>/wp-content/themes/anatol/assets/images/mouse-parallax/005.jpg);">
                    </div>
                </div>
                <div class="list-equipment__item--front">
                    <a class="list-equipment__link" href="/products-category/flash-cure-units/">
                        <?php get_template_part('templates/components/section-templates/equipment/svg/svg-pre-press'); ?>
                        <!-- svg -->
                    </a>
                    <h4 class="list-equipment__title"><?php _e('Pre-Press Equipment', 'anatol'); ?></h4>
                    <ul class="list-equipment__info">
                        <li><?php _e('Aurora UV LED Exposure Unit', 'anatol'); ?></li>
                        <li><?php _e('Cube – Screen Drying Cabinet', 'anatol'); ?></li>
                        <li><?php _e('Formulator Screen Printing Ink Mixer', 'anatol'); ?></li>
                    </ul>
                    <a target="_blank"
                        href="<?php if($lang == 'es') {echo '/es/products-category/pre-press-equipment/';} elseif($lang == 'ru') {echo '/ru/products-category/pre-press-equipment/';}else {echo __('/products-category/pre-press-equipment/');} ?>"
                        class="btn link_to_item button_go button red-button draw-red"><?php _e('Learn More', 'anatol'); ?></a>
                </div>
            </div>
            <div class="list-equipment__item list-equipment__item--accessories">
                <div class="list-equipment__item--back">
                    <div class="mouse-parallax"
                        style="background-image: url(<?php echo bloginfo('url');?>/wp-content/themes/anatol/assets/images/mouse-parallax/006.jpg);">
                    </div>
                </div>
                <div class="list-equipment__item--front">
                    <a class="list-equipment__link" href="/products-category/flash-cure-units/">
                        <?php get_template_part('templates/components/section-templates/equipment/svg/svg-accessories'); ?>
                        <!-- svg -->
                    </a>
                    <h4 class="list-equipment__title"><?php _e('Printing Accessories', 'anatol'); ?></h4>
                    <ul class="list-equipment__info">
                        <li><?php _e('Screen Printing Press Pallets', 'anatol'); ?></li>
                        <li><?php _e('Big Forge – In-line Heat Press', 'anatol'); ?></li>
                        <li><?php _e('Cooling Fan module', 'anatol'); ?></li>
                        <li><?php _e('Screen Rack', 'anatol'); ?></li>
                    </ul>
                    <a href="<?php if($lang == 'es') {echo '/es/products-category/screen-printing-accessories/';} elseif($lang == 'ru') {echo '/ru/products-category/screen-printing-accessories/';}else {echo __('/products-category/screen-printing-accessories/');} ?>"
                        class="btn link_to_item button_go button red-button draw-red"><?php _e('Learn More', 'anatol'); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>