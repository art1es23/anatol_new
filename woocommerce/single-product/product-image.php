<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $woocommerce, $product;

?>

<div class="images">
    <?php do_action( 'woocommerce_product_thumbnails' ); ?>
    <div class="ql_main_image_column_wrap">
        <div class="ql_main_image_column" data-columns="<?php echo esc_attr( $columns ); ?>">
            <div class="ql_main_images woocommerce-product-gallery__wrapper">
                <?php
			if ( has_post_thumbnail() ) {

			$image_title 	= esc_attr( get_the_title( ) );
			$image_caption 	= get_post( get_post_thumbnail_id() )->post_excerpt;
			$image_link  	= wp_get_attachment_url( get_post_thumbnail_id() );
			$image       	= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
				'title'	=> $image_title,
				'alt'	=> $image_title,
				'id' => 'img_thumb_main'
				) );

			$attachment_count = count( $product->get_gallery_attachment_ids() );

			if ( $attachment_count > 0 ) {
				$gallery = '[product-gallery]';
			} else {
				$gallery = '';
			}

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" data-fancybox="product-images" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto' . $gallery . '">%s</a>', $image_link, $image_caption, $image ), $post->ID );

		} else {

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img loading="lazy" class="lozad" src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'woocommerce' ) ), $post->ID );

		}
	
			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id );


			//Add the rest of the images
			$attachment_ids = $product->get_gallery_image_ids();

			if ( $attachment_ids ) {
				foreach ( $attachment_ids as $attachment_id ) {
					$html  = wc_get_gallery_image_html( $attachment_id, true );
					echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id );
					
				}
			}
			?>
            </div>
        </div>
    </div>
</div>

<div id="modalImg" class="modal-img-wrapper hidden">
    <button class="close-button">
        <div class="close-button--wrapper">
            <span class="close-button__item close-button__item--top"></span>
            <span class="close-button__item close-button__item--bottom"></span>
        </div>
    </button>

    <span></span>

    <div class="modal-img-content">
        <img class="modal-img" src="" id="img_thumb_modal">
    </div>

</div>

<script>
const modalWrapper = document.getElementById('modalImg');
const mainImg = document.getElementById('img_thumb_main');
const modalImg = document.getElementById('img_thumb_modal');
const closeButton = modalWrapper.querySelector('.close-button');


mainImg.addEventListener('click', e => {
    e.preventDefault();

    document.documentElement.classList.add('overflow--hidden');
    modalImg.src = mainImg.src;
    modalWrapper.classList.toggle('hidden');
});

modalWrapper.addEventListener('click', e => {
    e.preventDefault();
    if (e.target === modalWrapper) {
        document.documentElement.classList.remove('overflow--hidden');
        modalWrapper.classList.add('hidden');
    }
});

closeButton.addEventListener('click', e => {
    e.preventDefault();

    document.documentElement.classList.remove("overflow--hidden");
    modalWrapper.classList.toggle("hidden");
})
</script>