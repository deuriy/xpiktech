import { Fancybox } from '@fancyapps/ui/dist/fancybox/';

const initFancybox = () => {
  Fancybox.bind('[data-fancybox]', {
    dragToClose: false,
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

const initSoftwareDevelopmentMethods = () => {
  document.addEventListener('click', (event) => {
    const button = event.target.closest('.software-development-methods__toggle-btn');

    if (!button) {
      return;
    }

    const section = button.closest('.software-development-methods');

    if (!section) {
      return;
    }

    const isExpanded = button.classList.toggle('software-development-methods__toggle-btn--active');

    section.querySelectorAll('.software-development-method').forEach((method) => {
      method.classList.toggle('software-development-method--expanded', isExpanded);
    });

    button.textContent = isExpanded ? 'Hide full comparison' : 'Show full comparison';
  });
};

document.addEventListener('DOMContentLoaded', function () {
  initFancybox();
  initSoftwareDevelopmentMethods();
});
