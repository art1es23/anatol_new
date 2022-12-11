<!--  -->
<?php if(!empty(get_field("header_image"))) {
	$image_info = get_field("header_image");
	$image_attributes = wp_get_attachment_image_src($image_info['id'], '1920x1000');
}?>
<!--  -->

<?php
		// Get post ID
		$post_id = get_queried_object_id();
		// Hero image
		$image_info = get_field("header_image");
		$hero_url = wp_get_attachment_image_src($image_info['id'], '1920x1000');
	?>
<div
    <?php if ($image_info) { echo 'class="hero" style="background-image:url('.$hero_url[0].')"'; } else { echo 'class="hero white_shadow"'; } ?>>
    <div class="hero--wrapper container">

        <?php			
			if (is_archive() || is_home() || is_singular('post')) {
				'Anatol blog';
			}
			if(!empty(get_field("alternative_title"))) {
				echo '<h1 class="hero__title page-title">' . get_field("alternative_title") . '</h1>';
			} else {
				echo ('<h1 class="hero__title page-title">Anatol blog</h1>');
			}
		?>

        <?php
			if(empty($anatol_cat_title)) {
				if(!empty(get_field("title_description"))) {
					echo '<div class="hero__description page-description">'.str_replace("\n", '<br />', get_field("title_description")).'</div>';
				}
			}
			?>
        <?php 
			if(function_exists('bcn_display')) {
				echo '<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">';
				bcn_display();
				echo '</div>';
			}?>
    </div>
</div>