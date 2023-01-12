<style>
<?php include __DIR__ . '/../css/components/template-form.css';
?>
</style>

<div class="warranty-form hidden">
    <div class="reg_popup"></div>
    <div class="form log_warranty hidden">
        <p class="log_warranty__description">To register the warranty on your Anatol machine, log in to your Anatol
            account or create a new account. By
            submitting the warranty registration form, you agree to all Warranty terms and conditions. You must complete
            a
            separate registration form for EACH Anatol machine you wish to register.</p>
        <button class="btn_wrap_checks">
            <span class="btn_wrap_checks__item">Login</span>
            <span class="btn_wrap_checks__item">Sign Up</span>
        </button>
    </div>

    <div class="form register_warranty_wrap hidden">
        <button class="close-button">
            <div class="close-button--wrapper">
                <span class="close-button__item close-button__item--top"></span>
                <span class="close-button__item close-button__item--bottom"></span>
            </div>
        </button>

        <h3 class="form-title">Products & Warranty Registration Form</h3>

        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <form id="__warrantyWebForm" class="form-inner warranty-form-inner" name="warranty-form"
            action="https://vtiger.anatol.com/modules/Webforms/capture.php" method="post" accept-charset="utf-8"
            enctype="multipart/form-data">
            <input type="hidden" name="__vtrftk" value="sid:a21f8a2b77ec0714570d72b1b68110cbda729a83,1641293985">
            <input type="hidden" name="publicid" value="9d662c4339b2c705df5c8d793b785b48">
            <input type="hidden" name="urlencodeenable" value="1">
            <input type="hidden" name="name" value="Warranty Registration">
            <input type="text" name="cf_979" value="Data Warranty Registration" style="display:none;">
            <input type="hidden" name="id" value="<?php echo $current_user->ID ?>">
            <div class="form-inner__item">
                <div class="form-inner__item--half">
                    <label for="firstname"><?php _e('First Name', 'anatol'); ?>*</label>
                    <input type="text" class="inputwarranty" name="firstName"
                        value='<?php echo $current_user->user_firstname?>' id="first_name_warranty"
                        placeholder="<?php _e('First Name', 'anatol'); ?>" required>
                </div>

                <div class="form-inner__item--half">
                    <label for="lastname"><?php _e('Last Name', 'anatol'); ?>*</label>
                    <input type="text" class="inputwarranty" name="lastName"
                        value='<?php echo $current_user->user_lastname?>' id="last_name_warranty"
                        placeholder="<?php _e('Last Name', 'anatol');?>" required>
                </div>
            </div>

            <div class="form-inner__item">
                <div class="form-inner__item--half">
                    <label for="addresslineone"><?php _e('Address Line', 'anatol'); ?> 1*</label>
                    <input type="text" class="inputwarranty" name="addressOne" id="address_line_one"
                        placeholder="<?php _e('Address Line', 'anatol'); ?> 1" required>
                </div>

                <div class="form-inner__item--half">
                    <label for="addresslinetwo"><?php _e('Address Line', 'anatol'); ?> 2*</label>
                    <input type="text" class="inputwarranty" name="addressTwo" id="address_line_two"
                        placeholder="<?php _e('Address Line', 'anatol'); ?> 2" required>
                </div>
            </div>

            <div class="form-inner__item">
                <div class="form-inner__item--half">
                    <label for="citywarranty"><?php _e('City', 'anatol'); ?>*</label>
                    <input type="text" class="inputwarranty" name="city" id="city_warranty"
                        placeholder="<?php _e('City', 'anatol'); ?>" required>
                </div>

                <div class="form-inner__item--half">
                    <label for="statewarranty"><?php _e('State or Province', 'anatol'); ?>*</label>
                    <input type="text" class="inputwarranty" name="state" id="state_warranty"
                        placeholder="<?php _e('State or Province', 'anatol'); ?>" required>
                </div>
            </div>

            <div class="form-inner__item">
                <div class="form-inner__item--half">
                    <label for="zipwarranty"><?php _e('ZIP or Postal Code', 'anatol'); ?>*</label>
                    <input type="text" class="inputwarranty" name="zip" id="zip_warranty"
                        placeholder="<?php _e('ZIP or Postal Code', 'anatol'); ?>" required>
                </div>

                <div class="form-inner__item--half">
                    <label for="phonewarranty"><?php _e('Phone', 'anatol'); ?>*</label>
                    <input type="tel" class="inputwarranty" name="phone" id="phone_warranty"
                        placeholder="<?php _e('Phone', 'anatol'); ?>" required>
                </div>
            </div>

            <div class="form-inner__item">
                <div class="form-inner__item--half">
                    <label for="emailwarranty"><?php _e('Email', 'anatol'); ?>*</label>
                    <input type="email" class="inputwarranty" name="email"
                        value='<?php echo $current_user->user_email?>' id="email_warranty"
                        placeholder="<?php _e('Email', 'anatol'); ?>" required>
                </div>

                <div class="form-inner__item--half label_warranty_wraps">
                    <label for="checkwarranty"><?php _e('How should we contact you?', 'anatol'); ?></label>
                    <div class="check_wrap">
                        <!-- <span> -->
                        <label>
                            <input class="inputwarranty" type="checkbox" name="check" value="mail"
                                id="check_email_warranty">
                            <?php _e('Email', 'anatol'); ?>
                        </label>
                        <!-- <label for="check_email_warranty"><?php _e('Email', 'anatol'); ?></label>
                            <input class="inputwarranty" type="checkbox" name="checkwarranty" value="mail"
                                id="check_email_warranty"> -->
                        <!-- </span>
                        <span> -->
                        <label>
                            <input class="inputwarranty" type="checkbox" name="check" value="phone"
                                id="check_phone_warranty">
                            <?php _e('Phone', 'anatol'); ?>
                        </label>
                        <!-- <label for="check_phone_warranty"><?php _e('Phone', 'anatol'); ?></label>
                            <input class="inputwarranty" type="checkbox" name="checkwarranty" value="phone"
                                id="check_phone_warranty"> -->
                        <!-- </span> -->
                    </div>
                </div>
            </div>

            <div class="form-inner__item">
                <div class="form-inner__item--half">
                    <label for="equipmentpurchasedwarranty"><?php _e('Equipment Purchased', 'anatol'); ?>*</label>
                    <input type="text" class="inputwarranty" name="equipment" id="equipment_warranty"
                        placeholder="<?php _e('Equipment Purchased', 'anatol'); ?>" required>
                </div>

                <div class="form-inner__item--half">
                    <label for="serialnumberwarranty"><?php _e('Serial Number', 'anatol'); ?>*</label>
                    <input type="text" class="inputwarranty" name="serial" id="serial_number_warranty"
                        placeholder="<?php _e('Serial Number', 'anatol'); ?>" required>
                </div>
            </div>

            <div class="form-inner__item">
                <div class="form-inner__item--half">
                    <label for="purchasedatewarranty"><?php _e('Purchase Date', 'anatol'); ?>*</label>
                    <input type="date" class="inputwarranty" name="purchaseDate" id="purchase_date_warranty"
                        placeholder="<?php _e('Purchase Date', 'anatol'); ?>" required>
                </div>

                <div class="form-inner__item--half">
                    <label for="installationdatewarranty"><?php _e('Installation Date', 'anatol'); ?>*</label>
                    <input type="date" class="inputwarranty" name="installationDate" id="installation_date_warranty"
                        placeholder="<?php _e('Installation Date', 'anatol'); ?>" required>
                </div>
            </div>

            <button type="submit" class="button" data-category="Buttons"
                data-label="Make ROI calculation"><?php _e('Register your product', 'anatol'); ?> <span
                    class="spinner-border spinner_warranty spinner-border-sm" role="status"
                    aria-hidden="true"></span></button>
        </form>
    </div>
</div>

<!-- end content container -->

<script>
var anatol_ajax_warranty = "<?php echo admin_url('admin-ajax.php'); ?>";
</script>

<!-- <script defer type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/warranty.js"></script> -->