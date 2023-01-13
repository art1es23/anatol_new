<?php
/* Template Name: Presses old NEW*/
get_header(); ?>

<style>
<?php // include locate_template('css/components/hero-templates/hero-template.css');
include locate_template('css/components/presses-item.css');
include locate_template('css/page-templates/page-presses/presses-content.css');
include locate_template('css/components/automatic-presses.css');
include locate_template('css/page-templates/page-presses/manual-presses.css');
include locate_template('css/page-templates/page-presses/specialty-automatic-presses.css');
?>
</style>

<?php get_template_part('templates/components/hero-templates/template-part-head-bg-black'); ?>
<!-- <?php //get_template_part('template-parts/template-part-head-pr'); ?> -->

<section class="presses_content" id="presses_content">

    <div class="presses_content--wrapper container">
        <div class="presses_item">
            <a href="#automatic-presses" class="linkskroll equipment_item">
                <div class="image_item">
                    <img loading="lazy" class="lozad" width="385" height="257"
                        src="/wp-content/uploads/2019/10/Volt-2.jpg"
                        alt="Image of the section of Automatic screen prints">
                </div>

                <div class="content_part">
                    <div class="equipment_title">Automatic Presses</div>
                </div>
            </a>

            <a href="#automatic-presses" class="linkskroll link_to_item button"
                tabindex="0"><?php _e('Learn More', 'anatol'); ?></a>
        </div>

        <div class="presses_item">
            <a href="#manual-presses" class="linkskroll equipment_item">
                <div class="image_item">
                    <img loading="lazy" class="lozad" width="385" height="257"
                        src="/wp-content/uploads/2016/04/thunder_002.jpg"
                        alt="Image of the section of Specially screen prints" />
                </div>

                <div class="content_part">
                    <div class="equipment_title">Manual Presses</div>
                </div>
            </a>

            <a href="#manual-presses" class="link_to_item button" tabindex="0"><?php _e('Learn More', 'anatol'); ?></a>
        </div>

        <div class="presses_item">
            <a href="#specialty-automatic-presses" class="linkskroll equipment_item">
                <div class="image_item">
                    <img loading="lazy" class="lozad" width="385" height="257"
                        src="https://anatol.com/wp-content/uploads/2016/04/PRODIGY.jpg"
                        alt="Image of the section of Manually screen prints" />
                </div>

                <div class="content_part">
                    <div class="equipment_title">Specialty Automatic Presses</div>
                </div>
            </a>

            <a href="#specialty-automatic-presses" class="link_to_item button"
                tabindex="0"><?php _e('Learn More', 'anatol'); ?></a>
        </div>
    </div>
</section>

<section class="automatic_presses section_presses white_text" id="automatic-presses">
    <div class="swiper automatic_presses--wrapper container">
        <div class="section_title">Automatic Presses</div>
        <div class="swiper-wrapper presses_content_row presses_content_row_slider">
            <?php
                $args = array(
                'post_type' => 'anatol-products-pres',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'anatol-products_cat',
                        'field' => 'slug',
                        'terms' => 'automatic',
                        'include_children' => false
                    ))
                );
                $posts= get_posts( $args );
                if ($posts) {
                    foreach ( $posts as $post ) {
                        setup_postdata($post);
                    ?>

            <div class="swiper-slide presses_item">
                <div class="image_item">
                    <a href="<?= get_permalink(); ?>" class="equipment_item">
                        <?PHP echo get_the_post_thumbnail($item, array(300, 210)); ?>
                    </a>
                    <?php
                        $enable_new_product_ico = get_field('enable_no_air_compressor_required');
                        if(get_field('enable_no_air_compressor_required') === true ) {?>
                    <div class="sticker_no_air_compressor"></div>
                    <?php
                        } else {} ?>
                </div>

                <div class="content_part">
                    <a href="<?= get_permalink(); ?>" class="equipment_item">
                        <div class="equipment_title"><?php echo get_the_title(); ?></div>
                    </a>
                    <?PHP if(!empty(get_sub_field('description'))) { ?>
                    <blockquote>
                        <?PHP echo get_sub_field('description'); ?>
                    </blockquote>
                    <?PHP } ?>
                </div>

                <a href="<?= get_permalink(); ?>" class="link_to_item button"
                    tabindex="0"><?php _e('Learn More', 'anatol'); ?></a>
            </div>
            <?php	    }
			}
			?>
        </div>
        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</section>

