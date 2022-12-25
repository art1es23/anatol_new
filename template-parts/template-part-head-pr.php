<!-- 
<div id="main-content" class="category_head">
<div class="entry-content"> -->
<div <?php 
		if ($image_info) { echo 'class="hero" style="background-image:url('.$hero_url[0].')"'; } 
		else { echo 'class="hero"'; } ?>>

    <div class="hero--wrapper container">
        <?PHP
			if(!is_front_page() && !is_page('servise-test')) {
				global $anatol_cat_title;
		
				if (is_single()) {
					if (get_post_type() == 'vacancies'){
						echo '<div class="hero__title page-title">' . get_the_title() . '</div>';
					} else {
						echo '<div class="hero__title page-title">' . $anatol_cat_title . '</div>';
					}
				} else {
					if(!empty($anatol_cat_title)) {
						echo '<h1 class="hero__title page-title">' . $anatol_cat_title . '</h1>';
						the_field('cat_title_description'); 
					} elseif (!empty(get_field("alternative_title"))) {
						echo '<h1 class="hero__title page-title">' . get_field("alternative_title") . '</h1>';
					} else {
						the_title('<h1 class="hero__title page-title">', '</h1>');
					}
				} echo '<div class="hero__description page-description">'.str_replace("\n", '<br />', get_field("cat_title_description")).'</div>';
			} ?>

        <?PHP
			if(function_exists('bcn_display')) {
				echo '<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">';
				bcn_display();
				echo '</div>';
			} ?>

        <?php 
			$product_cat_object = get_queried_object();
			the_field('cat_title_description', 'product_cat_' . $product_cat_object->term_id);
		?>
    </div>
</div>