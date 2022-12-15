const modalSlider = () => {
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

      // console.log("====================================");
      // console.log(clone.children[0]);
      // console.log("====================================");
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
};

modalSlider();
