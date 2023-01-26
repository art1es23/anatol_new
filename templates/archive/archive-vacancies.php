<?php 
/* 
Template Name: vacancies
Template Post Type: archive
*/
get_header(); 
?>

<style>
<?php include locate_template('css/components/hero-templates/hero-template.css');
// include locate_template('css/components/template-form.css');
include locate_template('css/components/pagination.css');
include locate_template('css/components/forms/vacancy-form.css');
include locate_template('css/page-templates/page-opportunities/opportunities.css');
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
<div
    <?php if ($image_info) { echo 'class="hero white_shadow" style="background-image:url('.$hero_url[0].')"'; } else { echo 'class="hero white_shadow"'; } ?>>
    <div class="hero--wrapper container">
        <h2 class="hero__title page-title">Opportunities</h2>
        <?PHP 
          if(function_exists('bcn_display')) {
            echo '<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">';
            bcn_display();
            echo '</div>';
          }?>
    </div>
</div>

<section class="opportunities">
    <!-- start content container -->
    <div class="opportunities--wrapper container">
        <div class="vacancies-list">
            <?php // theloop
      if( have_posts() ) { ?>
            <?php while ( have_posts() ) : the_post();?>
            <div <?php post_class(); ?>>
                <a class="vacancy__title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

                <div class="vacancy__slugs slug-list">
                    <?php
                      $terms_list1 = wp_get_post_terms($post->ID, ['country']);
                      $terms_list2 = wp_get_post_terms($post->ID, ['position']);
                      $terms_list  = array_merge($terms_list1, $terms_list2);
                      $terms = [];
                      if($terms_list) {
                        foreach($terms_list as $term) {
                          $terms[] = '<a class="slug-list__item" href="'.get_term_link($term, $term->taxonomy).'">'.$term->name.'</a>';
                        }
                      }
                      if(!empty($terms)) {
                        echo implode('' , $terms);
                      }
                    ?>
                </div>

                <p class="vacancy__description"><?php the_field('vacancy_description'); ?></p>
                <a class="vacancy__button button" href="<?php the_permalink(); ?>">Learn more...</a>
            </div>
            <?php endwhile; ?>
        </div>

        <div class="page-pagination">
            <?php wp_corenavi(); ?>
        </div>

        <button class="vacancy_contact_us button contact-us__button"><?php _e('сontact us'); ?></button>
        <?php } ?>
    </div>
</section>

<?php get_template_part('template-parts/widgets/offices'); ?>

<script src="<?php echo get_template_directory_uri();?>/js/vacanciesFilter.js"></script>

<?php get_footer(); ?>