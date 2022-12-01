const sliderWrapper = (
  sliderContainer,
  slidesPerView,
  slideGap = 0,
  fadeStyle
) => {
  let swiper = new Swiper(sliderContainer, {
    loop: true,
    speed: 1200,
    effect: fadeStyle,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    // slidesPerView: slidesPerView,
    spaceBetween: slideGap,
    breakpoints: {
      700: {
        slidesPerView: slidesPerView,
      },
    },
  });
};
// export { sliderWrapper };

const heroSlider = document.querySelector(".main-hero-slider");
const blogSlider = document.querySelector(".dashboard__item--container");
const productSlider = document.querySelector("#image-carousel-container");
const relatedSlider = document.querySelector(".related-products--wrapper");
const autoPresses = document.querySelector(".automatic_presses--wrapper");
const getinTouch = document.querySelector(".get_in_contact--wrapper");

const supportTeam = document.querySelector(".support_team--wrapper");
const feedbacks = document.querySelector(".support-feedbacks--wrapper");

if (heroSlider) sliderWrapper(heroSlider, 1, 0, "fade");
if (blogSlider) sliderWrapper(blogSlider, 2, 60, "slide");
if (productSlider) sliderWrapper(productSlider, 1, 0, "fade");
if (relatedSlider) sliderWrapper(relatedSlider, 3, 30);
if (autoPresses) sliderWrapper(autoPresses, 3, 30);
if (getinTouch) sliderWrapper(getinTouch, 1, 0, "slide");

if (supportTeam) sliderWrapper(supportTeam, 3, 30);
if (feedbacks) sliderWrapper(feedbacks, 3, 30, "coverflow");

///// NEED INVESTIGATE

// const sliderWrapper = (
//   // sliderContainer,
//   // sliderWrapper,
//   // slideClass,
//   // slidesPerView
//   // { sliderContainer, sliderWrapper, slideClass },
//   initSlider,
//   slidesPerView
// ) => {
//   console.log("====================================");
//   console.log(initSlider);
//   console.log("====================================");
//   let { sliderContainer, sliderWrapper, slideClass } = initSlider;
//   console.log("====================================");
//   console.log(sliderContainer);
//   console.log("====================================");
//   let swiper = new Swiper(sliderContainer, {
//     loop: true,
//     pagination: {
//       el: ".swiper-pagination",
//     },
//     navigation: {
//       nextEl: ".swiper-button-next",
//       prevEl: ".swiper-button-prev",
//     },
//     slidesPerView: slidesPerView,
//     spaceBetween: 30,
//     wrapperClass: sliderWrapper,
//     slideClass: slideClass,
//   });
// };

// const setSliderItems = (
//   sliderContainerInit,
//   sliderWrapperInit,
//   slideClassInit
// ) => {
//   const sliderContainer = document.querySelector(sliderContainerInit);
//   const sliderWrapper = document.querySelector(sliderWrapperInit);
//   const slideClass = document.querySelector(slideClassInit);

//   return {
//     sliderContainer,
//     sliderWrapper,
//     slideClass,
//   };
// };

// sliderWrapper(
//   setSliderItems(
//     ".main-hero-slider",
//     ".main-hero-slider--wrapper",
//     ".home_header_slide_item"
//   ),
//   1
// );
