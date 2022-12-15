<?PHP
/* Template Name: Support */
get_header(); 
get_template_part('template-parts/template-part-head-big');
 ?>

<style>
<?php include 'css/components/hero-templates/hero-template.css';
include 'css/components/template-form.css';
include 'css/components/support-section.css';
include 'css/components/get-in-touch.css';
include 'css/page-templates/page-support/support.css';
?>
</style>

<div class="support_top_section">
    <div class="support_top--wrapper container">
        <h2 id="register_now" class="section_title regional-offices__title">
            <?php _e('Real Help from Real People', 'anatol'); ?></h2>
        <div class="support_top_pannel">
            <div class="column_support">
                <?PHP
					$cp_phone = get_field('cp_phone');
					$cp_short_description = get_field('cp_short_description');
					$content_phone = get_field('content_phone');
					// $content_email = get_field('content_email');
					$content_button_name = get_field('content_button_name');
					$content_button_url = get_field('content_button_url');
					?>
                <div class="stp_icon"><span class="custom_icon text_icon wicon-phone-solid"></span></div>
                <div class="sp_top">
                    <h4 class="stp_title">
                        <?PHP echo get_field('cp_title'); ?>
                    </h4>
                </div>
                <div class="stp_content">
                    <div class="spm_contacts">
                        <?PHP if(!empty($cp_short_description)) { ?>
                        <div class="spm_short_description spm_contact">
                            <?PHP echo $cp_short_description; ?>
                        </div>
                        <?PHP } ?>
                        <?PHP if(!empty($cp_phone)) { ?>
                        <div class="spm_phone spm_contact"><span class="text_icon wicon-phone-solid"></span>
                            <?PHP echo $cp_phone; ?>
                        </div>
                        <?PHP } ?>
                        <?PHP if(!empty($content_phone)) { ?>
                        <div class="spm_phone spm_contact"><span class="text_icon wicon-phone-solid"></span>
                            <?PHP echo $content_phone; ?>
                        </div>
                        <?PHP } ?>
                        <?PHP if(!empty($content_email)) { ?>
                        <div class="spm_email spm_contact"><span class="text_icon wicon-envelope-solid"></span> <a
                                href="mailto:<?PHP echo $content_email; ?>">
                                <?PHP echo $content_email; ?>
                            </a></div>
                        <?PHP } ?>
                    </div>
                </div>

                <?PHP if(!empty($content_button_name)) { ?>
                <div class="stp_button"><a href="#request_service_form" class="button track-button"
                        data-label="Contact Us">
                        <?PHP echo $content_button_name; ?>
                    </a></div>
                <?PHP } ?>
            </div>
            <?PHP
				if(have_rows('header_part_content')){
				  while (have_rows('header_part_content')) {
					the_row();
					$icon_class = get_sub_field('icon_class');
					$title = get_sub_field('title');
					$button_text = get_sub_field('button_text');
					$button_url = get_sub_field('button_url');
					$button_class_click = get_sub_field('button_class_click');
					?>

            <div class="column_support">
                <?PHP if(!empty($icon_class)) { ?>
                <span class="stp_icon custom_icon <?PHP echo $icon_class; ?>"></span>
                <?PHP } ?>

                <?PHP if(!empty($title)) { ?>
                <h4 class="stp_title">
                    <?PHP echo $title; ?>
                </h4>
                <?PHP } ?>

                <div class="stp_content">
                    <?PHP echo get_sub_field('content'); ?>
                </div>
                <?PHP if(!empty($button_text)) {
                    if(strpos($button_url['url'], '#') === 0) {
                ?>

                <a id="<?php echo $button_class_click ?>" href="#"
                    class="stp_button button transparent_button track-button"
                    data-logined="<?php echo is_user_logged_in()?>" data-category="Buttons"
                    data-label="Warranty Registration - Support page">
                    <?PHP echo $button_text; ?>
                </a>
                <?PHP } else { ?>

                <a href="<?php echo $button_url['url']; ?>" target="<?php echo $button_url['target']; ?>"
                    class="stp_button button transparent_button track-button" data-category="Buttons"
                    data-label="View Faqs - Support page">
                    <?PHP echo $button_text; ?>
                </a>
                <?PHP }} ?>
            </div>
            <?PHP }} ?>
        </div>
    </div>
