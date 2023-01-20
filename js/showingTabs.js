const showingTabs = (triggerClass, tabClass) => {
  const trigger = document.querySelector(triggerClass);

  const triggerName = triggerClass.slice(1);
  const tabName = tabClass.slice(1);

  const tabs = Array.from(document.querySelectorAll(tabClass)).filter((item) =>
    item.classList.contains(`${tabName}--disabled`)
  );

  trigger.addEventListener("click", (e) => {
    e.currentTarget.classList.toggle(`${triggerName}--active`);
    tabs.forEach((tab) => {
      tab.classList.toggle(`${tabName}--disabled`);
    });
  });
};

const _getElem = (className) => document.querySelector(className);

const checkElem = (classNameTrigger, classNameInner) => {
  if (_getElem(classNameInner)) {
    showingTabs(classNameTrigger, classNameInner);
  }
};

checkElem(".hide-tabs-button", ".tabs_navi__item");
checkElem(".hide-tabs-button", ".woocommerce-MyAccount-navigation-link");

// showingTabs(".hide-tabs-button", ".tabs_navi__item");
