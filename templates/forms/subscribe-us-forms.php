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

    <form id="__vtigerWebForm1" class="form-inner home_subscribe" name="Email Subscribe" action="" method="post"
        accept-charset="utf-8" enctype="multipart/form-data">

        <input type="hidden" name="SFWebFormTimer" value="4335">
        <input type="hidden" name="__vtrftk" value="sid:117320670c26be7435a870e1421555aa92ad29f6,1614093617">
        <input type="hidden" name="publicid" value="0aee4eda12acdaf163860fd64d6841da">
        <input type="hidden" name="urlencodeenable" value="1">
        <input type="hidden" name="name" value="Email Subscribe">
        <input type="text" name="leadsource" value="Web Site" style="display:none;">
        <input type="text" name="cf_979" value="Email Subscribe <?php echo(ICL_LANGUAGE_CODE); ?>"
            style="display:none;">
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

<!-- <script>
$("#__vtigerWebForm.home_subscribe").submit(function(e) {
    e.preventDefault();
    var form = $(this);
    var url = 'https://sale.anatol.com/modules/Webforms/capture.php';
    translate_kurul_sub('#__vtigerWebForm.home_subscribe');
    grecaptcha.ready(function() {
        grecaptcha.execute('6LfVhtMUAAAAANWXok-9PsISTBoAZUHg-9rBr6Db', {
            action: 'submit'
        }).then(function(token) {
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function(data) {
                    alert(data);
                }
            });
        });
    });
    $('.innerr').hide();
    $('.popupp').hide();
    //$('.download_click_btn .download_click').show();	

});
</script> -->