<?php
/**
 * Related Products
 *
 */

$custom_taxterms = wp_get_object_terms( $post->ID, 'product_cat', array('fields' => 'ids') );
$args = array(
	'post_type' => 'product',
	'post_status' => 'publish',
	'posts_per_page' => 10,
	'order' => 'DESC',
	'tax_query' => array(
		array(
			'taxonomy' => 'product_cat',
			'field' => 'id',
			'terms' => $custom_taxterms
		)
	),
	'post__not_in' => array ($post->ID),
);

$related_items = new WP_Query( $args );

$field_lang = strtolower(ICL_LANGUAGE_CODE);
if($field_lang == 'en') {
	$field_lang = '';
} else {
	$field_lang = '_'.$field_lang;
}

if($related_items->have_posts()) { ?>
<div class="swiper related-products--wrapper related_products">
    <div class="section_title">
        <?PHP _e('Related Products'); ?>
    </div>
    <div class="swiper-wrapper related-products_slider related_products_list">

        <?PHP while($related_items->have_posts()) {
			$related_items->the_post();
		?>
        <a href="<?PHP echo get_the_permalink(); ?>"
            class="swiper-slide related-products-list__item product-post presses_item">

            <div class="image_part">
                <?PHP echo get_the_post_thumbnail(get_the_ID(), array(300, 210)); ?>
            </div>

            <div class="content_part">
                <div class="product-post__title">
                    <?PHP echo get_the_title(); ?>
                </div>

                <span class="product-post__price">
                    <?php
						$price = get_post_meta( get_the_ID(), '_regular_price', true);
						$sale = get_post_meta( get_the_ID(), '_price', true); 
						if (!empty($sale)){
							echo '$';
							echo $sale;
						} else {
							echo '$';
							echo $price;
						}
					?>
                </span>
            </div>
            <div class="button link_to_item">Add to Cart</div>
        </a>
        <?PHP } ?>
    </div>
    <div class="swiper-pagination"></div>
</div>
<?PHP } else {
	?>
<div class="related_disabled_products" style="padding-top:20px; background:#fafafa; margin-bottom:30px"></div>
<?PHP
} ?>

<?PHP wp_reset_query();