</div>

<section class="section support_team">
    <div class="swiper support_team--wrapper container">
        <div class="section_title support_team-title"><?php _e('Support Team', 'anatol'); ?></div>
        <div class="swiper-wrapper support_team_cont sldots ">
            <?PHP
			if(have_rows('support_team')){
			while (have_rows('support_team')) {
				the_row();
				$name = get_sub_field('name');
				$photo = get_sub_field('photo');
				$short_description = get_sub_field('short_description');
				$phone = get_sub_field('phone');
				$skype = get_sub_field('skype');
				$email = get_sub_field('email');
				$email_2 = get_sub_field('email_2');
				?>
            <div class="swiper-slide support_item">
                <?PHP if(!empty($photo)) { ?>
                <div class="st_photo">
                    <?PHP echo wp_get_attachment_image($photo, 'large'); ?>
                    <?PHP if(!empty($name)) { ?>
                    <h4 class="st_item_name sbn_title">
                        <?PHP echo $name; ?>
                    </h4>
                    <?PHP } ?>
                </div>
                <?PHP } ?>
                <div class="st_content">
                    <?PHP if(!empty($short_description)) { ?>
                    <div class="sbn_sub_title">
                        <?PHP echo $short_description; ?>
                    </div>
                    <?PHP } ?>
                    <?PHP if(!empty($phone)) { ?>
                    <div class="st_phone"><span class="text_icon wicon-phone-solid"></span>
                        <?PHP echo $phone; ?>
                    </div>
                    <?PHP } ?>
                    <?PHP if(!empty($skype)) { ?>
                    <div class="st_phone"><span class="fab fa-skype"></span>
                        <?PHP echo $skype; ?>
                    </div>
                    <?PHP } ?>
                    <?PHP if(!empty($email)) { ?>
                    <div class="st_email"><span class="text_icon wicon-envelope-solid"></span><a
                            href="mailto:<?PHP echo $email; ?>">
                            <?PHP echo $email; ?>
                        </a></div>
                    <?PHP } ?>
                    <?PHP if(!empty($email_2)) { ?>
                    <div class="st_email"><span class="text_icon wicon-envelope-solid"></span><a
                            href="mailto:<?PHP echo $email_2; ?>">
                            <?PHP echo $email_2; ?>
                        </a></div>
                    <?PHP } ?>
                </div>
            </div>
            <?PHP
			}
			}
			?>
        </div>
    </div>

</section>


<section id="feedbacks" class="support-feedbacks">

    <div class="swiper support-feedbacks--wrapper container">
        <div class="section_title feedbacks__title"><?php _e('What Anatol Customers Are Saying', 'anatol'); ?></div>
        <div class="swiper-wrapper feedbacks-posts-block sldots ">
            <?php $the_query = new WP_Query(array('post_type' => 'feedbacks')); ?>
            <?php if ($the_query->have_posts()) : ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <div class="swiper-slide feedback">
                <div class="feedback_title_block"><?php the_title(); ?></div>
                <div class="feedback_customer_company"><?php the_field( "customer_company" );?></div>
                <?php $customer_photologo = get_field('customer_photologo');
						$size = 'thumbnails-feed'; 
						if( $customer_photologo ) {?>
                <div class="feedback_photo">
                    <?php echo wp_get_attachment_image( $customer_photologo, $size );?>
                </div>
                <?php } ?>
                <div class="feedback-txt-block"><?php the_field( "short_review" );?></div>
                <?php 
							$show_more_review = get_field('show_more_review');
							if( !empty($show_more_review) ): ?>
                <div class="feedback-txt_block-hide">
                    <p><?php the_field( "show_more_review" );?></p>
                </div>
                <div class="feedback-show-more">Show more</div>
                <?php endif; ?>
            </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>

        </div>
    </div>
</section>

<!--------Request Service Form----------------->

