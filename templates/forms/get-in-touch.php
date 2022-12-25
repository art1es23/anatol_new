<section class="get_in_touch">
    <div class="get_in_touch_cont">
        <div class="get_in_contact">
            <div class="anim_left">
                <div class="contact_line ">
                    <div class="get_in_title">
                        <h2>Get In Touch</h2>
                    </div>
                </div>
                <div class="get_contacts_slider sldots">

                    <div class="left_column cont_datas">
                        <div class="contact_line ">
                            <h4 class="contact_line_header">World Headquarters</h4>
                        </div>
                        <div class="contact_line ">
                            <div class="">
                                <h4 class="contact_line_header"><span
                                        class="cont_ico ico_location"></span><span>Location</span></h4>
                                <div class="">919 Sherwood Drive<br>
                                    Lake Bluff, IL 60044, USA</div>
                            </div>
                        </div>
                        <div class="contact_line">
                            <div class="">
                                <h4 class="contact_line_header"><span
                                        class="cont_ico ico_phone"></span><span>Phone</span></h4>
                                <div class="">847-367-9760</div>
                            </div>
                        </div>
                    </div>


                    <div class="left_column cont_datas">
                        <div class="contact_line ">
                            <h4 class="contact_line_header">Anatol Europe</h4>
                        </div>
                        <div class="contact_line ">
                            <div class="">
                                <h4 class="contact_line_header"><span
                                        class="cont_ico ico_location"></span><span>Location</span></h4>
                                <div class="">Ul Rejonowa 10 <br>17-100 Bielsk Podlaski, Poland</div>
                            </div>
                        </div>
                        <div class="contact_line">
                            <div class="">
                                <h4 class="contact_line_header"><span
                                        class="cont_ico ico_phone"></span><span>Phone</span></h4>
                                <div class="">(+48) 85 731 93 00</div>
                            </div>
                        </div>
                    </div>
                    <div class="left_column cont_datas">
                        <div class="contact_line ">
                            <h4 class="contact_line_header">Anatol Ukraine</h4>
                        </div>
                        <div class="contact_line ">
                            <div class="">
                                <h4 class="contact_line_header"><span
                                        class="cont_ico ico_location"></span><span>Location</span></h4>
                                <div class="">Smilyvykh Street, 28A,<br>Lviv, Ukraine</div>
                            </div>
                        </div>
                        <div class="contact_line">
                            <div class="">
                                <h4 class="contact_line_header"><span
                                        class="cont_ico ico_phone"></span><span>Phone</span></h4>
                                <div class="">+38 093 399 89 76</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="get_in_form">
            <div id="contact_form" class="anim_right">
                <h2 class="cont_form_title">Send A Message</h2>
                <div class="et_pb_contact">
                    <div class="feedback_form">
                        <?php
             $current_language_code = apply_filters( 'wpml_current_language', null );
            if($current_language_code == 'en'): echo do_shortcode('[contact-form-7 id="19474" title="Contact form 2 (p-contact en)"]');
            ?>
                        <?php
            elseif($current_language_code == 'ru'): echo do_shortcode('[contact-form-7 id="25578" title="Contact form 2_ru"]');
            ?>
                        <?php
            elseif($current_language_code == 'es'): echo do_shortcode('[contact-form-7 id="27639" title="Contact form 2 (p-contact es)"]');
            ?>
                        <?php
            endif;
            ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>