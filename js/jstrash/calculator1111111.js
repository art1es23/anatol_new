jQuery(function($) {
  /**************************
	Registration form
	***************************/
  // Save to Hubspot -------------
/*   function sendDataToHubspot(formData) {
    $.post(
      "https://forms.hubspot.com/uploads/form/v2/1972415/5b69940b-584b-49c5-81b5-d692f9e926ec",
      {
        contact_first: formData.contact_first,
        contact_last: formData.contact_last,
        email: formData.email,
        country: formData.country,
        state: formData.state
      },
      function(data, status) {
        // console.log('success');
      }
    )
      .done(function() {
        // console.log('done');
      })
      .fail(function() {
        // console.log('fail');
      })
      .always(function() {
        // console.log('always');
        //setCookies();
      });
  } */

  // Save to Wordpress -------------
  function registerROICalculationUser(formData) {
    // var ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";
    $.post(
      anatol_ajax_url,
      {
        action: "register_roi_user_action",
        data: formData
      },
      function(data, status) {
        setCookies(data);

        location.reload(true);
      }
    )
      .done(function() {
        // console.log('done');
      })
      .fail(function() {
        // console.log('fail');
      })
      .always(function() {
        // console.log('always');
        //setCookies();
      });
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
      function(data, status) {
        data = JSON.parse(data);
        console.log(data);

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
      .done(function() {
        // console.log('done');
      })
      .fail(function() {
        // console.log('fail');
      })
      .always(function() {
        // console.log('always');
        //setCookies();
      });
  }

  // Save to Cookies -------------
  function setCookies(data) {
    document.cookie = "ROI_user=" + data + "; max-age=" + 60 * 60 * 24 * 7;
    +"; path=/";
  }

  //---------------------------
  function showCalculatorResult() {
    $(".calculation-form")
      .find(".btn")
      .removeClass("load");
    $(".result").fadeIn();
    window.scrollTo({
      top: $(".result-row").position().top,
      behavior: "smooth"
    });
  }

  function hideCalculatorResult() {
    $(".calculation-form")
      .find(".btn")
      .addClass("load");
    $(".result").fadeOut();
  }

  //-------------------------

  $(".register-form").submit(function(event) {
    //event.preventDefault();

    // grecaptcha.ready(function() {
    //   // do request for recaptcha token
    //   // response is promise with passed token
    //   grecaptcha
    //     .execute("put your site key here", { action: "create_comment" })
    //     .then(function(token) {
    //       // add token to form
    //       $("#comment_form").prepend(
    //         '<input type="hidden" name="g-recaptcha-response" value="' +
    //           token +
    //           '">'
    //       );
    //       $.post(
    //         "form.php",
    //         { email: email, comment: comment, token: token },
    //         function(result) {
    //           console.log(result);
    //           if (result.success) {
    //             alert("Thanks for posting comment.");
    //           } else {
    //             alert("You are spammer ! Get the @$%K out.");
    //           }
    //         }
    //       );
    //     });
    // });

    var formData = {};
    formData.contact_first = $(this)
      .find("[name=contact_first]")
      .val();
    formData.contact_last = $(this)
      .find("[name=contact_last]")
      .val();
    formData.email = $(this)
      .find("[name=email]")
      .val();
    formData.country = $(this)
      .find("[name=country]")
      .val();

 /*    if (
      $(this)
        .find("[name=country]")
        .val().length > 2
    ) {
      formData.country = "United States";
      formData.state = $(this)
        .find("[name=country] option:selected")
        .text();
    } else {
      formData.country = $(this)
        .find("[name=country] option:selected")
        .text();
      formData.state = "";
    }
 */
    $(this)
      .find(".btn")
      .addClass("load");
   // sendDataToHubspot(formData);
    registerROICalculationUser(formData);
  });
  /**************************
	Calculation form
	***************************/
  $(".calculation-form").submit(function(event) {
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
