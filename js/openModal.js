const openModalForms = () => {
  const popupWrapper = document.querySelector(".form--wrapper");
  popupWrapper.classList.add("hidden");
  const scrollToTopButton = document.querySelector("#scrollToTop");

  const createObjectTriggers = (trigger, modalForm) => {
    const arrayTriggers = document.querySelectorAll(trigger);
    const formWrapper = document.querySelector(modalForm);

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

    if (formWrapper.querySelector(".close-button")) {
      const closeButton = formWrapper.querySelector(".close-button");

      closeButton.addEventListener("click", (e) => {
        document.documentElement.classList.remove("overflow--hidden");

        popupWrapper.classList.add("hidden");
        formWrapper.classList.add("hidden");
        scrollToTopButton.classList.remove("hidden");

        // arrayForms.forEach((form) => form.classList.add("hidden"));
      });
    }

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

        document
          .querySelector(".xoo-el-container")
          .classList.add("xoo-el-popup-active");
      });
    };
  };

  const _getElem = (className) => document.querySelector(className);

  const checkElem = (classNameTrigger, classNameForm) => {
    if (_getElem(classNameForm)) {
      createObjectTriggers(classNameTrigger, classNameForm);
    }
  };

  checkElem(".subscribe-button", ".subscribe_us_form");
  checkElem(".get_a_quote", ".get_quote");
  checkElem("#register_warranty_onclick", ".warranty-form");
  checkElem(".join_us_dealer", ".join_us_form");
  checkElem(".download-ebook-button", ".form-download-ebook");
  checkElem(".contact-us__button", ".vacancy-contact-us");
};
openModalForms();

// export { openModalForms };
