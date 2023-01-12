// jQuery(function ($) {
$(".warranty-form").submit(function (event) {
  //формуєм масив
  event.preventDefault();
  var formData = {};
  formData.firstName = $(this).find("[name=firstName]").val();
  formData.lastName = $(this).find("[name=lastName]").val();
  formData.addressOne = $(this).find("[name=addressOne]").val();
  formData.addressTwo = $(this).find("[name=addressTwo]").val();
  formData.city = $(this).find("[name=city]").val();
  formData.state = $(this).find("[name=state]").val();
  formData.zip = $(this).find("[name=zip]").val();
  formData.phone = $(this).find("[name=phone]").val();
  formData.email = $(this).find("[name=email]").val();
  formData.check = $(this).find("[name=check]").val();
  formData.equipment = $(this).find("[name=equipment]").val();
  formData.serial = $(this).find("[name=serial]").val();
  formData.purchaseDate = $(this).find("[name=purchaseDate]").val();
  formData.installationDate = $(this).find("[name=installationDate]").val();
  formData.id = $(this).find("[name=id]").val();
  console.log(formData);

  registerWarranty(formData);
  $(".spinner_warranty").addClass("spinner_warranty-active");
});

function registerWarranty(formData) {
  $.post(
    anatol_ajax_warranty,
    {
      action: "register_warranty_action",
      data: formData,
    },
    function (data, status) {
      reg_popup.classList.remove("register_warranty_wrap-active");
      register_warranty_wrap.classList.remove("register_warranty_wrap-active");
      bodycam.classList.remove("xoo-el-popup-active");
      $(".spinner_warranty").removeClass("spinner_warranty-active");
    }
  );
}
// });

// document.addEventListener("DOMContentLoaded", (evt) => {
//   const warrantyForm = document.querySelector(".warranty-form");

//   const postData = async (url, data) => {
//     let response = await fetch(url, {
//       method: "POST",
//       headers: {
//         "Content-Type": "application/json",
//       },
//       body: JSON.stringify(data),
//     });

//     return await response.json();
//   };

//   // const postData = async (url, data) => {
//   //   let response = await fetch(url, {
//   //     method: "POST",
//   //     body: data,
//   //   });

//   //   return await response;
//   // };

//   warrantyForm.addEventListener("submit", function (e) {
//     e.preventDefault();

//     const formInputs = Array.from(this.querySelectorAll("input.inputwarranty"));

//     // let formData = {};
//     // formData = formInputs.map((input) => {
//     //   const name = input.getAttribute("name");
//     //   return {
//     //     ...formData,
//     //     [name]: input.value,
//     //   };
//     // });
//     let formData = {};

//     formInputsNames = formInputs.map((input) => input.getAttribute("name"));
//     formInputsValues = formInputs.map((input) => input.value);

//     formInputsNames.forEach((key, i) => (formData[key] = formInputsValues[i]));

//     // formData = Object.assign(
//     //   ...formInputsNames.map((k, i) => ({ [k]: formInputsValues[i] }))
//     // );

//     postData(
//       "https://test22.anatol.space/wp-admin/admin-ajax.php?action=register_warranty_action",
//       formData
//     )
//       .then((response) => response)
//       .then((result) => {
//         console.log("Success: ", result);
//       })
//       .catch((error) => {
//         console.log("Error: ", error);
//       })
//       .finally(() => {});
//   });
// });
