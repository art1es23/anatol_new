<div class="compare-tab-toggle">
    <button
        class="compare-tab-toggle--automatic-presses compare-tab-toggle__item compare-tab-toggle__item--active"><?php _e('Automatic presses', 'anatol'); ?></button>
    <button
        class="compare-tab-toggle--manual-presses compare-tab-toggle__item"><?php _e('Manual presses', 'anatol'); ?></button>
</div>

<div class="compare-filter">
    <?php $lang = ICL_LANGUAGE_CODE;?>

    <div class="compare-filter__item compare-filter__item--header">
        <div class="cm_item cm_item_title"><?php _e('Select the maximum print area', 'anatol'); ?></div>
        <div class="cm_item cm_button ocm-00 active" data-filter="all">
            <?PHP _e('All'); ?>
        </div>
        <div class="cm_item cm_button ocm-1516" data-filter="ocm663">15x16
            <?php	if($lang == 'es') {echo 'pul';} else {echo __('');} ?></div>
        <div class="cm_item cm_button ocm-1618" data-filter="ocm661">16x18
            <?php	if($lang == 'es') {echo 'pul';} else {echo __('');} ?></div>
        <div class="cm_item cm_button ocm-2020" data-filter="ocm662">20x20 <?php _e('and up', 'anatol'); ?></div>

    </div>
    <div class="compare-filter__item--footer" style="display:none;">
        <a href="javascript:document.getElementById('comparepresses').submit();"
            class="button ocm-submit"><?php _e('Compare selected', 'anatol'); ?></a>
    </div>
</div>

<form action="" id="comparepresses" class="compare-items-list" method="post">
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

    <div class="compare-items-list__item compare-item ocm-compare-item <?PHP echo get_field('class_pres')?> ocm-<?php 
			echo mb_strtolower(str_replace(' ', '', get_the_title($zooid))).
			mb_strtolower(str_replace(' ', '', $meta['version'][0])).' '.$thetype; ?>">

        <div class="compare-item__img">
            <?PHP echo get_the_post_thumbnail($zooid, array(300, 200)); ?>
        </div>

        <input type="hidden" name="press[<?php echo $zooid; ?>][item]" value="<?php echo $zooid; ?>" />
        <input class="isSelected" type="hidden" name="press[<?php echo $zooid; ?>][selected]" value="0" />

        <div class="compare-item--hero">
            <div class="add-compare-button">
                <span class="add-compare-button__item"></span>
            </div>
            <h4 class="compare-item__title">
                <?PHP echo get_the_title($zooid); ?>
            </h4>
        </div>

    </div>
    <?PHP } ?>

    <input type="hidden" name="noselected" class="noselected" value="0" />
</form>

<div class="compare-filter compare_menu_bottom">
    <div class="compare-filter__item--footer" style="display:none;">
        <a href="javascript:document.getElementById('comparepresses').submit();"
            class="button ocm-submit"><?php _e('Compare selected', 'anatol'); ?></a>
    </div>
</div>

<script type="text/javascript">
jQuery(function($) {
    var selected_items = 0;
    $(".compare-item").on('click', function() {
        if ($(this).hasClass('selected_item')) {
            $(this).removeClass('selected_item');
            $(this).find('.isSelected').val(0);
            selected_items = selected_items - 1;
        } else {
            $(this).addClass('selected_item');
            $(this).find('.isSelected').val(1);
            selected_items = selected_items + 1;
        }
        show_hide_filter_button(selected_items);
    });
    $(".compare-filter").on('click', '.cm_button', function() {
        $('.compare-items-list .compare-item').removeClass('selected_item');
        $('.compare-items-list .isSelected').val(0);
        $(".compare-filter .cm_button").removeClass('active');
        $(this).addClass('active');
        selected_items = 0;
        show_hide_filter_button(selected_items);

        var filter_type = $(this).attr('data-filter');
        if (filter_type == 'all') {
            $('.compare-items-list .compare-item').stop();
            $('.compare-items-list .compare-item').show(300);
        } else {
            $('.compare-items-list .compare-item').stop();
            $('.compare-items-list .compare-item').hide(300);
            $('.compare-items-list .compare-item.' + filter_type).stop();
            $('.compare-items-list .compare-item.' + filter_type).show(300);
        }
    });

    function show_hide_filter_button(count_items) {
        if (selected_items > 1) {
            $('.compare-filter .compare-filter__item--footer').slideDown(300);
        } else {
            $('.compare-filter .compare-filter__item--footer').slideUp(300);
        }
    };
    $(".compare-tab-toggle--manual-presses").on('click', function() {
        selected_items = 0;
        show_hide_filter_button(selected_items);
    });
    $(".compare-tab-toggle--automatic-presses").on('click', function() {
        selected_items = 0;
        show_hide_filter_button(selected_items);
    });
});
</script>

<script>
let manual_pres = document.querySelectorAll(".manual_pres ");
let automatic_pres = document.querySelectorAll(".automatic_pres");
let isSelected = document.querySelectorAll(".isSelected");
let compare_item = document.querySelectorAll(".compare-item");

let tub_manual_presses = document.querySelector(".compare-tab-toggle--manual-presses");
let tub_automatic_presses = document.querySelector(".compare-tab-toggle--automatic-presses");

let compare_menu_item = document.querySelector(".compare-filter__item");

for (let i = 0; i < manual_pres.length; i++) {
    manual_pres[i].classList.add("not_active");
}
tub_manual_presses.onclick = function() {
    tub_automatic_presses.classList.remove("compare-tab-toggle__item--active");
    tub_manual_presses.classList.add("compare-tab-toggle__item--active");
    compare_menu_item.style.display = 'none';
    for (let i = 0; i < manual_pres.length; i++) {
        manual_pres[i].classList.remove("not_active");
    }
    for (let i = 0; i < automatic_pres.length; i++) {
        automatic_pres[i].classList.add("not_active");
    }
    for (let i = 0; i < isSelected.length; i++) {
        isSelected[i].value = 0;
    }
    for (let i = 0; i < compare_item.length; i++) {
        compare_item[i].classList.remove('selected_item')
    }
};
tub_automatic_presses.onclick = function() {
    tub_manual_presses.classList.remove("compare-tab-toggle__item--active");
    tub_automatic_presses.classList.add("compare-tab-toggle__item--active");
    compare_menu_item.style.display = 'flex';
    for (let i = 0; i < automatic_pres.length; i++) {
        automatic_pres[i].classList.remove("not_active");
    }
    for (let i = 0; i < manual_pres.length; i++) {
        manual_pres[i].classList.add("not_active");
    }
    for (let i = 0; i < isSelected.length; i++) {
        isSelected[i].value = 0;
    }
    for (let i = 0; i < compare_item.length; i++) {
        compare_item[i].classList.remove('selected_item')
    }
};
</script>