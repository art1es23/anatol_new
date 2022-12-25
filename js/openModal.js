document.addEventListener("DOMContentLoaded", (e) => {
  const popupWrapper = document.querySelector(".form--wrapper");
  popupWrapper.classList.add("hidden");
  const scrollToTopButton = document.querySelector("#scrollToTop");

  const createObjectTriggers = (trigger, modalForm) => {
    const arrayTriggers = document.querySelectorAll(trigger);
    const formWrapper = document.querySelector(modalForm);
    const closeButton = formWrapper.querySelector(".close-button");

    arrayTriggers.forEach((button) =>
      button.addEventListener("click", (e) => {
        e.preventDefault();

        if (button === document.querySelector("#register_warranty_onclick")) {
          registrationWarranty(button, formWrapper);
        } else {
          document.documentElement.classList.toggle("overflow--hidden");
          scrollToTopButton.classList.add("hidden");

          popupWrapper.classList.toggle("hidden");
          formWrapper.classList.remove("hidden");
        }
      })
    );

    popupWrapper.addEventListener("click", (e) => {
      if (e.target === popupWrapper) {
        document.documentElement.classList.remove("overflow--hidden");
        popupWrapper.classList.add("hidden");
        formWrapper.classList.add("hidden");
        scrollToTopButton.classList.remove("hidden");
      }
    });

    closeButton.addEventListener("click", (e) => {
      document.documentElement.classList.remove("overflow--hidden");

      popupWrapper.classList.add("hidden");
      formWrapper.classList.add("hidden");
      scrollToTopButton.classList.remove("hidden");

      // arrayForms.forEach((form) => form.classList.add("hidden"));
    });

    // Open modal form for registration warranty
    const registrationWarranty = (trigger, formInner) => {
      const notLoginMessage = document.querySelector(".log_warranty");
      const userMessage = document.querySelector(".register_warranty_wrap");

      const signButton = notLoginMessage.querySelector(".btn_wrap_checks");

      let userLogined = trigger.dataset.logined;
      const logined = userLogined || 0;

      popupWrapper.classList.toggle("hidden");
      formInner.classList.remove("hidden");
      scrollToTopButton.classList.add("hidden");

      if (logined) {
        userMessage.classList.remove("hidden");
        notLoginMessage.classList.add("hidden");
      } else {
        notLoginMessage.classList.remove("hidden");
        userMessage.classList.add("hidden");
      }

      signButton.addEventListener("click", (e) => {
        e.preventDefault();

        popupWrapper.classList.add("hidden");
        // arrayForms.forEach((form) => form.classList.add("hidden"));
        notLoginMessage.classList.add("hidden");
        userMessage.classList.add("hidden");

        console.log("====================================");
        console.log("listen");
        console.log("====================================");
        document
          .querySelector(".xoo-el-container")
          .classList.add("xoo-el-popup-active");
      });
    };
  };

  createObjectTriggers(".subscribe-button", ".subscribe_us_form");
  createObjectTriggers("#register_warranty_onclick", ".warranty-form");
  createObjectTriggers(".get_a_quote", ".get_quote");
  createObjectTriggers(".get_a_quote_sales-button", ".get_quote");
  createObjectTriggers(".join_us_dealer", ".join_us_form");
});
