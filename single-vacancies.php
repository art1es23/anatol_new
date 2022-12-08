<?php
/* Template Name: Vacancy */
get_header(); 
?>

<?php
	if(!empty(get_field("header_image"))) {
		$image_info = get_field("header_image");
		$image_attributes = wp_get_attachment_image_src($image_info['id'], '1920x1000');
	}
?>


<!-- <div id="main-content">
	<div class="entry-content"> -->
<?php
			$post_id = get_queried_object_id();
			$image_info = get_field("header_image");
			$hero_url = wp_get_attachment_image_src($image_info['id'], '1920x1000');
		?>
<div class="head_section white_shadow has_background">
    <div class="container">
        <div class="et_had_animation animate zoomIn one">
            <div class="head_title">
                <h2 class="page_title">Opportunities</h2>
            </div>
        </div>
        <div class="head_description et_had_animation  animate fadeInLeft two" style="">
            <?php
							if(!empty(get_field("alternative_title"))) {
								echo '<h3 class="page_title">' . get_field("alternative_title") . '</h3>';
							} else {
								the_title('<h3 class="page_title">', '</h3>');
							}
						?>
        </div>
        <div class="head_description et_had_animation  animate fadeInLeft two" style="">
            <?PHP 
				if(function_exists('bcn_display')) {
					echo '<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">';
					bcn_display();
					echo '</div>';
				}?>
        </div>
    </div>
    <!-- </div>
</div> -->
    <div class="container dmbs-container default_page_tamplate vacancy_content">
        <!-- start content container -->
        <div class="row dmbs-content">
            <div class="col-md-12 dmbs-main page_background vacancy-content-wrap">
                <?php // theloop
			if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
                <?php wp_link_pages(); ?>
                <?php endwhile; ?>
                <?php else : ?>

                <?php get_404_template(); ?>

                <?php endif; ?>
            </div>
            <div class="col-md-12 vacancy_form">
                <div class="vacancy-form-wrap">
                    <?php
				$vacancy_countries = wp_get_post_terms(get_the_ID(), 'country');
				$vacancy_country = array();
				if (!empty($vacancy_countries)) {
					foreach ($vacancy_countries as $vc) {
						$vacancy_country[] = $vc->name;
					}
				}
				if (!empty($vacancy_country)) {
					$vacancy_country = implode(', ', $vacancy_country);
				} else {
					$vacancy_country = '';
				}

				$vacancy_positions = wp_get_post_terms(get_the_ID(), 'position');
				$vacancy_position = array();
				if (!empty($vacancy_positions)) {
					foreach ($vacancy_positions as $vp) {
						$vacancy_position[] = $vp->name;
					}
				}
				if (!empty($vacancy_country)) {
					$vacancy_position = implode(', ', $vacancy_position);
				} else {
					$vacancy_position = '';
				}
				?>
                    <input type="hidden" name="vacancy_country" value="<?php echo esc_attr($vacancy_country) ?>">
                    <input type="hidden" name="vacancy_position" value="<?php echo esc_attr($vacancy_position); ?>">
                    <input type="hidden" name="vacancy_name" value="<?php echo esc_attr(get_the_title()); ?>">
                    <?php
				if (ICL_LANGUAGE_CODE == 'ru') {
					echo do_shortcode('[contact-form-7 id="2353" title="Отправьте нам свое резюме"]');
				} elseif (ICL_LANGUAGE_CODE == 'pl') {
					echo do_shortcode('[contact-form-7 id="2354" title="Prześlij nam swoje CV"]');
				} elseif (ICL_LANGUAGE_CODE == 'es') {
					echo do_shortcode('[contact-form-7 id="2355" title="Envíenos su CV"]');
				} else {
					echo do_shortcode('[contact-form-7 id="2352" title="Send us your CV"]');
				}
				?>
                </div>
            </div>
        </div>
    </div>
    <!-- end content container -->
</div>
</div>

<div class="container-fluid full_bottom_container">
    <div class="row ofices_row">
        <?php get_template_part('template-parts/widgets/offices'); ?>
    </div>

    <!-- end content container -->
    <!--</div>
<div class="container-fluid">-->
    <?php get_footer(); ?>