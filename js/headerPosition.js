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
const menuNav = document.querySelector(".navbar");
const isVisibleClass = "navbar--opened";
let isActive = false;

const navigationItemWithSubmenu = document.querySelectorAll(".menu-item");

// navigationItemWithSubmenu.forEach((item) => {
//   const dropdown = item.querySelector(".dropdown");
//   const close = item.querySelectorAll(".back");

//   if (!(close === null) && Object.values(item.children).includes(close)) {
//     for (let i = 0; i <= close.length; i++) {
//       dropdown.removeChild(close[i]);
//     }
//   }
// });

document.querySelectorAll(".dropdown").forEach((el) => {
  const close = document.querySelectorAll(".back");

  if (
    // !(close === null) &&
    Object.values(el.children).includes(document.querySelector(".back"))
  ) {
    for (let i = 0; i <= close.length; i++) {
      el.removeChild(close[i]);
    }
  }
});

menuTrigger.addEventListener("click", (event) => {
  event.preventDefault();

  const headerQuote = document.querySelector(".header-quote");
  const headerTopSection = document.querySelector(".header-top");

  const menuIconTop = menuTrigger.querySelector(".top-line");
  const menuIconMid = menuTrigger.querySelector(".mid-line");
  const menuIconBottom = menuTrigger.querySelector(".bottom-line");

  !isActive ? (isActive = !isActive) : false;

  document.querySelectorAll(".dropdown").forEach((el) => {
    el.classList.remove("dropdown--active");

    // const close = document.querySelectorAll(".back");

    // if (!(close === null) && Object.values(el.children).includes(close)) {
    //   for (let i = 0; i <= close.length; i++) {
    //     el.removeChild(close[i]);
    //   }
    // }
  });

  if (isActive) {
    document.body.classList.toggle("overflow--hidden");
    header.classList.toggle("header--opened");

    menuNav.classList.toggle(isVisibleClass);

    headerTopSection.classList.toggle("hidden");
    headerQuote.classList.toggle("hidden");

    menuIconTop.classList.toggle("top-animate");
    menuIconMid.classList.toggle("mid-animate");
    menuIconBottom.classList.toggle("bottom-animate");

    const back = document.createElement("div");
    back.classList.add("back");

    navigationItemWithSubmenu.forEach((el) => {
      if (Object.values(el.children).includes(el.querySelector(".dropdown"))) {
        const dropdown = el.querySelector(".dropdown");

        el.addEventListener("click", (e) => {
          e.preventDefault();

          dropdown.classList.add("dropdown--active");
          dropdown.prepend(back);
        });
      } else {
        el.addEventListener("click", (e) => {
          return true;
        });
      }

      back.addEventListener("click", (evt) => {
        evt.preventDefault();

        el.querySelectorAll(".dropdown").forEach((el) => {
          el.classList.remove("dropdown--active");
        });

        el.removeChild(close);
      });
    });

    // back.addEventListener("click", (evt) => {
    //   evt.preventDefault();

    //   document
    //     .querySelectorAll(".dropdown")
    //     .forEach((item) => item.classList.remove("dropdown--active"));
    //   item.parentNode.removeChild(close);
    // });
  }
});
