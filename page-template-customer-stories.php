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

</div>

<section class="c-stories" id="c-stories">
    <div class="it-spine"></div>

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
    <div class="container c-stories--wrapper" id="i-timeline">
        <?php
            while($query->have_posts()) {
                $query->the_post();
                $current = date("Y", strtotime(get_the_date('Y-m-d H:i:s')));
                $previous = $current;
        ?>

        <div class="c-stories__item c-story-post--wrapper">
            <div class="c-story-post">

                <div class="c-story-post__header <?php if (!empty(get_field('wpcf-video'))) { echo 'has_video'; } ?>">
                    <?php if (!empty(get_the_title()) && !empty(get_field('wpcf-companyname'))) {?>

                    <a href="<?=get_the_permalink()?>"><?=get_the_title()?></a>
                    <span>, <?=get_field('wpcf-companyname')?></span>

                    <?php } elseif(!empty(get_the_title())) { ?>
                    <a href="<?=get_the_permalink()?>"><?=get_the_title()?></a>

                    <?php } elseif(!empty(get_field('wpcf-companyname'))) { ?>
                    <?=get_field('wpcf-companyname')?>
                    <?php } ?>

                    <div class="header_thumb">
                        <?php 
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail();
                        } ?>
                    </div>
                </div>

                <div class="c-story-post__content">
                    <?php if (get_field('wpcf-quote')) : ?>

                    <blockquote class="uk-text-left ocm-tstuff">
                        <?php echo get_field('wpcf-quote'); ?>
                        <!-- <div style="clear:both;"></div> -->
                    </blockquote>

                    <?php endif; ?>
                    <a class="details_link" href="<?=get_the_permalink()?>"><?php _e('DETAILS'); ?></a>
                </div>

                <div class="c-story-post__footer">
                    <?php
                        $products = get_field('product');
                        if (!empty($products)) { 
                    ?>

                    <!-- <i class="uk-icon-cubes"></i> -->

                    <?php
                        $links = array();
                        foreach($products as $product) {
                            $links[] = '<a href="'.get_permalink($product).'">'.get_the_title($product).'</a>';
                        }
                        echo implode(', ', $links);
                    ?>
                    <?php } ?>
                </div>
            </div>
            <!-- <div class="it-iconbox"> -->
            <span class="it-iconbox"></span>
            <!-- </div> -->
        </div>
        <?php } ?>
    </div>
    <?php } ?>
    <!-- </div> -->
</section>



<!-- </div> -->

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