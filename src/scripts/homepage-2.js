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

const getTabIndex = (tab) => {
  return Array.from(tab.parentElement.children).indexOf(tab);
};

const setActiveTab = (tabs, tab) => {
  tabs.querySelectorAll('.tabs-menu__link').forEach((link) => {
    link.classList.remove('tabs-menu__link--active');
  });

  tab.querySelector('.tabs-menu__link').classList.add('tabs-menu__link--active');
};

const setActiveTabContent = (tabs, index) => {
  tabs.querySelectorAll('.tabs__content').forEach((content) => {
    content.style.display = 'none';
  });

  tabs.querySelectorAll('.tabs__content').forEach((content) => {
    const contents = Array.from(content.parentElement.children).filter((child) => {
      return child.classList.contains('tabs__content');
    });

    if (contents[index] === content) {
      content.style.display = '';
    }
  });
};

const initTabs = () => {
  document.addEventListener('click', (event) => {
    const tab = event.target.closest('.tabs__list:not(.tabs__list--no-tabs) .tabs__item');

    if (!tab) {
      return;
    }

    event.preventDefault();

    const tabs = tab.closest('.tabs');
    const index = getTabIndex(tab);

    setActiveTab(tabs, tab);
    setActiveTabContent(tabs, index);
  });
};

document.addEventListener('DOMContentLoaded', function () {
  initFancybox();
  initSwipers();
  initTabs();
});