<?php
/* Template Name: Press Single */

	get_header(); ?>

<?php get_template_part('template-parts/template-part-head-press'); ?>

<div class="single_equipment">
	<section class="equipment_info">
        <div class="container">
		<!--
                	<div class="equipment_head">					
                        <h1><?php echo get_the_title(); ?></h1>
					</div>-->
                	<div class="flex_half">
                    	<div class="half_left">
							<?php get_template_part('templates/equipment/single-parts/thumbnails'); ?>
							<?php $enable_new_product_ico = get_field('enable_new_product_ico');
                            if(get_field('enable_new_product_ico') === true ) {?>
                                    <div class="sticker_new">NEW</div>									
								<?php
                            } else { ?>  <?php } ?>							
							<?php
                            $enable_price_off_ico = get_field('enable_price_off_ico');
                            if(get_field('enable_price_off_ico') === true ) {?>
                                    <div class="sticker_price_off">15% off</div>								
								<?php
                            } else { ?> <?php } ?>
							<?php
                            $enable_no_air_compressor_required = get_field('enable_no_air_compressor_required');
                            if(get_field('enable_no_air_compressor_required') === true ) {?>
                                    <div class="sticker_no_air_compressor"></div>									
								<?php
                            } else { ?>
							<?php } ?>							
                        </div>
                    	<div class="half_right">
                        	<div class="equipment_right_info">
							   <div class="short_info">
							   <!--
                                	<?php
									$sidedescription = '';
									if(!empty(get_field('single_short_description'))) {
										$sidedescription = get_field('single_short_description');
									} elseif(!empty(get_field('wpcf-sidedescription'))) {
										$sidedescription = get_field('wpcf-sidedescription');
										$sidedescription = str_replace("\n",'',$sidedescription);
										$sidedescription = getTextBetweenTags($sidedescription, 'blockquote');
									}
									if(!empty($sidedescription)) {
										?><div class="desc"> <?php the_field('short_description'); ?></div><?php
									} ?>
									
									-->
									<div class="desc"> <?php the_field('short_description'); ?></div>
									
									<div class="block_buttons">
										<div class="get_a_quote button red-button draw-red"><?php _e('Get a Quote', 'anatol'); ?></div>
									</div>	

							<?php $full_price = get_field('eq_full_price'); if( !empty($full_price) ): ?>
								<?php 
 									global $user_ip, $user_country, $SxGeo;
									require_once( trailingslashit( get_stylesheet_directory() ) . 'SxGeo.php' );
									$SxGeo = new SxGeo( trailingslashit( get_stylesheet_directory() ) . 'SxGeo.dat' );
									if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
    									$user_ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
									} else {
    									$user_ip = $_SERVER['REMOTE_ADDR'];
									}
									$user_country = $SxGeo->getCountry($user_ip);
 								?>
 							<?php if ($user_country === 'US') { ?>
								<div id="monthly_payment" class="monthly_payment CIT-widget cit-widget-inline-button" cit-data-amount="<?php echo $full_price;?>" cit-data-new-tab="1">
									<a href="https://anatolequipment.directcapital.com" class="CIT-button--link" target="_blank">Business Financing Available</a>
								</div>												
 							<?php } ?>
								<?php if( get_field('payment_term_new') ): ?>
									<div class="more_cit_info" style="display: none;"><?php the_field('payment_term_new'); ?></div>
								<?php endif; ?>
								<?php endif; ?>
                        <div class="action_buttons">
										<span class="s_helpers"></span>
										<?php if(has_term(array('presses-en', 'presses-polish', 'presses-russian', 'presses-spanish'), 'anatol-products_cat')) {
											$compare_page_id = icl_object_id(1872, 'page', false,ICL_LANGUAGE_CODE);
											?><a href="<?=get_permalink($compare_page_id);?>" class="ab_compare"><div class="ab_i_w1"><div class="ab_i_w2"><span class="ab_icon"></span></div></div><?php _e('Compare'); ?></a>
                                            <span class="ab_separator"></span>
											<?php } ?>
											
							<?php 
								$download_brochure	= get_field('brochure');

							if(!empty($download_brochure)) {?>
								<a href="<?php echo $download_brochure['url']; ?>" class="download_bro" target="_blank">
											<div class="ab_i_w1"><div class="ab_i_w2"><span class="ab_icon"></span></div></div><?php _e('Download Brochure', 'anatol'); ?></a>
                                        <span class="ab_separator"></span>
                            <?php } ?>
										
                                        <a href="/where-to-buy" class="where_to_buy"><div class="ab_i_w1"><div class="ab_i_w2"><span class="ab_icon"></span></div></div><?php _e('Where to buy', 'anatol'); ?></a>
										
                                   
									     <span class="ab_separator"></span>
											
                                        <a class="ab_rq_demo" href="/request-a-demo/" target="_blank"><div class="ab_i_w1"><div class="ab_i_w2"><span class="ab_icon"></span></div></div><?php _e('Request a Live Demo', 'anatol'); ?></a>
													 <span class="s_helpers"></span>
                                        <!--<span class="ab_separator"></span>
										
                                        <a href="tel:8473679760" class="ab_call_us"><div class="ab_i_w1"><div class="ab_i_w2"><span class="ab_icon"></span></div></div><?php _e('Сall us'); ?></a><span class="s_helpers"></span>
                                   -->
								   </div>


                                </div>
                            </div>
                        </div>
                    
					</div>
                </div>
				
				
    </section>

