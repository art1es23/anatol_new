<?PHP
/* Template Name: Categories Shop */

	get_header(); ?>

<style>
<?php include 'css/woocommerce.css';
?>
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
                        <!-- <div class="hide-sidebar"></div> -->
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
                            <?PHP } ?>
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
    <!-- <div class="row dmbs-content">



    </div> -->
</div>



<!-- end content container -->
<!--</div>
<div class="container-fluid">-->
<?PHP get_footer(); ?>