<?php
	if (is_single() && is_post_type('anatol-products-pres')){?>
	<!-- single_eq -->
<div class="header_image_top"
    style="background-image:url(<?php echo bloginfo('stylesheet_directory') ?>/images/head-bg/volt.jpg);">
    <?}
		else if (is_single() && is_post_type('anatol-products-flas')){?>
    <div class="header_image_top single_eq"
        style="background-image:url(<?php echo bloginfo('stylesheet_directory') ?>/images/head-bg/flash.jpg);">
        <?}
		else if (is_single() && is_post_type('anatol-products-conv')){?>
        <div class="header_image_top single_eq"
            style="background-image:url(<?php echo bloginfo('stylesheet_directory') ?>/images/head-bg/head_dryer.jpg);">
            <?}
			else if (is_single() && is_post_type('anatol-products-pre-')){?>
            <div class="header_image_top single_eq"
                style="background-image:url(<?php echo bloginfo('stylesheet_directory') ?>/images/head-bg/head_pre.jpg);">
                <?}
			else if (is_single() && is_post_type('anatol-products-acce')){?>
                <div class="header_image_top single_eq"
                    style="background-image:url(<?php echo bloginfo('stylesheet_directory') ?>/images/head-bg/head_acc.jpg);">
                    <?}
			else{				
				echo '<div class="header_image_top head_section single_eq products_header">';
			}
			
		?>
                    <!-- 	<div class="title_row_bg container" style="
		position: relative;
		z-index: 99999999;
		text-align: center; color: #fff;
		" class=""> -->

                    <div class="container title_row_bg">


                        <div class="head_title animate zoomIn one">
                            <?php
					if ( is_shop() || is_product_category() ) {?>

                            <h1 class="page_title"><?php woocommerce_page_title(); ?></h1>
                            <?php }
					else if(is_archive('ebooks') || is_singular('ebooks')) {
						echo '<h1 class="page_title">Anatol eBook Library</h1>';
					}
					else if(is_archive('faq') || is_singular('faq')) {
						echo '<h1 class="page_title">Knowledge base</h1>';
					}
					else if(is_archive('anatoltv') || is_singular('anatoltv')) {
						echo '<h1 class="page_title">Anatol TV</h1>';
					}
					else if(is_archive('sales-dealers') || is_singular('sales-dealers')) {
						echo '<h1 class="page_title">Sales & Dealers</h1>';
					}
					else if(!empty(get_field("alternative_title"))) {
						echo '<h1 class="page_title">' . get_field("alternative_title") . '</h1>';
					} else {
						the_title('<h1 class="page_title single_pr_title">', '</h1>');
					}
				?>

                        </div>
                        <?php
				if(empty($anatol_cat_title)) {
					if(!empty(get_field("title_description"))) {
						echo '<div class="title_description">'.str_replace("\n", '<br />', get_field("title_description")).'</div>';
					}
				}
				?>
                        <?PHP 
				if(function_exists('bcn_display')) {
					echo '<div class="breadcrumbs animate zoomIn three" typeof="BreadcrumbList" vocab="https://schema.org/">';
					bcn_display();
					echo '</div>';
				}?>
                    </div>

                </div>