<?php
    /* Check if user registered */
    $registered = '';
    if (!isset($_COOKIE['ROI_user'])) {
        $registered = false;
    } else {
        if (!empty($_COOKIE['ROI_user'])) {
            $roi_user = json_decode(stripcslashes($_COOKIE['ROI_user']));
            if (!empty($roi_user->roi_user_id)) $registered = true; 
        }
    }
?>
<style>
<?php include locate_template('css/page-templates/page-calculator/calculator.css');
?>
</style>

<div class="calculator">
    <div class="form calculator-form registration step">
        <?php get_template_part('templates/page/page-calculator/components/calculation-first-step'); ?>
    </div>
    <!-- Step second -->
    <div class="form calculation step first_form_active">
        <?php get_template_part('templates/page/page-calculator/components/calculation-second-step'); ?>
        <?php get_template_part('templates/page/page-calculator/components/calculation-results'); ?>
    </div>
</div>

<script>
function yesnoCheckRoi(that) {
    if (that.value == "United States") {
        document.getElementById("ifYesRoi").style.display = "block";
        document.getElementById("state_required").setAttribute("required", "");
        document.querySelectorAll('.usa_state').forEach(item => item.style.display = 'block');
        document.querySelectorAll('.canadian_province').forEach(item => item.style.display = 'none');

    } else if (that.value == "Canada") {
        document.getElementById("ifYesRoi").style.display = "block";
        document.querySelectorAll('.usa_state').forEach(item => item.style.display = 'none');
        document.querySelectorAll('.canadian_province').forEach(item => item.style.display = 'block');

    } else {
        document.getElementById("ifYesRoi").style.display = "none";
        document.getElementById("state_required").removeAttribute("required");

    }
}
</script>

<script type="text/javascript">
var anatol_ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";
</script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/modules/calculator.js"></script>