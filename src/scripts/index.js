import Swiper from 'swiper';
import { EffectFade, Autoplay, Navigation, Pagination, Thumbs } from 'swiper/modules';
import { Fancybox } from "@fancyapps/ui/dist/fancybox/";

document.addEventListener('DOMContentLoaded', function () {
  initSliders();
  initFancybox();
});

const initFancybox = () => {
  Fancybox.bind('[data-src="#contact-form-popup"], [href="#contact-form-popup"]', {
    dragToClose: false,
    // closeButton: false
  });
};

const initSliders = () => {
  new Swiper('.hero-slider', {
    modules: [EffectFade, Autoplay],
    loop: true,

    effect: 'fade',
    fadeEffect: {
      crossFade: true
    },

    // autoplay: {
    //   delay: 5000
    // },
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

    // autoplay: {
    //   delay: 5000,
    // },

    navigation: {
      nextEl: '.service-block-slider-wrapper__next-btn'
    }
  });

  new Swiper('.info-slider', {
    modules: [EffectFade, Navigation],
    loop: true,

    effect: 'fade',
    speed: 600,
    autoHeight: true,
    fadeEffect: {
      crossFade: true
    },

    navigation: {
      nextEl: '.info-slider__next-btn',
      prevEl: '.info-slider__prev-btn',
    }
  });

  const infoImagesSlider = new Swiper('.info-images-slider', {
    modules: [EffectFade],
    loop: true,

    effect: 'fade',
    speed: 600,
    autoHeight: true,
    fadeEffect: {
      crossFade: true
    }
  });

  new Swiper('.info-text-slider', {
    modules: [Pagination, Thumbs],
    loop: true,
    autoHeight: true,

    pagination: {
      el: '.info-slider-section__pagination',
      type: 'bullets',
    },

    thumbs: {
      swiper: infoImagesSlider,
    },
  });

  new Swiper('.testimonial-slider', {
    modules: [EffectFade, Navigation, Pagination],
    loop: true,

    effect: 'fade',
    speed: 600,
    autoHeight: true,
    fadeEffect: {
      crossFade: true
    },

    navigation: {
      nextEl: '.testimonial-section__next-btn',
      prevEl: '.testimonial-section__prev-btn',
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
    autoHeight: true,

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

let heroTimer;

document.addEventListener('mouseover', function (e) {
  const heroBlock = e.target.closest('.hero-block');

  if (!heroBlock) return;

  heroBlock.classList.remove('hero-block--animation-paused');

  heroTimer = setTimeout(() => {
    heroBlock.classList.add('hero-block--animation-paused');
  }, 900);
});

document.addEventListener('mouseout', function (e) {
  const heroBlock = e.target.closest('.hero-block');

  if (!heroBlock) return;

  heroBlock.classList.remove('hero-block--animation-paused');

  clearTimeout(heroTimer);
});