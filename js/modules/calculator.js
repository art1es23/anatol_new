jQuery(function ($) {
	
  // Save to Wordpress -------------
  function registerROICalculationUser(formData) {
    $.post(
      anatol_ajax_url,
      {
        action: "register_roi_user_action",
        data: formData
      },
      function(data, status) {

        setCookies(data);
        $('.registration').addClass('first_form_active');
        $('.calculation').removeClass('first_form_active');
      }
    )
  }
  function userRoI(){
    let key ;
    if(document.cookie.indexOf('roi_user_id":') !== -1){
      key = (document.cookie.slice(document.cookie.indexOf('roi_user_id":')+'roi_user_id":'.length,document.cookie.indexOf('}',document.cookie.indexOf('roi_user_id":'))));
 

    }
    $(".calculation-form").find("[name=roi_user_id]").val(key);
  }
  // Save to Wordpress -------------
  function makeCalculation(formData) {
    hideCalculatorResult();
    $.post(
      anatol_ajax_url,
      {
        action: "make_roi_calculation_action",
        data: formData
      },
      function (data, status) {
        data = JSON.parse(data);
        $("#completion-time")
          .find(".manual .val")
          .html(data.completion_time.manual);
        $("#completion-time")
          .find(".automatic .val")
          .html(data.completion_time.automatic);
        $("#completion-time")
          .find(".total .val")
          .html(data.completion_time.total);
        $("#hourly-wages")
          .find(".manual .val")
          .html(data.hourly_wages.manual);
        $("#hourly-wages")
          .find(".automatic .val")
          .html(data.hourly_wages.automatic);
        $("#hourly-wages")
          .find(".total .val")
          .html(data.hourly_wages.total);
        $("#total-savings")
          .find(".manual .val")
          .html(data.total_savings.manual);
        $("#total-savings")
          .find(".automatic .val")
          .html(data.total_savings.automatic);
        $("#total-savings")
          .find(".total .val")
          .html(data.total_savings.total);
        $("#total-savings-year")
          .find(".manual .val")
          .html(data.total_savings_year.manual);
        $("#total-savings-year")
          .find(".automatic .val")
          .html(data.total_savings_year.automatic);
        $("#total-savings-year")
          .find(".total .val")
          .html(data.total_savings_year.total);
        $(".cards")
          .find(".currency")
          .html(data.currency);
        showCalculatorResult();
      }
    )
  }
  function setCookies(data) {
    let stringCookie = JSON.stringify(data);

    while (true) {
      if (stringCookie.indexOf('\\') == -1) break; // (*)
      else{
      stringCookie = stringCookie.replace('\\','')
      }
    }
    document.cookie = 'ROI_user='+stringCookie+"; max-age=" + 604800
    +"; path=/";
  }
  function showCalculatorResult() {
      $(".register-form ")
      .find(".btn-one")
      .removeClass("load");
      $(".calculation-form")
      .find(".btn-two")
      .removeClass("load");
    $(".result").fadeIn();
    window.scrollTo({
      top: $(".result-row").position().top+400,
      behavior: "smooth"
    });
  }
  function hideCalculatorResult() {
    $(".result").fadeOut();
  }
  function loadone(){
    $(".register-form ")
    .find(".btn-one")
    .addClass("load");
  }
  function loadtwo(){
    $(".calculation-form")
    .find(".btn-two")
    .addClass("load");
  }
  $(".register-form").submit(function (event) {//формуєм масив
    loadone();
    event.preventDefault();
    var formData = {};
    formData.firstName = $(this)
      .find("[name=firstname]")
      .val();
    formData.lastName = $(this)
      .find("[name=lastname]")
      .val();
    formData.email = $(this)
      .find("[name=email]")
      .val();
    formData.country = $(this)
      .find("[name=cf_1085]")
      .val();
    formData.state = $(this)
      .find("[name=cf_1093]")
      .val();
    registerROICalculationUser(formData);
  });
  /**************************
  Calculation form
  ***************************/
  $(".calculation-form").submit(function (event) {
    userRoI();
    loadtwo();
    event.preventDefault();
    var formData = {};
    formData.fronts = $(this)
      .find("[name=fronts]")
      .val();
    formData.backs = $(this)
      .find("[name=backs]")
      .val();
    formData.shirtsPerHour = $(this)
      .find("[name=shirtsPerHour]")
      .val();
    formData.printersPerPress = $(this)
      .find("[name=printersPerPress]")
      .val();
    formData.printerPerHour = $(this)
      .find("[name=printerPerHour]")
      .val();
    formData.currency = $(this)
      .find("[name=currency]")
      .val();
    formData.phoneCode = $(this)
      .find("[name=phone_code]")
      .val();
    formData.userId = $(this)
      .find("[name=roi_user_id]")
      .val();
    $(this)
      .find(".btn")
      .addClass("load");
    makeCalculation(formData);
  });
});



