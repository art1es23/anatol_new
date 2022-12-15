<?php
		global $post, $default_post;
		if(!empty($default_post)) {
			$post = $default_post;
		}
		
			if(!empty(get_field("header_image"))) {
				$image_info = get_field("header_image");
				$image_attributes = wp_get_attachment_image_src($image_info['id'], '1920x1000');
				//echo '<div class="header_image" style="background-image:url('.$image_attributes[0].');"></div>';
			}
		
		?>
<!--  -->

<style>
<?php include 'css/components/hero-templates/hero-template.css';
?>
</style>

<div class="hero black_shadow" style="background-image:url('<?php echo $image_attributes[0]; ?>');">

    <div class="container">
        <?PHP 
				if(function_exists('bcn_display')) {
					echo '<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">';
					bcn_display();
					echo '</div>';
				}?>
        <?php
				
					if(!empty(get_field("alternative_title"))) {
						echo '<h1 class="hero__title page-title">' . get_field("alternative_title") . '</h1>';
					} else {
						the_title('<h1 class="hero__title page-title">', '</h1>');
					}


				if(empty($anatol_cat_title)) {
					if(!empty(get_field("title_description"))) {
						echo '<div class="hero__description page-description">'.str_replace("\n", '<br />', get_field("title_description")).'</div>';
					}
				}
				?>
    </div>

</div>


<style>
/*
.header_image_top:after {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    content: "";
    z-index: 1;
    background-color: rgba(0, 0, 0, 0.4);
}
.header_image_top .section_title{
	color:#fff;
	
    padding-bottom: 20px;
    margin-top: 10px;
    margin-bottom: 20px;

	
	
	
	}
.header_image_top .title_description{
	line-height: 26px;
    max-width: 1000px;
    margin: 0 auto;
}
.header_image_top .section_title::after {
    background: #fff;
}
.header_image_top .breadcrumbs { color: #e6e6e6; }
.header_image_top .breadcrumbs a { color: #e6e6e6; }
*/
</style>