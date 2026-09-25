import { Fancybox } from "@fancyapps/ui/dist/fancybox/";
import Swiper from 'swiper';
import { Pagination, Navigation } from 'swiper/modules';

const initFancybox = () => {
  Fancybox.bind('[data-fancybox]', {
    dragToClose: false
  });
};

const initSwipers = () => {
  new Swiper('.models-slider', {
    modules: [Pagination],
    slidesPerView: 1.08,
    spaceBetween: 16,
    // loop: true,

    pagination: {
      el: '.models-slider__pagination',
      type: 'bullets',
    },

    breakpoints: {
      481: {
        slidesPerView: 1.3,
      },

      576: {
        slidesPerView: 1.5,
      }
    }
  });

  new Swiper('.cooperation-options-slider', {
    modules: [Pagination],
    slidesPerView: 1.08,
    spaceBetween: 16,
    // loop: true,

    pagination: {
      el: '.cooperation-options-slider__pagination',
      type: 'bullets',
    },

    breakpoints: {
      481: {
        slidesPerView: 1.3,
      },

      576: {
        slidesPerView: 1.5,
      }
    }
  });
};

document.addEventListener('DOMContentLoaded', function () {
  initFancybox();
  initSwipers();
});

document.addEventListener('mouseover', function (e) {
  const aiCompatibilityBlock = e.target.closest('.ai-compatibility-block');

  if (!aiCompatibilityBlock) return;

  document.querySelectorAll('.ai-compatibility-block--white-style').forEach(block => {
    if (block !== aiCompatibilityBlock) {
      block.classList.remove('ai-compatibility-block--white-style');
    }
  });

  aiCompatibilityBlock.classList.add('ai-compatibility-block--white-style');
});