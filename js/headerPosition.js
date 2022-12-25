const changePositionOfHeader = () => {
  const header = document.querySelector(".header");

  window.addEventListener("scroll", (e) => {
    let stickyPoint = header.offsetTop;

    if (window.pageYOffset > stickyPoint) {
      header.classList.add("sticky");
    } else {
      header.classList.remove("sticky");
    }
  });
};

const initMobileMenu = () => {
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

    // const getElementByClass = class => document.querySelector(class);

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

      // Observe for click on link with submenu
      navigationItemWithSubmenu.forEach((item) => {
        item.addEventListener("click", handlerSubmenu), { once: true };
      });
    }
  });

  function handlerSubmenu(e) {
    e.preventDefault();

    // Creating the BACK element
    const back = document.createElement("div");
    back.classList.add("back");

    let currentLink = e.currentTarget;

    const arrayLinks = currentLink.querySelectorAll("a");
    if (!currentLink.classList.contains("has-mega-menu")) {
      arrayLinks.forEach((link) =>
        link.addEventListener("click", (evt) => {
          evt.stopImmediatePropagation();
        })
      );
    }

    let drop = currentLink.closest(".menu-item").querySelector(".dropdown");

    navigationItemWithSubmenu.forEach((item) => {
      if (item !== currentLink) {
        item.classList.remove("menu-item--active");
      }
    });

    drops.forEach((item) => {
      if (item !== drop) {
        item.classList.remove("dropdown--active");
      }
      if (item.querySelector(".back")) {
        item.querySelector(".back").remove();
      }
    });

    currentLink.classList.add("menu-item--active");
    drop.classList.add("dropdown--active");
    drop.prepend(back);
    // e.target.addEventListener("click", (evt) => evt.stopImmediatePropagation());

    back.addEventListener("click", (event) => {
      event.stopImmediatePropagation();
      drop.classList.remove("dropdown--active");
      console.log("Current back: ", event.currentTarget);
      event.currentTarget.remove();
    });
  }
};

changePositionOfHeader();
initMobileMenu();
