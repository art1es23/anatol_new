document.addEventListener("DOMContentLoaded", (e) => {
  const popupWrapper = document.querySelector(".form--wrapper");
  const arrayButtonsTargetGetQuote = document.querySelectorAll(".get_a_quote");
  const arrayButtonsTargetSubscribe =
    document.querySelectorAll(".subscribe-button");
  const arrayButtonsTargetJoinUs = document.querySelectorAll(".join_us_dealer");
  // const arrayButtonsTargetContactUs = document.querySelectorAll(
  //   ".contact-us__button"
  // );
  const arrayButtonsTargetWarranty = document.querySelectorAll(
    "#register_warranty_onclick"
  );

  const popupGetQuote = document.querySelector(".get_quote");
  const popupSubscribe = document.querySelector(".subscribe_us_form");
  const popupJoinUs = document.querySelector(".join_us_form");
  const popupWarranty = document.querySelector(".warranty-form");

  popupWrapper.classList.add("hidden");

  const openModalForm = (arrayTarget, form) => {
    arrayTarget.forEach((button) =>
      button.addEventListener("click", (e) => {
        e.preventDefault();

        if (button === document.querySelector("#register_warranty_onclick")) {
          registrationWarranty(button, form);
        } else {
          document.documentElement.classList.toggle("overflow--hidden");
          popupWrapper.classList.toggle("hidden");
          form.classList.remove("hidden");
        }
      })
    );
  };

  openModalForm(arrayButtonsTargetGetQuote, popupGetQuote);
  openModalForm(arrayButtonsTargetSubscribe, popupSubscribe);
  openModalForm(arrayButtonsTargetJoinUs, popupJoinUs);

  openModalForm(arrayButtonsTargetWarranty, popupWarranty);

  const arrayForms = [popupWrapper, popupSubscribe, popupJoinUs, popupWarranty];

  const closeModalForm = (formInner) => {
    popupWrapper.addEventListener("click", (e) => {
      if (e.target === popupWrapper) {
        document.documentElement.classList.remove("overflow--hidden");
        popupWrapper.classList.add("hidden");
        formInner.classList.add("hidden");
      }
    });
  };

  closeModalForm(popupGetQuote);
  closeModalForm(popupSubscribe);
  closeModalForm(popupJoinUs);
  closeModalForm(popupWarranty);

  const closeButtons = document.querySelectorAll(".close-button");

  closeButtons.forEach((item) =>
    item.addEventListener("click", (e) => {
      document.documentElement.classList.remove("overflow--hidden");
      popupWrapper.classList.toggle("hidden");

      arrayForms.forEach((form) => form.classList.add("hidden"));
    })
  );

  // Open modal form for registration warranty
  const registrationWarranty = (trigger, formInner) => {
    const notLoginMessage = document.querySelector(".log_warranty");
    const userMessage = document.querySelector(".register_warranty_wrap");

    const signButton = notLoginMessage.querySelector(".btn_wrap_checks");

    let userLogined = trigger.dataset.logined;
    const logined = userLogined || 0;

    popupWrapper.classList.toggle("hidden");
    formInner.classList.remove("hidden");

    if (logined) {
      userMessage.classList.remove("hidden");
      notLoginMessage.classList.add("hidden");
    } else {
      notLoginMessage.classList.remove("hidden");
      userMessage.classList.add("hidden");
    }

    signButton.addEventListener("click", (e) => {
      e.preventDefault();

      popupWrapper.classList.toggle("hidden");
      arrayForms.forEach((form) => form.classList.add("hidden"));
      notLoginMessage.classList.add("hidden");
      userMessage.classList.add("hidden");

      document
        .querySelector(".xoo-el-container")
        .classList.add("xoo-el-popup-active");
    });
  };
});
