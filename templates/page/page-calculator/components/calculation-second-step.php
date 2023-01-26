<h1 class="calculator__title section_title">
    <i class="uk-icon-calculator"></i>
    <?php _e('Welcome', 'anatol'); ?>
    <span class="past_name"></span>
</h1>
<div class="calculator__description form-description">
    <p>
        <?php _e('Fill in the form below and we`ll tell you just how much you`ll be saving.*', 'anatol'); ?>
    </p>
</div>

<form class="form-inner calculation-form calculator-form step-container get_forms" name="calculation-form"
    method="post">
    <input type="hidden" name="currency" value="<?php echo $roi_user->currency; ?>">
    <input type="hidden" name="phone_code" value="<?php echo $roi_user->phone_code; ?>">
    <input class="formData-field" type="hidden" name="roi_user_id" value="<?php echo $roi_user->roi_user_id; ?>">
    <div class="form-inner__item">
        <div class="form-inner__item--full">
            <label>
                <?php _e('1. How many shirts do I want to print per week?', 'anatol'); ?>
            </label>
        </div>
        <div class="form-inner__item--full">
            <input type="number" min="0" step="1" value="" class="formData-field form-control" name="fronts" id="fronts"
                placeholder="<?php _e('Fronts', 'anatol'); ?>" required>
        </div>
        <div class="form-inner__item--full">
            <input type="number" min="0" step="1" value="" class="formData-field form-control" name="backs" id="backs"
                placeholder="<?php _e('Backs', 'anatol'); ?>" required>
        </div>
    </div>
    <div class="form-inner__item">
        <div class="form-inner__item--half">
            <label>
                <?php _e('2. How many shirts can I print per hour manually?', 'anatol'); ?>
            </label>
        </div>
        <div class="form-inner__item--half">
            <input type="number" min="1" step="1" value="" class="formData-field form-control" name="shirtsPerHour"
                id="shirtsPerHour" placeholder="" required>
        </div>
    </div>
    <div class="form-inner__item">
        <div class="form-inner__item--half">
            <label>
                <?php _e('3. How many printers will be working the press?', 'anatol'); ?>
            </label>
        </div>
        <div class="form-inner__item--half">
            <input type="number" min="1" step="1" value="" class="formData-field form-control" name="printersPerPress"
                id="printersPerPress" placeholder="" required>
        </div>
    </div>
    <div class="form-inner__item">
        <div class="form-inner__item--half">
            <label>
                <?php _e('4. How much do I pay each printer per hour? (in USD)', 'anatol'); ?>
            </label>
        </div>
        <div class="form-inner__item--half">
            <input type="number" min="1" step="any" value="" class="formData-field form-control" name="printerPerHour"
                id="printerPerHour" placeholder="" required>
        </div>
    </div>
    <div class="form-inner__item">
        <div class="form-inner__item--full cvbnm">
            <button type="submit" class="button red-button draw-red btn-two btn-primary track-button"
                data-category="Buttons" data-label="Make ROI calculation">
                <?php _e('Click here and we`ll do the math!', 'anatol'); ?>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <span class="sr-only">Loading...</span>
            </button>
        </div>
    </div>
</form>