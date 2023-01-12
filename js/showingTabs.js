const showingTabs = (triggerClass, tabClass) => {
  const trigger = document.querySelector(triggerClass);
  const tabs = Array.from(document.querySelectorAll(tabClass)).filter((item) =>
    item.classList.contains("tabs_navi__item--disabled")
  );

  trigger.addEventListener("click", (e) => {
    e.currentTarget.classList.toggle("hide-tabs-button--active");
    tabs.forEach((tab) => {
      tab.classList.toggle("tabs_navi__item--disabled");
    });
  });
};

showingTabs(".hide-tabs-button", ".tabs_navi__item");
