<?php
/**
 * Single Product Up-Sells
 *
 */

global $product;

$upsells = $product->get_upsell_ids();

$args = array(
	'post_type' => 'product',
	'post_status' => 'publish',
	'posts_per_page' => 5,
	'order' => 'DESC',
	'post__in' => $upsells,
);

$field_lang = strtolower(ICL_LANGUAGE_CODE);
if($field_lang == 'en') {
	$field_lang = '';
} else {
	$field_lang = '_'.$field_lang;
}

$uppsells_items = new WP_Query( $args );

if($uppsells_items->have_posts()) { ?>
<section class="uppsells_products">
    <div class="swiper related-products--wrapper container">

        <div class="section_title">
            <?PHP _e('Also Try These Products'); ?>
        </div>
        <div class="swiper-wrapper related-products_slider related_products_list">

            <?PHP while($uppsells_items->have_posts()) {
				$uppsells_items->the_post();
			?>

            <a href="<?PHP echo get_the_permalink(); ?>"
                class="swiper-slide related-products-list__item product-post presses_item">
                <div class="image_item product-post__img">
                    <?PHP echo get_the_post_thumbnail(get_the_ID(), array(300, 210)); ?>
                </div>
                <div class="content_part">
                    <h3 class="product-post__title">
                        <?PHP echo get_the_title(); ?>
                    </h3>
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
            <?PHP
				}
				?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>
<?PHP } ?>

<?PHP wp_reset_query();