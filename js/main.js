window.addEventListener("DOMContentLoaded", (e) => {
  // const blogImgs = document.querySelectorAll(".blog-post__img > img");
  // // const galleryImgs = document.querySelectorAll(".gallery-item > img");

  // setTimeout(() => {
  //   blogImgs.forEach((img) => img.setAttribute("width", "100%"));
  //   // galleryImgs.forEach((img) => img.setAttribute("width", "100%"));
  // }, 500);

  const gallerySlider = document.querySelectorAll(".image-carousel-container");

  gallerySlider.forEach((gallery, index) => {
    const slideshowModal = document.createElement("div");
    slideshowModal.classList.add("slideshow-modal", "popin", "popin--closed");
    // slideshowModal.setAttribute("id", `slideshow-${index}`);

    const wrapperSlideshowModal = document.createElement("div");
    wrapperSlideshowModal.classList.add("slideshow-modal--wrapper");

    const closeButton = document.createElement("a");
    closeButton.classList.add("slideshow-close");
    closeButton.innerHTML = "&times;";

    wrapperSlideshowModal.prepend(closeButton);

    // const paginationSlideshow = cloneGallery("swiper-pagination");
    const screen = cloneGallery("swiper-screen");

    // hashNavigation: {
    //   replaceState: true,
    //   watchState: true,
    // },

    // history: false,
    // hashChange: (e) => {
    //   console.log("hashchange", e);
    // },
    // hashSet: (e) => {
    //   console.log("hashSet", e);
    // },

    // thumbs: {
    //   swiper: new Swiper(paginationSlideshow, {
    //     loop: true,
    //     spaceBetween: 10,
    //     // slidesPerView: gallery.querySelectorAll(".gallery-item").length,
    //     slidesPerView: 1,
    //     freeMode: true,
    //     watchSlidesProgress: true,
    //   }),
    // },
    // hashNavigation: {
    //   replaceState: true,
    //   watchState: true,
    // },
    // history: false,
    // hashChange: (e) => {
    //   console.log("hashchange", e);
    // },
    // hashSet: (e) => {
    //   console.log("hashSet", e);
    // },

    wrapperSlideshowModal.appendChild(screen);
    // wrapperSlideshowModal.appendChild(paginationSlideshow);
    slideshowModal.appendChild(wrapperSlideshowModal);
    document.body.appendChild(slideshowModal);

    linkGalleryToSlideshow(gallery, slideshowModal);

    let swiper = new Swiper(screen, {
      loop: true,
      spaceBetween: 10,
      centeredSlides: true,

      keyboard: {
        enabled: true,
      },

      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });

    function cloneGallery(cloneClassName) {
      const clone = gallery.cloneNode(cloneClassName);

      console.log("====================================");
      console.log(clone.children[0]);
      console.log("====================================");
      clone.className = "";
      clone.classList.add(
        "swiper",
        cloneClassName
        // `${cloneClassName}-${index}`
      );

      const wrapperSlideshowModal = clone.querySelector(".equipment_gallery");
      wrapperSlideshowModal
        .querySelectorAll(".gallery-item")
        .forEach((item) => {
          // item.classList.replace("gallery-item", "swiper-slide");
          item.className = "";
          item.classList.add("gallery-item", "swiper-slide");
          item.setAttribute("href", "#");
          // item.style.opacity = "1";
        });
      return clone;
    }

    function linkGalleryToSlideshow(gallery, slideshowModal) {
      gallery.dataset.slideshow = slideshowModal.getAttribute("id");

      gallery.querySelectorAll(".gallery-item").forEach((item) => {
        item.style.pointerEvents = "auto";
        item.addEventListener("click", (e) => {
          e.preventDefault();

          actionWithPopin(slideshowModal, "open");
          item.classList.add("swiper-slide-visible", "swiper-slide-active");

          if (e.isTrusted) {
            setTimeout(() => {
              e.target.click();
            }, 50);
          }
        });
      });
      actionWithPopin(slideshowModal, "close");
    }

    function actionWithPopin(item, state) {
      if (state === "close") {
        item
          .querySelector(".slideshow-close")
          .addEventListener("click", (e) => {
            item.classList.add("popin--closed");
            document.body.classList.remove("popin--opened");
          });
      } else {
        item.classList.remove("popin--closed");
        document.body.classList.add("popin--opened");
      }
    }
  });

  //   const vtigerForm = document.querySelector(
  //     "#__vtigerWebForm.contactFormEbook"
  //   );
  //   vtigerForm.addEventListener("submit", (e) => {
  //     e.preventDefault();
  //     let form = e.target;
  //     let url = "https://sale.anatol.com/modules/Webforms/capture.php";
  //     translate_kurul("#__vtigerWebForm.contactFormEbook");
  //     const promise = new Promise((resolve, reject) => {
  //       grecaptcha.ready(() =>
  //         grecaptcha
  //           .execute("6LfVhtMUAAAAANWXok-9PsISTBoAZUHg-9rBr6Db", {
  //             action: "submit",
  //           })
  //           .then((token) => {
  //             resolve(
  //               $.ajax({
  //                 type: "POST",
  //                 url: url,
  //                 data: form.serialize(),
  //                 success: function (data) {
  //                   alert(data);
  //                 },
  //               })
  //             );
  //           }, reject)
  //       );
  //     });
  //     document.querySelector(".popupp").classList.toggle("hidden");
  //     document.querySelector(".innerr").classList.toggle("hidden");
  //     setTimeout(() => {
  //       document
  //         .querySelectorAll(".download_click")[0]
  //         .addEventListener("click", {});
  //     }, 1000);
  //   });
  //   vtigerForm.addEventListener("submit", (e) => {
  //     e.preventDefault();
  //     let form = e.target;
  //     let url = "https://sale.anatol.com/modules/Webforms/capture.php";
  //     translate_kurul("#__vtigerWebForm.contactFormEbook");
  //     const promise = new Promise((resolve, reject) => {
  //       grecaptcha.ready(() =>
  //         grecaptcha
  //           .execute("6LfVhtMUAAAAANWXok-9PsISTBoAZUHg-9rBr6Db", {
  //             action: "submit",
  //           })
  //           .then((token) => {
  //             resolve(
  //               $.ajax({
  //                 type: "POST",
  //                 url: url,
  //                 data: form.serialize(),
  //                 success: function (data) {
  //                   alert(data);
  //                 },
  //               })
  //             );
  //           }, reject)
  //       );
  //     });
  //     document.querySelector(".popupp").classList.toggle("hidden");
  //     document.querySelector(".innerr").classList.toggle("hidden");
  //     setTimeout(() => {
  //       document
  //         .querySelectorAll(".download_click")[0]
  //         .addEventListener("click", {});
  //     }, 1000);
  //   });
  //   function translate_kurul(a) {
  //     let formm = document.querySelector(a);
  //     formm.firstname.value = url_slug(formm.firstname.value);
  //     formm.lastname.value = url_slug(formm.lastname.value);
  //   }
  //   function translate_kurul_sub(a) {
  //     let formm = document.querySelector(a);
  //     formm.firstname.value = url_slug(formm.firstname.value);
  //     formm.lastname.value = url_slug(formm.lastname.value);
  //   }
  //   function url_slug(s, opt) {
  //     s = String(s);
  //     opt = Object(opt);
  //     var defaults = {
  //       delimiter: " ",
  //       limit: undefined,
  //       lowercase: false,
  //       replacements: {},
  //       transliterate: true,
  //     };
  //     // Merge options
  //     for (var k in defaults) {
  //       if (!opt.hasOwnProperty(k)) {
  //         opt[k] = defaults[k];
  //       }
  //     }
  //     var char_map = {
  //       // Latin
  //       À: "A",
  //       Á: "A",
  //       Â: "A",
  //       Ã: "A",
  //       Ä: "A",
  //       Å: "A",
  //       Æ: "AE",
  //       Ç: "C",
  //       È: "E",
  //       É: "E",
  //       Ê: "E",
  //       Ë: "E",
  //       Ì: "I",
  //       Í: "I",
  //       Î: "I",
  //       Ï: "I",
  //       Ð: "D",
  //       Ñ: "N",
  //       Ò: "O",
  //       Ó: "O",
  //       Ô: "O",
  //       Õ: "O",
  //       Ö: "O",
  //       Ő: "O",
  //       Ø: "O",
  //       Ù: "U",
  //       Ú: "U",
  //       Û: "U",
  //       Ü: "U",
  //       Ű: "U",
  //       Ý: "Y",
  //       Þ: "TH",
  //       ß: "ss",
  //       à: "a",
  //       á: "a",
  //       â: "a",
  //       ã: "a",
  //       ä: "a",
  //       å: "a",
  //       æ: "ae",
  //       ç: "c",
  //       è: "e",
  //       é: "e",
  //       ê: "e",
  //       ë: "e",
  //       ì: "i",
  //       í: "i",
  //       î: "i",
  //       ï: "i",
  //       ð: "d",
  //       ñ: "n",
  //       ò: "o",
  //       ó: "o",
  //       ô: "o",
  //       õ: "o",
  //       ö: "o",
  //       ő: "o",
  //       ø: "o",
  //       ù: "u",
  //       ú: "u",
  //       û: "u",
  //       ü: "u",
  //       ű: "u",
  //       ý: "y",
  //       þ: "th",
  //       ÿ: "y",
  //       // Latin symbols
  //       "©": "(c)",
  //       // Greek
  //       Α: "A",
  //       Β: "B",
  //       Γ: "G",
  //       Δ: "D",
  //       Ε: "E",
  //       Ζ: "Z",
  //       Η: "H",
  //       Θ: "8",
  //       Ι: "I",
  //       Κ: "K",
  //       Λ: "L",
  //       Μ: "M",
  //       Ν: "N",
  //       Ξ: "3",
  //       Ο: "O",
  //       Π: "P",
  //       Ρ: "R",
  //       Σ: "S",
  //       Τ: "T",
  //       Υ: "Y",
  //       Φ: "F",
  //       Χ: "X",
  //       Ψ: "PS",
  //       Ω: "W",
  //       Ά: "A",
  //       Έ: "E",
  //       Ί: "I",
  //       Ό: "O",
  //       Ύ: "Y",
  //       Ή: "H",
  //       Ώ: "W",
  //       Ϊ: "I",
  //       Ϋ: "Y",
  //       α: "a",
  //       β: "b",
  //       γ: "g",
  //       δ: "d",
  //       ε: "e",
  //       ζ: "z",
  //       η: "h",
  //       θ: "8",
  //       ι: "i",
  //       κ: "k",
  //       λ: "l",
  //       μ: "m",
  //       ν: "n",
  //       ξ: "3",
  //       ο: "o",
  //       π: "p",
  //       ρ: "r",
  //       σ: "s",
  //       τ: "t",
  //       υ: "y",
  //       φ: "f",
  //       χ: "x",
  //       ψ: "ps",
  //       ω: "w",
  //       ά: "a",
  //       έ: "e",
  //       ί: "i",
  //       ό: "o",
  //       ύ: "y",
  //       ή: "h",
  //       ώ: "w",
  //       ς: "s",
  //       ϊ: "i",
  //       ΰ: "y",
  //       ϋ: "y",
  //       ΐ: "i",
  //       // Turkish
  //       Ş: "S",
  //       İ: "I",
  //       Ç: "C",
  //       Ü: "U",
  //       Ö: "O",
  //       Ğ: "G",
  //       ş: "s",
  //       ı: "i",
  //       ç: "c",
  //       ü: "u",
  //       ö: "o",
  //       ğ: "g",
  //       // Russian
  //       А: "A",
  //       Б: "B",
  //       В: "V",
  //       Г: "G",
  //       Д: "D",
  //       Е: "E",
  //       Ё: "Yo",
  //       Ж: "Zh",
  //       З: "Z",
  //       И: "I",
  //       Й: "J",
  //       К: "K",
  //       Л: "L",
  //       М: "M",
  //       Н: "N",
  //       О: "O",
  //       П: "P",
  //       Р: "R",
  //       С: "S",
  //       Т: "T",
  //       У: "U",
  //       Ф: "F",
  //       Х: "H",
  //       Ц: "C",
  //       Ч: "Ch",
  //       Ш: "Sh",
  //       Щ: "Sh",
  //       Ъ: "",
  //       Ы: "Y",
  //       Ь: "",
  //       Э: "E",
  //       Ю: "Yu",
  //       Я: "Ya",
  //       а: "a",
  //       б: "b",
  //       в: "v",
  //       г: "g",
  //       д: "d",
  //       е: "e",
  //       ё: "yo",
  //       ж: "zh",
  //       з: "z",
  //       и: "i",
  //       й: "y",
  //       к: "k",
  //       л: "l",
  //       м: "m",
  //       н: "n",
  //       о: "o",
  //       п: "p",
  //       р: "r",
  //       с: "s",
  //       т: "t",
  //       у: "u",
  //       ф: "f",
  //       х: "h",
  //       ц: "ts",
  //       ч: "ch",
  //       ш: "sh",
  //       щ: "sh",
  //       ъ: "",
  //       ы: "y",
  //       ь: "",
  //       э: "e",
  //       ю: "yu",
  //       я: "ya",
  //       // Ukrainian
  //       Є: "Ye",
  //       І: "I",
  //       Ї: "Yi",
  //       Ґ: "G",
  //       є: "ye",
  //       і: "i",
  //       ї: "yi",
  //       ґ: "g",
  //       // Czech
  //       Č: "C",
  //       Ď: "D",
  //       Ě: "E",
  //       Ň: "N",
  //       Ř: "R",
  //       Š: "S",
  //       Ť: "T",
  //       Ů: "U",
  //       Ž: "Z",
  //       č: "c",
  //       ď: "d",
  //       ě: "e",
  //       ň: "n",
  //       ř: "r",
  //       š: "s",
  //       ť: "t",
  //       ů: "u",
  //       ž: "z",
  //       // Polish
  //       Ą: "A",
  //       Ć: "C",
  //       Ę: "e",
  //       Ł: "L",
  //       Ń: "N",
  //       Ó: "o",
  //       Ś: "S",
  //       Ź: "Z",
  //       Ż: "Z",
  //       ą: "a",
  //       ć: "c",
  //       ę: "e",
  //       ł: "l",
  //       ń: "n",
  //       ó: "o",
  //       ś: "s",
  //       ź: "z",
  //       ż: "z",
  //       // Latvian
  //       Ā: "A",
  //       Č: "C",
  //       Ē: "E",
  //       Ģ: "G",
  //       Ī: "i",
  //       Ķ: "k",
  //       Ļ: "L",
  //       Ņ: "N",
  //       Š: "S",
  //       Ū: "u",
  //       Ž: "Z",
  //       ā: "a",
  //       č: "c",
  //       ē: "e",
  //       ģ: "g",
  //       ī: "i",
  //       ķ: "k",
  //       ļ: "l",
  //       ņ: "n",
  //       š: "s",
  //       ū: "u",
  //       ž: "z",
  //     };
  //     // Make custom replacements
  //     for (var k in opt.replacements) {
  //       s = s.replace(RegExp(k, "g"), opt.replacements[k]);
  //     }
  //     // Transliterate characters to ASCII
  //     if (opt.transliterate) {
  //       for (var k in char_map) {
  //         s = s.replace(RegExp(k, "g"), char_map[k]);
  //       }
  //     }
  //     // Replace non-alphanumeric characters with our delimiter
  //     var alnum = RegExp("[^a-z0-9]+", "ig");
  //     s = s.replace(alnum, opt.delimiter);
  //     // Remove duplicate delimiters
  //     s = s.replace(RegExp("[" + opt.delimiter + "]{2,}", "g"), opt.delimiter);
  //     // Truncate slug to max. characters
  //     s = s.substring(0, opt.limit);
  //     // Remove delimiter from ends
  //     s = s.replace(
  //       RegExp("(^" + opt.delimiter + "|" + opt.delimiter + "$)", "g"),
  //       ""
  //     );
  //     return opt.lowercase ? s.toLowerCase() : s;
  //   }
});
