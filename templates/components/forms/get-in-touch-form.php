<style>
<?php include locate_template('css/components/get-in-touch-form.css');
?>
</style>

<div id="contact_form" class="anim_right">
    <h2 class="cont_form_title">Send A Message</h2>
    <div class="et_pb_contact">
        <div class="feedback_form">
            <?php
        $current_language_code = apply_filters( 'wpml_current_language', null );
        if($current_language_code == 'en'): echo do_shortcode('[contact-form-7 id="19474" title="Contact form 2 (p-contact en)"]');
        elseif($current_language_code == 'ru'): echo do_shortcode('[contact-form-7 id="25578" title="Contact form 2_ru"]');
        elseif($current_language_code == 'es'): echo do_shortcode('[contact-form-7 id="27639" title="Contact form 2 (p-contact es)"]');
        endif;?>
        </div>
    </div>
</div>