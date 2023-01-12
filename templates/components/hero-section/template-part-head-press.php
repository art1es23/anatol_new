<?php
	if (is_single() && is_post_type('anatol-products-pres')){?>
<div class="hero" style="background-image:url(<?php echo bloginfo('stylesheet_directory') ?>/images/head-bg/volt.jpg);">
    <?}
		else if (is_single() && is_post_type('anatol-products-flas')){?>
    <div class="hero "
        style="background-image:url(<?php echo bloginfo('stylesheet_directory') ?>/images/head-bg/flash.jpg);">
        <?}
		else if (is_single() && is_post_type('anatol-products-conv')){?>
        <div class="hero "
            style="background-image:url(<?php echo bloginfo('stylesheet_directory') ?>/images/head-bg/head_dryer.jpg);">
            <?}
			else if (is_single() && is_post_type('anatol-products-pre-')){?>
            <div class="hero "
                style="background-image:url(<?php echo bloginfo('stylesheet_directory') ?>/images/head-bg/head_pre.jpg);">
                <?}
			else if (is_single() && is_post_type('anatol-products-acce')){?>
                <div class="hero "
                    style="background-image:url(<?php echo bloginfo('stylesheet_directory') ?>/images/head-bg/head_acc.jpg);">
                    <?}
			else{				
				echo '<div class="hero products_header">';
			} ?>
                    <div class="hero--wrapper container">
                        <?php
								if ( is_shop() || is_product_category() ) {?>

                        <h1 class="hero__title page-title"><?php woocommerce_page_title(); ?></h1>
                        <?php }
								else if(is_archive('ebooks') || is_singular('ebooks')) {
									echo '<h1 class="hero__title page-title">Anatol eBook Library</h1>';
								}
								else if(is_archive('faq') || is_singular('faq')) {
									echo '<h1 class="hero__title page-title">Knowledgebase</h1>';
								}
								else if(is_archive('anatoltv') || is_singular('anatoltv')) {
									echo '<h1 class="hero__title page-title">Anatol TV</h1>';
								}
								else if(is_archive('sales-dealers') || is_singular('sales-dealers')) {
									echo '<h1 class="hero__title page-title">Sales & Dealers</h1>';
								}
								else if(!empty(get_field("alternative_title"))) {
									echo '<h1 class="hero__title page-title">' . get_field("alternative_title") . '</h1>';
								} else {
									the_title('<h1 class="hero__title page-title">', '</h1>');
								}
							?>

                        <?php
							if(empty($anatol_cat_title)) {
								if(!empty(get_field("title_description"))) {
									echo '<p class="hero__description page-description">'.str_replace("\n", '<br />', get_field("title_description")).'</p>';
								}
							} ?>
                        <?PHP 
							if(function_exists('bcn_display')) {
								echo '<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">';
								bcn_display();
								echo '</div>';
							} ?>
                    </div>

                </div>