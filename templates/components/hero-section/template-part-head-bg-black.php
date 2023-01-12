<?php
global $post, $default_post;
if (!empty($default_post)) {
	$post = $default_post;
}
if (!empty(get_field("header_image"))) {
	// $post_id = get_queried_object_id();

	$image_info = get_field("header_image");
	$image_attributes = wp_get_attachment_image_src($image_info['id'], '1920x1000');
}
?>

<!-- <style>
<?php include 'css/components/hero-templates/hero-template.css';
?>
</style> -->

<div class="hero black_shadow" style="background-image:url('<?php echo $image_attributes[0]; ?>');">
    <div class="hero--wrapper container">

        <?php
			if (!empty(get_field("alternative_title"))) {
				echo '<h1 class="hero__title page-title">' . get_field("alternative_title") . '</h1>';
			// } else if (is_archive('anatoltv') || is_singular('anatoltv')) {
			// 	echo '<h1 class="hero__title page-title">Anatol TV</h1>';
			} else {
				the_title('<h1 class="hero__title page-title">', '</h1>');
			} ?>

        <?php
			if (empty($anatol_cat_title)) {
				if (!empty(get_field("title_description"))) {
					echo '<p class="hero__description page-description">' . str_replace("\n", '<br />', get_field("title_description")) . '</p>';
				}
			} ?>

        <?php
			if (function_exists('bcn_display')) {
				echo '<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">';
				bcn_display();
				echo '</div>';
			} ?>
    </div>
</div>