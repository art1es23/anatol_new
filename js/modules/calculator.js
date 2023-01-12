jQuery(function ($) {
	
  const hideCalculatorResult =() => $(".result").fadeOut();
  const loadone = () => document.querySelector(".register-form .btn-one").classList.add("load")
  const loadtwo = () => document.querySelector(".calculation-form .btn-two").classList.add("load")

  // Save to Wordpress -------------
  function registerROICalculationUser(formData) {
    $.post(
      anatol_ajax_url,
      {
        action: "register_roi_user_action",
        data: formData,
      },
      function (data, status) {
        setCookies(data);
        document
          .querySelectorAll(".registration")
          .forEach((item) => item.classList.add("first_form_active"));
        document
          .querySelectorAll(".calculation")
          .forEach((item) => item.classList.remove("first_form_active"));
      }
    );
  }

  function userRoI(wrapper){
    let key;
    if(document.cookie.indexOf('roi_user_id":') !== -1){
      key = (document.cookie.slice(document.cookie.indexOf('roi_user_id":')+'roi_user_id":'.length,document.cookie.indexOf('}',document.cookie.indexOf('roi_user_id":'))));
    }
    $(wrapper).find("[name=roi_user_id]").val(key);
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

        const getShowElement = (className) => document.querySelector(className).querySelectorAll(".val")

        const showResults = (el, key) => el.forEach((item, idx) => item.textContent = data[key][item.dataset.value]);

        showResults(getShowElement("#completion-time"), 'completion_time');
        showResults(getShowElement("#hourly-wages"), 'hourly_wages');
        showResults(getShowElement("#total-savings"), 'total_savings');
        showResults(getShowElement("#total-savings-year"), 'total_savings_year');

        // $(".cards")
        //   .find(".currency")
        //   .html(data.currency);
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
    document.querySelector(".register-form .btn-one").classList.remove("load");
    document.querySelector(".calculation-form .btn-two").classList.add("load");

    $(".result").fadeIn();
    window.scrollTo({
      // top: $(".result-row").position().top+400,
      behavior: "smooth"
    });
  }

  document.querySelectorAll(".register-form").forEach(
    item => item.addEventListener('submit', e => {
      loadone();
      e.preventDefault();

      let formData = {};

      let formInputs = Array.from(item.querySelectorAll(".formData-field"));

      formData = formInputs.reduce((target, input) => {
        const name = input.getAttribute("name");
        target[name] = input.value;
        return target;
      }, {})

      registerROICalculationUser(formData);
    })
  );

  /**************************
  Calculation form
  ***************************/
  document.querySelectorAll(".calculation-form").forEach((item) =>
    item.addEventListener("submit", (e) => {
      userRoI(".calculation-form");
      loadtwo();
      e.preventDefault();

      let formData = {};

      const formInputs = Array.from(item.querySelectorAll(".formData-field"));

      formData = formInputs.reduce((target, input) => {
        const name = input.getAttribute("name");
        target[name] = input.value;
        return target;
      }, {})

      makeCalculation(formData);
    })
  );

});




