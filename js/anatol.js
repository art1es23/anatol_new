function checkJqueryStuff() {
  window.jQuery
    ? jQuery(document).ready(function () {
        function e(e) {
          /* 
        return /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i.test(e)
     */
        }
        /*  jQuery(".gvSubscrb").unbind().on("click", function() {
        var i = jQuery("input[type=text][name=contact_first]").val(),
            t = jQuery("input[type=text][name=email]").val();
        (0 == i.trim().length ? jQuery("input[type=text][name=contact_first]").addClass("uk-form-danger").removeClass("uk-form-success") : jQuery("input[type=text][name=contact_first]").removeClass("uk-form-danger").addClass("uk-form-success"), 0 == t.trim().length ? jQuery("input[type=text][name=email]").addClass("uk-form-danger").removeClass("uk-form-success") : 0 == e(t) ? jQuery("input[type=text][name=email]").addClass("uk-form-danger").removeClass("uk-form-success") : jQuery("input[type=text][name=email]").removeClass("uk-form-danger").addClass("uk-form-success"), i.trim().length > 0 && t.trim().length > 0 && 1 == e(t)) && (jQuery.post("https://crm.snapforce.com/dev2/modules/models/settings/customization/m_webforms.inc.php", {
            contact_first: i,
            email: t
        }, function(e, i) {}), window.open("https://anatol.com/comparison-of-pneumatic-and-electric-presses/", "_blank").focus(), jQuery(".hideThisSht").hide())
    }) */
      })
    : window.setTimeout(checkJqueryStuff, 100);
}
checkJqueryStuff(),
  (function (e) {
    ({
      homeSlider: "",
      init: function () {
        var e = this;
        jQuery(function () {
          e.initHomeSlider(),
            e.initFancybox(),
            e.videoSlider(),
            e.supportSlider(),
            /*  e.equipmentslistSlider(), */ e.articleslideSlider(),
            e.relatedarticleslideSlider(),
            e.get_contacts_Slider(),
            e.singleProductSlider(),
            e.singleProductSliderr(),
            e.singleProduct2Slider(),
            e.singleProductReviews(),
            e.singleProductGallery(),
            e.singleProductVideoGallery(),
            e.singleWCProductSlider(),
            e.singleProductUppsellsSlider(),
            e.searchWidgetPlaceholder(),
            e.blogContentSlider(),
            e.blogContentSliderFix(),
            e.latestNewsSlider(),
            e.feedbacksSlider(),
            e.latestNewsSliderFix(),
            e.faqTabs(),
            /* e.mobileMenuFix(),*/ e.contactScroll(),
            e.vacancyFilter(),
            e.vacancyForm(),
            e.scrollToTop(),
            /*  e.equipmentGallery(), */ e.expandContent(),
            e.mobileFilterToggle(),
            e.mobileMenuToggle(),
            e.pageCompare(),
            /* e.trackButtons(),  */ jQuery.isFunction(jQuery.fn.niceSelect) &&
              jQuery("select").niceSelect(),
            (jQuery.fn.responsiveTabs = function () {
              this.addClass("responsive-tabs"),
                this.append(
                  jQuery(
                    '<span class="glyphicon glyphicon-triangle-bottom"></span>'
                  )
                ),
                this.append(
                  jQuery(
                    '<span class="glyphicon glyphicon-triangle-top"></span>'
                  )
                ),
                this.on(
                  "click",
                  "li.active > a, span.glyphicon",
                  function () {
                    this.toggleClass("open");
                  }.bind(this)
                ),
                this.on(
                  "click",
                  "li:not(.active) > a",
                  function () {
                    this.removeClass("open");
                  }.bind(this)
                );
            }),
            jQuery(".nav.nav-tabs").responsiveTabs();
        });
      } /*
            trackButtons: function() {
                jQuery(".track-button").on("click", function() {
                    gtag("event", "click", {
                        event_category: jQuery(this).attr("data-category"),
                        event_label: jQuery(this).attr("data-label"),
                        value: 1
                    })
                })
            }, 
			*/,
      initHomeSlider: function () {
        (this.homeSlider = jQuery(".home_header_slider").slick({
          infinite: !0,
          arrows: !0,
          prevArrow: '<div class="prevs"><div></div></div>',
          nextArrow: '<div class="nexts"><div></div></div>',
          fade: !0,
          dots: !0,
          autoplaySpeed: 5000,
          autoplay: !1,
          adaptiveHeight: !0,
        })),
          jQuery(".wide-slider-wrap").addClass("loaded");
      },
      initFancybox: function () {
        jQuery('[data-fancybox="video-gallery"]').fancybox({}),
          jQuery('[data-fancybox="product-images"]').fancybox({});
      },
      videoSlider: function () {
        jQuery(".full_bottom_container .video_wrapper").slick({
          infinite: !0,
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: !0,
          dots: !0,
          autoplaySpeed: 1e4,
          autoplay: !0,
          responsive: [
            {
              breakpoint: 1201,
              settings: {
                slidesToShow: 1,
                centerMode: !0,
                variableWidth: !0,
              },
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 1,
                centerMode: !0,
                variableWidth: !0,
                arrows: !1,
              },
            },
          ],
        });
      },
      supportSlider: function () {
        jQuery(".support_team_cont").slick({
          infinite: !0,
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: !0,
          dots: !0,
          autoplaySpeed: 1e4,
          autoplay: !0,
          responsive: [
            {
              breakpoint: 1201,
              settings: {
                slidesToShow: 1,
              },
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 1,
                arrows: !1,
              },
            },
          ],
        });
      },
      equipmentslistSlider: function () {
        jQuery(".equipments_list").slick({
          infinite: !0,
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: !1,
          dots: !0,
          responsive: [
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 1,
              },
            },
          ],
        });
      },
      get_contacts_Slider: function () {
        jQuery(".get_contacts_slider").slick({
          infinite: !0,
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: !1,
          dots: !0,
        });
      },
      articleslideSlider: function () {
        jQuery(".article-slide").slick({
          infinite: !0,
          slidesToShow: 2,
          slidesToScroll: 1,
          arrows: !1,
          dots: !0,
          responsive: [
            {
              breakpoint: 900,
              settings: {
                slidesToShow: 1,
              },
            },
          ],
        });
      },
      relatedarticleslideSlider: function () {
        jQuery(".related-article-slide").slick({
          infinite: !0,
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: !1,
          dots: !0,
          responsive: [
            {
              breakpoint: 900,
              settings: {
                slidesToShow: 1,
              },
            },
          ],
        });
      },
      singleProductSlider: function () {
        jQuery(".related_products_slider").slick({
          infinite: !0,
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: !1,
          dots: !0,
          responsive: [
            {
              breakpoint: 769,
              settings: {
                slidesToShow: 1,
              },
            },
          ],
        });
      },
      singleProductSliderr: function () {
        jQuery(".related_products_sliderr").slick({
          infinite: !0,
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: !0,
          dots: !0,
          responsive: [
            {
              breakpoint: 769,
              settings: {
                slidesToShow: 1,
              },
            },
          ],
        });
      },
      singleWCProductSlider: function () {
        jQuery(".related_wcproducts_slider").slick({
          infinite: !0,
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: !1,
          dots: !0,
          responsive: [
            {
              breakpoint: 1300,
              settings: {
                slidesToShow: 3,
              },
            },
            {
              breakpoint: 1100,
              settings: {
                slidesToShow: 3,
              },
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 2,
              },
            },
            {
              breakpoint: 640,
              settings: {
                slidesToShow: 1,
              },
            },
          ],
        });
      },
      singleProductUppsellsSlider: function () {
        jQuery(".upsells_wcproducts_slider").slick({
          infinite: !0,
          slidesToShow: 4,
          slidesToScroll: 1,
          adaptiveHeight: !0,
          arrows: !1,
          dots: !0,
          responsive: [
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 2,
              },
            },
            {
              breakpoint: 640,
              settings: {
                slidesToShow: 1,
              },
            },
          ],
        });
      },
      singleProduct2Slider: function () {
        jQuery(".related_products2_slider").slick({
          infinite: !0,
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: !1,
          dots: !0,
          responsive: [
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 1,
              },
            },
          ],
        });
      },
      singleProductReviews: function () {
        jQuery(".product_review_slider").slick({
          infinite: !0,
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: !1,
          dots: !0,
          autoplay: !0,
          autoplaySpeed: 1e4,
        });
      },
      singleProductGallery: function () {
        jQuery(".product_photo_slider").slick({
          infinite: !0,
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: !1,
          dots: !0,
        });
      },
      singleProductVideoGallery: function () {
        jQuery(".product_video_slider").slick({
          infinite: !0,
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: !1,
          dots: !0,
        });
      },
      blogContentSlider: function () {
        jQuery(".blog_content_slider").slick({
          infinite: !0,
          slidesToShow: 2,
          slidesToScroll: 1,
          arrows: !1,
          autoHeight: !0,
          dots: !0,
          responsive: [
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 1,
              },
            },
          ],
        }),
          jQuery(".regional_offices").slick({
            infinite: !0,
            autoplay: !1,
            autoplaySpeed: 5000,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: !1,
            dots: !0,
            mobileFirst: true,

            responsive: [
              {
                breakpoint: 1200,
                settings: "unslick",
              },

              {
                breakpoint: 992,
                settings: {
                  slidesToShow: 1,
                },
              },
            ],
          }),
          jQuery(".ebook_page-carousel").slick({
            infinite: !0,
            autoplay: !0,
            autoplaySpeed: 5000,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: !1,
            dots: !0,
            responsive: [
              {
                breakpoint: 992,
                settings: {
                  slidesToShow: 1,
                },
              },
            ],
          }),
          jQuery(".presses_content_row_slider").slick({
            infinite: !0,
            autoplay: !1,
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: !0,
            dots: !1,
            responsive: [
              {
                breakpoint: 1200,
                settings: {
                  slidesToShow: 2,
                },
              },
              {
                breakpoint: 900,
                settings: "unslick",
              },
            ],
          }),
          jQuery(".similar_ebooks_slider").slick({
            infinite: !0,
            autoplay: !0,
            autoplaySpeed: 5000,
            slidesToShow: 2,
            slidesToScroll: 1,
            arrows: !1,
            dots: !0,
            responsive: [
              {
                breakpoint: 992,
                settings: {
                  slidesToShow: 1,
                },
              },
            ],
          }),
          jQuery(".similar_video_slider").slick({
            infinite: !0,
            autoplay: !0,
            autoplaySpeed: 5000,
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: !1,
            dots: !0,
            responsive: [
              {
                breakpoint: 992,
                settings: {
                  slidesToShow: 2,
                },
              },
              {
                breakpoint: 700,
                settings: {
                  slidesToShow: 1,
                },
              },
            ],
          }),
          jQuery(".categories_list_wc.more_cats").slick({
            infinite: !0,
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: !1,
            dots: !0,
            responsive: [
              {
                breakpoint: 769,
                settings: {
                  slidesToShow: 1,
                },
              },
            ],
          });
      },
      blogContentSliderFix: function () {
        var e = this;
        jQuery('a[href="#blog_content"]').on("shown.bs.tab", function (i) {
          jQuery(".blog_content_slider").slick("unslick"),
            e.blogContentSlider();
        });
      },
      latestNewsSlider: function () {
        jQuery(".latest_news_slider").slick({
          infinite: !0,
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: !1,

          dots: !0,
          responsive: [
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 1,
              },
            },
          ],
        });
      },
      /*   */ feedbacksSlider: function () {
        jQuery(".feedbacks-posts-block").slick({
          infinite: !0,
          autoplay: !1,
          autoplaySpeed: 5000,
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: !0,
          prevArrow: '<div class="prevs"></div>',
          nextArrow: '<div class="nexts"></div>',
          dots: !0,
          responsive: [
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 1,
              },
            },
          ],
        });
      } /**/,
      latestNewsSliderFix: function () {
        var e = this;
        jQuery('a[href="#latest_news"]').on("shown.bs.tab", function (i) {
          jQuery(".latest_news_slider").slick("unslick"), e.latestNewsSlider();
        });
      },
      productFluidvids: function () {
        fluidvids.init({
          selector: ["iframe", "object"],
          players: ["www.youtube.com", "player.vimeo.com"],
        });
      },
      searchWidgetPlaceholder: function () {
        jQuery(".search_widget_w #s").attr(
          "placeholder",
          jQuery(".search_widget_w h3").text()
        );
      },
      faqTabs: function () {
        jQuery(".qa_items").on("click", ".item_question", function () {
          jQuery(this)
            .parents(".qa_items")
            .find(".qa_item")
            .removeClass("active")
            .find(".item_answer")
            .stop()
            .slideUp(500, function () {}),
            jQuery(this)
              .parents(".qa_item")
              .addClass("active")
              .find(".item_answer")
              .stop()
              .slideDown(500, function () {});
        });
      },
      /*
  mobileMenuFix: function() {
                jQuery(".navbar-inverse .navbar-nav > li > a.dropdown").on("click", function() {
                    if (jQuery(window).width() <= 991) return !1
                })
            },
            */
      contactScroll: function () {
        jQuery('[href="#contact"]').on("click", function () {
          jQuery("html, body").animate(
            {
              scrollTop: jQuery("#contact").offset().top - 20,
            },
            1e3
          );
        });
      },
      vacancyFilter: function () {
        jQuery(".beautiful-taxonomy-filters-tax select").on(
          "change.select2",
          function () {
            jQuery(this)
              .parents("#beautiful-taxonomy-filters-form")
              .find(".beautiful-taxonomy-filters-button")
              .click();
          }
        );
      },
      vacancyForm: function () {
        if (jQuery(".vacancy_content").length) {
          var e = "",
            i = "",
            t = "";
          jQuery('input[name="vacancy_country"]').length &&
            (e = jQuery('input[name="vacancy_country"]').val()),
            jQuery('input[name="vacancy_position"]').length &&
              (i = jQuery('input[name="vacancy_position"]').val()),
            jQuery('input[name="vacancy_name"]').length &&
              (t = jQuery('input[name="vacancy_name"]').val()),
            console.log(e),
            jQuery('.wpcf7-hidden[name="country"]').length &&
              (console.log(e), jQuery('.wpcf7-hidden[name="country"]').val(e)),
            jQuery('.wpcf7-hidden[name="position"]').length &&
              jQuery('.wpcf7-hidden[name="position"]').val(i),
            jQuery('.wpcf7-hidden[name="vacancy"]').length &&
              jQuery('.wpcf7-hidden[name="vacancy"]').val(t),
            jQuery(".uploadcv_button span.name").on("click", function () {
              jQuery(".uploadcv_button input").click();
            }),
            jQuery(".uploadcv_button input").on("change", function () {
              var e = jQuery(this)
                .val()
                .replace(/.*(\/|\\)/, "");
              jQuery(".vf_upload_filename").text(e);
            }),
            document.addEventListener(
              "wpcf7mailsent",
              function (n) {
                jQuery('.wpcf7-hidden[name="country"]').length &&
                  jQuery('.wpcf7-hidden[name="country"]').val(e),
                  jQuery('.wpcf7-hidden[name="position"]').length &&
                    jQuery('.wpcf7-hidden[name="position"]').val(i),
                  jQuery('.wpcf7-hidden[name="vacancy"]').length &&
                    jQuery('.wpcf7-hidden[name="vacancy"]').val(t),
                  jQuery(".vf_upload_filename").text("");
              },
              !1
            );
        }
      },
      expandContent: function () {
        jQuery(".expand__button").on("click", function (i) {
          e(this)
            .toggleClass("expanded")
            .next(".expand__content")
            .toggleClass("expanded")
            .slideToggle("300");
        });
      },
      scrollToTop: function () {
        jQuery(window).scroll(function () {
          jQuery(this).scrollTop() >= 50
            ? jQuery("#scrollToTop").addClass("visible")
            : jQuery("#scrollToTop").removeClass("visible");
        }),
          jQuery("#scrollToTop").click(function (e) {
            e.preventDefault(),
              jQuery("body,html").animate(
                {
                  scrollTop: 0,
                },
                500
              );
          });
      },
      fixedTopNav: function () {
        jQuery(window).scroll(function () {
          jQuery(this).scrollTop() >= 85
            ? jQuery(".head_part_container").addClass("fixed")
            : jQuery(".head_part_container").removeClass("fixed");
        });
      },
      /*             equipmentGallery: function() {
                e(".owl-carousel").length > 0 && e.each(e(".owl-carousel.content-slider-with-controls"), function(i, t) {
                    e(this).owlCarousel({
                        singleItem: !0,
                        autoPlay: !1,
                        navigation: !0,
                        navigationText: !1,
                        pagination: !0,
                        items: 1,
                        lazyLoad: !1
                    })
                }), e("a.image-popup-modal").length && e.each(e("a.image-popup-modal"), function(i, t) {
                    e(this).on("click", function(i) {
                        i.preventDefault(),
                            function(i) {
                                var t = e("#product-images-modal"),
                                    n = t.find("div.owl-carousel"),
                                    o = n.data("owlCarousel");
                                for (console.log(equipment_gallery_data), t.attr("data-description", equipment_gallery_data.desrctiption); o.itemsAmount > 1;) o.removeItem();
                                1 == o.itemsAmount && o.removeItem(), e.each(equipment_gallery_data.slides, function(e, i) {
                                    "" != (i || "") && o.addItem("<div class='overlay-container'>\t<img src='" + i.image + "' alt='" + i.alt + "' class='gallery_popup_image'>" + (i.caption && i.caption.trim() ? "<div class='caption'>" + i.caption + "</div>" : "") + "</div>")
                                }), e("#image-carousel-container").length > 0 && n.trigger("owl.goTo", e("#image-carousel-container").find("div.active").index()), t.modal("show")
                            }()
                    })
                })
            }, */
      mobileFilterToggle: function () {
        e(".close-wc-filters-panel").on("click", function () {
          e(".prtfilter_box").toggleClass("active");
        });
      },
      mobileMenuToggle: function () {
        e('<div class="sub-toggle"></div>').insertBefore(
          ".main-menu .menu-item-has-children .zn_mega_container.mega_container_0"
        );
        e('<div class="sub-toggle-children"></div>').insertBefore(
          ".main-menu .page_item_has_children ul"
        );

        e(".micon").on("click", function () {
          e(this).toggleClass("active"),
            e(".navbar-top-collapse").toggleClass("active");
          // e('body').toggleClass("nav-active")
        });
        e(".micon").click(function () {
          e("#moboverlay").fadeToggle(400);
          e(".anatol-header-menu").fadeToggle(500);
          e(".top-menu").toggleClass("top-animate");
          e(".mid-menu").toggleClass("mid-animate");
          e(".bottom-menu").toggleClass("bottom-animate");
        });
        e(".mobil_nav li a").click(function () {
          e(".main-menu").hide(500);
          e(".top-menu").toggleClass("top-animate");
          e(".mid-menu").toggleClass("mid-animate");
          e(".bottom-menu").toggleClass("bottom-animate");
        });

        var windowWidth = $(window).width();
        if (windowWidth <= 768) {
          e(".main-menu").addClass("mobilenav-menu");
        } else {
          e(".main-menu").removeClass(".mobilenav-menu");
        }

        e("#main-menu > a").click(function () {
          e("ul").slideToggle();
          e("ul ul").css("display", "none");
        });

        /* e('ul li').click(function () {
                    e(this).siblings().find('ul').slideUp();
                    e(this).find('ul').slideToggle();
                });
*/
        e(window).resize(function () {
          if (e(window).width() > 768) {
            e("ul").removeAttr("style");
          }
        });

        var selected_colors = 1;
        e(".press_filter_search").on(
          "click",
          ".pfs_toggle_header",
          function () {
            if (e(this).parents(".press_filter_search").hasClass("oppened")) {
              e(this).parents(".press_filter_search").removeClass("oppened");
              e(this).next().stop();
              e(this).next().slideUp(500);
            } else {
              e(this).parents(".press_filter_search").addClass("oppened");
              e(this).next().stop();
              e(this).next().slideDown(500);
            }
          }
        );
        e(".find_my_new_press").on("click", function () {
          if (e(".press_filter_search").hasClass("oppened")) {
            e(".press_filter_search").stop();
            e(".press_filter_search").slideUp(400, function () {
              e(".press_filter_search").removeClass("oppened");
            });
          } else {
            e(".press_filter_search").stop();
            e(".press_filter_search").slideDown(400, function () {
              e(".press_filter_search").addClass("oppened");
            });
          }
        });

        e(".press_filter_search").on(
          "change",
          ".press_filter_cat",
          function () {
            var id = e(this).find(":selected").val();
            if (id == "") {
              return false;
            }

            if (!e(".row_colorfilters").is(":visible")) {
              e(".row_colorfilters").slideDown(400);
            }

            e(".row_colorfilters .filter_item").removeClass("active");
            e(".row_colorfilters .filter_item input.color_id").val("0");
            e(".filter_row").slideUp(300);
            e(".filter_row_" + id)
              .stop()
              .slideDown(300);
            selected_colors = 0;
            show_hide_pressfilter_button(0);
          }
        );

        e(".press_filter_search").on("click", ".filter_item", function () {
          if (e(this).hasClass("disabled")) {
            return false;
          }

          if (e(this).hasClass("active")) {
            e(this).removeClass("active");
            e(this).find("input.color_id").val(0);
            selected_colors = selected_colors - 1;
          } else {
            e(this)
              .parents(".filter_flex")
              .find(".filter_item.active")
              .removeClass("active")
              .find("input.color_id")
              .val(0);
            e(this).addClass("active");
            e(this).find("input.color_id").val(1);
            selected_colors = 1;
          }

          show_hide_pressfilter_button(selected_colors);
          return false;
        });

        e(".press_filter_search").on(
          "click",
          ".colorfilters_button_flex .button",
          function () {
            if (selected_colors > 0) {
              e("#presses_filter_form").submit();
            }
          }
        );

        /***********************/
        jQuery(".innerr a, .popupp").click(function () {
          jQuery(".innerr").hide();
          jQuery(".popupp").hide();
        });
        jQuery(".get_a_quote").click(function (e) {
          e.preventDefault();
          jQuery(".get_quote.innerr").show();
          jQuery(".popupp").show();
        });
        jQuery(".join_us_dealer").click(function (e) {
          e.preventDefault();
          jQuery(".join_us_form.innerr").show();
          jQuery(".popupp").show();
        });
        jQuery(".subscribe-button").click(function (e) {
          e.preventDefault();
          jQuery(".subscribe_us_form.innerr").show();
          jQuery(".popupp").show();
        });

        jQuery(".download_ebook_btn").click(function (e) {
          e.preventDefault();
          jQuery(".download_ebook_b.innerr").show();
          jQuery(".popupp").show();
        });

        $(".innerr a, .popupp").click(function () {
          $(".get_quote.innerr").hide();
          $(".popupp").hide();
        });
        $(".get_a_quote_sales-button").click(function (e) {
          e.preventDefault();
          $(".get_quote.innerr").show();
          $(".popupp").show();
        });
        /***********************/

        e(".spm_contacts").on("click", "a.track-button", function (event) {
          event.preventDefault();
          var id = $(this).attr("href"),
            top = $(id).offset().top - e("#menu").height();
          e("body, html").animate({ scrollTop: top }, 600);
        });

        if (window.location.hash) {
          e("html, body").animate(
            {
              scrollTop:
                e(window.location.hash).offset().top - e("#menu").height(),
            },
            1000
          );

          history.replaceState(
            {},
            document.title,
            window.location.href.split("#")[0]
          );
        }
        /***********************/
        //Validate Phone
        /* 	let inp = document.querySelector('#tel');
  inp.addEventListener('focus', _ => {
    if(!/^\+\d*$/.test(inp.value))
    inp.value = '';
  });
  inp.addEventListener('keypress', e => {
    if(!/\d/.test(e.key))
    e.preventDefault();
  }); */
        /***********************/

        /***********************/

        $(".prtfilter_box .more-info").on("click", function (e) {
          if ($(this).hasClass("active")) {
            $(this).text("Show filter");
            $(this)
              .removeClass("active")
              .next(".woocommerce_filter")
              .slideUp("active");
          } else {
            $(".prtfilter_box").find(".woocommerce_filter").slideUp();

            $(this).text("Hide filter");
            $(this)
              .addClass("active")
              .next(".woocommerce_filter")
              .slideDown("active");
          }
        });

        function show_hide_pressfilter_button(s_colors) {
          if (s_colors > 0) {
            e(".colorfilters_button").stop();
            e(".colorfilters_button").slideDown(300, function () {});
          } else {
            e(".colorfilters_button").stop();
            e(".colorfilters_button").slideUp(300, function () {});
          }
        }
      },
      pageCompare: function () {
        var selected_items = 0;
        /* 				e(".compare_item").on('click',function() {
          if(e(this).hasClass('selected_item')) {
            e(this).removeClass('selected_item');
            e(this).find('.isSelected').val(0);
            selected_items = selected_items - 1;
          } else {
            e(this).addClass('selected_item');
            e(this).find('.isSelected').val(1);
            selected_items = selected_items + 1;
          }
          show_hide_filter_button(selected_items);
        }); */
        /* 				e(".compare_menu").on('click', '.cm_button', function() {
          e('.compare_items .compare_item').removeClass('selected_item');
          e('.compare_items .isSelected').val(0);
          e(".compare_menu .cm_button").removeClass('active');
          e(this).addClass('active');
          selected_items = 0;
          show_hide_filter_button(selected_items);
        	
          var filter_type = e(this).attr('data-filter');
          if(filter_type == 'all') {
            e('.compare_items .compare_item').stop();
            e('.compare_items .compare_item').show(300);
            //e('.compare_items .compare_item').show(300, function(){AOS.refresh();});
          } else {
            e('.compare_items .compare_item').stop();
            e('.compare_items .compare_item').hide(300);
            //e('.compare_items .compare_item').hide(300, function(){AOS.refresh();});
            e('.compare_items .compare_item.'+filter_type).stop();
            e('.compare_items .compare_item.'+filter_type).show(300);
            //e('.compare_items .compare_item.'+filter_type).show(300, function(){AOS.refresh();});
          }
        });
         */
        /* 			function show_hide_filter_button(count_items) {
          if(selected_items > 1) {
            e('.compare_menu .cm_row2').slideDown(300);
            //e('.compare_menu .cm_row2').slideDown(300, function(){AOS.refresh();});
          } else {
            e('.compare_menu .cm_row2').slideUp(300);
            //e('.compare_menu .cm_row2').slideUp(300, function(){AOS.refresh();});
          }		
        }; */

        $("#monthly_payment").on("click", ".CIT-term__container", function () {
          if ($(".more_cit_info").is(":hidden")) {
            $(".more_cit_info").slideDown("");
          } else {
            $(".more_cit_info").slideUp("");
          }
          return false;
        });
        /*$(".feedback").on("click", ".feedback-show-more", function() {
       if ($(".feedback-txt_block").is(":hidden")) {
            $(".feedback-txt_block").slideDown("");
         } else {
            $(".feedback-txt_block").slideUp("");
        }
        return false; 
    }); */
        /* 	$(".feedback .feedback-show-more").on( "click", function(e){
                                if($(this).hasClass("active")) {
                  $(this).text('Show More');
                                    $(this)
                                        .removeClass("active")
                                        .next(".feedback-txt_block").slideUp("active");
                                }else{
                                    $(".feedback").find(".feedback-txt_block").slideUp();
    
                  $(this).text('Hide Text');
                                    
  $(".feedback").addClass("active")
                                        .next(".feedback-txt_block").slideDown("active");
                                }
                            }); */

        /* 	$('.feedback').on('click', '.feedback-show-more', function(e) {
    $(this).toggleClass('active').siblings('.feedback-txt_block').slideToggle(0);
    $(e.target).text($(this).is(':visible') ? 'hide more' : 'show more');
  });
   */
        $(".feedback").on("click", ".feedback-show-more", function (e) {
          $(this)
            .toggleClass("active")
            .siblings(".feedback-txt_block-hide")
            .slideToggle(function () {
              $(e.target).text(
                $(this).is(":visible") ? "Show Less" : "Read More"
              );
            });

          //
        });

        /* 			
      e('.gallery-link').on('click', function () {
    e(this).next().magnificPopup('open');
});
 */
        /* e('.cs_photos').each(function () {
    e(this).magnificPopup({
        delegate: 'a',
        type: 'image',
        gallery: {
            enabled: true,
            navigateByImgClick: true
        },
        fixedContentPos: false
    });
}); */
        /* 			
  var fancyGallery = e("#images").find("a");
    fancyGallery.attr("rel","gallery").fancybox({
        type: "image"
    });
    e('.fancyLaunch').on('click', function() {
        fancyGallery.eq(0).click(); 
    });
	

   */

        /* 	e(".image-show").fancybox({
    // API options here
});

e('.fancyLaunch').click(function(e) {
    var el, id = e(this).data('open-id');
    if(id){
        el = e('.image-show[rel=' + id + ']');
        e.preventDefault();
        el.eq(0).click();
    }
}); 
   */
        /* 	
  e('[data-fancybox=" "]').fancybox({
  thumbs : {
    autoStart : true
  }
}); */

        e(".fancyLaunch").click(function (e) {
          e.preventDefault();
        });

        e("[data-fancybox]").fancybox({
          loop: true,
        });
      },
    }.init());
  })(jQuery);
