<?php
/* Template Name: Press Home */

get_header(); ?>
<style>
<?php include 'css/components/hero-templates/hero-template.css';
?>
</style>

<?php get_template_part('template-parts/template-part-head-part1'); ?>
<div class="simple_bg_head">
    <?php get_template_part('template-parts/template-part-head-part2'); ?>
    <div class="clear clearfix"></div>

</div>
<div class="container-fluid">
    <div class="row">
        <section class="compare_content" id="compare_content">
            <div class="container">
                <div class="row compare_content_row">
                    <div class="col-md-12">

                        <?php get_template_part('template-parts/press_form'); ?>
                        <?php
						if (isset($_POST['show_results'])) {
							get_template_part('template-parts/press_results');
						} else {
							get_template_part('template-parts/press_cats');
						} ?>
                    </div>
                    <div class="col-xs-12">
                        <?php if (!empty(get_field('title_text'))) {
							echo '<div class="page_title_text">' . get_field('title_text') . '</div>';
						} ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>


<?php get_footer(); ?>