<div class="tub_toggle">
    <div class="tub_automatic_presses tub_check tub_check_check"><?php _e('automatic presses', 'anatol'); ?></div>
    <div class="tub_manual_presses tub_check"><?php _e('manual presses', 'anatol'); ?></div>
</div>
<div class="compare_menu">

    <?php $lang = ICL_LANGUAGE_CODE;?>
    <div class="compare_menu_item cm_row1">
        <div class="cm_item cm_item_title"><?php _e('Select the maximum print area', 'anatol'); ?></div>
        <div class="cm_item">
            <div class="cm_button ocm-00 active" data-filter="all">
                <?PHP _e('All'); ?>
            </div>
        </div>
        <div class="cm_item">
            <div class="cm_button ocm-1516" data-filter="ocm663">15x16
                <?php	if($lang == 'es') {echo 'pul';} else {echo __('');} ?></div>
        </div>
        <div class="cm_item">
            <div class="cm_button ocm-1618" data-filter="ocm661">16x18
                <?php	if($lang == 'es') {echo 'pul';} else {echo __('');} ?></div>
        </div>
        <div class="cm_item">
            <div class="cm_button ocm-2020" data-filter="ocm662">20x20 <?php _e('and up', 'anatol'); ?></div>
        </div>
    </div>
    <div class="cm_row2" style="display:none;">
        <div class="cm_row2_helper">
            <a href="javascript:document.getElementById('comparepresses').submit();"
                class="button ocm-submit"><?php _e('Compare selected', 'anatol'); ?></a>
        </div>
    </div>
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
        <div class="compare_item ocm-compare-item <?PHP echo get_field('class_pres')?> ocm-<?php 
			echo mb_strtolower(str_replace(' ', '', get_the_title($zooid))).
			mb_strtolower(str_replace(' ', '', $meta['version'][0])).' '.$thetype; ?>">
            <div class="compare_item_wrapper">
                <div class="image_part">
                    <?PHP echo get_the_post_thumbnail($zooid, array(300, 200)); ?>
                </div>
                <input type="hidden" name="press[<?php echo $zooid; ?>][item]" value="<?php echo $zooid; ?>" />
                <input class="isSelected" type="hidden" name="press[<?php echo $zooid; ?>][selected]" value="0" />
                <div class="title_part">
                    <div class="c_icon">
                        <div class="c_default"></div>
                        <div class="c_active"></div>
                    </div>
                    <?PHP echo get_the_title($zooid); ?>
                </div>
            </div>
        </div>
        <?PHP
		}
		?>

        <input type="hidden" name="noselected" class="noselected" value="0" />
    </form>
</div>
<div class="compare_menu compare_menu_bottom">
    <div class="cm_row2" style="display:none;">
        <div class="cm_row2_helper">
            <a href="javascript:document.getElementById('comparepresses').submit();"
                class="button ocm-submit"><?php _e('Compare selected', 'anatol'); ?></a>
        </div>
    </div>
</div>
<script type="text/javascript">
jQuery(function($) {
    var selected_items = 0;
    $(".compare_item").on('click', function() {
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
    $(".compare_menu").on('click', '.cm_button', function() {
        $('.compare_items .compare_item').removeClass('selected_item');
        $('.compare_items .isSelected').val(0);
        $(".compare_menu .cm_button").removeClass('active');
        $(this).addClass('active');
        selected_items = 0;
        show_hide_filter_button(selected_items);

        var filter_type = $(this).attr('data-filter');
        if (filter_type == 'all') {
            $('.compare_items .compare_item').stop();
            $('.compare_items .compare_item').show(300);
        } else {
            $('.compare_items .compare_item').stop();
            $('.compare_items .compare_item').hide(300);
            $('.compare_items .compare_item.' + filter_type).stop();
            $('.compare_items .compare_item.' + filter_type).show(300);
        }
    });

    function show_hide_filter_button(count_items) {
        if (selected_items > 1) {
            $('.compare_menu .cm_row2').slideDown(300);
        } else {
            $('.compare_menu .cm_row2').slideUp(300);
        }
    };
    $(".tub_manual_presses").on('click', function() {
        selected_items = 0;
        show_hide_filter_button(selected_items);
    });
    $(".tub_automatic_presses").on('click', function() {
        selected_items = 0;
        show_hide_filter_button(selected_items);
    });
});
</script>

<script>
let manual_pres = document.querySelectorAll(".manual_pres ");
let automatic_pres = document.querySelectorAll(".automatic_pres");
let isSelected = document.querySelectorAll(".isSelected");
let compare_item = document.querySelectorAll(".compare_item");

let tub_manual_presses = document.querySelector(".tub_manual_presses");
let tub_automatic_presses = document.querySelector(".tub_automatic_presses");

let compare_menu_item = document.querySelector(".compare_menu_item");

for (let i = 0; i < manual_pres.length; i++) {
    manual_pres[i].classList.add("not_active");
}
tub_manual_presses.onclick = function() {
    tub_automatic_presses.classList.remove("tub_check_check");
    tub_manual_presses.classList.add("tub_check_check");
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
    tub_manual_presses.classList.remove("tub_check_check");
    tub_automatic_presses.classList.add("tub_check_check");
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