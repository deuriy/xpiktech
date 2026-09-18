import { Fancybox } from "@fancyapps/ui/dist/fancybox/";
import Swiper from 'swiper';
import { Pagination, Navigation } from 'swiper/modules';

const initFancybox = () => {
  Fancybox.bind('[data-fancybox]', {
    dragToClose: false
  });
};

const initSwipers = () => {
  new Swiper('.running-systems-slider', {
    modules: [Pagination, Navigation],
    loop: true,
    slidesPerView: 1,
    spaceBetween: 24,

    pagination: {
      el: '.running-systems-slider__pagination',
      type: 'bullets',
    },

    navigation: {
      nextEl: '.running-systems-section__next-btn',
      prevEl: '.running-systems-section__prev-btn',
    },
  });
};

document.addEventListener('DOMContentLoaded', function () {
  initFancybox();
  initSwipers();
});