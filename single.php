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
    <div class="clear clearfix"></div>
</div>
<div class="container blog-container">
    <!-- start content container -->

    <div class="blog-content">
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

        <div class="single_item">

            <?php get_template_part('template-parts/template-part-postmeta'); ?>
            <h1 class="page-header"><?php the_title(); ?></h1>
            <div class="post-thumbnail">
                <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail(array(1200, 500)); ?>
            </div>
            <?php endif; ?>
            <div class="post-content">
                <?php the_content(); ?>
            </div>
            <?php get_template_part('template-parts/template-part-postmeta_bottom'); ?>
            <?php wp_link_pages(); ?>
            <div class="share_post_part">
                <div class="spp_line_part"></div>
            </div>
            <?php comments_template(); ?>

        </div>
        <?php
				// list of posts
				else : ?>

        <div class="post_item">
            <div class="post_thumbnail">
                <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail(array(1200, 500)); ?>
                <?php endif; ?>
            </div>

            <div class="post_item_caption">

                <h2 class="post_header">
                    <a href="<?php the_permalink(); ?>"
                        title="<?php echo esc_attr(sprintf(__('Permalink to %s'), the_title_attribute('echo=0'))); ?>"
                        rel="bookmark"><?php the_title(); ?></a>
                </h2>
                <?php the_excerpt(); ?>

                <!--
								<div class="post_time"><?php the_date('m,d,y'); ?></div>-->
                <div class="read_more_content">
                    <a href="<?php the_permalink(); ?>" class="button rmc_button">
                        <?PHP _e('Read more'); ?>
                    </a>


                </div>
            </div>
        </div>

        <?php endif; ?>

        <?php endwhile; ?>


        <?php
		else :
			get_404_template();
		endif; ?>

    </div>

    <?php get_sidebar('right'); ?>
</div>



<section id="related-articles" class="article-section related-articles">

    <div class="container">



        <?php
global $post;
$current_post_type = get_post_type( $post );

$args = array(
    'posts_per_page' => 8,
    'order' => 'DESC',
    'orderby' => 'ID',
    'post_type' => $current_post_type,
    'post__not_in' => array( $post->ID )
);

$rel_query = new WP_Query( $args );

if( $rel_query->have_posts() ) : 
?>
        <div class="section_rel_title">
            <h2>Recent Articles</h2>
        </div>

        <div class="related-article-slide sldots">
            <?php
    while ( $rel_query->have_posts() ) :
        $rel_query->the_post();
?>
            <div class="post_item">
                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                    <div class="article_post">
                        <div class="post_thumbnail"><?php the_post_thumbnail('medium'); ?>
                            <div class="read_post_item">
                                <div class="read_btn">Read more</div>
                            </div>
                        </div>
                        <div class="post_item_caption">
                            <div class="post_item_title"><?php the_title(); ?></div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endwhile; ?>

        </div>
        <?php 
	endif;
	wp_reset_query();
?>
    </div>
</section>


<?php get_footer(); ?>