(function ($) {
    $.fn.visible = function (partial) {
        var $t = $(this),
            $w = $(window),
            viewTop = $w.scrollTop(),
            viewBottom = viewTop + $w.height(),
            _top = $t.offset().top,
            _bottom = _top + $t.height(),
            compareTop = partial === true ? _bottom : _top,
            compareBottom = partial === true ? _top : _bottom;
        return compareBottom <= viewBottom && compareTop >= viewTop;
    };
    $(window).on("scroll", function () {
        $(".equipments_item,.service-block,.recent-proj-tabs .tab, .count").each(function (i, el) {
            var el = $(el);
            if (el.visible(true)) {
                el.addClass("now-in-view");
            } else {
                el.removeClass("now-in-view");
            }
        });
    });
    $(document).on("ready", function () {
        $(".equipments_item,.service-block,.recent-proj-tabs .tab, .count").each(function (i, el) {
            var el = $(el);
            if (el.visible(true)) {
                el.addClass("now-in-view");
            } else {
                el.removeClass("now-in-view");
            }
        });
    });
})(jQuery);
