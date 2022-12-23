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

const navigationItemWithSubmenu = Array.from(
  document.querySelectorAll(".menu-item")
).filter((item) => item.classList.contains("parent_item"));

const drops = document.querySelectorAll(".dropdown-level-0");

menuTrigger.addEventListener("click", (event) => {
  event.preventDefault();
  // Header wrapper
  const headerQuote = document.querySelector(".header-quote");
  const headerTopSection = document.querySelector(".header-top");
  // Trigger button
  const menuIconTop = menuTrigger.querySelector(".top-line");
  const menuIconMid = menuTrigger.querySelector(".mid-line");
  const menuIconBottom = menuTrigger.querySelector(".bottom-line");

  drops.forEach((el) => el.classList.remove("dropdown--active"));

  isActive = !isActive;

  if (isActive) {
    document.documentElement.classList.toggle("overflow--hidden");
    header.classList.toggle("header--opened");

    menuNav.classList.toggle(isVisibleClass);

    // Header wrapper actions
    headerTopSection.classList.toggle("hidden");
    headerQuote.classList.toggle("hidden");

    // Trigger button animation
    menuIconTop.classList.toggle("top-animate");
    menuIconMid.classList.toggle("mid-animate");
    menuIconBottom.classList.toggle("bottom-animate");

    // Creating the BACK element
    const back = document.createElement("div");
    back.classList.add("back");

    // Observe for click on link with submenu
    navigationItemWithSubmenu.forEach((item) => {
      item.addEventListener("click", (e) => {
        e.preventDefault();

        let currentLink = e.currentTarget;
        let drop = currentLink.closest(".menu-item").querySelector(".dropdown");

        // const submenuDrops = item.querySelectorAll(".dropdown-level-1");

        // if (currentLink.classList.contains("has-mega-menu")) {
        //   // Ovserve for click on link in Mega menu
        //   // const submenusFromMegaContainer = Array.from(
        //   //   document.querySelectorAll(".menu-item")
        //   // ).filter((item) => item.classList.contains("mega-menu-colum"));

        // } else {
        navigationItemWithSubmenu.forEach((item) => {
          if (item !== currentLink) {
            item.classList.remove("menu-item--active");
          }
        });
        currentLink.classList.toggle("menu-item--active");
        // }

        drops.forEach((item) => {
          if (item !== drop) {
            if (backButton) {
              item.removeChild(backButton);
            }
            item.classList.remove("dropdown--active");
          }
        });

        drop.classList.add("dropdown--active");
        drop.prepend(back);
      });
    });
  }
  const backButton = document.querySelector(".back");

  if (backButton) {
    backButton.addEventListener("click", (e) => {
      e.preventDefault();

      drops.forEach((item) => {
        item.classList.remove("dropdown--active");
        item.removeChild(backButton);
      });
    });
  }
});
