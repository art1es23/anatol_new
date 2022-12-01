<?PHP
/* Template Name: Categories Shop */

	get_header(); ?>

<style>
<?php include 'css/woocommerce.css';

?>
/* // .equipments_list {
//     width: 100%;
//     display: -webkit-flex;
//     display: flex;
//     -webkit-flex-wrap: wrap;
//     flex-wrap: wrap;
//     box-sizing: border-box;
//     justify-content: center;
//     gap: 1.5vw;
//     margin: 3vw auto;
// }

// .equipments_list .equipment_item {
//     width: calc((100% - 7vw) / 3);
//     padding: 1vw;
//     border: 3px solid #f4f4f4;
//     transition: all 0.3s;
// }

// .equipments_list .equipment_item a {
//     color: #363636;
// }

// .equipments_list .equipment_item .image_item {
//     max-height: 500px;
//     overflow: hidden;
//     will-change: tarnsform;
//     transition: all 0.5s;
//     position: relative;
// }

// .equipments_list .equipment_item .image_item img {
//     max-width: 100%;
//     height: 100%;
//     display: block;
//     margin: 0 auto;
//     max-width: inherit;
//     width: 100%;
//     will-change: tarnsform;
//     transition: all 0.5s;
//     background-color: white;
// }

// .equipments_list .equipment_item .equipment_title {
//     font-family: "Roboto Condensed", sans-serif;
//     font-weight: 700;
//     font-size: 28px;
//     margin: 10px 0;
//     text-align: center;
// }

// .equipments_list .equipment_item:hover {
//     box-shadow: 0 0 22px rgb(0 0 0 / 10%);
// }

// .equipments_list .equipment_item:hover .equipment_title {
//     color: #c12126;
// }

// .equipments_list .equipment_item:hover .image_item {
//     background: #000;
// }

// .equipments_list .equipment_item:hover .image_item img {
//     transform-origin: center;
//     transform: scale(1.03);
//     opacity: 0.9;
// }

// .woocommerce .link_to_item a,
// .link_to_item a {
//     font-weight: 500;
//     font-size: 14px;
//     line-height: 17px;
//     letter-spacing: 1px;
//     text-transform: uppercase;
//     color: #c12126;
//     padding: 10px 40px;
//     border: 1px solid #c12126;
//     transition: all 0.3s linear 0s;
//     -moz-transition: all 0.3s linear 0s;
//     -o-transition: all 0.3s linear 0s;
//     -webkit-transition: all 0.3s linear 0s;
//     -ms-transition: all 0.3s linear 0s;
// } */
</style>

<?PHP get_template_part('template-parts/template-part-head-bg'); ?>
<div class="simple_bg_head no_padding_b">
    <?PHP get_template_part('template-parts/template-part-head-part2'); ?>
    <!-- <div class="clear clearfix"></div> -->
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
                        <div class="equipments_list categories_list_wc template-shop">
                            <?PHP
									$args = array(
										'type'                     => 'product',
										'child_of'                 => 0,
										'parent'                   => '',
										'orderby'                  => 'ID',
										'hide_empty'               => 0,
										'hierarchical'             => 1,
										'exclude'                  => '224',
										'include'                  => '',
										'number'                   => '4',
										'taxonomy'                 => 'product_cat',
										'pad_counts'               => false );
									$categories = get_categories($args);
									foreach ($categories as $category) {
										$cat_name = $category->name;
										$cat_slug = $category->slug;
										$cat_id = $category->term_id;
										$thumbnail_id = get_woocommerce_term_meta( $cat_id, 'thumbnail_id', true );
										$image = wp_get_attachment_url( $thumbnail_id );
										$term_link = get_term_link($cat_id,'product_cat');
										?>
                            <a href="<?PHP echo $term_link; ?>" class="equipment_item press_search_item">
                                <div class="image_part">
                                    <?PHP echo '<img loading="lazy" class="lozad" src="'.$image.'" alt="'.$cat_name.'" />' ?>
                                </div>
                                <div class="content_part">
                                    <div class="c_icon">
                                        <div class="c_default"></div>
                                    </div>
                                    <div class="equipment_box_title">
                                        <?PHP echo $cat_name; ?>
                                    </div>
                                    <div class="equipment_box_cat">
                                        <span class="title type_wc">View</span>
                                    </div>
                                </div>
                            </a>
                            <?PHP  } ?>
                        </div>
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



<!-- end content container -->
<!--</div>
<div class="container-fluid">-->
<?PHP get_footer(); ?>