<?php get_template_part('templates/equipment/single-parts/tabs_content'); ?>

<?php
    $term_list = wp_get_post_terms(get_the_ID(), 'anatol-products_cat', array("fields" => "all"));
    $cat_id = 0;
    if(!empty($term_list)) {
        foreach($term_list as $term) {
            /*if($cat_id == 0) {
                $cat_id = $term->term_id;
            }*/

            if(!empty($term->parent)) {
                $cat_id = $term->term_id;
            }
        }
    }
	if(!empty($cat_id)) {
		$args = array(
			'post_type'		=> array('anatol-products-conv', 'anatol-products-acce', 'anatol-products-flas', 'anatol-products-pre-', 'anatol-products-pres'),
			'post__not_in'	=> array(get_the_ID()),
			'tax_query'		=> array(
				array(
					'taxonomy' => 'anatol-products_cat',
					'field' => 'term_id',
					'terms' => $cat_id
				)
			)
		);
		$query = new WP_Query( $args );
		if($query->have_posts()) {
			$related_cat_title = '';
			switch( $cat_id ){
				case 3: $related_cat_title = __('Vector Models'); break;
				case 17: $related_cat_title = __('Titan Models'); break;
				case 239: $related_cat_title = __('VOLT Models'); break;
				default: $related_cat_title = __('Related Products');
			}
			?>
			<!--<section class="related_products">
				<div class="container">
				
					<div class="section_title no_bottom_line"><?php echo $related_cat_title; // _e('Related Products');  ?></div>
							<div class="related_products_slider equipments_list">
								<?php
								while($query->have_posts()) {
									$query->the_post();
									?>
									<div class="rp_slide_item" data-aos="zoom-in-down">
										<a href="<?=get_permalink();?>" class="">
											<div class="image_part">
												<?php echo get_the_post_thumbnail(get_the_ID(), array(300, 210)); ?>
											</div>
											<div class="content_part">
												<div class="c_icon">
													<div class="c_default"></div>
												</div>
												<div class="equipment_box_title"><?php echo get_the_title(); ?></div>
												<?php
												$sidedescription = '';
												if(!empty(get_field('list_short_description'))) {
													$sidedescription = get_field('list_short_description');
												} elseif(!empty(get_field('wpcf-sidedescription'))) {
													$sidedescription = get_field('wpcf-sidedescription');
													$sidedescription = preg_replace("/<blockquote.*?>.*?<\/blockquote>/im","$1",str_replace("\n",'',$sidedescription));
												}
												if(!empty($sidedescription)) {
													?><blockquote><?php echo $sidedescription; ?></blockquote><?php
												} ?>
											</div>
										</a>
									</div>
									<?php
								}
								?>
								
					</div>
				</div>
			</section>-->
		<?php
		}
		wp_reset_query();
	}
 ?>



<?php
    $term_list = wp_get_post_terms(get_the_ID(), 'anatol-products_cat', array("fields" => "all"));
    $cat_id = 0;
		if(!empty($term_list)) {
			foreach($term_list as $term) {
				if(empty($term->parent)) {
					$cat_id = $term->term_id;
				}
			}
		}
?>





<?php
$featured_posts = get_field('similar_items');
if( $featured_posts ): ?>


			<section class="related_products">
				<div class="container">
				
					<div class="section_title no_bottom_line"><?php _e('RELATED PRODUCTS', 'anatol'); ?></div>
							<div class="related_products_slider equipments_list">
    <?php foreach( $featured_posts as $post ): 

        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post); ?>

									<div class="rp_slide_item">
										<a href="<?=get_permalink();?>" class="">
											<div class="image_part">
												<?php echo get_the_post_thumbnail(get_the_ID(), array(300, 210)); ?>
											</div>
											<div class="content_part">
												<div class="c_icon">
													<div class="c_default"></div>
												</div>
												<div class="equipment_box_title"><?php echo get_the_title(); ?></div>
												
											</div>
										</a>
									</div>
    <?php endforeach; ?>
								
					</div>
				</div>
			</section>
    <?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
<?php endif; ?>



</div>



<?php get_template_part('templates/equipment/another-equipments'); ?>
<!--------Request Service Form----------------->

<div class="fancybox-hidden" style="display: none;">
    <div id="my-id">
		<div class="cf7_popup">
		<?PHP
		if(ICL_LANGUAGE_CODE == 'ru') {
		  echo '<div class="box_title">Форма регистрации продукции и гарантии</div>';
		  echo do_shortcode('[contact-form-7 id="2177" title="Форма регистрации продукции и гарантии"]');
		} elseif(ICL_LANGUAGE_CODE == 'pl') {
		  echo '<div class="box_title">Produkty i gwarancja Formularz rejestracyjny</div>';
		  echo do_shortcode('[contact-form-7 id="2176" title="Produkty i gwarancja Formularz rejestracyjny"]');
		} elseif(ICL_LANGUAGE_CODE == 'es') {
		  echo '<div class="box_title">Formulario de registro de productos y garantía</div>';
		  echo do_shortcode('[contact-form-7 id="2175" title="Formulario de registro de productos y garantía"]');
		} else {
		  echo '<div class="box_title">Products & Warranty Registration Form</div>';
		  echo do_shortcode('[contact-form-7 id="2174" title="Products & Warranty Registration Form"]');
		}
		?>
		</div>
	</div>
</div>
	
<?php include 'templates/forms/register-warranty.php' ; ?>



<?php get_footer(); ?>
<script>

    // ************************************************************** mainpage caterpillar

</script>