<section class="section-press-descriptions" id="section2">
	<div class="container">
	<div class="single_tabs">
                	<?php
					$description 		= get_field('main_description');
					$optionalfeatures 	= get_field('optional_features');
					$product_models 	= '';//get_field('wpcf-productmodels');
					$productmodelstext 	= get_field('wpcf-productmodelstext');
					$specifications 	= get_field('specifications');
					$warranty_description	 	= get_field('warranty_description');
					$certification_description	 	= get_field('certification_description');
					$download_warranty	= get_field('warranty_pdf');
					$download_brochure	= get_field('brochure');
					$active = 'active';
				/* 	ob_start();
					get_template_part('parts/product_ifo_box.');
					$output = ob_get_contents();
					ob_end_clean();

					if(!empty(trim($output))) {
						$description .= "\n".'<div class="product_info_box"><div class="row columns_flex_wrap">'.$output.'</div></div>';
						unset($output);
					} */
					
					?>
			<input type="radio" id="tab1" name="tab-control" checked>
                      <?php if(!empty($optionalfeatures)) {?>
			<input type="radio" id="tab2" name="tab-control">
                      <?php } ?><!--
                      <?php if(!empty($product_models) || !empty($productmodelstext)) {?>
			<input type="radio" id="tab3" name="tab-control">  
                      <?php } ?>-->
                      <?php if(!empty($specifications)) {?>
			<input type="radio" id="tab4" name="tab-control">
                      <?php } ?>
					  
			<input type="radio" id="tab5" name="tab-control">
			
			<input type="radio" id="tab6" name="tab-control">	
			<ul class="tabs_navi">
				<?php if(!empty($description)) {?>
				<li class=""><label for="tab1" role="button"><?php _e('Description', 'anatol'); ?></label></li>
				<?php } ?>
				<?php if(!empty($optionalfeatures)) {?>
				<li><label for="tab2" role="button"><?php _e('Standard Features', 'anatol'); ?></label></li>
				<?php } ?><!--
				<?php if(!empty($product_models) || !empty($productmodelstext)) {?>
				<li class=""><label for="tab3" role="button"><?php _e('Models');?></label></li>
				<?php } ?>-->
				<?php if(!empty($specifications)) {?>
				<li class=""><label for="tab4" role="button"><?php _e('Specifications', 'anatol'); ?></label></li>
				<?php } ?>
				
				<li class=""><label for="tab5" role="button"><?php _e('Downloads', 'anatol'); ?></label></li>
				
				<li class=""><label for="tab6" role="button"><?php _e('Support', 'anatol'); ?></label></li>
			</ul>
			
