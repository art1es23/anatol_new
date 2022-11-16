<?php
global $post, $default_post;
if (!empty($default_post)) {
	$post = $default_post;
}
if (!empty(get_field("header_image"))) {
	$image_info = get_field("header_image");
	$image_attributes = wp_get_attachment_image_src($image_info['id'], '1920x1000');
	//echo '<div class="header_image" style="background-image:url('.$image_attributes[0].');"></div>';
}

?>
<div class="header_image_top head_section black_shadow"
    style="background-image:url('<?php echo $image_attributes[0]; ?>');">

    <div class="container title_row_bg">
        <div class="et_had_animation animate zoomIn one">
            <!-- <div class="head_title"> -->
            <?php
				if (!empty(get_field("alternative_title"))) {
					echo '<h1 class="page_title">' . get_field("alternative_title") . '</h1>';
				} else if (is_archive('anatoltv') || is_singular('anatoltv')) {
					echo '<h1 class="page_title">Anatol TV</h1>';
				} else {
					the_title('<h1 class="page_title">', '</h1>');
				}
				?>
            <!-- </div> -->
        </div>
        <div class="head_description et_had_animation animate fadeInLeft two">
            <?php
			if (empty($anatol_cat_title)) {
				if (!empty(get_field("title_description"))) {
					echo '<div class="et_pb_text_inner">' . str_replace("\n", '<br />', get_field("title_description")) . '</div>';
				}
			}
			?>
        </div>
        <?PHP
		if (function_exists('bcn_display')) {
			echo '<div class="breadcrumbs  animate zoomIn three" typeof="BreadcrumbList" vocab="https://schema.org/">';
			bcn_display();
			echo '</div>';
		} ?>
    </div>
</div>