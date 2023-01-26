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
                <div class="hide-tabs-button svg-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                        width="256" height="256" viewBox="0 0 256 256" xml:space="preserve">

                        <g style="stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;"
                            transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                            <path
                                d="M 90 45 C 90 20.187 69.813 0 45 0 C 20.187 0 0 20.187 0 45 c 0 24.813 20.187 45 45 45 C 69.813 90 90 69.813 90 45 z M 10 45 c 0 -19.299 15.701 -35 35 -35 s 35 15.701 35 35 S 64.299 80 45 80 S 10 64.299 10 45 z"
                                style="stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;"
                                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            <path
                                d="M 49.926 62.777 V 27.222 c 0 -2.761 -2.238 -5 -5 -5 s -5 2.239 -5 5 v 35.555 c 0 2.762 2.239 5 5 5 S 49.926 65.539 49.926 62.777 z"
                                style="stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;"
                                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            <path
                                d="M 63.896 48.882 c 0 -1.279 -0.488 -2.559 -1.464 -3.536 c -1.953 -1.953 -5.119 -1.953 -7.071 0 L 45 55.706 l -10.361 -10.36 c -1.953 -1.953 -5.119 -1.953 -7.071 0 c -1.952 1.953 -1.952 5.119 0 7.072 l 13.896 13.896 c 1.953 1.952 5.119 1.952 7.071 0 l 13.896 -13.896 C 63.408 51.441 63.896 50.161 63.896 48.882 z"
                                style="stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;"
                                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                        </g>
                    </svg>
                </div>
                <?php if(!empty($description)) {?>
                <label class="tabs_navi__item" for="tab1" role="button"><?php _e('Description', 'anatol'); ?></label>
                <?php } 
				
				if(!empty($optionalfeatures)) {?>
                <label class="tabs_navi__item tabs_navi__item--disabled" for="tab2"
                    role="button"><?php _e('Standard Features', 'anatol'); ?></label>
                <?php } 
				
				if(!empty($specifications)) {?>
                <label class="tabs_navi__item tabs_navi__item--disabled" for="tab4"
                    role="button"><?php _e('Specifications', 'anatol'); ?></label>
                <?php } ?>

                <label class="tabs_navi__item tabs_navi__item--disabled" for="tab5"
                    role="button"><?php _e('Downloads', 'anatol'); ?></label>
                <label class="tabs_navi__item tabs_navi__item--disabled" for="tab6"
                    role="button"><?php _e('Support', 'anatol'); ?></label>
            </div>

            <div class="content">
                <?php if(!empty($description)) {?>
                <div class="tab_item">
                    <div class="tab_item_cont home_equipments">
                        <h3 class="tab_item_title"><?php the_field('description_title'); ?></h3>

                        <?php the_field('main_description'); ?>

                        <?php if (!empty(get_field('video_in_description_tab'))) { ?>

                        <div class="video">
                            <a href="https://www.youtube.com/embed/<?php echo $video_id;?>" class="video__link">
                                <picture>
                                    <source type="image/webp"
                                        srcset="https://i.ytimg.com/vi_webp/<?php echo $video_id;?>/hqdefault.webp">
                                    <img width="1280" height="720" loading="lazy" class="lozad video__media"
                                        src="https://i.ytimg.com/vi/<?php echo $video_id;?>/hqdefault.jpg">
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

                        <p class="video__legend"><?php echo get_field('legend_under_video');?></p>
                        <?php }?>

                    </div>
                </div>
                <?php } ?>

                <?php if(!empty($optionalfeatures)) {?>
                <div class="tab_item">
                    <div class="tab_item_cont optionalfeatures">
                        <?php get_template_part('templates/components/section-templates/equipment/single-parts/optional-features'); ?>
                    </div>
                </div>
                <?php } ?>

                <?php if(!empty($specifications)) {?>
                <div class="tab_item">
                    <div class="tab_item_cont home_equipments specifications">
                        <div id="specifications" class="specifications_table">

                            <?php get_template_part('templates/components/section-templates/equipment/single-parts/specifications'); ?>
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
                                <h3 class="d_line_title"><?php _e('Download Brochure', 'anatol'); ?></h3>
                                <a href="<?php echo $download_brochure['url']; ?>" class="button  red-button draw-red"
                                    target="_blank"><?php _e('Download Brochure', 'anatol'); ?></a>
                            </div>
                            <?php } ?>
                            <div class="download_line">
                                <h3 class="d_line_title"><?php _e('Certification & Warranty', 'anatol'); ?></h3>
                                <?php if(!empty($download_warranty)) {?>
                                <a href="<?php echo $download_warranty['url']; ?>" class="button  red-button draw-red"
                                    target="_blank"><?php _e('Certification & Warranty', 'anatol'); ?></a>
                                <?php } ?>
                                <!-- <br /> -->
                            </div>
                            <div class="warranty-description-wrapper">
                                <?php echo $warranty_description; ?>

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

                            <div class="support-inner">
                                <div class="support-inner__item suppport-info">

                                    <span class="suppport-info__icon svg-wrapper svg-phone--red"></span>

                                    <h4 class="suppport-info__title">
                                        <?php _e('Anatol Support Contacts', 'anatol'); ?></h4>

                                    <div class="suppport-info__description">
                                        <p class="spm_short_description suppport-info__excerpt">
                                            <?php _e('We are always ready to help!', 'anatol'); ?></p>

                                        <a class="contact-link" href="tel:8475821825">847-582-1825</a>
                                    </div>

                                    <button class="stp_button get_a_quote button red-button draw-red">
                                        <?php _e('Contact Us', 'anatol'); ?></button>
                                </div>
                                <div class="support-inner__item suppport-info">
                                    <span class="suppport-info__icon custom_icon wicon-contract"></span>

                                    <h4 class="suppport-info__title sbn_title">
                                        <?php _e('Warranty Registration', 'anatol'); ?></h4>
                                    <p class="stp_content">
                                        <?php _e('Please complete all form fields. By submitting this form you agree to all Warranty Terms &amp; Conditions. You must complete a form for EACH Anatol machine you wish to register.', 'anatol'); ?>
                                    </p>

                                    <button id="register_warranty_onclick" class="stp_button button red-button draw-red"
                                        data-category="Buttons" data-logined="<?php echo is_user_logged_in()?>"
                                        data-label="Warranty Registration - Support page">
                                        <?php _e('Register Now', 'anatol'); ?>
                                    </button>
                                </div>
                                <div class="support-inner__item suppport-info">

                                    <span class="suppport-info__icon custom_icon wicon-question"></span>

                                    <h4 class="suppport-info__title sbn_title">
                                        <?php _e('Questions &amp; Answers', 'anatol'); ?>
                                    </h4>

                                    <p class="stp_content">
                                        <?php _e('Need help? Have Questions? Want answers?<br>
We’ve compiled a list of commonly asked questions our customers ask most frequently. You’ll find your answers here.', 'anatol'); ?>
                                    </p>

                                    <a href="/support/faq/" target="" class="stp_button button red-button draw-red"
                                        data-category="Buttons" data-label="View Faqs - Support page">
                                        <?php _e('View FAQs', 'anatol'); ?>
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

<script src="<?php echo get_template_directory_uri();?>/js/showingTabs.js"></script>