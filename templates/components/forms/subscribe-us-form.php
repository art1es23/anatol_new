<div class="subscribe_us_form form hidden">

    <button class="close-button">
        <div class="close-button--wrapper">
            <span class="close-button__item close-button__item--top"></span>
            <span class="close-button__item close-button__item--bottom"></span>
        </div>
    </button>

    <h4 class="form-title">
        <?php
            if(ICL_LANGUAGE_CODE == 'ru') {
                echo 'Получите контент и трафаретную печать в своем почтовом ящике';
            } elseif(ICL_LANGUAGE_CODE == 'pl') {
                echo do_shortcode('[contact-form-7 id="3066" title="QuickBook Form PL"]');
            } elseif(ICL_LANGUAGE_CODE == 'es') {
                echo 'Obtenga contenido e inspiración de impresión de pantalla en su bandeja de entrada';
            } else {
                echo 'Don`t miss the Anatol news';
            } ?>
    </h4>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

    <form id="__vtigerWebForm1" class="form-inner home_subscribe" name="SubscribeUs"
        action="https://vtiger.anatol.com/modules/Webforms/capture.php" method="post" accept-charset="utf-8"
        enctype="multipart/form-data">

        <input type="hidden" name="SFWebFormTimer" value="4335">
        <input type="hidden" name="__vtrftk" value="sid:cde016ecd10cda4b823826413fcb94801bfcdd48,1671527265">
        <input type="hidden" name="publicid" value="595b1c496d292efe4e4ff1abbea8c739">
        <input type="hidden" name="urlencodeenable" value="1">
        <input type="hidden" name="name" value="SubscribeUs">
        <input type="text" name="cf_1131" value="Email Subscribe TEST22" style="display:none;">

        <input type="text" name="leadsource" value="Web Site" style="display:none;">
        <!-- <input type="text" name="cf_979" value="Email Subscribe <?php echo(ICL_LANGUAGE_CODE); ?>"
            style="display:none;"> -->

        <div class="form-inner__item">
            <div class="form-inner__item--full">
                <input type="text" name="firstname" value="" placeholder="<?php _e('First Name', 'anatol'); ?>"
                    required>
            </div>
        </div>
        <div class="form-inner__item">
            <div class="form-inner__item--full">
                <input type="text" name="lastname" value="" placeholder="<?php _e('Last Name', 'anatol'); ?>" required>
            </div>
        </div>
        <div class="form-inner__item">
            <div class="form-inner__item--full">
                <input type="Email" name="email" value="" placeholder="<?php _e('Email', 'anatol'); ?>" required>
            </div>
        </div>

        <input class="button red-button draw-red" type="submit" name="submit_web_form"
            value="<?php _e('Subscribe', 'anatol'); ?>">
    </form>

</div>