<section class="manual-presses section_presses" id="manual-presses">
    <div class="manual-presses--wrapper container">
        <div class="section-presses_title section_title">Manual Presses</div>
        <!-- <div class="presses_content_row"> -->
        <?php
			$args = array(
			'post_type' => 'anatol-products-pres',
				'tax_query' => array(
					array(
						'taxonomy' => 'anatol-products_cat',
						'field' => 'slug',
						'terms' => 'manual-presses',
						'include_children' => false
					)));

			$posts= get_posts( $args );

			if ($posts) {
				foreach ( $posts as $post ) {
					setup_postdata($post);
		?>
        <div class="presses_item">
            <div class="image_item">
                <a href="<?= get_permalink(); ?>" class="equipment_item">
                    <?PHP echo get_the_post_thumbnail($item, array(300, 210)); ?>
                </a>

                <?php
						$enable_new_product_ico = get_sub_field('enable_no_air_compressor_required');

						if(get_sub_field('enable_no_air_compressor_required') === true ) {?>
                <div class="sticker_no_air_compressor"></div>

                <?php } else { ?>
                <?php } ?>
            </div>

            <div class="content_part">
                <a href="<?= get_permalink(); ?>" class="equipment_item">
                    <div class="equipment_title"><?php echo get_the_title(); ?></div>
                </a>

                <?PHP if(!empty(get_sub_field('description'))) { ?>
                <blockquote>
                    <?PHP echo get_sub_field('description'); ?>
                </blockquote>
                <?PHP } ?>
            </div>

            <!-- <div class="link_to_item"> -->
            <a href="<?= get_permalink(); ?>" class="link_to_item button"
                tabindex="0"><?php _e('Learn More', 'anatol'); ?></a>
            <!-- </div> -->
        </div>

        <?php }}?>
        <!-- </div> -->
    </div>
</section>

<section class="specialty-automatic-presses section_presses fix-bg white_text" id="specialty-automatic-presses">
    <div class="specialty-automatic-presses--wrapper container">
        <div class="section-presses_title section_title"> Specialty Automatic Presses</div>
        <!-- <div class="presses_content_row"> -->
        <?php
			$args = array(

			'post_type' => 'anatol-products-pres',
				'tax_query' => array(
					array(
					'taxonomy' => 'anatol-products_cat',
					'field' => 'slug',
					'terms' => 'specialty-automatic-presses',
					'include_children' => false
					)
				));

			$posts= get_posts( $args );
			if ($posts) {
				foreach ( $posts as $post ) {
					setup_postdata($post);
		?>

        <div class="presses_item">
            <div class="image_item">
                <?PHP echo get_the_post_thumbnail($item, array(300, 210)); ?>
                <?php
						$enable_new_product_ico = get_field('enable_no_air_compressor_required');
						if(get_field('enable_no_air_compressor_required') === true ) {?>
                <div class="sticker_no_air_compressor"></div>
                <?php } else { ?>
                <?php } ?>
            </div>

            <div class="content_part">
                <a href="<?= get_permalink(); ?>" class="equipment_item">
                    <div class="equipment_title"><?php echo get_the_title(); ?></div>
                </a>

                <?PHP if(!empty(get_sub_field('description'))) { ?>
                <blockquote>
                    <?PHP echo get_sub_field('description'); ?>
                </blockquote>
                <?PHP } ?>
            </div>

            <!-- <div class="link_to_item"> -->
            <a href="<?= get_permalink(); ?>" class="link_to_item button"
                tabindex="0"><?php _e('Learn More', 'anatol'); ?></a>
            <!-- </div> -->
        </div>

        <?php }}?>
        <!-- </div> -->
    </div>
</section>

<!-- <section class="compare_content" id="compare_content">
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="row compare_content_row">
                    <div class="col-xs-12">
                        <?php if (!empty(get_field('title_text'))) {
							echo '<div class="page_title_text">' . get_field('title_text') . '</div>';
						} ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<script>
$(document).ready(function() {

    $(".presses_item").on("click", "a.linkskroll", function(event) {
        event.preventDefault();

        var id = $(this).attr('href'),
            top = $(id).offset().top - ($('#header').height());

        $('body, html').animate({
            scrollTop: top
        }, 1500);
    });

    if (window.location.hash) {
        $('html, body').animate({
            scrollTop: $(window.location.hash).offset().top - ($('#header').height())
        }, 1000);

        history.replaceState({}, document.title, window.location.href.split('#')[0]);
    }
});
</script>

<!-- Slider Init -->
<script defer src="<?php echo get_template_directory_uri();?>/js/libs/swiper/swiper-bundle.min.js"></script>
<script defer src="<?php echo get_template_directory_uri();?>/js/sliders-swiper.js"></script>

<?php get_footer(); ?>