/* 	
  const swiper = new Swiper('.support_team_cont', {
  // Default parameters
  slidesPerView: 3,
  spaceBetween: 10,
  // Responsive breakpoints
  breakpoints: {
    // when window width is >= 320px
    320: {
      slidesPerView: 2,
      spaceBetween: 20
    },
    // when window width is >= 480px
    480: {
      slidesPerView: 3,
      spaceBetween: 30
    },
    // when window width is >= 640px
    640: {
      slidesPerView: 3,
      spaceBetween: 40
    }
  }
})
 */

/* var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        cssMode: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
      }); */

/* 
    var swiper = new Swiper('.swiper-one', {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        cssMode: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

    var swiperTwo = new Swiper('.swiper-two', {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        cssMode: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

    var swiper = new Swiper('.get_contacts_slider', {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        cssMode: true,
  	
  fadeEffect: { crossFade: true },
  effect: "fade",
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
     autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
    });
	
	
   */

/* 
	
jQuery(document).ready(function() {
  jQuery('.equipment_item').addClass("hidden").viewportChecker({
      classToAdd: 'visible animate zoomIn one',
      offset: 100    
     }); 
   });   
  */

$(document).ready(function () {
  $(".product_review_slider7").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: !0,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 3000,
    fade: true,
    dots: true,
  });

  $(".equipment_gallery").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: !0,
    arrows: true,
    autoplay: false,
    lazyLoad: "ondemand",
    autoplaySpeed: 3000,
    fade: true,
    asNavFor: ".gallery-thumbnails",
  });
  $(".gallery-thumbnails").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    infinite: !0,
    asNavFor: ".equipment_gallery",
    dots: false,
    // vertical: true,
    centerMode: true,
    focusOnSelect: true,
  });

  $(".woocommerce-product-gallery__wrapper").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    centerMode: true,
    centerPadding: "0",
    asNavFor: ".product_thumbnails",
  });
  $(".product_thumbnails").slick({
    vertical: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: ".woocommerce-product-gallery__wrapper",
    dots: false,
    focusOnSelect: true,
  });

  //WooCommerce thumbnails
  $(".product_thumbnails .woocommerce-product-gallery__image").on(
    "click",
    function (event) {
      event.preventDefault();
    }
  );
  /*=====Menu======*/
  $(".menu_icon").click(function () {
    //$(".main-nav").fadeToggle(100);
    $(".anatol-header-menu").fadeToggle(100);

    $("#overlay").fadeToggle(500);
    $(".anatol-header-menu").toggleClass("znNavOvr");
    $(".top_menu").toggleClass("mobile-open");
    $(".top-line").toggleClass("top-animate");
    $(".mid-line").toggleClass("mid-animate");
    $(".bottom-line").toggleClass("bottom-animate");
    $("body").toggleClass("overflow_hidden");
  });

  //$("ul.mobilenav-menu li.menu-item-has-children").parent().removeClass('oppened');
  $("ul.mobilenav-menu li").on("click", ".sub-toggle", function () {
    //$("ul.mobilenav-menu li .sub-toggle").click(function(){
    if ($(this).parent().hasClass("oppened")) {
      $(this).parent().removeClass("oppened");
      $("ul.mobilenav-menu li")
        .find(".zn_mega_container.mega_container_0")
        .slideUp();
    } else {
      $("ul.mobilenav-menu li").removeClass("oppened");
      $(this).parent().addClass("oppened");

      $("ul.mobilenav-menu li")
        .find(".zn_mega_container.mega_container_0")
        .slideUp();
      $(this).next().slideDown(500);
    }
    //return false;
  });
  /* 	$("ul.mobilenav-menu li .sub-toggle").click(function(){
    $(this).toggleClass("toggle_sub");
    $("ul.mobilenav-menu li").find(".zn_mega_container.mega_container_0").slideUp().removeClass("show_items");
  	
    if($(this).hasClass('toggle_sub')){
      $("ul.mobilenav-menu li").find(".zn_mega_container.mega_container_0").slideUp().removeClass("show_items");
      $(this).parent("ul.mobilenav-menu li").find(".zn_mega_container.mega_container_0").slideToggle(500).toggleClass("show_items");
    } else{
    	
    	
    }
  });  */
  /*      e("ul.mobilenav-menu li").click(function(){
                     e("ul ul").slideUp();
                     e(this).find('ul').slideToggle();
                 }); */

  /* 	$('.mobile-open>li>a').click(function () {
    $(".main-menu").fadeToggle(500);
        $('#overlay').fadeToggle(500);
    $(".top_menu").removeClass("mobil-open");
    $(".top-line").toggleClass("top-animate");
    $(".mid-line").toggleClass("mid-animate");
    $(".bottom-line").toggleClass("bottom-animate");
    $('body').removeClass('overflow_hidden');
  }); */
});

