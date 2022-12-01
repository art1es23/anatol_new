const popupWrapper = document.querySelector(".popupp");
const arrayButtonsTargetGetQuote = document.querySelectorAll(".get_a_quote");
const arrayButtonsTargetSubscribe =
  document.querySelectorAll(".subscribe-button");

const popupGetQuote = document.querySelector(".get_quote.innerr");
const popupSubscribe = document.querySelector(".subscribe_us_form.innerr");

const openModalForm = (arrayTarget, form) => {
  arrayTarget.forEach((button) =>
    button.addEventListener("click", (item) => {
      item.preventDefault();

      popupWrapper.classList.toggle("hidden");
      form.style.display = "block";
    })
  );
};

openModalForm(arrayButtonsTargetGetQuote, popupGetQuote);
openModalForm(arrayButtonsTargetSubscribe, popupSubscribe);

popupWrapper.addEventListener("click", (item) => {
  item.target.classList.toggle("hidden");
  popupGetQuote.style.display = "none";
  popupSubscribe.style.display = "none";
});
