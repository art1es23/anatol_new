<?PHP
get_header(); ?>
<?PHP get_template_part('template-parts/template-part-head-press'); ?>


<div class="woo_container">
    <div class="woo_container--wrapper container">
        <div
            class="products_content <?php if ( is_shop() ) { ?>category_cont <?php } else { echo 'single_pr_cont'; } ?>	">
            <div class="product_sidebar">
                <div class="widget-mob-search">
                    <?php dynamic_sidebar('bproduct-sidebar'); ?>
                    <div class="filt-content">
                        <span class="more-info">Show filter</span>
                        <div class="more-content" style="display: none;">
                            <?php dynamic_sidebar('mfproduct-sidebar'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 prtfilter_box">
                    <?php do_action( 'woocommerce_sidebar' ); ?>
                </div>
            </div>
            <div class="product_content_row">
                <div class="prtfilter_box_right">
                    <div class="entry woocommerce">
                        <?php woocommerce_content(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="wc-term-description">
            <div class="page_title_text"><?php do_action( 'woocommerce_archive_description' ); ?></div>
        </div>
    </div>
</div>

<!--
	<div class="container dmbs-container acat_wc">
		<div class="row dmbs-content">
			<div class="col-md-12">
				<div class="section2_icon type_baket"></div>
				<div class="section_title">Try other categories</div>
				<div class="equipments_list categories_list_wc more_cats">
					<?PHP
					if(property_exists(get_queried_object(), 'term_id')){
						$cateID = get_queried_object()->term_id;
					}else{
						$cateID = '';
					}

					$args = array(
						'type'                     => 'product',
						'child_of'                 => 0,
						'parent'                   => '',
						'orderby'                  => 'ID',
						'hide_empty'               => 0,
						'hierarchical'             => 1,
						'exclude'                  => '224,'.$cateID.'',
						'include'                  => '',
						'number'                   => '3',
						'taxonomy'                 => 'product_cat',
						'pad_counts'               => false
					);

					$categories = get_categories($args);
					foreach ($categories as $category) {
						$cat_name = $category->name;
						$cat_slug = $category->slug;
						$cat_id = $category->term_id;
						$thumbnail_id = get_woocommerce_term_meta( $cat_id, 'thumbnail_id', true );
						$image = wp_get_attachment_url( $thumbnail_id );
						$term_link = get_term_link($cat_id,'product_cat');
						?>
						<a href="<?PHP echo $term_link; ?>" class="equipment_item press_search_item" data-aos="zoom-in-down">
							<div class="image_part">
								<?PHP echo '<img loading="lazy" class="lozad" src="'.$image.'" alt="'.$cat_name.'" />' ?>
							</div>
							<div class="content_part">
								<div class="c_icon">
									<div class="c_default"></div>
								</div>
								<div class="equipment_box_title"><?PHP echo $cat_name; ?></div>
								<div class="equipment_box_cat">
									<span class="title type_wc">View more</span>
								</div>
							</div>
						</a>
						<?PHP  } ?>
					</div>
				</div>
			</div>
		</div>

-->
<section class="another_equipment fix-bg">
    <div class="container">
        <div class="section_title regional-offices-title">You may also be interested</div>
    </div>
    <?php get_template_part('templates/equipment/another-equipments'); ?>
</section>

<?PHP get_footer();?>