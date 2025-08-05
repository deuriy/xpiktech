import Swiper from 'swiper';
import { EffectFade, Autoplay, Navigation } from 'swiper/modules';

document.addEventListener('DOMContentLoaded', function () {
  initSliders();
});

const initSliders = () => {
  new Swiper('.hero-slider', {
    modules: [EffectFade, Autoplay],
    loop: true,

    effect: 'fade',
    fadeEffect: {
      crossFade: false
    },

    autoplay: {
      delay: 1000,
    },
  });

  new Swiper('.company-review-slider', {
    slidesPerView: 2,
    spaceBetween: 24,
    loop: true,
  });

  new Swiper('.service-block-slider', {
    modules: [Autoplay],
    slidesPerView: 2,
    spaceBetween: 20,
    loop: true,

    autoplay: {
      delay: 5000,
    },
  });

  new Swiper('.info-slider', {
    modules: [EffectFade, Navigation],
    loop: true,

    // effect: 'fade',
    // fadeEffect: {
    //   crossFade: true
    // },

    navigation: {
      nextEl: '.info-slider__next-btn',
      prevEl: '.info-slider__prev-btn',
    },
  });

  new Swiper('.testimonial-slider', {
    modules: [EffectFade, Navigation],
    loop: true,

    // effect: 'fade',
    // fadeEffect: {
    //   crossFade: true
    // },

    navigation: {
      nextEl: '.testimonial-slider__next-btn',
      prevEl: '.testimonial-slider__prev-btn',
    },
  });
};