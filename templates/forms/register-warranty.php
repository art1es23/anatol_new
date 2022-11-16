<div class="reg_popup"></div>
<div class="log_warranty">
    <p>To register the warranty on your Anatol machine, log in to your Anatol account or create a new account. By
        submitting the warranty registration form, you agree to all Warranty terms and conditions. You must complete a
        separate registration form for EACH Anatol machine you wish to register.</p>
    <div class="btn_wrap_checks">Login<span></span>Sign Up</div>
</div>
<div class="register_warranty_wrap">
    <a class="close_popp" style="float: right;"><img loading="lazy" class="lozad"
            src="https://perivmv.pp.ua/wp-content/themes/anatol/images/close.svg" style="width: 20px" alt=""></a>
    <div class="box_title">Products & Warranty Registration Form</div>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <form id="__warrantyWebForm" class="warranty-form" name="warranty-form"
        action="https://sale.anatol.com/modules/Webforms/capture.php" method="post" accept-charset="utf-8"
        enctype="multipart/form-data">
        <input type="hidden" name="__vtrftk" value="sid:a21f8a2b77ec0714570d72b1b68110cbda729a83,1641293985">
        <input type="hidden" name="publicid" value="9d662c4339b2c705df5c8d793b785b48">
        <input type="hidden" name="urlencodeenable" value="1">
        <input type="hidden" name="name" value="Warranty Registration">
        <input type="text" name="cf_979" value="Data Warranty Registration" style="display:none;">
        <input type="hidden" name="user_warranty_id" value="<?php echo $current_user->ID ?>">
        <div class="warranty_form_wrap">
            <div class="label_warranty_wrap">
                <label for="firstname"><?php _e('First Name', 'anatol'); ?>*</label>
                <input type="text" class="inputwarranty" name="firstname"
                    value='<?php echo $current_user->user_firstname?>' id="first_name_warranty"
                    placeholder="<?php _e('First Name', 'anatol'); ?>" required>
            </div>

            <div class="label_warranty_wrap">
                <label for="lastname"><?php _e('Last Name', 'anatol'); ?>*</label>
                <input type="text" class="inputwarranty" name="lastname"
                    value='<?php echo $current_user->user_lastname?>' id="last_name_warranty"
                    placeholder="<?php _e('Last Name', 'anatol');?>" required>
            </div>
        </div>

        <div class="warranty_form_wrap">
            <div class="label_warranty_wrap">
                <label for="addresslineone"><?php _e('Address Line', 'anatol'); ?> 1*</label>
                <input type="text" class="inputwarranty" name="addresslineone" id="address_line_one"
                    placeholder="<?php _e('Address Line', 'anatol'); ?> 1" required>
            </div>

            <div class="label_warranty_wrap">
                <label for="addresslinetwo"><?php _e('Address Line', 'anatol'); ?> 2*</label>
                <input type="text" class="inputwarranty" name="addresslinetwo" id="address_line_two"
                    placeholder="<?php _e('Address Line', 'anatol'); ?> 2" required>
            </div>
        </div>

        <div class="warranty_form_wrap">
            <div class="label_warranty_wrap">
                <label for="citywarranty"><?php _e('City', 'anatol'); ?>*</label>
                <input type="text" class="inputwarranty" name="citywarranty" id="city_warranty"
                    placeholder="<?php _e('City', 'anatol'); ?>" required>
            </div>

            <div class="label_warranty_wrap">
                <label for="statewarranty"><?php _e('State or Province', 'anatol'); ?>*</label>
                <input type="text" class="inputwarranty" name="statewarranty" id="state_warranty"
                    placeholder="<?php _e('State or Province', 'anatol'); ?>" required>
            </div>
        </div>

        <div class="warranty_form_wrap">
            <div class="label_warranty_wrap">
                <label for="zipwarranty"><?php _e('ZIP or Postal Code', 'anatol'); ?>*</label>
                <input type="text" class="inputwarranty" name="zipwarranty" id="zip_warranty"
                    placeholder="<?php _e('ZIP or Postal Code', 'anatol'); ?>" required>
            </div>

            <div class="label_warranty_wrap">
                <label for="phonewarranty"><?php _e('Phone', 'anatol'); ?>*</label>
                <input type="tel" class="inputwarranty" name="phonewarranty" id="phone_warranty"
                    placeholder="<?php _e('Phone', 'anatol'); ?>" required>
            </div>
        </div>

        <div class="warranty_form_wrap">
            <div class="label_warranty_wrap">
                <label for="emailwarranty"><?php _e('Email', 'anatol'); ?>*</label>
                <input type="email" class="inputwarranty" name="emailwarranty"
                    value='<?php echo $current_user->user_email?>' id="email_warranty"
                    placeholder="<?php _e('Email', 'anatol'); ?>" required>
            </div>

            <div class="label_warranty_wrap label_warranty_wraps">
                <label for="checkwarranty"><?php _e('How should we contact you?', 'anatol'); ?></label>
                <div class="check_wrap">
                    <span><input class="inputwarranty" type="checkbox" name="checkwarranty" value="mail"
                            id="check_email_warranty"><?php _e('Email', 'anatol'); ?></span>
                    <span> <input class="inputwarranty" type="checkbox" name="checkwarranty" value="phone"
                            id="check_phone_warranty"><?php _e('Phone', 'anatol'); ?></span>
                </div>
            </div>
        </div>

        <div class="warranty_form_wrap">
            <div class="label_warranty_wrap">
                <label for="equipmentpurchasedwarranty"><?php _e('Equipment Purchased', 'anatol'); ?>*</label>
                <input type="text" class="inputwarranty" name="equipmentpurchasedwarranty" id="equipment_warranty"
                    placeholder="<?php _e('Equipment Purchased', 'anatol'); ?>" required>
            </div>

            <div class="label_warranty_wrap">
                <label for="serialnumberwarranty"><?php _e('Serial Number', 'anatol'); ?>*</label>
                <input type="text" class="inputwarranty" name="serialnumberwarranty" id="serial_number_warranty"
                    placeholder="<?php _e('Serial Number', 'anatol'); ?>" required>
            </div>
        </div>

        <div class="warranty_form_wrap">
            <div class="label_warranty_wrap">
                <label for="purchasedatewarranty"><?php _e('Purchase Date', 'anatol'); ?>*</label>
                <input type="date" class="inputwarranty" name="purchasedatewarranty" id="purchase_date_warranty"
                    placeholder="<?php _e('Purchase Date', 'anatol'); ?>" required>
            </div>

            <div class="label_warranty_wrap">
                <label for="installationdatewarranty"><?php _e('Installation Date', 'anatol'); ?>*</label>
                <input type="date" class="inputwarranty" name="installationdatewarranty" id="installation_date_warranty"
                    placeholder="<?php _e('Installation Date', 'anatol'); ?>" required>
            </div>
        </div>

        <button type="submit" class="button" data-category="Buttons"
            data-label="Make ROI calculation"><?php _e('Register your product', 'anatol'); ?> <span
                class="spinner-border spinner_warranty spinner-border-sm" role="status"
                aria-hidden="true"></span></button>
    </form>
