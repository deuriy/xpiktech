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
    slidesPerView: 1,
    spaceBetween: 24,
    loop: true,

    pagination: {
      el: '.models-slider__pagination',
      type: 'bullets',
    },

    breakpoints: {
      768: {
        direction: 'horizontal'
      }
    }
  });

  new Swiper('.cooperation-options-slider', {
    modules: [Pagination],
    slidesPerView: 1,
    spaceBetween: 24,
    loop: true,

    pagination: {
      el: '.cooperation-options-slider__pagination',
      type: 'bullets',
    },
  });
};

document.addEventListener('DOMContentLoaded', function () {
  initFancybox();
  initSwipers();
});