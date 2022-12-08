
<div class="home_header_popup_wrap" id="home_header_popup_wrap">
<h4 class="popup_title"><?PHP
if($_REQUEST['lang'] == 'ru') {
	echo 'Получите контент и трафаретную печать в своем почтовом ящике';
} elseif($_REQUEST['lang'] == 'pl') {
	echo 'Zdobądź zawartość i ekranowe inspirowanie w skrzynce odbiorczej';
} elseif($_REQUEST['lang'] == 'es') {
	echo 'Obtenga contenido e inspiración de impresión de pantalla en su bandeja de entrada';
} else {
	echo 'Get Content and Screen Printing Inspiration in Your Inbox';
}
?></h4>
<form class="home_subscribe" action="https://crm.snapforce.com/dev2/modules/models/settings/customization/m_webforms.inc.php" method="post">
    <input type="hidden" name="SFWebFormTimer" value="4335">
    <input type="hidden" name="WebFormID" value="5e2b0297f2ee9">
	<div class="form-row">
        <div class="input">
                <input type="text" name="contact_first" placeholder="First Name" required >
        </div>
	</div>
	<div class="form-row">
        <div class="input">
                <input type="Email" name="email" placeholder="Email" required>
        </div>
	</div>
	<div class="form-row">
		<div class="actions">
			<input class="hs-button primary large" type="submit" name="submit_web_form" value="Subscribe">
        </div>
	</div>
</form>
</div>