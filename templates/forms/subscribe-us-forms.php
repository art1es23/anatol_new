<div class="subscribe_us_form innerr hidden">
    <a class="close_pop" style="float: right;"><img loading="lazy" class="lozad"
            src="<?php bloginfo('template_directory'); ?>/images/close.svg" style="width: 20px" alt=""></a>
    <div class="form-title">
        <h4 class="popup_title">
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
    </div>
    <div id="contact_form_pop" class="form_pop">
        <form id="__vtigerWebForm" class="home_subscribe" name="Email Subscribe" action="" method="post"
            accept-charset="utf-8" enctype="multipart/form-data">

            <input type="hidden" name="SFWebFormTimer" value="4335">
            <input type="hidden" name="__vtrftk" value="sid:117320670c26be7435a870e1421555aa92ad29f6,1614093617">
            <input type="hidden" name="publicid" value="0aee4eda12acdaf163860fd64d6841da">
            <input type="hidden" name="urlencodeenable" value="1">
            <input type="hidden" name="name" value="Email Subscribe">
            <input type="text" name="leadsource" value="Web Site" style="display:none;">
            <input type="text" name="cf_979" value="Email Subscribe <?php echo(ICL_LANGUAGE_CODE); ?>"
                style="display:none;">
            <div class="form-row">
                <div class="input">
                    <input type="text" name="firstname" value="" placeholder="<?php _e('First Name', 'anatol'); ?>"
                        required>
                </div>
            </div>
            <div class="form-row">
                <div class="input">
                    <input type="text" name="lastname" value="" placeholder="<?php _e('Last Name', 'anatol'); ?>"
                        required>
                </div>
            </div>
            <div class="form-row">
                <div class="input">
                    <input type="Email" name="email" value="" placeholder="<?php _e('Email', 'anatol'); ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="actions">
                    <input class="hs-button primary large" type="submit" name="submit_web_form"
                        value="<?php _e('Subscribe', 'anatol'); ?>">
                </div>
            </div>
        </form>

    </div>
</div>

<script>
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
</script>