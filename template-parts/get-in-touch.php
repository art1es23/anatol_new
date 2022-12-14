<section class="get_in_touch">
    <div class="get_in_touch_cont ">
        <div class="get_in_contact">
            <div class="get_in_contact--wrapper">
                <div class="contact_line anim_fade">
                    <h2 class="get_in_title"><?php _e('Get In Touch', 'anatol'); ?></h2>
                </div>
                <div class="get_contacts_slider sldots dots_left anim_fade">
                    <?PHP if(have_rows('regional_offices_repeater', 'option')) {
			        while (have_rows('regional_offices_repeater', 'option')){
				        the_row();
				    ?>
                    <div class="left_column cont_datas ">
                        <?PHP if(!empty(get_sub_field('name'))) { ?>
                        <div class="contact_line ">
                            <h4 class="contact_line_header">
                                <?PHP echo do_shortcode(get_sub_field('name')); ?>
                            </h4>
                        </div>
                        <?PHP } ?>

                        <?PHP if(!empty(get_sub_field('address'))) { ?>
                        <div class="contact_line ">
                                <h4 class="contact_line_header">
                                    <span class="cont_ico ico_location"></span>
                                    <span><?php _e('Location', 'anatol'); ?></span>
                                </h4>
                                <div class="">
                                    <?PHP echo do_shortcode(get_sub_field('address')); ?>
                                </div>
                        </div>
                        <?PHP } ?>

                        <?PHP if(!empty(get_sub_field('phone'))) { ?>
                        <div class="contact_line">
                                <h4 class="contact_line_header">
                                    <span class="cont_ico ico_phone"></span>
                                    <span><?php _e('Phone', 'anatol'); ?></span>
                                </h4>
                                <div class="">
                                    <?PHP echo do_shortcode(get_sub_field('phone')); ?>
                                </div>
                                <?PHP if(!empty(get_sub_field('phone_2'))){?>
                                <div class="">
                                    <?PHP echo do_shortcode(get_sub_field('phone_2')); ?>
                                </div>
                                <?PHP } ?>
                        </div>
                        <?PHP } ?>

                    </div>
                    <?PHP }}?>
                </div>
            </div>
        </div>

        <div class="get_in_form">
            <div id="contact_form" class="contact-form--wrapper anim_fade">
                <h2 class="cont_form_title"><?php _e('Send A Message', 'anatol'); ?></h2>
                <div class="et_pb_contact">
                    <div class="feedback_form">
                        <form id="get_in_touch_form" name="Get In Touch" action="" method="post" accept-charset="utf-8"
                            enctype="multipart/form-data" class="get_quote get_forms">
                            <input type="hidden" name="SFWebFormTimer" value="4335">
                            <input type="hidden" name="__vtrftk"
                                value="sid:117320670c26be7435a870e1421555aa92ad29f6,1614093617">
                            <input type="hidden" name="publicid" value="0aee4eda12acdaf163860fd64d6841da">
                            <input type="hidden" name="urlencodeenable" value="1"><input type="hidden" name="name"
                                value="Get In Touch">
                            <input type="text" name="leadsource" value="Web Site" style="display:none;">
                            <input type="text" name="cf_979" value="Get In Touch" style="display:none;">
                            <div class="form-row flex">
                                <div class="half">
                                    <label>First Name<span class="field_required"></span></label>
                                    <input type="text" name="firstname"
                                        placeholder="<?php _e('First Name', 'anatol'); ?>" required="">
                                </div>
                                <div class="half">
                                    <label>Last Name<span class="field_required">*</span></label>
                                    <input type="text" name="lastname" placeholder="<?php _e('Last Name', 'anatol'); ?>"
                                        required="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="field_full">
                                    <label>Company Name</label>
                                    <input type="text" name="company"
                                        placeholder="<?php _e('Company Name', 'anatol'); ?>">
                                </div>
                            </div>
                            <div class="form-row flex">
                                <div class="half">
                                    <label>Phone Number<span class="field_required"></span></label>
                                    <input type="tel" name="phone" placeholder="<?php _e('Phone Number', 'anatol'); ?>"
                                        maxlength="18" id="tel" required="">
                                </div>
                                <div class="half">
                                    <label>Email<span class="field_required"></span></label>
                                    <input type="Email" name="email" placeholder="<?php _e('Email', 'anatol'); ?>"
                                        required="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="field_full">
                                    <label>select country</label>
                                    <select name="cf_1085" onchange="yesnoCheckGet(this);" required="">
                                        <option class="choose_elements" value="" selected="selected">
                                            <?php _e('Select country', 'anatol'); ?></option>
                                        <option class="elements" value="United States">United States</option>
                                        <option class="elements" value="United Kingdom">United Kingdom</option>
                                        <option class="elements" value="Afghanistan">Afghanistan</option>
                                        <option class="elements" value="Albania">Albania</option>
                                        <option class="elements" value="Algeria">Algeria</option>
                                        <option class="elements" value="American Samoa">American Samoa</option>
                                        <option class="elements" value="Andorra">Andorra</option>
                                        <option class="elements" value="Angola">Angola</option>
                                        <option class="elements" value="Anguilla">Anguilla</option>
                                        <option class="elements" value="Antarctica">Antarctica</option>
                                        <option class="elements" value="Antigua and Barbuda">Antigua and Barbuda
                                        </option>
                                        <option class="elements" value="Argentina">Argentina</option>
                                        <option class="elements" value="Armenia">Armenia</option>
                                        <option class="elements" value="Aruba">Aruba</option>
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
                                        <option class="elements" value="Bermuda">Bermuda</option>
                                        <option class="elements" value="Bhutan">Bhutan</option>
                                        <option class="elements" value="Bolivia">Bolivia</option>
                                        <option class="elements" value="Bonaire">Bonaire, Sint Eustatius and Saba
                                        </option>
                                        <option class="elements" value="Bosnia and Herzegovina">Bosnia and Herzegovina
                                        </option>
                                        <option class="elements" value="Botswana">Botswana</option>
                                        <option class="elements" value="Bouvet Island">Bouvet Island</option>
                                        <option class="elements" value="Brazil">Brazil</option>
                                        <option class="elements" value="British Indian Ocean Territory">British Indian
                                            Ocean Territory</option>
                                        <option class="elements" value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option class="elements" value="Bulgaria">Bulgaria</option>
                                        <option class="elements" value="Burkina Faso">Burkina Faso</option>
                                        <option class="elements" value="Burundi">Burundi</option>
                                        <option class="elements" value="Cambodia">Cambodia</option>
                                        <option class="elements" value="Cameroon">Cameroon</option>
                                        <option class="elements" value="Canada">Canada</option>
                                        <option class="elements" value="Cape Verde">Cape Verde</option>
                                        <option class="elements" value="Cayman Islands">Cayman Islands</option>
                                        <option class="elements" value="Central African Republic">Central African
                                            Republic</option>
                                        <option class="elements" value="Chad">Chad</option>
                                        <option class="elements" value="Chile">Chile</option>
                                        <option class="elements" value="China">China</option>
                                        <option class="elements" value="Christmas Island">Christmas Island</option>
                                        <option class="elements" value="Cocos (Keeling) Islands">Cocos (Keeling) Islands
                                        </option>
                                        <option class="elements" value="Colombia">Colombia</option>
                                        <option class="elements" value="Comoros">Comoros</option>
                                        <option class="elements" value="Congo">Congo</option>
                                        <option class="elements" value="Cook Islands">Cook Islands</option>
                                        <option class="elements" value="Costa Rica">Costa Rica</option>
                                        <option class="elements" value="Cote D'ivoire">Cote D'ivoire</option>
                                        <option class="elements" value="Croatia">Croatia</option>
                                        <option class="elements" value="Cuba">Cuba</option>
                                        <option class="elements" value="Cyprus">Cyprus</option>
                                        <option class="elements" value="Czech Republic">Czech Republic</option>
                                        <option class="elements" value="Denmark">Denmark</option>
                                        <option class="elements" value="Djibouti">Djibouti</option>
                                        <option class="elements" value="Dominica">Dominica</option>
                                        <option class="elements" value="Dominican Republic">Dominican Republic</option>
                                        <option class="elements" value="Ecuador">Ecuador</option>
                                        <option class="elements" value="Egypt">Egypt</option>
                                        <option class="elements" value="El Salvador">El Salvador</option>
                                        <option class="elements" value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option class="elements" value="Eritrea">Eritrea</option>
                                        <option class="elements" value="Estonia">Estonia</option>
                                        <option class="elements" value="Ethiopia">Ethiopia</option>
                                        <option class="elements" value="Falkland Islands (Malvinas)">Falkland Islands
                                            (Malvinas)</option>
                                        <option class="elements" value="Faroe Islands">Faroe Islands</option>
                                        <option class="elements" value="Fiji">Fiji</option>
                                        <option class="elements" value="Finland">Finland</option>
                                        <option class="elements" value="France">France</option>
                                        <option class="elements" value="French Guiana">French Guiana</option>
                                        <option class="elements" value="French Polynesia">French Polynesia</option>
                                        <option class="elements" value="French Southern Territories">French Southern
                                            Territories</option>
                                        <option class="elements" value="Gabon">Gabon</option>
                                        <option class="elements" value="Gambia">Gambia</option>
                                        <option class="elements" value="Georgia">Georgia</option>
                                        <option class="elements" value="Germany">Germany</option>
                                        <option class="elements" value="Ghana">Ghana</option>
                                        <option class="elements" value="Gibraltar">Gibraltar</option>
                                        <option class="elements" value="Greece">Greece</option>
                                        <option class="elements" value="Greenland">Greenland</option>
                                        <option class="elements" value="Grenada">Grenada</option>
                                        <option class="elements" value="Guadeloupe">Guadeloupe</option>
                                        <option class="elements" value="Guam">Guam</option>
                                        <option class="elements" value="Guatemala">Guatemala</option>
                                        <option class="elements" value="Guinea">Guinea</option>
                                        <option class="elements" value="Guinea-bissau">Guinea-bissau</option>
                                        <option class="elements" value="Guyana">Guyana</option>
                                        <option class="elements" value="Haiti">Haiti</option>
                                        <option class="elements" value="Heard Island and Mcdonald Islands">Heard Island
                                            and Mcdonald Islands</option>
                                        <option class="elements" value="Holy See (Vatican City State)">Holy See (Vatican
                                            City State)</option>
                                        <option class="elements" value="Honduras">Honduras</option>
                                        <option class="elements" value="Hong Kong">Hong Kong</option>
                                        <option class="elements" value="Hungary">Hungary</option>
                                        <option class="elements" value="Iceland">Iceland</option>
                                        <option class="elements" value="India">India</option>
                                        <option class="elements" value="Indonesia">Indonesia</option>
                                        <option class="elements" value="Iran">Iran, Islamic Republic of</option>
                                        <option class="elements" value="Iraq">Iraq</option>
                                        <option class="elements" value="Ireland">Ireland</option>
                                        <option class="elements" value="Israel">Israel</option>
                                        <option class="elements" value="Italy">Italy</option>
                                        <option class="elements" value="Jamaica">Jamaica</option>
                                        <option class="elements" value="Japan">Japan</option>
                                        <option class="elements" value="Jordan">Jordan</option>
                                        <option class="elements" value="Kazakhstan">Kazakhstan</option>
                                        <option class="elements" value="Kenya">Kenya</option>
                                        <option class="elements" value="Kiribati">Kiribati</option>
                                        <option class="elements" value="Democratic People's Republic of Korea">Korea,
                                            Democratic People's Republic of</option>
                                        <option class="elements" value="Republic of Korea">Korea, Republic of</option>
                                        <option class="elements" value="Kuwait">Kuwait</option>
                                        <option class="elements" value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option class="elements" value="Lao People's Democratic Republic">Lao People's
                                            Democratic Republic</option>
                                        <option class="elements" value="Latvia">Latvia</option>
                                        <option class="elements" value="Lebanon">Lebanon</option>
                                        <option class="elements" value="Lesotho">Lesotho</option>
                                        <option class="elements" value="Liberia">Liberia</option>
                                        <option class="elements" value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya
                                        </option>
                                        <option class="elements" value="Liechtenstein">Liechtenstein</option>
                                        <option class="elements" value="Lithuania">Lithuania</option>
                                        <option class="elements" value="Luxembourg">Luxembourg</option>
                                        <option class="elements" value="Macao">Macao</option>
                                        <option class="elements" value="Macedonia">Macedonia, the former Yugoslav
                                            Republic of</option>
                                        <option class="elements" value="Madagascar">Madagascar</option>
                                        <option class="elements" value="Malawi">Malawi</option>
                                        <option class="elements" value="Malaysia">Malaysia</option>
                                        <option class="elements" value="Maldives">Maldives</option>
                                        <option class="elements" value="Mali">Mali</option>
                                        <option class="elements" value="Malta">Malta</option>
                                        <option class="elements" value="Marshall Islands">Marshall Islands</option>
                                        <option class="elements" value="Martinique">Martinique</option>
                                        <option class="elements" value="Mauritania">Mauritania</option>
                                        <option class="elements" value="Mauritius">Mauritius</option>
                                        <option class="elements" value="Mayotte">Mayotte</option>
                                        <option class="elements" value="Mexico">Mexico</option>
                                        <option class="elements" value="Federated States of Micronesia">Micronesia,
                                            Federated States of</option>
                                        <option class="elements" value="Moldova">Moldova, Republic of</option>
                                        <option class="elements" value="Monaco">Monaco</option>
                                        <option class="elements" value="Mongolia">Mongolia</option>
                                        <option class="elements" value="Montserrat">Montserrat</option>
                                        <option class="elements" value="Morocco">Morocco</option>
                                        <option class="elements" value="Mozambique">Mozambique</option>
                                        <option class="elements" value="Myanmar">Myanmar</option>
                                        <option class="elements" value="Namibia">Namibia</option>
                                        <option class="elements" value="Nauru">Nauru</option>
                                        <option class="elements" value="Nepal">Nepal</option>
                                        <option class="elements" value="Netherlands">Netherlands</option>
                                        <option class="elements" value="Netherlands Antilles">Netherlands Antilles
                                        </option>
                                        <option class="elements" value="New Caledonia">New Caledonia</option>
                                        <option class="elements" value="New Zealand">New Zealand</option>
                                        <option class="elements" value="Nicaragua">Nicaragua</option>
                                        <option class="elements" value="Niger">Niger</option>
                                        <option class="elements" value="Nigeria">Nigeria</option>
                                        <option class="elements" value="Niue">Niue</option>
                                        <option class="elements" value="Norfolk Island">Norfolk Island</option>
                                        <option class="elements" value="Northern Mariana Islands">Northern Mariana
                                            Islands</option>
                                        <option class="elements" value="Norway">Norway</option>
                                        <option class="elements" value="Oman">Oman</option>
                                        <option class="elements" value="Pakistan">Pakistan</option>
                                        <option class="elements" value="Palau">Palau</option>
                                        <option class="elements" value="Occupied Palestinian Territory">Palestinian
                                            Territory, Occupied</option>
                                        <option class="elements" value="Panama">Panama</option>
                                        <option class="elements" value="Papua New Guinea">Papua New Guinea</option>
                                        <option class="elements" value="Paraguay">Paraguay</option>
                                        <option class="elements" value="Peru">Peru</option>
                                        <option class="elements" value="Philippines">Philippines</option>
                                        <option class="elements" value="Pitcairn">Pitcairn</option>
                                        <option class="elements" value="Poland">Poland</option>
                                        <option class="elements" value="Portugal">Portugal</option>
                                        <option class="elements" value="Puerto Rico">Puerto Rico</option>
                                        <option class="elements" value="Qatar">Qatar</option>
                                        <option class="elements" value="Reunion">Reunion</option>
                                        <option class="elements" value="Romania">Romania</option>
                                        <option class="elements" value="Russian Federation">Russian Federation</option>
                                        <option class="elements" value="Rwanda">Rwanda</option>
                                        <option class="elements" value="Saint Helena">Saint Helena</option>
                                        <option class="elements" value="Saint Kitts and Nevis">Saint Kitts and Nevis
                                        </option>
                                        <option class="elements" value="Saint Lucia">Saint Lucia</option>
                                        <option class="elements" value="Saint Martin (French part)">Saint Martin (French
                                            part)</option>
                                        <option class="elements" value="Saint Pierre and Miquelon">Saint Pierre and
                                            Miquelon</option>
                                        <option class="elements" value="Saint Vincent and The Grenadines">Saint Vincent
                                            and The Grenadines</option>
                                        <option class="elements" value="Samoa">Samoa</option>
                                        <option class="elements" value="San Marino">San Marino</option>
                                        <option class="elements" value="Sao Tome and Principe">Sao Tome and Principe
                                        </option>
                                        <option class="elements" value="Saudi Arabia">Saudi Arabia</option>
                                        <option class="elements" value="Senegal">Senegal</option>
                                        <option class="elements" value="Serbia and Montenegro">Serbia and Montenegro
                                        </option>
                                        <option class="elements" value="Seychelles">Seychelles</option>
                                        <option class="elements" value="Sierra Leone">Sierra Leone</option>
                                        <option class="elements" value="Singapore">Singapore</option>
                                        <option class="elements" value="Slovakia">Slovakia</option>
                                        <option class="elements" value="Slovenia">Slovenia</option>
                                        <option class="elements" value="Solomon Islands">Solomon Islands</option>
                                        <option class="elements" value="Somalia">Somalia</option>
                                        <option class="elements" value="South Africa">South Africa</option>
                                        <option class="elements" value="South Georgia and The South Sandwich Islands">
                                            South Georgia and The South Sandwich Islands</option>
                                        <option class="elements" value="Spain">Spain</option>
                                        <option class="elements" value="Sri Lanka">Sri Lanka</option>
                                        <option class="elements" value="Sudan">Sudan</option>
                                        <option class="elements" value="Suriname">Suriname</option>
                                        <option class="elements" value="Svalbard and Jan Mayen">Svalbard and Jan Mayen
                                        </option>
                                        <option class="elements" value="Swaziland">Swaziland</option>
                                        <option class="elements" value="Sweden">Sweden</option>
                                        <option class="elements" value="Switzerland">Switzerland</option>
                                        <option class="elements" value="Syrian Arab Republic">Syrian Arab Republic
                                        </option>
                                        <option class="elements" value="Taiwan">Taiwan, Province of China</option>
                                        <option class="elements" value="Tajikistan">Tajikistan</option>
                                        <option class="elements" value="Tanzania, United Republic of">Tanzania, United
                                            Republic of</option>
                                        <option class="elements" value="Thailand">Thailand</option>
                                        <option class="elements" value="Timor-leste">Timor-leste</option>
                                        <option class="elements" value="Togo">Togo</option>
                                        <option class="elements" value="Tokelau">Tokelau</option>
                                        <option class="elements" value="Tonga">Tonga</option>
                                        <option class="elements" value="Trinidad and Tobago">Trinidad and Tobago
                                        </option>
                                        <option class="elements" value="Tunisia">Tunisia</option>
                                        <option class="elements" value="Turkey">Turkey</option>
                                        <option class="elements" value="Turkmenistan">Turkmenistan</option>
                                        <option class="elements" value="Turks and Caicos Islands">Turks and Caicos
                                            Islands</option>
                                        <option class="elements" value="Tuvalu">Tuvalu</option>
                                        <option class="elements" value="Uganda">Uganda</option>
                                        <option class="elements" value="Ukraine">Ukraine</option>
                                        <option class="elements" value="United Arab Emirates">United Arab Emirates
                                        </option>
                                        <option class="elements" value="United Kingdom">United Kingdom</option>
                                        <option class="elements" value="United States">United States</option>
                                        <option class="elements" value="United States Minor Outlying Islands">United
                                            States Minor Outlying Islands</option>
                                        <option class="elements" value="Uruguay">Uruguay</option>
                                        <option class="elements" value="Uzbekistan">Uzbekistan</option>
                                        <option class="elements" value="Vanuatu">Vanuatu</option>
                                        <option class="elements" value="Venezuela">Venezuela</option>
                                        <option class="elements" value="Viet Nam">Viet Nam</option>
                                        <option class="elements" value="British Virgin Islands">Virgin Islands, British
                                        </option>
                                        <option class="elements" value="Virgin Islands, U.S.">Virgin Islands, U.S.
                                        </option>
                                        <option class="elements" value="Wallis and Futuna">Wallis and Futuna</option>
                                        <option class="elements" value="Western Sahara">Western Sahara</option>
                                        <option class="elements" value="Yemen">Yemen</option>
                                        <option class="elements" value="Zambia">Zambia</option>
                                        <option class="elements" value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                            </div>
                            <div id="ifYesGet" class="form-row" style="display: none;">
                                <div class="field_full">
                                    <label for="state_required">State/Region<span class="form-required">*</span></label>
                                    <select id="state_required" class="invalid error" name="cf_1093">
                                        <option class="choose_elements" value="" disabled="" selected="">
                                            <?php _e('Please Select State/Region*', 'anatol'); ?></option>
                                        <option class="usa_state elements" value="Alabama">Alabama</option>
                                        <option class="usa_state elements" value="Alaska">Alaska</option>
                                        <option class="usa_state elements" value="Arizona">Arizona</option>
                                        <option class="usa_state elements" value="Arkansas">Arkansas</option>
                                        <option class="usa_state elements" value="California">California</option>
                                        <option class="usa_state elements" value="Colorado">Colorado</option>
                                        <option class="usa_state elements" value="Connecticut">Connecticut</option>
                                        <option class="usa_state elements" value="Delaware">Delaware</option>
                                        <option class="usa_state elements" value="District of Columbia">District of
                                            Columbia</option>
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
                                        <option class="usa_state elements" value="North Carolina">North Carolina
                                        </option>
                                        <option class="usa_state elements" value="North Dakota">North Dakota</option>
                                        <option class="usa_state elements" value="Ohio">Ohio</option>
                                        <option class="usa_state elements" value="Oklahoma">Oklahoma</option>
                                        <option class="usa_state elements" value="Oregon">Oregon</option>
                                        <option class="usa_state elements" value="Pennsylvania">Pennsylvania</option>
                                        <option class="usa_state elements" value="Puerto Rico">Puerto Rico</option>
                                        <option class="usa_state elements" value="Rhode Island">Rhode Island</option>
                                        <option class="usa_state elements" value="South Carolina">South Carolina
                                        </option>
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
                                        <option class="canadian_province elements" value="British Columbia">British
                                            Columbia</option>
                                        <option class="canadian_province elements" value="Manitoba">Manitoba</option>
                                        <option class="canadian_province elements" value="New Brunswick">New Brunswick
                                        </option>
                                        <option class="canadian_province elements" value="Newfoundland and Labrador">
                                            Newfoundland and Labrador</option>
                                        <option class="canadian_province elements" value="Northwest Territories">
                                            Northwest Territories</option>
                                        <option class="canadian_province elements" value="Nova Scotia">Nova Scotia
                                        </option>
                                        <option class="canadian_province elements" value="Nunavut">Nunavut</option>
                                        <option class="canadian_province elements" value="Ontario">Ontario</option>
                                        <option class="canadian_province elements" value="Prince Edward Island">Prince
                                            Edward Island</option>
                                        <option class="canadian_province elements" value="Quebec">Quebec</option>
                                        <option class="canadian_province elements" value="Saskatchewan">Saskatchewan
                                        </option>
                                        <option class="canadian_province elements" value="Yukon Territories">Yukon
                                            Territories</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="field_full">
                                    <label>Additional Info</label>
                                    <textarea class="" name="description"
                                        placeholder="<?php _e('Additional Info', 'anatol'); ?>"></textarea>
                                </div>
                            </div>
                            <div class="form-row text-center">
                                <input id="my_form_send" type="submit" name="submit_web_form"
                                    value="<?php _e('Get a Quote', 'anatol'); ?>" class="button red-button draw-red">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
    $("#get_in_touch_form").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var url = 'https://sale.anatol.com/modules/Webforms/capture.php';
        translate_kurul('#get_in_touch_form');
        grecaptcha.ready(function() {
            grecaptcha.execute('6LfVhtMUAAAAANWXok-9PsISTBoAZUHg-9rBr6Db', {
                action: 'submit'
            }).then(function(token) {
                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(),
                    success: function() {}
                });
            });
        });
        $('#succes_message').show(''),
            setTimeout(function() {
                $("#succes_message").hide('slow');
                $('input').val('');
                $('select').val('');
                $('textarea').val('');
            }, 2000)
    });
    </script>
    <script>
    function yesnoCheckGet(that) {
        if (that.value == "United States") {
            document.getElementById("ifYesGet").style.display = "block";
            document.getElementById("state_required").setAttribute("required", "");
            $('.usa_state').show();
        } else if (that.value == "Canada") {
            document.getElementById("ifYesGet").style.display = "block";
            $('.canadian_province').show();
            $('.usa_state').hide();
        } else {
            document.getElementById("ifYesGet").style.display = "none";
            document.getElementById("state_required").removeAttribute("required");
        }
    }
    </script>
</section>