<div class="content">
                    	<?php if(!empty($description)) {?>
							<div class="tab_item">
								<div class="tab_item_cont home_equipments">
								  <div class="tab-pane fade eq_description">
								  
									<h3 class="tab_item_title"><?php the_field('description_title'); ?></h3>
									<?php //echo $description; ?>
									<?php the_field('main_description'); ?>
								  </div>
								</div>
							</div>
                      	<?php } ?>

                      	<?php if(!empty($optionalfeatures)) {?>
							<div class="tab_item">
								<div class="tab_item_cont optionalfeatures">						
									
									
              <?php get_template_part('templates/equipment/single-parts/optional-features'); ?>
								</div>
							</div>
                      	<?php } ?>
	
                        <?php if(!empty($specifications)) {?>
					<div class="tab_item">
						<div class="tab_item_cont home_equipments specifications">
                          <div id="specifications" class="specifications_table">
						  
              <?php get_template_part('templates/equipment/single-parts/specifications'); ?>
					  <?php  // echo $specifications; ?>
								<?php if( is_user_logged_in() ){ ?>
									<button id="download-xlsx" class="button" type="button">
										Download .xlsx
									</button>
									<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/sheetJs/FileSaver.min.js"></script>
									<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/sheetJs/xlsx.full.min.js"></script>
									<script type="text/javascript">
									jQuery( function ($) {
										var xlsxFileName = '<?php echo get_the_title(); ?>_specifications';
									//	var specificationTable = document.getElementById("specifications").getElementByTagName("table")[0];
										var specificationTable = $('#specifications table');
										console.log(specificationTable);

										var wb = XLSX.utils.table_to_book(
											specificationTable[0],
											{
												sheet:"Specifications",
												raw: true
											}
										);

										var wbout = XLSX.write(wb, {bookType:'xlsx', bookSST:true, type: 'binary'});
										function s2ab(s) {
											var buf = new ArrayBuffer(s.length);
											var view = new Uint8Array(buf);
											for (var i=0; i<s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
											return buf;
										}

										$('#download-xlsx').on('click', function() {
											saveAs( new Blob( [s2ab( wbout )], { type:"application/octet-stream" } ), xlsxFileName + '.xlsx' );
										});

										// function tableToExcel() {
										// 	saveAs( new Blob( [s2ab( wbout )], { type:"application/octet-stream" } ), xlsxFileName + '.xlsx' );
										// }
										//
										// // add event listener to table
										// var downloadButton = document.getElementById("download-xlsx");
										// downloadButton.addEventListener("click", tableToExcel, false);
										$('.CIT-widget__button span small').html('A new text for the span.');
										
									});

									</script>

								<?php } ?>
                          </div>
                        </div>
				    </div>
                      	<?php } ?>




	<div class="tab_item">
		<div class="tab_item_cont home_equipments">
        
		
						  
						  
						    <div class="download_buttons">
							
								<?php if(!empty($download_brochure)) {?>
								<div class="download_line">
									<div class="d_line_title"><?php _e('Download Brochure', 'anatol'); ?></div>
									<div class="d_line_cont">
										<a href="<?php echo $download_brochure['url']; ?>" class="button  red-button draw-red" target="_blank"><?php _e('Download Brochure', 'anatol'); ?></a>
									</div>
								</div>
								<?php } ?>
								<div class="download_line">
									<div class="d_line_title"><?php _e('Certification & Warranty', 'anatol'); ?></div>
									<div class="d_line_cont">
							<?php if(!empty($download_warranty)) {?>
								<a href="<?php echo $download_warranty['url']; ?>" class="button  red-button draw-red" target="_blank" style="margin-bottom: 30px;"><?php _e('Certification & Warranty', 'anatol'); ?></a>
								<?php } ?>
								<br />
                          	<?php echo $warranty_description; ?>
								<br />
                          	<?php echo $certification_description; ?>
									</div>
								</div>
							</div>
									
									
									
			
			
                          </div>
                          </div>
						  

	<div class="tab_item">
		<div class="tab_item_cont home_equipments">
                          <div id="support" class="tab-pane fade tab_support_conent">

                          <?php $lang = ICL_LANGUAGE_CODE; ?>
						  
                                <div class="support_descr" style="padding-bottom:15px;">
												<h3 class="tab_item_title"><?php the_field('support_title'); ?></h3>
                                    <p><?php the_field('support_description'); ?></p>
                                </div>
								
                               <!-- <div class="action_buttons">

                                    <div class="button_phone">
                                        <a class="uk-button uk-button-large" href="tel:+18473679760">
                                        	<div class="ab_i_w1"><div class="ab_i_w2"><span class="ab_icon"></span></div></div>
                                            (847) 367-9760
                                        </a>
                                    </div>
                                    <div class="button_service_request">
                                    <?php
									$support_page = icl_object_id(2037, 'page', false,ICL_LANGUAGE_CODE);
									$support_page = get_permalink($support_page);

                                            if($lang == 'es') {
                                                echo '<a class="uk-button uk-button-large" href="'.$support_page.'"><div class="ab_i_w1"><div class="ab_i_w2"><span class="ab_icon"></span></div></div>Solicitud de Servicio</a>';
                                            }
                                            elseif($lang == 'pl') {
                                                echo '<a class="uk-button uk-button-large" href="'.$support_page.'"><div class="ab_i_w1"><div class="ab_i_w2"><span class="ab_icon"></span></div></div>Zgłoszenie serwisowe</a>';
                                            }
                                            elseif($lang == 'ru') {
                                                echo '<a class="uk-button uk-button-large" href="'.$support_page.'"><div class="ab_i_w1"><div class="ab_i_w2"><span class="ab_icon"></span></div></div>Запрос на обслуживание</a>';
                                            }
                                            else {
                                                echo '<a class="uk-button uk-button-large" href="'.$support_page.'"><div class="ab_i_w1"><div class="ab_i_w2"><span class="ab_icon"></span></div></div>Service Request</a>';
                                            }
                                        ?>

                                    </div>
                                    <div class="button_contacts">
                                        <a class="uk-button uk-button-large" href="#section_offices" data-uk-smooth-scroll=""><div class="ab_i_w1"><div class="ab_i_w2"><span class="ab_icon"></span></div></div>
                                            <?php
                                            if($lang == 'es') {
                                                echo 'Contáctenos';
                                            }
                                            elseif($lang == 'pl') {
                                                echo 'Kontakt';
                                            }
                                            elseif($lang == 'ru') {
                                                echo 'Kонтакт';
                                            }
                                            else {
                                                echo 'Contact Us';
                                            }
                                        ?>
                                        </a>
                                    </div>
                                </div>-->
								
<div class="support_top_pannel">
            <div class="column_support">
				  
              <div class="stp_item">
        		<div class="stp_icon"><span class="custom_icon text_icon wicon-phone-solid"></span></div>
        <div class="sp_top">
          <div class="stp_title"><h4><?php _e('Anatol Support Contacts', 'anatol'); ?></h4></div>
        </div>
        <div class="stp_content">
          <div class="spm_contacts">
				<div class="spm_short_description spm_contact"><?php _e('We are always ready to help!', 'anatol'); ?></div>
				<div class="spm_phone spm_contact"><span class="text_icon wicon-phone-solid"></span> 847-582-1825</div>
          </div>
        </div>
			<div class="stp_button">
			<div class="get_a_quote button red-button"><?php _e('Contact Us', 'anatol'); ?></div></div>           
      </div>
            </div>
                    <div class="column_support">
              <div class="stp_item">
                <div class="stp_icon"><span class="custom_icon wicon-contract"></span></div>
				
				<div class="stp_title sbn_title"><h4><?php _e('Warranty Registration', 'anatol'); ?></h4></div>
				<div class="stp_content">
					<p><?php _e('Please complete all form fields. By submitting this form you agree to all Warranty Terms &amp; Conditions. You must complete a form for EACH Anatol machine you wish to register.', 'anatol'); ?></p>
				</div>
                <div class="stp_button"><a id="register_warranty_onclick" href="#" class="button transporent_button track-button" data-category="Buttons" data-label="Warranty Registration - Support page"><span><?php _e('Register Now', 'anatol'); ?></span></a></div>
					 <!--<div class="stp_button"><a id="<?php echo $button_class_click ?>" href="#" class="button transporent_button track-button" data-category="Buttons" data-label="Warranty Registration - Support page"><span><?php _e('Register Now', 'anatol'); ?></span></a></div>-->
				</div>
            </div>
                        <div class="column_support">
              <div class="stp_item">
                <div class="stp_icon"><span class="custom_icon wicon-question"></span></div>
				<div class="stp_title sbn_title"><h4><?php _e('Questions &amp; Answers', 'anatol'); ?></h4></div>
				<div class="stp_content">
					<p><?php _e('Need help? Have Questions? Want answers?<br>
We’ve compiled a list of commonly asked questions our customers ask most frequently. You’ll find your answers here.', 'anatol'); ?></p>
				</div>
                <div class="stp_button"><a href="/support/faq/" target="" class="button transporent_button track-button" data-category="Buttons" data-label="View Faqs - Support page"><span><?php _e('View FAQs', 'anatol'); ?></span></a></div></div>
            </div>
</div>


								
                          </div>
                          </div>
                          </div>
                    
	
	
	
  </div>
</div>
</div>
	
	</section>
	