jQuery(document).ready(function () {
  if (!window.matchMedia("(max-width: 1199px)").matches) {
    jQuery(".about_anatol, .anim_fade").addClass("hidden").viewportChecker({
      classToAdd: "visible animated fadeIn",
      offset: 100,
    });
    jQuery(".anim_left").addClass("hidden").viewportChecker({
      classToAdd: "visible animated fadeInLeft",
      offset: 100,
    });
    jQuery(".anim_right").addClass("hidden").viewportChecker({
      classToAdd: "visible animated fadeInRight",
      offset: 100,
    });
  }
});

function caterpillar() {
  if (!window.matchMedia("(max-width: 1199px)").matches) {
    ifMobile = window.matchMedia("(max-width: 980px)").matches;
    var maxHeight = 0;

    var caterpillar = $(".caterpillar");
    var catBlock = $(".caterpillar").find(".block");

    catBlock.each(function () {
      if ($(this).height() > maxHeight) {
        maxHeight = $(this).height() + 100 + "px";
      }
    });

    catBlock.hover(
      function () {
        if (ifMobile) {
          return;
        }
        $(this).css({
          height: maxHeight + 80 + "px",
        });
      },
      function () {
        $(this).css({
          height: maxHeight + 80 + "px", //,
        });
      }
    );

    catBlock.css("height", maxHeight);
    catBlock.hover(
      function () {
        if (ifMobile) {
          return;
        }
        caterpillar.addClass("moving");
      },
      function () {
        caterpillar.removeClass("moving");
      }
    );
  }
}

caterpillar();

// Contact Form 7 mail sent...
document.addEventListener(
  "wpcf7mailsent",
  function (event) {
    setTimeout(function () {
      $(".wpcf7-response-output").delay(2000).fadeOut("slow").hide(0);
    }, 3000);
  },
  false
);
