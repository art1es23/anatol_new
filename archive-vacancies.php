<?php get_header(); ?>

<style>
<?php include 'css/components/hero-templates/hero-template.css';
include 'css/page-templates/page-opportunities/opportunities.css';
?>
</style>

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
<div
    <?php if ($image_info) { echo 'class="hero white_shadow" style="background-image:url('.$hero_url[0].')"'; } else { echo 'class="hero white_shadow"'; } ?>>
    <div class="hero--wrapper container">
        <h2 class="hero__title page-title">Opportunities</h2>
        <!-- <div class="head_description"> -->
        <?PHP 
          if(function_exists('bcn_display')) {
            echo '<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">';
            bcn_display();
            echo '</div>';
          }?>
        <!-- </div> -->
    </div>
</div>
<!-- </div>
</div> -->



<div class="container dmbs-container vacancy_content">
    <!-- start content container -->
    <div class="dmbs-content">
        <div class="mbs-main">
            <?php // theloop
      if( have_posts() ) { ?>
            <?php while ( have_posts() ) : the_post();?>
            <div <?php post_class(); ?>>
                <!-- <div> -->
                <!-- <div class="v_item_title"> -->
                <a class="v_item_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <!-- </div> -->
                <div class="v_item_footer">
                    <?php
                      $terms_list1 = wp_get_post_terms($post->ID, ['country']);
                      $terms_list2 = wp_get_post_terms($post->ID, ['position']);
                      $terms_list  = array_merge($terms_list1, $terms_list2);
                      $terms = [];
                      if($terms_list) {
                        foreach($terms_list as $term) {
                          $terms[] = '<a  href="'.get_term_link($term, $term->taxonomy).'">'.$term->name.'</a>';
                        }
                      }
                      if(!empty($terms)) {
                        echo implode('' , $terms);
                      }
                    ?>
                    <!-- </div> -->
                </div>
                <p class="v_item_desc"><?php the_field('vacancy_description'); ?></p>
                <!-- <div class="v_item_title v_item_btn"> -->
                <a class="button v_item_btn" href="<?php the_permalink(); ?>">Learn more...</a>
                <!-- </div> -->
            </div>
            <?php endwhile; ?>
        </div>
        <div class="page-pagination">
            <?php wp_corenavi(); ?>
        </div>
        <div class="vacancy_contact_us"><a data-fancybox data-src="#vacancy_contact_us_hidden" href="javascript:;"
                class="button contact-us__button"><?php _e('сontact us'); ?></a></div>
        <div id="vacancy_contact_us_hidden" style="display:none;">
            <div class="vacancy_form vacancy_contact_us_content">
                <?php
          if(ICL_LANGUAGE_CODE == 'ru') {
            echo do_shortcode('[contact-form-7 id="2353" title="Отправьте нам свое резюме"]');
          } elseif(ICL_LANGUAGE_CODE == 'pl') {
            echo do_shortcode('[contact-form-7 id="2354" title="Prześlij nam swoje CV"]');
          } elseif(ICL_LANGUAGE_CODE == 'es') {
            echo do_shortcode('[contact-form-7 id="2355" title="Envíenos su CV"]');
          } else {
            echo do_shortcode('[contact-form-7 id="2352" title="Send us your CV"]');
          }
          ?>
            </div>
        </div>
        <?php } else { ?>

        <?php } ?>
    </div>
    <?php if(!have_posts()) {?>
    <div class="dmbs-main">
        <div class="vacancy_sorry_title"><?php _e('We are sorry'); ?></div>
        <p>
            <center>
                <?php
      global $wp_query;
      $country = '';
      if(!empty($wp_query->query['country'])) {
        $term = get_term_by('slug', $wp_query->query['country'], 'country');
        if(!empty($term->name)) {
          $country = $term->name;
        }
      }

      $position = '';
      if(!empty($wp_query->query['position'])) {
        $term = get_term_by('slug', $wp_query->query['position'], 'position');
        if(!empty($term->name)) {
          $position = $term->name;
        }
      }

      if(!empty($country)) {
        $country = __('in').' <strong>'.$country.'</strong>';
      }
      if(!empty($position)) {
        $position = __('for').' <strong>'.$position.'</strong>';
      }

      echo sprintf(__('Sorry, we don`t have a vacancy %s %s now but you can send your CV we will contact you in the future.'), $position, $country); ?>
            </center>
        </p>
    </div>
    <div class="vacancy_form">
        <div class="vacancy-form-wrap outside-form">
            <?php
      if(ICL_LANGUAGE_CODE == 'ru') {
        echo do_shortcode('[contact-form-7 id="2353" title="Отправьте нам свое резюме"]');
      } elseif(ICL_LANGUAGE_CODE == 'pl') {
        echo do_shortcode('[contact-form-7 id="2354" title="Prześlij nam swoje CV"]');
      } elseif(ICL_LANGUAGE_CODE == 'es') {
        echo do_shortcode('[contact-form-7 id="2355" title="Envíenos su CV"]');
      } else {
        echo do_shortcode('[contact-form-7 id="2352" title="Send us your CV"]');
      }
      ?>
        </div>

    </div>
    <?php } ?>
</div>
</div>



<?php get_template_part('template-parts/widgets/offices'); ?>

<script src="<?php echo get_template_directory_uri();?>/js/vacanciesFilter.js"></script>

<?php get_footer(); ?>