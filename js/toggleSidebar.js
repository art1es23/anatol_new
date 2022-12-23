const toggleSidebar = (trigger, sidebar) => {
  const hideSidebarButton = document.querySelector(trigger);
  const sidebarWrapper = document.querySelector(sidebar);

  hideSidebarButton.addEventListener("click", (e) => {
    e.preventDefault();

    sidebarWrapper.classList.toggle("sidebar--active");
    hideSidebarButton.classList.toggle("hide-sidebar--active");
  });
};

toggleSidebar(".hide-sidebar", ".sidebar-right");
toggleSidebar(".hide-sidebar", ".product_sidebar");
