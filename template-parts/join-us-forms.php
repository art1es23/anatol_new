<div class="join_us_form innerr">
    <a class="close_pop" style="float: right;"><img loading="lazy" class="lozad"
            src="<?php bloginfo('template_directory'); ?>/images/close.svg" style="width: 20px" alt=""></a>
    <div class="form-title">
        <h4 class="popup_title">
            <?PHP
if($_REQUEST['lang'] == 'ru') {
	echo 'Получите контент и трафаретную печать в своем почтовом ящике';
} elseif($_REQUEST['lang'] == 'pl') {
	echo 'Zdobądź zawartość i ekranowe inspirowanie w skrzynce odbiorczej';
} elseif($_REQUEST['lang'] == 'es') {
	echo 'Obtenga contenido e inspiración de impresión de pantalla en su bandeja de entrada';
} else {
	echo 'Get Content and Screen Printing Inspiration in Your Inbox';
}
?>
        </h4>
    </div>
    <div id="contact_form_pop" class="form_pop">
        <form id="__vtigerWebForm" class="home_subscribe" name="Email Subscribe"
            action="https://sale.anatol.com/modules/Webforms/capture.php" method="post" accept-charset="utf-8"
            enctype="multipart/form-data">
            <input type="hidden" name="__vtrftk" value="sid:a67ab65aefd7e2eea5d466eac8208dbae090bc8f,1619095280">
            <input type="hidden" name="publicid" value="5a8f290dc43a385f05613560cf3df8ae">
            <input type="hidden" name="urlencodeenable" value="1">
            <input type="hidden" name="name" value="Email Subscribe">
            <input type="text" name="cf_979" value="Email Subscribe" style="display:none;">
            <div class="form-row">
                <div class="input">
                    <input type="text" name="firstname" value="" placeholder="First Name" required>
                </div>
            </div>
            <div class="form-row">
                <div class="input">
                    <input type="text" name="lastname" value="" placeholder="Last Name" required>
                </div>
            </div>
            <div class="form-row">
                <div class="input">
                    <input type="Email" name="email" value="" placeholder="Email" required>
                </div>
            </div>
            <div class="form-row">
                <div class="actions">
                    <input class="hs-button primary large" type="submit" name="submit_web_form" value="Subscribe">
                </div>
            </div>
        </form>

    </div>
</div>