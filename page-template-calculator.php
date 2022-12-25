<?PHP

/* Template Name: Calculator new */
// function anatol_dequeue_calc_script() {
//   wp_dequeue_script( 'nice-select-js' );
// }
// add_action( 'wp_print_scripts', 'anatol_dequeue_calc_script', 100 );
get_header(); ?>

<style>
<?php include 'css/components/hero-templates/hero-template.css';
include 'css/components/template-form.css';
include 'css/components/get-in-touch.css';
include 'css/page-templates/page-calculator/calculator.css';
?>
</style>

<?php get_template_part('template-parts/template-part-head-bg-black'); ?>

<div class="container">
    <?php get_template_part('template-parts/calculator'); ?>
</div>
<?php get_template_part('template-parts/get-in-touch'); ?>
<?php get_footer(); ?>
<script>
let userCookie = document.cookie;

function userData(a) {
    if (userCookie.indexOf(a) !== -1) {
        return (userCookie.slice(userCookie.indexOf(a) + a.length, userCookie.indexOf('","', userCookie.indexOf(a))))
    }
}
let firstNameWithCookies = userData('firstName":"');
let lastNameWithCookies = userData('lastName":"');
let emailWithCookies = userData('email":"');
let countryWithCookies = userData('country":"');
let stateWithCookies = userData('state":"');
$(".register-form").find("[name=firstname]").val(firstNameWithCookies);
$(".register-form").find("[name=lastname]").val(lastNameWithCookies);
$(".register-form").find("[name=email]").val(emailWithCookies);
$(".register-form").find("[name=cf_1085]").val(countryWithCookies);
$(".register-form").find("[name=cf_1093]").val(stateWithCookies);
$(document).ready(function() {
    $("#__vtigerWebForm.register-form").submit(function(e) {
        $('.past_name').html($('#inputName').val());
        translate_kurul_sub('#__vtigerWebForm.register-form');
        e.preventDefault();
        var form = $(this);
        var url = 'https://sale.anatol.com/modules/Webforms/capture.php';
        $.post(
            url,
            form.serialize()
        )
    });
});
</script>