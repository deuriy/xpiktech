import Swiper from 'swiper';
import { EffectFade, Autoplay, Navigation, Pagination } from 'swiper/modules';

document.addEventListener('DOMContentLoaded', function () {
  initSliders();
});

const initSliders = () => {
  new Swiper('.hero-slider', {
    modules: [EffectFade, Autoplay],
    loop: true,

    effect: 'fade',
    fadeEffect: {
      crossFade: true
    },

    autoplay: {
      delay: 5000
    },
  });

  new Swiper('.company-review-slider', {
    modules: [Navigation],
    slidesPerView: 2,
    spaceBetween: 24,
    loop: true,
    direction: 'vertical',

    navigation: {
      nextEl: '.company-review-slider-block__next-btn'
    },

    breakpoints: {
      768: {
        direction: 'horizontal'
      }
    }
  });

  new Swiper('.service-block-slider', {
    modules: [Autoplay, Navigation],
    slidesPerView: 'auto',
    spaceBetween: 20,
    loop: true,

    breakpoints: {
      768: {
        slidesPerView: 3,
      },

      1200: {
        slidesPerView: 2
      }
    },

    autoplay: {
      delay: 5000,
    },

    navigation: {
      nextEl: '.service-block-slider-wrapper__next-btn'
    }
  });

  new Swiper('.info-slider', {
    modules: [EffectFade, Navigation, Pagination],
    loop: true,

    // effect: 'fade',
    // fadeEffect: {
    //   crossFade: true
    // },

    navigation: {
      nextEl: '.info-block__next-btn',
      prevEl: '.info-block__prev-btn',
    },

    pagination: {
      el: '.info-slider-section__pagination',
      type: 'bullets',
    },
  });

  new Swiper('.testimonial-slider', {
    modules: [EffectFade, Navigation, Pagination],
    loop: true,

    // effect: 'fade',
    // fadeEffect: {
    //   crossFade: true
    // },

    navigation: {
      nextEl: '.testimonial-block__next-btn',
      prevEl: '.testimonial-block__prev-btn',
    },

    pagination: {
      el: '.testimonial-section__pagination',
      type: 'bullets',
    },
  });

  new Swiper('.statistics-slider', {
    modules: [Pagination],
    slidesPerView: 1,
    spaceBetween: 24,
    loop: true,

    breakpoints: {
      768: {
        slidesPerView: 2
      }
    },

    pagination: {
      el: '.statistics-slider__pagination',
      type: 'bullets',
    },
  });
};