<section class="request_service_form" id="request_service_form">
    <div class="request_service_form--wrapper container">
        <?php
            $support_form_title= get_field('support_form_title');	
            if (!empty($support_form_title ))  { ?>
        <div class="section_title"><?php echo $support_form_title; ?></div>
        <?php }	?>

        <div class="service_form_description">
            <?php
                $support_form_description_title= get_field('support_form_description_title');	
                if (!empty($support_form_description_title ))  { ?>
            <div class="form_description_strong"><?php echo $support_form_description_title; ?></div>
            <?php }	?>

            <?php
                $support_form_description= get_field('support_form_description');	
                if (!empty($support_form_description ))  { ?>
            <div class="form_description"><?php echo $support_form_description; ?></div>
            <?php }	?>
        </div>

        <div class="form service_form">
            <?php
				$support_form_subtitle= get_field('support_form_subtitle');	
				if (!empty($support_form_subtitle ))  { ?>
            <div class="section_title form-title"><?php echo $support_form_subtitle; ?></div>
            <?php }	?>

            <form id="__vtigerWebForm" name="Service Request Form"
                action="https://vtiger.anatol.com/modules/Webforms/capture.php" method="post"
                class="form-inner get_forms" accept-charset="utf-8" enctype="multipart/form-data">
                <input type="hidden" name="__vtrftk" value="sid:b58348e7419d8dba0377d10dbf934676f156f5c8,1617713921">
                <input type="hidden" name="publicid" value="6518b1cbe5c624b14e03d80feddf61b2">
                <input type="hidden" name="urlencodeenable" value="1">
                <input type="hidden" name="name" value="Service Request Form">

                <div class="form-inner__item">
                    <div class="form-inner__item--full">
                        <label><?php _e('Company Name', 'anatol'); ?>*</label>
                        <input type="text" name="company" placeholder="<?php _e('Company Name', 'anatol'); ?>*"
                            required>
                    </div>

                </div>
                <div class="form-inner__item">
                    <div class="form-inner__item--half">
                        <label><?php _e('First Name', 'anatol'); ?></label>
                        <input type="text" name="firstname" placeholder="<?php _e('First Name', 'anatol'); ?>*"
                            required>
                    </div>
                    <div class="form-inner__item--half">
                        <label><?php _e('Last Name', 'anatol'); ?></label>
                        <input type="text" name="lastname" placeholder="<?php _e('Last Name', 'anatol'); ?>*" required>
                    </div>
                </div>
                <div class="form-inner__item">
                    <div class="form-inner__item--half">
                        <label><?php _e('Phone Number', 'anatol'); ?> </label>
                        <input type="tel" name="phone" placeholder="<?php _e('Phone Number', 'anatol'); ?>*"
                            maxlength="18" id="tel" required>
                    </div>
                    <div class="form-inner__item--half">
                        <label><?php _e('Email', 'anatol'); ?></label>
                        <input type="Email" name="email" placeholder="<?php _e('Email', 'anatol'); ?>*" required>
                    </div>
                </div>
                <div class="form-inner__item">
                    <div class="form-inner__item--full">
                        <label><?php _e('Address', 'anatol'); ?></label>
                        <input type="text" name="lane" placeholder="<?php _e('Address', 'anatol'); ?>*" required>
                    </div>
                </div>
                <div class="form-inner__item">
                    <div class="form-inner__item--half">
                        <label><?php _e('City', 'anatol'); ?></label>
                        <input type="text" name="city" placeholder="<?php _e('City', 'anatol'); ?>*" required>
                    </div>
                    <div class="form-inner__item--half">
                        <label><?php _e('Postal Code', 'anatol'); ?></label>
                        <input type="text" name="code" placeholder="<?php _e('Postal Code', 'anatol'); ?>*" required>
                    </div>
                </div>
                <div class="form-inner__item">
                    <div class="form-inner__item--full">
                        <label> <?php _e('Select Country', 'anatol'); ?>*</label>
                        <select required name="country" onchange="yesnoCheckSer(this);">
                            <option class="choose_elements" value="" selected="selected">
                                <?php _e('Select Country', 'anatol'); ?>*</option>
                            <option class="elements" value="Afghanistan">Afghanistan</option>
                            <option class="elements" value="Albania">Albania</option>
                            <option class="elements" value="Algeria">Algeria</option>
                            <option class="elements" value="Andorra">Andorra</option>
                            <option class="elements" value="Angola">Angola</option>
                            <option class="elements" value="Antigua &amp; Deps">Antigua &amp; Deps</option>
                            <option class="elements" value="Argentina">Argentina</option>
                            <option class="elements" value="Armenia">Armenia</option>
                            <option class="elements" value="Australia">Australia</option>
                            <option class="elements" value="Austria">Austria</option>
                            <option class="elements" value="Azerbaijan">Azerbaijan</option>
                            <option class="elements" value="Bahamas">Bahamas</option>
                            <option class="elements" value="Bahrain">Bahrain</option>
                            <option class="elements" value="Bangladesh">Bangladesh</option>
                            <option class="elements" value="Barbados">Barbados</option>
                            <option class="elements" value="Belarus">Belarus</option>
                            <option class="elements" value="Belgium">Belgium</option>
                            <option class="elements" value="Belize">Belize</option>
                            <option class="elements" value="Benin">Benin</option>
                            <option class="elements" value="Bhutan">Bhutan</option>
                            <option class="elements" value="Bolivia">Bolivia</option>
                            <option class="elements" value="Bosnia Herzegovina">Bosnia Herzegovina</option>
                            <option class="elements" value="Botswana">Botswana</option>
                            <option class="elements" value="Brazil">Brazil</option>
                            <option class="elements" value="Brunei">Brunei</option>
                            <option class="elements" value="Bulgaria">Bulgaria</option>
                            <option class="elements" value="Burkina">Burkina</option>
                            <option class="elements" value="Burundi">Burundi</option>
                            <option class="elements" value="Cambodia">Cambodia</option>
                            <option class="elements" value="Cameroon">Cameroon</option>
                            <option class="elements" value="Canada">Canada</option>
                            <option class="elements" value="Cape Verde">Cape Verde</option>
                            <option class="elements" value="Central African Rep">Central African Rep</option>
                            <option class="elements" value="Chad">Chad</option>
                            <option class="elements" value="Chile">Chile</option>
                            <option class="elements" value="China">China</option>
                            <option class="elements" value="Colombia">Colombia</option>
                            <option class="elements" value="Comoros">Comoros</option>
                            <option class="elements" value="Congo">Congo</option>
                            <option class="elements" value="Congo {Democratic Rep}">Congo {Democratic Rep}</option>
                            <option class="elements" value="Costa Rica">Costa Rica</option>
                            <option class="elements" value="Croatia">Croatia</option>
                            <option class="elements" value="Cuba">Cuba</option>
                            <option class="elements" value="Cyprus">Cyprus</option>
                            <option class="elements" value="Czech Republic">Czech Republic</option>
                            <option class="elements" value="Denmark">Denmark</option>
                            <option class="elements" value="Djibouti">Djibouti</option>
                            <option class="elements" value="Dominica">Dominica</option>
                            <option class="elements" value="Dominican Republic">Dominican Republic</option>
                            <option class="elements" value="East Timor">East Timor</option>
                            <option class="elements" value="Ecuador">Ecuador</option>
                            <option class="elements" value="Egypt">Egypt</option>
                            <option class="elements" value="El Salvador">El Salvador</option>
                            <option class="elements" value="Equatorial Guinea">Equatorial Guinea</option>
                            <option class="elements" value="Eritrea">Eritrea</option>
                            <option class="elements" value="Estonia">Estonia</option>
                            <option class="elements" value="Ethiopia">Ethiopia</option>
                            <option class="elements" value="Fiji">Fiji</option>
                            <option class="elements" value="Finland">Finland</option>
                            <option class="elements" value="France">France</option>
                            <option class="elements" value="Gabon">Gabon</option>
                            <option class="elements" value="Gambia">Gambia</option>
                            <option class="elements" value="Georgia">Georgia</option>
                            <option class="elements" value="Germany">Germany</option>
                            <option class="elements" value="Ghana">Ghana</option>
                            <option class="elements" value="Greece">Greece</option>
                            <option class="elements" value="Grenada">Grenada</option>
                            <option class="elements" value="Guatemala">Guatemala</option>
                            <option class="elements" value="Guinea">Guinea</option>
                            <option class="elements" value="Guinea-Bissau">Guinea-Bissau</option>
                            <option class="elements" value="Guyana">Guyana</option>
                            <option class="elements" value="Haiti">Haiti</option>
                            <option class="elements" value="Honduras">Honduras</option>
                            <option class="elements" value="Hungary">Hungary</option>
                            <option class="elements" value="Iceland">Iceland</option>
                            <option class="elements" value="India">India</option>
                            <option class="elements" value="Indonesia">Indonesia</option>
                            <option class="elements" value="Iran">Iran</option>
                            <option class="elements" value="Iraq">Iraq</option>
                            <option class="elements" value="Ireland {Republic}">Ireland {Republic}</option>
                            <option class="elements" value="Israel">Israel</option>
                            <option class="elements" value="Italy">Italy</option>
                            <option class="elements" value="Ivory Coast">Ivory Coast</option>
                            <option class="elements" value="Jamaica">Jamaica</option>
                            <option class="elements" value="Japan">Japan</option>
                            <option class="elements" value="Jordan">Jordan</option>
                            <option class="elements" value="Kazakhstan">Kazakhstan</option>
                            <option class="elements" value="Kenya">Kenya</option>
                            <option class="elements" value="Kiribati">Kiribati</option>
                            <option class="elements" value="Korea North">Korea North</option>
                            <option class="elements" value="Korea South">Korea South</option>
                            <option class="elements" value="Kosovo">Kosovo</option>
                            <option class="elements" value="Kuwait">Kuwait</option>
                            <option class="elements" value="Kyrgyzstan">Kyrgyzstan</option>
                            <option class="elements" value="Laos">Laos</option>
                            <option class="elements" value="Latvia">Latvia</option>
                            <option class="elements" value="Lebanon">Lebanon</option>
                            <option class="elements" value="Lesotho">Lesotho</option>
                            <option class="elements" value="Liberia">Liberia</option>
                            <option class="elements" value="Libya">Libya</option>
                            <option class="elements" value="Liechtenstein">Liechtenstein</option>
                            <option class="elements" value="Lithuania">Lithuania</option>
                            <option class="elements" value="Luxembourg">Luxembourg</option>
                            <option class="elements" value="Macedonia">Macedonia</option>
                            <option class="elements" value="Madagascar">Madagascar</option>
                            <option class="elements" value="Malawi">Malawi</option>
                            <option class="elements" value="Malaysia">Malaysia</option>
                            <option class="elements" value="Maldives">Maldives</option>
                            <option class="elements" value="Mali">Mali</option>
                            <option class="elements" value="Malta">Malta</option>
                            <option class="elements" value="Marshall Islands">Marshall Islands</option>
                            <option class="elements" value="Mauritania">Mauritania</option>
                            <option class="elements" value="Mauritius">Mauritius</option>
                            <option class="elements" value="Mexico">Mexico</option>
                            <option class="elements" value="Micronesia">Micronesia</option>
                            <option class="elements" value="Moldova">Moldova</option>
                            <option class="elements" value="Monaco">Monaco</option>
                            <option class="elements" value="Mongolia">Mongolia</option>
                            <option class="elements" value="Montenegro">Montenegro</option>
                            <option class="elements" value="Morocco">Morocco</option>
                            <option class="elements" value="Mozambique">Mozambique</option>
                            <option class="elements" value="Myanmar, (Burma)">Myanmar, (Burma)</option>
                            <option class="elements" value="Namibia">Namibia</option>
                            <option class="elements" value="Nauru">Nauru</option>
                            <option class="elements" value="Nepal">Nepal</option>
                            <option class="elements" value="Netherlands">Netherlands</option>
                            <option class="elements" value="New Zealand">New Zealand</option>
                            <option class="elements" value="Nicaragua">Nicaragua</option>
                            <option class="elements" value="Niger">Niger</option>
                            <option class="elements" value="Nigeria">Nigeria</option>
                            <option class="elements" value="Norway">Norway</option>
                            <option class="elements" value="Oman">Oman</option>
                            <option class="elements" value="Pakistan">Pakistan</option>
                            <option class="elements" value="Palau">Palau</option>
                            <option class="elements" value="Panama">Panama</option>
                            <option class="elements" value="Papua New Guinea">Papua New Guinea</option>
                            <option class="elements" value="Paraguay">Paraguay</option>
                            <option class="elements" value="Peru">Peru</option>
                            <option class="elements" value="Philippines">Philippines</option>
                            <option class="elements" value="Poland">Poland</option>
                            <option class="elements" value="Portugal">Portugal</option>
                            <option class="elements" value="Qatar">Qatar</option>
                            <option class="elements" value="Romania">Romania</option>
                            <option class="elements" value="Russian Federation">Russian Federation</option>
                            <option class="elements" value="Rwanda">Rwanda</option>
                            <option class="elements" value="St Kitts &amp; Nevis">St Kitts &amp; Nevis</option>
                            <option class="elements" value="St Lucia">St Lucia</option>
                            <option class="elements" value="Saint Vincent &amp; the Grenadines">Saint Vincent &amp;
                                the
                                Grenadines</option>
                            <option class="elements" value="Samoa">Samoa</option>
                            <option class="elements" value="San Marino">San Marino</option>
                            <option class="elements" value="Sao Tome &amp; Principe">Sao Tome &amp; Principe
                            </option>
                            <option class="elements" value="Saudi Arabia">Saudi Arabia</option>
                            <option class="elements" value="Senegal">Senegal</option>
                            <option class="elements" value="Serbia">Serbia</option>
                            <option class="elements" value="Seychelles">Seychelles</option>
                            <option class="elements" value="Sierra Leone">Sierra Leone</option>
                            <option class="elements" value="Singapore">Singapore</option>
                            <option class="elements" value="Slovakia">Slovakia</option>
                            <option class="elements" value="Slovenia">Slovenia</option>
                            <option class="elements" value="Solomon Islands">Solomon Islands</option>
                            <option class="elements" value="Somalia">Somalia</option>
                            <option class="elements" value="South Africa">South Africa</option>
                            <option class="elements" value="South Sudan">South Sudan</option>
                            <option class="elements" value="Spain">Spain</option>
                            <option class="elements" value="Sri Lanka">Sri Lanka</option>
                            <option class="elements" value="Sudan">Sudan</option>
                            <option class="elements" value="Suriname">Suriname</option>
                            <option class="elements" value="Swaziland">Swaziland</option>
                            <option class="elements" value="Sweden">Sweden</option>
                            <option class="elements" value="Switzerland">Switzerland</option>
                            <option class="elements" value="Syria">Syria</option>
                            <option class="elements" value="Taiwan">Taiwan</option>
                            <option class="elements" value="Tajikistan">Tajikistan</option>
                            <option class="elements" value="Tanzania">Tanzania</option>
                            <option class="elements" value="Thailand">Thailand</option>
                            <option class="elements" value="Togo">Togo</option>
                            <option class="elements" value="Tonga">Tonga</option>
                            <option class="elements" value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                            <option class="elements" value="Tunisia">Tunisia</option>
                            <option class="elements" value="Turkey">Turkey</option>
                            <option class="elements" value="Turkmenistan">Turkmenistan</option>
                            <option class="elements" value="Tuvalu">Tuvalu</option>
                            <option class="elements" value="Uganda">Uganda</option>
                            <option class="elements" value="Ukraine">Ukraine</option>
                            <option class="elements" value="United Arab Emirates">United Arab Emirates</option>
                            <option class="elements" value="United Kingdom">United Kingdom</option>
                            <option class="elements" value="United States">United States</option>
                            <option class="elements" value="Uruguay">Uruguay</option>
                            <option class="elements" value="Uzbekistan">Uzbekistan</option>
                            <option class="elements" value="Vanuatu">Vanuatu</option>
                            <option class="elements" value="Vatican City">Vatican City</option>
                            <option class="elements" value="Venezuela">Venezuela</option>
                            <option class="elements" value="Vietnam">Vietnam</option>
                            <option class="elements" value="Yemen">Yemen</option>
                            <option class="elements" value="Zambia">Zambia</option>
                            <option class="elements" value="Zimbabwe">Zimbabwe</option>
                        </select>

                    </div>
                </div>
                <div id="ifYesSer" class="form-inner__item" style="display: none;">
                    <div class="form-inner__item--full">
                        <label for="state">State/Region<span class="form-required">*</span></label>
                        <select id="state_required" class="hs-input invalid error" name="state">
                            <option class="choose_elements" value="" disabled="" selected="">- Please Select -
                            </option>
                            <option class="usa_state elements" value="Alabama">Alabama</option>
                            <option class="usa_state elements" value="Alaska">Alaska</option>
                            <option class="usa_state elements" value="Arizona">Arizona</option>
                            <option class="usa_state elements" value="Arkansas">Arkansas</option>
                            <option class="usa_state elements" value="California">California</option>
                            <option class="usa_state elements" value="Colorado">Colorado</option>
                            <option class="usa_state elements" value="Connecticut">Connecticut</option>
                            <option class="usa_state elements" value="Delaware">Delaware</option>
                            <option class="usa_state elements" value="District of Columbia">District of Columbia
                            </option>
                            <option class="usa_state elements" value="Florida">Florida</option>
                            <option class="usa_state elements" value="Georgia">Georgia</option>
                            <option class="usa_state elements" value="Hawaii">Hawaii</option>
                            <option class="usa_state elements" value="Idaho">Idaho</option>
                            <option class="usa_state elements" value="Illinois">Illinois</option>
                            <option class="usa_state elements" value="Indiana">Indiana</option>
                            <option class="usa_state elements" value="Iowa">Iowa</option>
                            <option class="usa_state elements" value="Kansas">Kansas</option>
                            <option class="usa_state elements" value="Kentucky">Kentucky</option>
                            <option class="usa_state elements" value="Louisiana">Louisiana</option>
                            <option class="usa_state elements" value="Maine">Maine</option>
                            <option class="usa_state elements" value="Maryland">Maryland</option>
                            <option class="usa_state elements" value="Massachusetts">Massachusetts</option>
                            <option class="usa_state elements" value="Michigan">Michigan</option>
                            <option class="usa_state elements" value="Minnesota">Minnesota</option>
                            <option class="usa_state elements" value="Mississippi">Mississippi</option>
                            <option class="usa_state elements" value="Missouri">Missouri</option>
                            <option class="usa_state elements" value="Montana">Montana</option>
                            <option class="usa_state elements" value="Nebraska">Nebraska</option>
                            <option class="usa_state elements" value="Nevada">Nevada</option>
                            <option class="usa_state elements" value="New Hampshire">New Hampshire</option>
                            <option class="usa_state elements" value="New Jersey">New Jersey</option>
                            <option class="usa_state elements" value="New Mexico">New Mexico</option>
                            <option class="usa_state elements" value="New York">New York</option>
                            <option class="usa_state elements" value="North Carolina">North Carolina</option>
                            <option class="usa_state elements" value="North Dakota">North Dakota</option>
                            <option class="usa_state elements" value="Ohio">Ohio</option>
                            <option class="usa_state elements" value="Oklahoma">Oklahoma</option>
                            <option class="usa_state elements" value="Oregon">Oregon</option>
                            <option class="usa_state elements" value="Pennsylvania">Pennsylvania</option>
                            <option class="usa_state elements" value="Puerto Rico">Puerto Rico</option>
                            <option class="usa_state elements" value="Rhode Island">Rhode Island</option>
                            <option class="usa_state elements" value="South Carolina">South Carolina</option>
                            <option class="usa_state elements" value="South Dakota">South Dakota</option>
                            <option class="usa_state elements" value="Tennessee">Tennessee</option>
                            <option class="usa_state elements" value="Texas">Texas</option>
                            <option class="usa_state elements" value="Utah">Utah</option>
                            <option class="usa_state elements" value="Vermont">Vermont</option>
                            <option class="usa_state elements" value="Virginia">Virginia</option>
                            <option class="usa_state elements" value="Washington">Washington</option>
                            <option class="usa_state elements" value="West Virginia">West Virginia</option>
                            <option class="usa_state elements" value="Wisconsin">Wisconsin</option>
                            <option class="usa_state elements" value="Wyoming">Wyoming</option>

                            <option class="canadian_province elements" value="Alberta">Alberta</option>
                            <option class="canadian_province elements" value="British Columbia">British Columbia
                            </option>
                            <option class="canadian_province elements" value="Manitoba">Manitoba</option>
                            <option class="canadian_province elements" value="New Brunswick">New Brunswick</option>
                            <option class="canadian_province elements" value="Newfoundland and Labrador">
                                Newfoundland
                                and Labrador</option>
                            <option class="canadian_province elements" value="Northwest Territories">Northwest
                                Territories</option>
                            <option class="canadian_province elements" value="Nova Scotia">Nova Scotia</option>
                            <option class="canadian_province elements" value="Nunavut">Nunavut</option>
                            <option class="canadian_province elements" value="Ontario">Ontario</option>
                            <option class="canadian_province elements" value="Prince Edward Island">Prince Edward
                                Island
                            </option>
                            <option class="canadian_province elements" value="Quebec">Quebec</option>
                            <option class="canadian_province elements" value="Saskatchewan">Saskatchewan</option>
                            <option class="canadian_province elements" value="Yukon Territories">Yukon Territories
                            </option>
                        </select>
                    </div>
                </div>

                <div class="form-inner__item">
                    <div class="form-inner__item--full">
                        <label><?php _e('Equipment needing assistance', 'anatol'); ?>*</label>
                        <input type="text" name="cf_947"
                            placeholder="<?php _e('Equipment needing assistance', 'anatol'); ?>*" required>
                    </div>
                </div>
                <div class="form-inner__item">
                    <div class="form-inner__item--full">
                        <label><?php _e('Serial number', 'anatol'); ?>*</label>
                        <input type="text" name="cf_945" placeholder="<?php _e('Serial number', 'anatol'); ?>*"
                            required>
                    </div>
                </div>
                <div class="form-inner__item">
                    <div class="form-inner__item--full">
                        <label><?php _e('Problem/Issue', 'anatol'); ?>*</label>
                        <textarea id="" class="" name="description"
                            placeholder="<?php _e('Problem/Issue', 'anatol'); ?>*" required></textarea>
                        </td>
                    </div>
                </div>
                <!-- <div class="form-inner__item text-center"> -->
                <input type="submit" name="submit_web_form" value="<?php _e('Send Request', 'anatol'); ?>"
                    class="button button--full">
                <!-- </div> -->
            </form>
        </div>
    </div>
</section>

<script>
function yesnoCheckSer(that) {
    if (that.value == "United States") {
        document.getElementById("ifYesSer").style.display = "block";
        document.getElementById("state_required").setAttribute("required", "");
        document.querySelectorAll('.usa_state').forEach(item => item.style.display = 'block')
        document.querySelectorAll('.canadian_province').forEach(item => item.style.display = 'none')
    } else if (that.value == "Canada") {
        document.getElementById("ifYesSer").style.display = "block";
        document.querySelectorAll('.usa_state').forEach(item => item.style.display = 'none');
        document.querySelectorAll('.canadian_province').forEach(item => item.style.display = 'block');
    } else {
        document.getElementById("ifYesSer").style.display = "none";
    }
}
</script>


<!-- <?php include 'templates/forms/register-warranty.php' ; ?> -->

<!-- Slider Init -->
<script defer src="<?php echo get_template_directory_uri();?>/js/libs/swiper/swiper-bundle.min.js"></script>
<script defer src="<?php echo get_template_directory_uri();?>/js/sliders-swiper.js"></script>


<?php get_footer(); ?>