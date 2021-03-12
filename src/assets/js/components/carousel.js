(function ($) {
  jQuery(document).ready(function () {
    let product_carousel_titled = new Swiper("#product_carousel_titled", {
      slidesPerView: "auto",
      loopFillGroupWithBlank: false,
      slideBlankClass: "swiper-slide-invisible-blank",
      breakpoints: {
        480: {
          slidesPerView: 1,
        },
        640: {
          slidesPerView: 3,
        },
        1000: {
          slidesPerView: 5,
        },
      },
      autoplay: {
        delay: 3000,
      },
      loop: true,
      spaceBetween: 10,
    });

    let productcarousel = new Swiper(".product-carousel", {
      slidesPerView: "auto",
      loopFillGroupWithBlank: false,
      slideBlankClass: "swiper-slide-invisible-blank",
      breakpoints: {
        480: {
          slidesPerView: 1,
        },
        640: {
          slidesPerView: 3,
        },
        1000: {
          slidesPerView: 5,
        },
      },
      autoplay: {
        delay: 3000,
      },
      loop: true,
      spaceBetween: 10,
    });
    let productcarouselOnsale = new Swiper(".product-carousel-on-sale", {
      slidesPerView: "auto",
      loopFillGroupWithBlank: false,
      slideBlankClass: "swiper-slide-invisible-blank",
      breakpoints: {
        480: {
          slidesPerView: 1,
        },
        640: {
          slidesPerView: 3,
        },
        1000: {
          slidesPerView: 4,
        },
      },
      autoplay: {
        delay: 3000,
      },
      loop: true,
      spaceBetween: 10,
    });

    let relatedProducts = new Swiper(".related_products .related", {
      wrapperClass: "products",
      slideClass: "product",

      breakpoints: {
        300: {
          slidesPerView: 1,
        },
        640: {
          slidesPerView: 2,
        },
        1000: {
          slidesPerView: 5,
        },
      },
      // slidesPerView: 5,
      // autoplay: {
      //   delay: 3000,
      // },
      // loop: true,
      // spaceBetween: 10,
      rtl: true,
    });

    // jQuery(".flex-control-nav li").addClass('swiper-slide')
    // let singleProductThumbnails = new Swiper('.woocommerce-product-gallery', {
    //     wrapperClass: 'flex-control-thumbs',
    //     // direction: 'horizontal',
    //     // slidesPerView: 6,
    //     // spaceBetween: 10,
    // })
  });
})(jQuery);
