const popupWrapper = document.querySelector(".form--wrapper");
const arrayButtonsTargetGetQuote = document.querySelectorAll(".get_a_quote");
const arrayButtonsTargetSubscribe =
  document.querySelectorAll(".subscribe-button");

const popupGetQuote = document.querySelector(".get_quote");
const popupSubscribe = document.querySelector(".subscribe_us_form");

popupWrapper.classList.add("hidden");

const openModalForm = (arrayTarget, form) => {
  arrayTarget.forEach((button) =>
    button.addEventListener("click", (e) => {
      e.preventDefault();

      popupWrapper.classList.toggle("hidden");
      form.classList.remove("hidden");
    })
  );
};

openModalForm(arrayButtonsTargetGetQuote, popupGetQuote);
openModalForm(arrayButtonsTargetSubscribe, popupSubscribe);

popupWrapper.addEventListener("click", (item) => {
  item.target.classList.toggle("hidden");
  popupGetQuote.classList.add("hidden");
  popupSubscribe.classList.add("hidden");
});

const closeButtons = document.querySelectorAll(".close-button");

closeButtons.forEach((item) =>
  item.addEventListener("click", (e) => {
    popupWrapper.classList.toggle("hidden");
    popupGetQuote.classList.add("hidden");
    popupSubscribe.classList.add("hidden");
  })
);

// item.addEventListener("click", (e) => {
//   popupWrapper.classList.toggle("hidden");
//   popupGetQuote.classList.add("hidden");
//   popupSubscribe.classList.add("hidden");
// });
