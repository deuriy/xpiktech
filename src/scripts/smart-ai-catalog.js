import { Fancybox } from '@fancyapps/ui/dist/fancybox/';

const initFancybox = () => {
  Fancybox.bind('[data-fancybox]', {
    dragToClose: false,
  });
};

document.addEventListener('DOMContentLoaded', function () {
  initFancybox();
});
