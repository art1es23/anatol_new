<?PHP
/* Template Name: Single shop page */

	get_header(); ?>

<?PHP get_template_part('template-parts/template-part-head-part1'); ?>
<div class="simple_bg_head no_padding_b">
    <?PHP get_template_part('template-parts/template-part-head-part2'); ?>
    <div class="clear clearfix"></div>
    <?PHP if(!empty(get_field('title_text_page_wc'))) {
			echo '<div class="page_title_text type_wc">'.get_field('title_text_page_wc').'</div>';
		}?>
</div>

<div class="container-fluid">
    <div class="row">
        <section class="compare_content">
            <div class="container">
                <div class="row compare_content_row">
                    <div class="col-md-12">
                        <?php // theloop
							if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <?php the_content(); ?>
                        <?php endwhile; ?>
                        <?php else: ?>
                        <?php get_404_template(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</div>
<div class="container dmbs-container">

    <!--<div class="container dmbs-container">-->
    <!-- start content container -->
    <div class="row dmbs-content">



    </div>
</div>
<div class="container-fluid full_bottom_container">
    <div class="row ofices_row">
        <section class="section_offices" id="section_offices">
            <div class="section2_bg">
                <div class="section2_icon"></div>
                <div class="container section2_container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section_title">
                                <?PHP echo get_field('regional_offices_title', 'option'); ?>
                            </div>

                            <?PHP
                                if(have_rows('regional_offices_repeater', 'option')) {
                                    echo '<div class="regional_offices"><div class="row">';

                                    while (have_rows('regional_offices_repeater', 'option')){
                                        the_row();
                                        //$url = !empty(get_sub_field('url')) ? get_sub_field('url') : 'javascript:void(0)';
                                        ?>
                            <div class="col-md-4 regional_office_item">
                                <div class="image_part"><img loading="lazy" class="lozad"
                                        src="<?PHP echo get_sub_field('image'); ?>"></div>
                                <div class="bg_content_part">
                                    <div class="title_part">
                                        <div class="item_title">
                                            <?PHP echo do_shortcode(get_sub_field('name')); ?>
                                        </div>
                                        <?PHP if(!empty(get_sub_field('short_description'))) { ?>
                                        <div class="item_subtitle">
                                            <?PHP echo do_shortcode(get_sub_field('short_description')); ?>
                                        </div>
                                        <?PHP } ?>
                                    </div>
                                    <div class="parts_separator"></div>
                                    <div class="contacts_part">
                                        <?PHP if(!empty(get_sub_field('address'))) { ?>
                                        <div class="item_address">
                                            <div class="icon"></div>
                                            <div>
                                                <?PHP echo do_shortcode(get_sub_field('address')); ?>
                                            </div>
                                        </div>
                                        <?PHP } ?>
                                        <?PHP if(!empty(get_sub_field('phone'))) { ?>
                                        <div class="item_phone">
                                            <div class="icon"></div>
                                            <div>
                                                <?PHP echo do_shortcode(get_sub_field('phone')); ?>
                                            </div>
                                        </div>
                                        <?PHP } ?>
                                        <?PHP if(!empty(get_sub_field('fax'))) { ?>
                                        <div class="item_fax">
                                            <div class="icon"></div>
                                            <div>
                                                <?PHP echo do_shortcode(get_sub_field('fax')); ?>
                                            </div>
                                        </div>
                                        <?PHP } ?>
                                    </div>
                                    <div class="parts_separator"></div>
                                    <div class="social_part">
                                        <?PHP if(!empty(get_sub_field('instagram'))) { ?><a
                                            href="<?PHP echo get_sub_field('instagram'); ?>" target="_blank"
                                            class="item_instagram"><i class="wicon-instagram"></i></a>
                                        <?PHP } ?>
                                        <?PHP if(!empty(get_sub_field('facebook'))) { ?><a
                                            href="<?PHP echo get_sub_field('facebook'); ?>" target="_blank"
                                            class="item_facebook"><i class="wicon-facebook"></i></a>
                                        <?PHP } ?>
                                        <?PHP if(!empty(get_sub_field('twitter'))) { ?><a
                                            href="<?PHP echo get_sub_field('twitter'); ?>" target="_blank"
                                            class="item_twitter"><i class="wicon-twitter"></i></a>
                                        <?PHP } ?>
                                        <?PHP if(!empty(get_sub_field('google_plus'))) { ?><a
                                            href="<?PHP echo get_sub_field('google_plus'); ?>" target="_blank"
                                            class="item_google_plus"><i class="wicon-google-plus"></i></a>
                                        <?PHP } ?>
                                        <?PHP if(!empty(get_sub_field('linked_in'))) { ?><a
                                            href="<?PHP echo get_sub_field('linked_in'); ?>" target="_blank"
                                            class="item_linked_in"><i class="wicon-linked-in"></i></a>
                                        <?PHP } ?>
                                        <?PHP if(!empty(get_sub_field('rss'))) { ?><a
                                            href="<?PHP echo get_sub_field('rss'); ?>" target="_blank"
                                            class="item_rss"><i class="wicon-rss"></i></a>
                                        <?PHP } ?>
                                    </div>
                                </div>
                            </div>
                            <?PHP
                                    }
                                    echo '</div></div>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- end content container -->
    <!--</div>
<div class="container-fluid">-->
    <?PHP get_footer(); ?>