</div>
<!-- end content container -->


<script>
let register_warranty_onclick = document.querySelector('#register_warranty_onclick');
let register_warranty_wrap = document.querySelector('.register_warranty_wrap');
let bodycam = document.querySelector('body');
let reg_popup = document.querySelector('.reg_popup');
let xoo_el_container = document.querySelector('.xoo-el-container');
let close_popp = document.querySelector('.close_popp');
let log_warranty = document.querySelector('.log_warranty');
let btn_wrap_checks = document.querySelector('.btn_wrap_checks');
<?php
			if ( is_user_logged_in() ) {?>
register_warranty_onclick.onclick = function() {
    register_warranty_wrap.classList.add('register_warranty_wrap-active');
    reg_popup.classList.add('register_warranty_wrap-active');
    bodycam.classList.add('xoo-el-popup-active');
    e.preventDefault();
}
<?php	} else {?>
register_warranty_onclick.onclick = function() {
    bodycam.classList.add('xoo-el-popup-active');
    reg_popup.classList.add('register_warranty_wrap-active');
    log_warranty.classList.add('log_warranty-active');
}
<?php	}?>
reg_popup.onclick = function() {
    reg_popup.classList.remove('register_warranty_wrap-active');
    register_warranty_wrap.classList.remove('register_warranty_wrap-active');
    bodycam.classList.remove('xoo-el-popup-active');
    log_warranty.classList.remove('log_warranty-active');
}
close_popp.onclick = function() {
    reg_popup.classList.remove('register_warranty_wrap-active');
    register_warranty_wrap.classList.remove('register_warranty_wrap-active');
    bodycam.classList.remove('xoo-el-popup-active');
}
btn_wrap_checks.onclick = function() {
    reg_popup.classList.remove('register_warranty_wrap-active');
    log_warranty.classList.remove('log_warranty-active');
    document.querySelector('.xoo-el-container').classList.add('xoo-el-popup-active');
}
</script>
<script>
var anatol_ajax_warranty = "<?php echo admin_url('admin-ajax.php'); ?>";
</script>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/warranty.js"></script>