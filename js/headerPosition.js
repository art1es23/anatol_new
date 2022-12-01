// $(document).ready(function () {
//   /*===== Sticky header======*/
//   $(window).on("scroll", function (event) {
//     var scroll = $(window).scrollTop();
//     if (scroll < 200) {
//       $(".header").removeClass("sticky");
//     } else {
//       $(".header").addClass("sticky");
//     }
//   });
// });

const header = document.querySelector(".header");

window.addEventListener("scroll", (e) => {
  let stickyPoint = header.offsetTop;

  if (window.pageYOffset > stickyPoint) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
});

const menuTrigger = document.querySelector(".menu_icon");
const menuNav = document.querySelector(".main-menu-wrapper");
const isVisibleClass = "visible";

menuTrigger.addEventListener("click", (item) => {
  const headerQuote = document.querySelector(".header-quote");
  const headerTopSection = document.querySelector(".header-top");

  const menuIconTop = menuTrigger.querySelector(".top-line");
  const menuIconMid = menuTrigger.querySelector(".mid-line");
  const menuIconBottom = menuTrigger.querySelector(".bottom-line");

  menuNav.classList.toggle(isVisibleClass);
  headerTopSection.classList.toggle("hidden");
  headerQuote.classList.toggle("hidden");
  menuIconTop.classList.toggle("top-animate");
  menuIconMid.classList.toggle("mid-animate");
  menuIconBottom.classList.toggle("bottom-animate");

  document.body.classList.toggle("overflow--hidden");

  // if (!this.classList.contains(isVisibleClass)) {
  //   listWrapper2.classList.remove(isVisibleClass);
  //   listWrapper3.classList.remove(isVisibleClass);
  //   const menuLinks = menuWrapper.querySelectorAll("a");
  //   for (const menuLink of menuLinks) {
  //     menuLink.classList.remove(isActiveClass);
  //   }
  // }

  // if (window.innerWidth <= 1080) {
  //   const categoryLinksWithSubmenu = document.querySelectorAll(
  //     ".menu-item-has-children"
  //   );

  //   // console.log("====================================");
  //   // console.log(categoryLinksWithSubmenu.length);
  //   // console.log("====================================");

  //   categoryLinksWithSubmenu.forEach((item) => {
  //     console.log("====================================");
  //     console.log(item);
  //     console.log("====================================");
  //     const submenuWrapper = item.querySelector(".zn_mega_container");
  //     const submenu = submenuWrapper.querySelector(".mega_cont");

  //     const backTrigger = document.createElement("div");
  //     backTrigger.classList.add("back-trigger");
  //     submenuWrapper.append(backTrigger);

  //     item.addEventListener("click", (e) => {
  //       e.preventDefault();
  //       submenu.classList.toggle("submenu--active");
  //     });

  //     backTrigger.addEventListener("click", (e) => {
  //       e.preventDefault();
  //       submenu.classList.remove("submenu--active");
  //     });
  //   });
  // }
});
