<?php

/* 
if (is_single() && get_post_type() == 'post' && ICL_LANGUAGE_CODE != 'en') {
	$url = get_the_permalink();
	$url = str_replace('/' . ICL_LANGUAGE_CODE . '/', '/', $url);
	$post_language_information = wpml_get_language_information(get_the_ID());
	if ($post_language_information['language_code'] != ICL_LANGUAGE_CODE) {
		wp_redirect($url, 301);
		exit;
	}
}
 */
get_header(); ?>

<?php get_template_part('template-parts/template-part-head-blog'); ?>

<div class="simple_bg_head index_template">
    <?php
	global $anatol_cat_title;
	if (is_archive() || is_home() || is_singular('post')) {
		$anatol_cat_title = __('Anatol blog');
	}

	if (is_search()) {
		$total_results = $wp_query->found_posts;
		$anatol_cat_title = sprintf(__('%s Search Results for "%s"'), $total_results, get_search_query());
	}

	//get_template_part('template-parts/template-part-head-part2'); ?>
    <!-- <div class="clear clearfix"></div> -->
</div>
<div class="container blog-container the-new-class">
    <!-- start content container -->

    <div class="blogs-content">
        <?php $description = term_description();
			if ($description) {
				?>
        <div class="term-description">
            <?php echo $description;  ?>
        </div>
        <?php } ?>


        <?php
			//if this was a search we display a page header with the results count. If there were no results we display the search form.
			if (is_search()) :
				if ($total_results == 0) :
					get_search_form(true);
				endif;
			endif;
			?>

        <?php // theloop
			if (have_posts()) : while (have_posts()) : the_post();

				// single post
				if (is_single()) : ?>

        <div class="post_item">

            <?php get_template_part('template-parts/template-part-postmeta'); ?>
            <h1 class="page-header"><?php the_title(); ?></h1>

            <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail(array(1200, 500)); ?>
            <div class="clear"></div>
            <?php endif; ?>
            <div class="post-content">
                <?php the_content(); ?>
            </div>
            <?php get_template_part('template-parts/template-part-postmeta_bottom'); ?>
            <?php wp_link_pages(); ?>
            <div class="share_post_part">
                <div class="spp_line_part"></div>
                <div class="spp_content_part"><span class="spp_text">
                        <?PHP _e('Share') ?>
                    </span>
                    <?PHP echo do_shortcode('[addtoany]'); ?>
                </div>
            </div>
            <?php comments_template(); ?>

        </div>
        <?php
				// list of posts
				else : ?>

        <div class="post_item anim_fade">
            <div class="post_thumbnail"><a href="<?php the_permalink(); ?>" class="thumbnail_link">
                    <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail(array(1200, 500)); ?>
                    <?php endif; ?></a>
            </div>

            <div class="post_item_caption">

                <h3 class="post_item_title">
                    <a href="<?php the_permalink(); ?>"
                        title="<?php echo esc_attr(sprintf(__('Permalink to %s'), the_title_attribute('echo=0'))); ?>"
                        rel="bookmark"><?php the_title(); ?></a>
                </h3>
                <?php the_excerpt(); ?>

                <!--<div class="post_time"><?php the_date('m,d,y'); ?></div>-->

                <div class="read_more_content">
                    <a href="<?php the_permalink(); ?>" class="button rmc_button">
                        <?PHP _e('Read more'); ?>
                    </a>


                </div>
            </div>
        </div>

        <?php endif; ?>

        <?php endwhile; ?>

        <nav class="woocommerce-pagination page-pagination">
            <?php wp_corenavi(); ?>
        </nav>
        <?php
		else :
			get_404_template();
		endif; ?>

    </div>

    <?php //get_sidebar('right'); ?>
</div>



<?php get_footer(); ?>