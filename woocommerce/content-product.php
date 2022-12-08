<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>


<a href="<?PHP echo get_the_permalink(); ?>" class="product_item press_search_item e_item_for_id_pr" >                
	<div class="image_part">
		<?PHP echo woocommerce_get_product_thumbnail(); ?>                    
	</div>           
	<div class="content_part">
	
		<div class="product_box_title"><?PHP the_title(); ?></div>
		<div class="product_box_cat">
			<?PHP wc_get_template_part( '/loop/sale-flash'); ?>
			<?PHP if ( $price_html = $product->get_price_html() ) : ?>
				<span class="price_wc"><?PHP echo $price_html; ?></span>
			<?PHP endif; ?>
		</div>              
		
		<div class="id_pr_number">
			ID # <?php the_ID(); ?>
		</div> 
		
	
	</div>
		<div class="add_to_cart">
			<?php _e('Add to Cart', 'anatol'); ?>
		</div> 
</a>
