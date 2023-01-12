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

                                    <span class="stp_icon custom_icon text_icon wicon-phone-solid">
                                        <svg fill="#cd2122" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17.167,16.155a2.5,2.5,0,0,0-3.535,0l-.385.384A46.692,46.692,0,0,1,7.458,10.75l.385-.385a2.5,2.5,0,0,0,0-3.536L5.721,4.708a2.5,2.5,0,0,0-3.535,0L1.022,5.872a3.51,3.51,0,0,0-.442,4.4A46.932,46.932,0,0,0,13.722,23.417a3.542,3.542,0,0,0,4.4-.442l1.165-1.164a2.5,2.5,0,0,0,0-3.535Z" />
                                            <path
                                                d="M11.5,0a1,1,0,0,0,0,2A10.512,10.512,0,0,1,22,12.5a1,1,0,1,0,2,0A12.515,12.515,0,0,0,11.5,0Z" />
                                            <path
                                                d="M11.5,6A6.508,6.508,0,0,1,18,12.5a1,1,0,0,0,2,0A8.51,8.51,0,0,0,11.5,4a1,1,0,1,0,0,2Z" />
                                            <path
                                                d="M11.5,10A2.5,2.5,0,0,1,14,12.5a1,1,0,0,0,2,0A4.505,4.505,0,0,0,11.5,8a1,1,0,1,0,0,2Z" />
                                        </svg>
                                    </span>

                                    <h4 class="sp_top stp_title"><?php _e('Anatol Support Contacts', 'anatol'); ?></h4>

                                    <div class="stp_content">
                                        <div class="spm_short_description spm_contact">
                                            <?php _e('We are always ready to help!', 'anatol'); ?></div>

                                        <div class="spm_phone spm_contact">
                                            <span class="text_icon wicon-phone-solid svg-wrapper">
                                                <svg fill="#000000" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.167,16.155a2.5,2.5,0,0,0-3.535,0l-.385.384A46.692,46.692,0,0,1,7.458,10.75l.385-.385a2.5,2.5,0,0,0,0-3.536L5.721,4.708a2.5,2.5,0,0,0-3.535,0L1.022,5.872a3.51,3.51,0,0,0-.442,4.4A46.932,46.932,0,0,0,13.722,23.417a3.542,3.542,0,0,0,4.4-.442l1.165-1.164a2.5,2.5,0,0,0,0-3.535Z" />
                                                    <path
                                                        d="M11.5,0a1,1,0,0,0,0,2A10.512,10.512,0,0,1,22,12.5a1,1,0,1,0,2,0A12.515,12.515,0,0,0,11.5,0Z" />
                                                    <path
                                                        d="M11.5,6A6.508,6.508,0,0,1,18,12.5a1,1,0,0,0,2,0A8.51,8.51,0,0,0,11.5,4a1,1,0,1,0,0,2Z" />
                                                    <path
                                                        d="M11.5,10A2.5,2.5,0,0,1,14,12.5a1,1,0,0,0,2,0A4.505,4.505,0,0,0,11.5,8a1,1,0,1,0,0,2Z" />
                                                </svg>
                                            </span>
                                            <a href="tel:8475821825">847-582-1825</a>
                                        </div>
                                    </div>

                                    <div class="stp_button get_a_quote button red-button">
                                        <?php _e('Contact Us', 'anatol'); ?></div>
                                </div>
                                <div class="column_support">
                                    <span class="stp_icon custom_icon wicon-contract">
                                        <!-- <svg fill="#cd2122" enable-background="new 0 0 96 96" id="Layer_1" version="1.1"
                                            viewBox="0 0 96 96" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <path
                                                d="  M67.877,37.687V33L58.58,23H32.123c-2.209,0-4,1.791-4,4v42c0,2.209,1.791,4,4,4h31.754c2.209,0,4-1.791,4-4V42.657"
                                                stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-miterlimit="10" stroke-width="2" />
                                            <path d="M58.58,22.751V29c0,2.209,1.791,4,4,4h5.297" stroke="#ffffff"
                                                stroke-miterlimit="10" stroke-width="2" />
                                            <g>
                                                <circle cx="40.296" cy="36.078" r="4.706" stroke="#ffffff"
                                                    stroke-miterlimit="10" stroke-width="2" />
                                                <path
                                                    d="   M36.179,38.354l-0.382-0.894l-1.668,6.219l2.162-0.758l1.313,1.689l1.102-4.108C37.626,40.114,36.728,39.346,36.179,38.354z"
                                                    stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-miterlimit="10" stroke-width="2" />
                                                <path
                                                    d="   M44.754,37.587l-0.34,0.767c-0.549,0.992-1.448,1.761-2.528,2.149l1.102,4.108l1.492-1.737l1.983,0.806L44.754,37.587z"
                                                    stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-miterlimit="10" stroke-width="2" />
                                            </g>
                                            <line stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-miterlimit="10" stroke-width="2" x1="34.129" x2="57.869"
                                                y1="55.999" y2="55.999" />
                                            <line stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-miterlimit="10" stroke-width="2" x1="34.129" x2="47.861"
                                                y1="63.006" y2="63.006" />
                                        </svg> -->
                                    </span>

                                    <h4 class="stp_title sbn_title"><?php _e('Warranty Registration', 'anatol'); ?></h4>
                                    <p class="stp_content">
                                        <?php _e('Please complete all form fields. By submitting this form you agree to all Warranty Terms &amp; Conditions. You must complete a form for EACH Anatol machine you wish to register.', 'anatol'); ?>
                                    </p>

                                    <a id="register_warranty_onclick" href="#"
                                        class="stp_button button transporent_button track-button"
                                        data-category="Buttons" data-logined="<?php echo is_user_logged_in()?>"
                                        data-label="Warranty Registration - Support page">
                                        <!-- <span> -->
                                        <?php _e('Register Now', 'anatol'); ?>
                                        <!-- </span> -->
                                    </a>
                                </div>
                                <div class="column_support">

                                    <span class="stp_icon custom_icon wicon-question">
                                        <svg fill="none" height="24" stroke-width="1.5" viewBox="0 0 24 24" width="24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.90039 8.07954C7.90039 3.30678 15.4004 3.30682 15.4004 8.07955C15.4004 11.4886 11.9913 10.8067 11.9913 14.8976"
                                                stroke="#cd2122" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M12 19.01L12.01 18.9989" stroke="#cd2122" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </span>

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

<script src="<?php echo get_template_directory_uri();?>/js/showingTabs.js"></script>