import { Fancybox } from "@fancyapps/ui/dist/fancybox/";

const initFancybox = () => {
  Fancybox.bind('[data-fancybox]', {
    dragToClose: false
  });
};

// const initWhatWeBuild = () => {
//   document.addEventListener('click', (event) => {
//     const button = event.target.closest('.what-we-build-section__more-btn');

//     if (!button) {
//       return;
//     }

//     const section = button.closest('.what-we-build-section');
//     const buttonsList = button.closest('.what-we-build-section__buttons-list');

//     if (!section || !buttonsList) {
//       return;
//     }

//     console.log(section, buttonsList);

//     section.classList.add('what-we-build-section--expanded');
//     buttonsList.parent.classList.add('hidden');
//   });
// };

document.addEventListener('DOMContentLoaded', function () {
  initFancybox();
  // initWhatWeBuild();
});