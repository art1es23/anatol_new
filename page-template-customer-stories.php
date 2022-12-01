<?php
/* Template Name: Customer Stories */
global $post, $default_post;
$post = $default_post = get_page_by_path('customer-stories', OBJECT, 'page');
if(!empty($post->ID)) {
	$id = icl_object_id($post->ID, 'page', false,ICL_LANGUAGE_CODE);
	if(!empty($id)) {
		$post = $default_post = get_post($id);
	}
}
get_header(); ?>

<style>
<?php include 'css/page-templates/page-customer-stories/page-customer-stories.css';
?>
</style>

<?php get_template_part('template-parts/template-part-head-bg-black'); ?>

<!-- <div class="clear clearfix"></div> -->
</div>
<div class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <section class="c-stories" id="c-stories">
                        <?php
						$query = new WP_Query(array(
							'post_type' 		=> 'customer-stories',
							'post_status' 		=> 'publish',
							'posts_per_page' 	=> -1,
							'orderby'			=> 'date',
							'order'				=> 'DESC'
						));
						$i = 0;
						$columns = 2;
						$crnt = new DateTime();
						$previous = $crnt->format("Y");

						if($query->have_posts()) {
							?>
                        <div class="ideaboxTimeline it-dark" id="i-timeline">
                            <div class="it-spine"></div>
                            <?php
								while($query->have_posts()) {
									$query->the_post();
									$current = date("Y", strtotime(get_the_date('Y-m-d H:i:s')));
									if ($current != $previous) {
										//echo '<div class="it-minibox"><span>' . $current . '</span></div>';
									}
									$previous = $current;

									?>
                            <div class="it-box">
                                <div class="it-content">
                                    <div
                                        class="it_header_part <?php if (!empty(get_field('wpcf-video'))) { echo 'has_video'; } ?>">
                                        <?php if (!empty(get_the_title()) && !empty(get_field('wpcf-companyname'))) {?>
                                        <a href="<?=get_the_permalink()?>"><?=get_the_title()?></a>,
                                        <?=get_field('wpcf-companyname')?>
                                        <?php } elseif(!empty(get_the_title())) { ?>
                                        <a href="<?=get_the_permalink()?>"><?=get_the_title()?></a>
                                        <?php } elseif(!empty(get_field('wpcf-companyname'))) { ?>
                                        <?=get_field('wpcf-companyname')?>
                                        <?php } ?>
                                        <div class="header_thumb">
                                            <?php if ( has_post_thumbnail() ) {
														the_post_thumbnail();
													} ?>
                                        </div>
                                    </div>
                                    <div class="it_content_part">
                                        <?php if (get_field('wpcf-quote')) : ?>
                                        <blockquote class="uk-text-left ocm-tstuff">
                                            <?php echo get_field('wpcf-quote'); ?>
                                            <div style="clear:both;"></div>
                                        </blockquote>
                                        <?php endif; ?>
                                        <a class="details_link"
                                            href="<?=get_the_permalink()?>"><?php _e('DETAILS'); ?></a>
                                    </div>
                                    <div class="it_footer_part">
                                        <?php
												$products = get_field('product');
												if (!empty($products)) { ?>
                                        <i class="uk-icon-cubes"></i> <?php
													$links = array();
													foreach($products as $product) {
														$links[] = '<a href="'.get_permalink($product).'">'.get_the_title($product).'</a>';
													}
													echo implode(',', $links);
													?>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="it-iconbox">
                                    <span></span>
                                </div>
                            </div>
                            <?php
								}
								?>
                        </div><?php
							}
							?>
                    </section>



                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid full_bottom_container">
    <!--
		<div class="row ofices_row">
			<?php //get_template_part('template-parts/widgets/offices'); ?>
		</div>
-->
    <?php get_footer(); ?>

    <!-- <script>
    <?php include 'js/modules/chosen.jquery.min.js';
        include '/js/libs/ideaboxTimeLine/ideaboxTimeline.js'
        ?>
    </script> -->