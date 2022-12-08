<!-- 
<div id="main-content" class="category_head">
<div class="entry-content"> -->
<div <?php 
		if ($image_info) { echo 'class="category_head head_section has_background" style="background-image:url('.$hero_url[0].')"'; } 
		else { echo 'class="head_section products_header"'; } ?>>

    <div class="container">
        <?PHP
			if(!is_front_page() && !is_page('servise-test')) {
				global $anatol_cat_title;
		?>

        <div class="et_had_animation animate zoomIn one">
            <!-- <div class="head_title"> -->
            <?php
					if (is_single()) {
						if (get_post_type() == 'vacancies'){
							echo '<div class="page-title">' . get_the_title() . '</div>';
						} else {
							echo '<div class="page-title">' . $anatol_cat_title . '</div>';
						}
					} else {
						if(!empty($anatol_cat_title)) {
							echo '<h1 class="page_title">' . $anatol_cat_title . '</h1>';
							the_field('cat_title_description'); 
						} elseif (!empty(get_field("alternative_title"))) {
							echo '<h1 class="page_title">' . get_field("alternative_title") . '</h1>';
						} else {
							the_title('<h1 class="page_title">', '</h1>');
						}
					} echo '<div class="title_description">'.str_replace("\n", '<br />', get_field("cat_title_description")).'</div>';
				?>
            <!-- </div> -->
        </div>

        <?PHP } ?>
        <?PHP
				if(function_exists('bcn_display')) {
					echo '<div class="breadcrumbs animate zoomIn three" typeof="BreadcrumbList" vocab="https://schema.org/">';
					bcn_display();
					echo '</div>';
				}
			?>

        <!-- <div class="head_description et_had_animation  animate fadeInLeft two" style=""> -->
        <?php 
			$product_cat_object = get_queried_object();
			the_field('cat_title_description', 'product_cat_' . $product_cat_object->term_id);
		?>
        <!-- </div> -->
    </div>
</div>
<!-- </div>
</div> -->