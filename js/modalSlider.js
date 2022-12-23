const modalSlider = () => {
  const gallerySlider = document.querySelectorAll(".image-carousel-container");

  const scrollToTopButton = document.querySelector("#scrollToTop");

  gallerySlider.forEach((gallery, index) => {
    // document.documentElement.classList.toggle("overflow--hidden");

    const slideshowModal = document.createElement("div");

    slideshowModal.classList.add("slideshow-modal", "popin", "popin--closed");

    // scrollToTopButton.classList.add("hidden");

    const wrapperSlideshowModal = document.createElement("div");
    wrapperSlideshowModal.classList.add("slideshow-modal--wrapper");

    const closeButton = document.createElement("button");
    closeButton.classList.add("slideshow-close");
    closeButton.innerHTML = "&times;";
    wrapperSlideshowModal.prepend(closeButton);

    const screen = cloneGallery("equipment_gallery-modal");

    wrapperSlideshowModal.appendChild(screen);
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

      clone.className = "";
      clone.classList.add("swiper", cloneClassName);

      const wrapperSlideshowModal = clone.querySelector(".equipment_gallery");

      const itemsFromSlideshowModal = Array.from(
        wrapperSlideshowModal.querySelectorAll(".gallery-item")
      ).filter((item) => !item.classList.contains("swiper-slide-duplicate"));

      itemsFromSlideshowModal.forEach((item) => {
        item.className = "";
        item.classList.add(
          "gallery-item",
          "gallery-item-modal",
          "swiper-slide"
        );
        item.setAttribute("href", "#");
        item.style.opacity = "1";
        item.style.transform = "translate3d(0,0,0)";
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
      closeWrapper(slideshowModal);
    }

    function actionWithPopin(item, state) {
      if (state === "close") {
        item
          .querySelector(".slideshow-close")
          .addEventListener("click", (e) => {
            item.classList.add("popin--closed");
            document.body.classList.remove("popin--opened");
            document.documentElement.classList.remove("overflow--hidden");
            scrollToTopButton.classList.remove("hidden");
          });
      } else {
        document.documentElement.classList.add("overflow--hidden");
        item.classList.remove("popin--closed");
        document.body.classList.add("popin--opened");
        scrollToTopButton.classList.add("hidden");
      }
    }
    function closeWrapper(item) {
      wrapperSlideshowModal.addEventListener("click", (e) => {
        if (e.target === wrapperSlideshowModal) {
          document.documentElement.classList.remove("overflow--hidden");
          item.classList.add("popin--closed");
          document.body.classList.remove("popin--opened");
          scrollToTopButton.classList.remove("hidden");
        }
      });
    }
  });
};

modalSlider();
