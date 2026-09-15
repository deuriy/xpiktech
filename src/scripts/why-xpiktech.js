import Swiper from 'swiper';
import { Pagination } from 'swiper/modules';
import { Fancybox } from "@fancyapps/ui/dist/fancybox/";

const initFancybox = () => {
  Fancybox.bind('[data-fancybox]', {
    dragToClose: false
  });
};

const initSwipers = () => {
  new Swiper('.what-we-build-swiper', {
    modules: [Pagination],
    loop: true,
    slidesPerView: 1,
    spaceBetween: 24,

    pagination: {
      el: '.what-we-build-swiper__pagination',
      type: 'bullets',
    },
  });

  new Swiper('.how-we-work-swiper', {
    modules: [Pagination],
    loop: true,
    slidesPerView: 1,
    spaceBetween: 24,

    pagination: {
      el: '.how-we-work-swiper__pagination',
      type: 'bullets',
    },
  });
};


document.addEventListener('DOMContentLoaded', function () {
  initFancybox();
  initSwipers();
});