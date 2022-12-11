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
    <?php if ($image_info) { echo 'class="head_section white_shadow has_background" style="background-image:url('.$hero_url[0].')"'; } else { echo 'class="head_section contacts_head"'; } ?>>
    <div class="container">
        <?php
			if(!empty(get_field("alternative_title"))) {
				echo '<h1 class="page_title">' . get_field("alternative_title") . '</h1>';
			} else {
				the_title('<h1 class="page_title">', '</h1>');
			} ?>

        <?php
			if(empty($anatol_cat_title)) {
				if(!empty(get_field("title_description"))) {
					echo '<div class="et_pb_text_inner">'.str_replace("\n", '<br />', get_field("title_description")).'</div>';
				}
			} ?>
    </div>
</div>