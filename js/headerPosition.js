function changePositionOfHeader() {
  const header = document.querySelector(".header");

  window.addEventListener("scroll", (e) => {
    let stickyPoint = header.offsetTop;

    if (window.pageYOffset > stickyPoint) {
      header.classList.add("sticky");
    } else {
      header.classList.remove("sticky");
    }
  });
}

function initMobileMenu() {
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
    // e.stopPropagation();

    // Creating the BACK element
    const back = document.createElement("div");
    // const allBackBtns = Array.from(document.querySelectorAll(".back"));

    // back.classList.add("back");
    back.innerHTML = `
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                        width="256" height="256" viewBox="0 0 256 256" xml:space="preserve">
          <g style="stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;"
              transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
              <path
                  d="M 90 45 C 90 20.187 69.813 0 45 0 C 20.187 0 0 20.187 0 45 c 0 24.813 20.187 45 45 45 C 69.813 90 90 69.813 90 45 z M 10 45 c 0 -19.299 15.701 -35 35 -35 s 35 15.701 35 35 S 64.299 80 45 80 S 10 64.299 10 45 z"
                  style="stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;"
                  transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
              <path
                  d="M 49.926 62.777 V 27.222 c 0 -2.761 -2.238 -5 -5 -5 s -5 2.239 -5 5 v 35.555 c 0 2.762 2.239 5 5 5 S 49.926 65.539 49.926 62.777 z"
                  style="stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;"
                  transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
              <path
                  d="M 63.896 48.882 c 0 -1.279 -0.488 -2.559 -1.464 -3.536 c -1.953 -1.953 -5.119 -1.953 -7.071 0 L 45 55.706 l -10.361 -10.36 c -1.953 -1.953 -5.119 -1.953 -7.071 0 c -1.952 1.953 -1.952 5.119 0 7.072 l 13.896 13.896 c 1.953 1.952 5.119 1.952 7.071 0 l 13.896 -13.896 C 63.408 51.441 63.896 50.161 63.896 48.882 z"
                  style="stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;"
                  transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
          </g>
      </svg>
    `;

    let currentLink = e.currentTarget;

    currentLink.classList.contains("mega-menu-colum")
      ? back.classList.add("back", "back--second")
      : back.classList.add("back");

    const arrayLinks = currentLink.querySelectorAll("a");
    if (!currentLink.classList.contains("has-mega-menu")) {
      arrayLinks.forEach((link) =>
        link.addEventListener("click", (evt) => evt.stopPropagation())
      );
      // e.stopPropagation();
    }

    // arrayLinks.forEach((item) =>
    //   item.addEventListener("click", (evt) => evt.stopPropagation())
    // );
    let drop = currentLink.classList.contains("mega-menu-colum")
      ? currentLink
          .closest(".mega-menu-colum")
          .querySelector(".dropdown-level-1")
      : currentLink.closest(".menu-item").querySelector(".dropdown");

    navigationItemWithSubmenu.forEach((item) => {
      if (item !== currentLink) {
        item.classList.remove("menu-item--active");
      }
    });

    drops.forEach((item) => {
      if (item !== drop) {
        item.classList.remove("dropdown--active");

        if (item.querySelector(".back")) {
          item.querySelector(".back").remove();
        }
      }
    });

    currentLink.classList.add("menu-item--active");
    drop.classList.add("dropdown--active");
    drop.prepend(back);

    const currentBackButton =
      drop.closest(".dropdown").querySelector(".back--second") ||
      drop.closest(".dropdown").querySelector(".back");

    const allBackButtons = document.querySelectorAll(".back");

    allBackButtons.forEach((item) => {
      item.classList.remove("back--not-active");
      if (item != currentBackButton) item.classList.toggle("back--not-active");
    });

    back.addEventListener("click", (event) => {
      event.stopPropagation();
      drop.classList.remove("dropdown--active");
      console.log("Current back: ", event.currentTarget);

      const allBacks = document.querySelectorAll(".back");
      allBacks.forEach((item) => item.classList.remove("back--not-active"));
      event.currentTarget.remove();
    });
  }
}

// export { changePositionOfHeader, initMobileMenu };

changePositionOfHeader();
initMobileMenu();
