<style>
<?php include locate_template('css/components/forms/vacancy-form.css');
?>
</style>

<div class="vacancy-contact-us form hidden">

    <?php
        if(ICL_LANGUAGE_CODE == 'ru') {
        echo do_shortcode('[contact-form-7 id="2353" title="Отправьте нам свое резюме"]');
        } elseif(ICL_LANGUAGE_CODE == 'pl') {
        echo do_shortcode('[contact-form-7 id="2354" title="Prześlij nam swoje CV"]');
        } elseif(ICL_LANGUAGE_CODE == 'es') {
        echo do_shortcode('[contact-form-7 id="2355" title="Envíenos su CV"]');
        } else {
        echo do_shortcode('[contact-form-7 id="2352" title="Send us your CV"]');
        }
        ?>
</div>