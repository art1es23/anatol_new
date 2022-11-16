

						<div class="presses_item equipment_item anim_fade">							
								<a href="<?= get_permalink(); ?>" class="">                
								<div class="image_item"><?php
                            $enable_new_product_ico = get_field('enable_new_product_ico');
                            if(get_field('enable_new_product_ico') === true ) {?>
                                    <div class="sticker_new">NEW</div>									
								<?php
                            } else { ?>
							<?php
                            }
                            ?>
							<?php
                            $enable_price_off_ico = get_field('enable_price_off_ico');
                            if(get_field('enable_price_off_ico') === true ) {?>
                                    <div class="sticker_price_off">15% off </div>								
								<?php
                            } else { ?>
							<?php
                            }
                            ?>
							<?php
                            $enable_new_product_ico = get_field('enable_no_air_compressor_required');
                            if(get_field('enable_no_air_compressor_required') === true ) {?>
                                    <div class="sticker_no_air_compressor"></div>									
								<?php
                            } else { ?>
							<?php
                            }
                            ?>
									 <?php echo get_the_post_thumbnail(get_the_ID(), 'big'); ?>      							              
								</div></a>
								<div class="content_part">
									<a href="<?= get_permalink(); ?>" class="">
									<div class="equipment_title"><?php echo get_the_title(); ?></div></a>
								</div>
							<div class="link_to_item"><a href="<?= get_permalink(); ?>" class="btn" tabindex="0"><?php _e('Learn More', 'anatol'); ?></a></div>
						</div>
						