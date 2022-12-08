
		<div class="header-top-line">
				<div class="container">
					<div class="top-line-content">								
						<div class="header-contacts header_top_block">
                            <div class="top_phone"><a href="tel:+18473679760"><span class="icon-phone"></span>+1(847) 367-9760</a></div>
                        </div>
                        <div class="header_top_block header_top_block_r">
							<div class="header-social">
									<?php if(!empty(get_field('fsi_instagram', 'option'))) { ?><a href="<?php echo get_field('fsi_instagram', 'option'); ?>" target="_blank" class="soc_item soc_item_instagram"><span class="icon-instagram"></span></a><?php } ?>
									<?php if(!empty(get_field('fsi_facebook', 'option'))) { ?><a href="<?php echo get_field('fsi_facebook', 'option'); ?>" target="_blank" class="soc_item soc_item_facebook"><span class="icon-instagram"></span></a><?php } ?>
									<?php if(!empty(get_field('fsi_linked_in', 'option'))) { ?><a href="<?php echo get_field('fsi_linked_in', 'option'); ?>" target="_blank" class="soc_item soc_item_linkedin"><span class="icon-instagram"></span></i></a><?php } ?>
									<?php if(!empty(get_field('fsi_twitter', 'option'))) { ?><a href="<?php echo get_field('fsi_twitter', 'option'); ?>" target="_blank" class="soc_item soc_item_twitter"><span class="icon-instagram"></span></a><?php } ?>
									<a href="https://www.youtube.com/channel/UCcmF2LudDzC1MJyD2d7U2OA" target="_blank" class="soc_item soc_item_youtube soc_icon_top"><span class="icon-instagram"></span></i></a>
									<a href="https://www.tiktok.com/@anatolequipment" target="_blank" class="soc_item soc_item_tiktok soc_icon_top"><span class="icon-tiktok"></span></i></a>
							</div>						
							<div class="lang-header-menu">
								<div class="lang_swither"><div class="lang_swither_inner1"><?PHP echo language_selector_flags(); ?></div></div>
							</div>                         
                        </div>
					</div>
				</div>
		</div>	
<!--  -->
<div class="container-full head_part_container">
	<div class="col-md-12">
	
			<div class="row dmbs-header">
				<div class="col-md-12 header_logo_wrap">
					<div class="container">
						<div class="row dmbs-header">
							<?php if ( get_header_image() != '' ) : ?>
								<!--<div class="dmbs-header-img text-center">
									<a class="anatol-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
									<img src="<?php echo bloginfo('stylesheet_directory') ?>/images/anatol-logo-red.svg" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" title="Anatol Equipment Manufacturing Co." alt="Anatol Equipment Manufacturing Co." /></a>
                                    <?php if (is_woocommerce() || is_cart() || is_checkout()) { ?>
										<a href="<?php echo get_home_url(); ?>/cart/" class="header_cart_item"><span class="wicon-shopping-cart_2"></span></a>
									<?php } ?>
								</div>-->
							<?php endif; ?>
						</div>

                        <div class="micon">
                            <div class="menui top-menu"></div>
                            <div class="menui mid-menu"></div>
                            <div class="menui bottom-menu"></div>
                        </div>
					</div>
				</div>
			</div>
			
	</div>
</div>
<div class="container-fluid topnav-row">
	<?php get_template_part('template-parts/template-part-topnav'); ?>
</div>
<!--  -->
<div class="container-fluid">
	<div class="row">
		<?php
		global $post, $default_post;
		if(!empty($default_post)) {
			$post = $default_post;
		}
		if(!is_home() && ! is_front_page()) {
			if(!empty(get_field("header_image"))) {
				$image_info = get_field("header_image");
				$image_attributes = wp_get_attachment_image_src($image_info['id'], '1920x1000');
				echo '<div class="clear clearfix"></div><div class="header_image_wrap"><div class="header_image" style="background-image:url('.$image_attributes[0].');"></div></div>';
			}
		}
		?>
	</div>

</div>
