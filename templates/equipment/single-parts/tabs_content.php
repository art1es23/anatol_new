<section class="product-full-description" id="section2">
    <div class="product-full-description--wrapper container">
        <div class="single_tabs">
            <?php
                $description 		= get_field('main_description');
                $video_id = get_field('video_in_description_tab');
                $legend_under_video = get_field('legend_under_video');
                $optionalfeatures 	= get_field('optional_features');
                $product_models 	= '';//get_field('wpcf-productmodels');
                $productmodelstext 	= get_field('wpcf-productmodelstext');
                $specifications 	= get_field('specifications');
                $warranty_description	 	= get_field('warranty_description');
                $certification_description	 	= get_field('certification_description');
                $download_warranty	= get_field('warranty_pdf');
                $download_brochure	= get_field('brochure');
                $active = 'active';
                ?>

            <input type="radio" id="tab1" name="tab-control" checked>
            <?php if(!empty($optionalfeatures)) {?>
            <input type="radio" id="tab2" name="tab-control">
            <?php } 
			
			if(!empty($specifications)) {?>
            <input type="radio" id="tab4" name="tab-control">
            <?php } ?>

            <input type="radio" id="tab5" name="tab-control">
            <input type="radio" id="tab6" name="tab-control">

            <div class="tabs_navi">
                <?php if(!empty($description)) {?>
                <label class="tabs_navi__item" for="tab1" role="button"><?php _e('Description', 'anatol'); ?></label>
                <?php } 
				
				if(!empty($optionalfeatures)) {?>
                <label class="tabs_navi__item" for="tab2"
                    role="button"><?php _e('Standard Features', 'anatol'); ?></label>
                <?php } 
				
				if(!empty($specifications)) {?>
                <label class="tabs_navi__item" for="tab4" role="button"><?php _e('Specifications', 'anatol'); ?></label>
                <?php } ?>

                <label class="tabs_navi__item" for="tab5" role="button"><?php _e('Downloads', 'anatol'); ?></label>
                <label class="tabs_navi__item" for="tab6" role="button"><?php _e('Support', 'anatol'); ?></label>
            </div>

            <div class="content">
                <?php if(!empty($description)) {?>
                <div class="tab_item">
                    <div class="tab_item_cont home_equipments">
                        <h3 class="tab_item_title"><?php the_field('description_title'); ?></h3>
                        <?php the_field('main_description'); ?>

                        <?php if (the_field('video_in_description_tab')) { ?>

                        <div class="video">
                            <a href="https://www.youtube.com/embed/<?php echo $video_id;?>" class="video__link">
                                <picture>
                                    <source type="image/webp"
                                        srcset="https://i.ytimg.com/vi_webp/<?php echo $video_id;?>/maxresdefault.webp">
                                    <img width="1280" height="720" loading="lazy" class="lozad video__media"
                                        src="https://i.ytimg.com/vi/<?php echo $video_id;?>/maxresdefault.jpg">
                                </picture>
                            </a>
                            <button class="video__button" aria-label="Play video">
                                <svg height="48" version="1.1" viewBox="0 0 68 48" width="68">
                                    <path class="video__button-shape"
                                        d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z">
                                    </path>
                                    <path d="M 45,24 27,14 27,34" class="video__button-icon"></path>
                                </svg>
                            </button>
                        </div>

                        <?php the_field('legend_under_video'); ?>
                        <?php }?>

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
                            <button id="download-xlsx" class="download-xlsx button" type="button">
                                Download .xlsx
                            </button>
                            <script type="text/javascript"
                                src="<?php echo get_stylesheet_directory_uri(); ?>/js/sheetJs/FileSaver.min.js">
                            </script>
                            <script type="text/javascript"
                                src="<?php echo get_stylesheet_directory_uri(); ?>/js/sheetJs/xlsx.full.min.js">
                            </script>
                            <!-- <script type="text/javascript">
                            jQuery(function($) {
                                var xlsxFileName = '<?php echo get_the_title(); ?>_specifications';
                                //	var specificationTable = document.getElementById("specifications").getElementBTagName("table")[0];
                                var specificationTable = $('#specifications table');
                                console.log(specificationTable);

                                var wb = XLSX.utils.table_to_book(
                                    specificationTable[0], {
                                        sheet: "Specifications",
                                        raw: true
                                    }
                                );

                                var wbout = XLSX.write(wb, {
                                    bookType: 'xlsx',
                                    bookSST: true,
                                    type: 'binary'
                                });

                                function s2ab(s) {
                                    var buf = new ArrayBuffer(s.length);
                                    var view = new Uint8Array(buf);
                                    for (var i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
                                    return buf;
                                }

                                $('#download-xlsx').on('click', function() {
                                    saveAs(new Blob([s2ab(wbout)], {
                                        type: "application/octet-stream"
                                    }), xlsxFileName + '.xlsx');
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
                            </script> -->

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
                                <a href="<?php echo $download_brochure['url']; ?>" class="button  red-button draw-red"
                                    target="_blank"><?php _e('Download Brochure', 'anatol'); ?></a>
                            </div>
                            <?php } ?>
                            <div class="download_line">
                                <div class="d_line_title"><?php _e('Certification & Warranty', 'anatol'); ?></div>
                                <?php if(!empty($download_warranty)) {?>
                                <a href="<?php echo $download_warranty['url']; ?>" class="button  red-button draw-red"
                                    target="_blank"><?php _e('Certification & Warranty', 'anatol'); ?></a>
                                <?php } ?>
                                <!-- <br /> -->
                                <?php echo $warranty_description; ?>
                                <!-- <br /> -->
                                <?php echo $certification_description; ?>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab_item">
                    <div class="tab_item_cont home_equipments">
                        <div id="support" class="tab-pane tab_support_conent">

                            <?php $lang = ICL_LANGUAGE_CODE; ?>

                            <div class="support_descr" style="padding-bottom:15px;">
                                <h3 class="tab_item_title"><?php the_field('support_title'); ?></h3>
                                <p><?php the_field('support_description'); ?></p>
                            </div>

                            <div class="support_top_pannel">
                                <div class="column_support">

                                    <span class="stp_icon custom_icon text_icon wicon-phone-solid"></span>

                                    <h4 class="sp_top stp_title"><?php _e('Anatol Support Contacts', 'anatol'); ?></h4>

                                    <div class="stp_content">
                                        <div class="spm_short_description spm_contact">
                                            <?php _e('We are always ready to help!', 'anatol'); ?></div>

                                        <div class="spm_phone spm_contact">
                                            <span class="text_icon wicon-phone-solid"></span>
                                            <span>847-582-1825</span>
                                        </div>
                                    </div>

                                    <div class="stp_button get_a_quote button red-button">
                                        <?php _e('Contact Us', 'anatol'); ?></div>
                                </div>
                                <div class="column_support">
                                    <span class="stp_icon custom_icon wicon-contract"></span>

                                    <h4 class="stp_title sbn_title"><?php _e('Warranty Registration', 'anatol'); ?></h4>
                                    <p class="stp_content">
                                        <?php _e('Please complete all form fields. By submitting this form you agree to all Warranty Terms &amp; Conditions. You must complete a form for EACH Anatol machine you wish to register.', 'anatol'); ?>
                                    </p>

                                    <a id="register_warranty_onclick" href="#"
                                        class="stp_button button transporent_button track-button"
                                        data-category="Buttons" data-label="Warranty Registration - Support page">
                                        <!-- <span> -->
                                        <?php _e('Register Now', 'anatol'); ?>
                                        <!-- </span> -->
                                    </a>
                                </div>
                                <div class="column_support">

                                    <span class="stp_icon custom_icon wicon-question"></span>

                                    <h4 class="stp_title sbn_title"><?php _e('Questions &amp; Answers', 'anatol'); ?>
                                    </h4>

                                    <p class="stp_content">
                                        <?php _e('Need help? Have Questions? Want answers?<br>
We’ve compiled a list of commonly asked questions our customers ask most frequently. You’ll find your answers here.', 'anatol'); ?>
                                    </p>

                                    <a href="/support/faq/" target=""
                                        class="stp_button button transporent_button track-button"
                                        data-category="Buttons" data-label="View Faqs - Support page">
                                        <!-- <span> -->
                                        <?php _e('View FAQs', 'anatol'); ?>
                                        <!-- </span> -->
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>