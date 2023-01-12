import { changePositionOfHeader, initMobileMenu } from "./headerPosition.js";
import { openModalForms } from "./openModal.js";
import { submitForm } from "./submitForm.js";

document.addEventListener("DOMContentLoaded", (e) => {
  changePositionOfHeader();
  initMobileMenu();
  openModalForms();

  submitForm(".get_quote-inner");
  submitForm(".home_subscribe");
});
