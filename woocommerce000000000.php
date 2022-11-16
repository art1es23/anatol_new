<?php
/* Template Name: Сторінка магазину*/
get_header(); 
?>

<div class="page-wrap woo_page_satalog">
    <div class="container">
        <div class="page-content-woo">
            <div class="entry woocommerce">
                <?php woocommerce_content(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>