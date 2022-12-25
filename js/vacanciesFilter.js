jQuery(".beautiful-taxonomy-filters-tax select").on(
  "change.select2",
  function () {
    jQuery(this)
      .parents("#beautiful-taxonomy-filters-form")
      .find(".beautiful-taxonomy-filters-button")
      .click();
  }
);
