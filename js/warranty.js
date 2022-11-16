jQuery(function ($) {
	$(".warranty-form").submit(function (event) {//формуєм масив
    event.preventDefault();
    var formData = {};
    formData.firstName = $(this)
      .find("[name=firstname]")
      .val();
    formData.lastName = $(this)
      .find("[name=lastname]")
      .val();
    formData.addressOne = $(this)
      .find("[name=addresslineone]")
      .val();
	  formData.addressTwo = $(this)
      .find("[name=addresslinetwo]")
      .val();
    formData.city = $(this)
      .find("[name=citywarranty]")
      .val();
    formData.state = $(this)
      .find("[name=statewarranty]")
      .val();
		formData.zip = $(this)
      .find("[name=zipwarranty]")
      .val();
    formData.phone = $(this)
      .find("[name=phonewarranty]")
      .val();
    formData.email = $(this)
      .find("[name=emailwarranty]")
      .val();
  	formData.check = $(this)
      .find("[name=checkwarranty]")
      .val();
    formData.equipment = $(this)
      .find("[name=equipmentpurchasedwarranty]")
      .val();
    formData.serial = $(this)
      .find("[name=serialnumberwarranty]")
      .val();
		formData.purchaseDate = $(this)
      .find("[name=purchasedatewarranty]")
      .val();
	  formData.installationDate = $(this)
      .find("[name=installationdatewarranty]")
      .val();
    formData.id = $(this)
      .find("[name=user_warranty_id]")
      .val();
		console.log(formData)
		registerWarranty(formData);
    $('.spinner_warranty').addClass('spinner_warranty-active');
  });


  function registerWarranty(formData) {
    $.post(
      anatol_ajax_warranty,
      {
        action: "register_warranty_action",
        data: formData
      },
      function(data, status) {
        reg_popup.classList.remove('register_warranty_wrap-active');
				register_warranty_wrap.classList.remove('register_warranty_wrap-active');
				bodycam.classList.remove('xoo-el-popup-active');
        $('.spinner_warranty').removeClass('spinner_warranty-active');
      }
    )
  }

});
