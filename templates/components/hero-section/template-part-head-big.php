<?php
	if(!empty(get_field("header_image"))) {
		$image_info = get_field("header_image");
		$image_attributes = wp_get_attachment_image_src($image_info['id'], '1920x1000');
	}
?>

<?php
	$post_id = get_queried_object_id();
	$image_info = get_field("header_image");
	$hero_url = wp_get_attachment_image_src($image_info['id'], '1920x1000');
?>

<div
    <?php if ($image_info) { echo 'class="hero white_shadow" style="background-image:url('.$hero_url[0].')"'; } else { echo 'class="hero"'; } ?>>
    <div class="hero--wrapper container">
        <?php
			if(!empty(get_field("alternative_title"))) {
				echo '<h1 class="hero__title page-title">' . get_field("alternative_title") . '</h1>';
			} else {
				the_title('<h1 class="hero__title page-title">', '</h1>');
			} ?>

        <?php
			if(empty($anatol_cat_title)) {
				if(!empty(get_field("title_description"))) {
					echo '<p class="hero__description page-description">'.str_replace("\n", '<br />', get_field("title_description")).'</p>';
				}
			} ?>
    </div>
</div>