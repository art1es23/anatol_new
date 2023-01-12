<?php
/* Template Name: Vacancy */
get_header(); 
?>

<style>
<?php include 'css/components/hero-templates/hero-template.css';
include 'css/components/template-form.css';
include 'css/components/forms/vacancy-form.css';
include 'css/page-templates/single-pages/page-vacancy/page-vacancy-single.css';
?>
</style>

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

<div class="hero white_shadow">
    <div class="hero--wrapper container">
        <h2 class="hero__title page-title">Opportunities</h2>
        <?php
			if(!empty(get_field("alternative_title"))) {
				echo '<h3 class="hero__title page_title vacancy-page-title">' . get_field("alternative_title") . '</h3>';
			} else {
				the_title('<h3 class="hero__title page-title vacancy-page-title">', '</h3>');
			}
		?>
        <?PHP 
			if(function_exists('bcn_display')) {
				echo '<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">';
				bcn_display();
				echo '</div>';
			}?>
    </div>
</div>

<section class="vacancy-single">
    <div class="vacancy-single--wrapper container">
        <div class="vacancy-single__item vacancy-info">
            <?php // theloop
			if (have_posts()) : while (have_posts()) : the_post();
				// the_content();
				$blockquote = get_field('blockquote_vacancy');
				$description = get_field('description_of_the_vacancy');
				$requirements = get_field('job_requirements');
				$responsibilities = get_field('job_responsibilities');
				$offer = get_field('offer_from_us');
				$legend = get_field('legend_under_description');
				?>

            <?php if ($blockquote) : ?>
            <blockquote class="vacancy-info__quote"><?php echo $blockquote;?></blockquote>
            <?php endif;?>

            <?php if ($description) : ?>
            <p class="vacancy-info__description"><?php echo $description;?></p>
            <?php endif;?>

            <?php if ($requirements) : 
					$caption = $requirements['caption'];
					$list = $requirements['list'];
				?>

            <div class="vacancy-info__item list-specifications--wrapper">
                <h4 class="list-specifications-caption"><?php echo $caption; ?></h4>
                <ul class="list-specifications"><?php echo $list; ?></ul>
            </div>
            <?php endif;?>

            <?php if ($responsibilities) : 
					$caption = $responsibilities['caption'];
					$list = $responsibilities['list'];
				?>

            <div class="vacancy-info__item list-specifications--wrapper">
                <h4 class="list-specifications-caption"><?php echo $caption; ?></h4>
                <ul class="list-specifications"><?php echo $list; ?></ul>
            </div>
            <?php endif;?>

            <?php if ($offer) : 
					$caption = $offer['caption'];
					$list = $offer['list'];
				?>

            <div class="vacancy-info__item list-specifications--wrapper">
                <h4 class="list-specifications-caption"><?php echo $caption; ?></h4>
                <ul class="list-specifications"><?php echo $list; ?></ul>
            </div>
            <?php endif;?>

            <?php if ($legend) : ?>
            <blockquote class="vacancy-info__quote"><?php echo $legend;?></blockquote>
            <?php endif;?>

            <?php 
				wp_link_pages();
				endwhile; ?>
            <?php else : 
				get_404_template(); 
			endif; ?>

            <button class="vacancy_contact_us button contact-us__button"><?php _e('Send Us Your CV'); ?></button>
        </div>
    </div>
</section>

<?php get_footer(); ?>